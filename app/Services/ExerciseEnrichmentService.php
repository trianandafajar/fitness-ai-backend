<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class ExerciseEnrichmentService
{
    public function __construct(
        protected AiProviderService $ai,
    ) {}

    /**
     * Enrich an array of exercises with AI-generated metadata.
     * Only enriches exercises that are missing `description` (the AI marker field).
     *
     * @param  array<int, array{name: string, sets?: int, reps?: int, notes?: string}>  $exercises
     * @return array<int, array{name: string, sets?: int, reps?: int, notes?: string, description: string, category: string, rest_seconds: int, estimated_calories: int}>
     */
    public function enrich(array $exercises): array
    {
        $needsEnrichment = array_filter(
            $exercises,
            fn(array $ex) => empty($ex['description']),
        );

        if (empty($needsEnrichment)) {
            return $exercises;
        }

        $payload = array_map(
            fn(array $ex) => [
                'name' => $ex['name'],
                'sets' => $ex['sets'] ?? null,
                'reps' => $ex['reps'] ?? null,
            ],
            array_values($needsEnrichment),
        );

        $systemPrompt = <<<'PROMPT'
You are a fitness exercise database. Given an array of exercises with name, sets, and reps, generate metadata for each.

Respond in JSON format only (no markdown). Return a JSON array where each object has:
- description: a concise 1-2 sentence description of how to perform the exercise
- category: the primary muscle group and type (e.g. "Strength · Chest", "Hypertrophy · Legs", "Cardio · Core")
- rest_seconds: recommended rest time in seconds between sets (typical: strength=120, hypertrophy=90, endurance=60, cardio=60)
- estimated_calories: estimated calories burned for the given sets and reps (assume average body weight ~75kg)

The output array must be in the same order as the input array. Return ONLY the JSON array, nothing else.
PROMPT;

        $userPrompt = "Exercises:\n" . json_encode($payload, JSON_PRETTY_PRINT);

        try {
            $response = $this->ai->chat(
                [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $userPrompt],
                ],
                ['temperature' => 0.4, 'max_tokens' => 2048],
            );

            $raw = $response['choices'][0]['message']['content'] ?? '[]';
            $cleaned = trim($raw, "` \n\r\t");
            $cleaned = preg_replace('/^json\s*/i', '', $cleaned);
            $enrichedData = json_decode($cleaned, true);

            if (!is_array($enrichedData)) {
                Log::warning('ExerciseEnrichmentService: AI returned non-array', ['raw' => $raw]);
                return $this->applyFallbacks($exercises);
            }

            $enrichedMap = [];
            $needsValues = array_values($needsEnrichment);
            foreach ($enrichedData as $idx => $meta) {
                if (isset($needsValues[$idx])) {
                    $enrichedMap[$needsValues[$idx]['name']] = $meta;
                }
            }

            return array_map(function (array $ex) use ($enrichedMap) {
                if (!empty($ex['description'])) {
                    return $ex;
                }

                $meta = $enrichedMap[$ex['name']] ?? null;

                return array_merge($ex, [
                    'description' => $meta['description'] ?? $this->guessDescription($ex['name']),
                    'category' => $meta['category'] ?? 'General',
                    'rest_seconds' => (int) ($meta['rest_seconds'] ?? 90),
                    'estimated_calories' => (int) ($meta['estimated_calories'] ?? $this->guessCalories($ex)),
                ]);
            }, $exercises);
        } catch (\Throwable $e) {
            Log::error('ExerciseEnrichmentService: AI call failed', ['error' => $e->getMessage()]);
            return $this->applyFallbacks($exercises);
        }
    }

    /**
     * Enrich a single exercise.
     */
    public function enrichSingle(array $exercise): array
    {
        $result = $this->enrich([$exercise]);
        return $result[0];
    }

    /**
     * Fallback: generate basic metadata without AI.
     */
    protected function applyFallbacks(array $exercises): array
    {
        return array_map(function (array $ex) {
            if (!empty($ex['description'])) {
                return $ex;
            }

            return array_merge($ex, [
                'description' => $this->guessDescription($ex['name']),
                'category' => 'General',
                'rest_seconds' => 90,
                'estimated_calories' => $this->guessCalories($ex),
            ]);
        }, $exercises);
    }

    protected function guessDescription(string $name): string
    {
        return "Perform {$name} with proper form. Focus on controlled movement and full range of motion.";
    }

    protected function guessCalories(array $exercise): int
    {
        $sets = $exercise['sets'] ?? 3;
        $reps = $exercise['reps'] ?? 10;
        return (int) ceil($sets * $reps * 0.5);
    }
}
