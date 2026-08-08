<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\ExerciseCategory;
use App\Models\Food;
use App\Models\UserProfile;
use App\Services\AiEnrichmentService;
use App\Services\AiProviderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class OnboardingController extends Controller
{
    private const EXERCISE_EQUIPMENT_BY_TYPE = [
        'running' => ['Treadmill', 'Treadclimber', 'Stair Climber', 'Stepmill', 'Vertical Climber', "Jacob's Ladder", 'Elliptical Trainer', 'Air Bike', 'Skipping Rope', 'Mini Trampoline', 'Battle Rope', 'Sled'],
        'cycling' => ['Spin Bike', 'Stationary Bike', 'Air Bike'],
        'gym / weight lifting' => ['Barbell', 'Dumbbell', 'Kettlebell', 'Squat Rack', 'Power Rack', 'Smith Machine', 'Cable Crossover Machine', 'Lat Pulldown Machine', 'Leg Press Machine', 'Seated Row Machine', 'Chest Press Machine', 'Shoulder Press Machine'],
        'yoga' => ['Floor Mat', 'Foam Roller', 'Stability Ball', 'Suspension Trainer'],
        'swimming' => ['Treadmill', 'Stair Climber', 'Elliptical Trainer', 'Rowing Machine', 'Ski Erg', 'Air Bike'],
    ];

    private const EXERCISE_CATEGORIES_BY_TYPE = [
        'running' => ['cardio', 'endurance', 'interval', 'recovery', 'agility'],
        'cycling' => ['cardio', 'endurance', 'interval', 'recovery'],
        'gym / weight lifting' => ['strength', 'isolation', 'hypertrophy', 'power', 'carry', 'core'],
        'yoga' => ['mobility', 'stability', 'flexibility', 'core'],
        'swimming' => ['cardio', 'endurance'],
    ];

    private const EXERCISE_KEYWORDS_BY_TYPE = [
        'running' => ['run', 'jog', 'walk', 'sprint', 'climb', 'step', 'jump rope', 'high knee', 'hill', 'shuttle', 'recovery', 'cardio', 'endurance', 'interval'],
        'cycling' => ['spin', 'bike', 'ride', 'sprint', 'climb', 'interval', 'cadence'],
        'gym / weight lifting' => ['squat', 'press', 'bench', 'deadlift', 'row', 'curl', 'push-up', 'pull-up', 'lunge', 'plank', 'fly', 'raise', 'shoulder', 'bicep', 'triceps', 'chest', 'back', 'leg', 'dumbbell', 'barbell', 'kettlebell'],
        'yoga' => ['stretch', 'mobility', 'plank', 'balance', 'pike', 'hip', 'hamstring', 'yoga', 'dead bug', 'glute bridge'],
        'swimming' => ['rowing', 'erg', 'swim', 'pull', 'climb', 'cardio'],
    ];

    private const RETRY_REMINDER = 'The exercise_suggestions and meal_suggestions you returned contained names that are NOT in the ALLOWED lists. Redo the plan using ONLY the ALLOWED EXERCISE NAMES and ALLOWED FOOD NAMES exactly as written (copy them verbatim, keep spelling and parentheses). Do not create, translate, shorten, or modify any name.';

    public function step1(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today|after:'.now()->subYears(120)->format('Y-m-d'),
            'gender' => ['required', Rule::in(['male', 'female', 'other'])],
            'height_cm' => 'required|numeric|min:50|max:300',
            'weight_kg' => 'required|numeric|min:10|max:500',
        ]);

        $user = $request->user();
        $user->update(['name' => $validated['name']]);

        $profile = $this->getOrCreateProfile($user->id, 1);
        $profile->update([
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'height_cm' => $validated['height_cm'],
            'weight_kg' => $validated['weight_kg'],
            'onboarding_step' => 1,
        ]);

        return response()->json([
            'message' => 'Step 1 completed',
            'profile' => $profile->fresh(),
        ]);
    }

    public function step2(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'dietary_preferences' => 'nullable|array',
            'dietary_preferences.*' => 'string',
            'dietary_restrictions' => 'nullable|array',
            'dietary_restrictions.*' => 'string',
            'allergies' => 'nullable|array',
            'allergies.*' => 'string',
            'medical_conditions' => 'nullable|string|max:1000',
        ]);

        $profile = $this->requireStep($request->user()->id, 1);
        $profile->update([
            'dietary_preferences' => $validated['dietary_preferences'] ?? [],
            'dietary_restrictions' => $validated['dietary_restrictions'] ?? [],
            'allergies' => $validated['allergies'] ?? [],
            'medical_conditions' => $validated['medical_conditions'] ?? null,
            'onboarding_step' => 2,
        ]);

        return response()->json([
            'message' => 'Step 2 completed',
            'profile' => $profile->fresh(),
        ]);
    }

    public function step3(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'exercise_frequency' => ['required', Rule::in(['never', '1-2', '3-4', '5+'])],
            'exercise_types' => 'required|array|min:1',
            'exercise_types.*' => 'string',
            'injuries' => 'nullable|string|max:1000',
        ]);

        $profile = $this->requireStep($request->user()->id, 2);
        $profile->update([
            'exercise_frequency' => $validated['exercise_frequency'],
            'exercise_types' => $validated['exercise_types'],
            'injuries' => $validated['injuries'] ?? null,
            'onboarding_step' => 3,
        ]);

        return response()->json([
            'message' => 'Step 3 completed',
            'profile' => $profile->fresh(),
        ]);
    }

    public function step4(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'fitness_goal' => 'required|string|max:255',
            'activity_level' => ['required', Rule::in(['low', 'medium', 'high'])],
            'goal_weight_kg' => 'nullable|numeric|min:10|max:500',
        ]);

        $profile = $this->requireStep($request->user()->id, 3);
        $profile->update([
            'fitness_goal' => $validated['fitness_goal'],
            'activity_level' => $validated['activity_level'],
            'goal_weight_kg' => $validated['goal_weight_kg'] ?? null,
            'onboarding_step' => 4,
        ]);

        $request->user()->goals()->updateOrCreate(
            ['status' => 'active'],
            [
                'goal_type' => $validated['fitness_goal'],
                'target_weight_kg' => $validated['goal_weight_kg'] ?? null,
            ]
        );

        return response()->json([
            'message' => 'Step 4 completed',
            'profile' => $profile->fresh(),
        ]);
    }

    public function step5(Request $request): JsonResponse
    {
        $profile = $this->requireStep($request->user()->id, 4);

        $stored = $profile->ai_analysis;
        $isBroken = is_array($stored)
            && ((
                ($stored['summary'] ?? null) === 'AI analysis format error.'
                && ($stored['exercise_suggestions'] ?? null) === ''
                && ($stored['meal_suggestions'] ?? null) === ''
            ) || (
                empty($stored['exercise_suggestions'])
                && empty($stored['meal_suggestions'])
            ));

        if ($profile->onboarding_step >= 5 && $profile->ai_analysis !== null && ! $isBroken) {
            return response()->json([
                'message' => 'Analysis already completed',
                'profile_completed' => false,
                'ai_analysis' => $profile->ai_analysis,
            ]);
        }

        $ai = app(AiProviderService::class);

        $systemPrompt = $this->buildSystemPrompt($profile);
        $userPrompt = $this->buildAiPrompt($profile, $request->user());

        $chatOptions = [
            'extra' => [
                'thinking' => [
                    'type' => 'enabled',
                ],
                'reasoning_effort' => 'high',
                'response_format' => ['type' => 'json_object'],
            ],
            'max_tokens' => 4096,
        ];

        try {
            $messages = [
                ['role' => 'system', 'content' => $systemPrompt],
                ['role' => 'user', 'content' => $userPrompt],
            ];

            $response = $ai->chat($messages, $chatOptions);
            $content = $this->extractAiContent($response);
            $aiResult = $this->decodeAiJson($content, $request->user()->id);

            // Enrich with images from database and create schedules
            $enrichment = app(AiEnrichmentService::class);
            $enriched = $enrichment->enrich($aiResult);

            // Retry once if most suggestions were dropped for not existing in the DB
            if ($this->isThin($enriched)) {
                $retryMessages = [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $userPrompt],
                    ['role' => 'assistant', 'content' => $content],
                    ['role' => 'user', 'content' => self::RETRY_REMINDER],
                ];

                $response = $ai->chat($retryMessages, $chatOptions);
                $retryContent = $this->extractAiContent($response);
                $retryResult = $this->decodeAiJson($retryContent, $request->user()->id);
                $retryEnriched = $enrichment->enrich($retryResult);

                if ($this->isBetter($retryEnriched, $enriched)) {
                    $aiResult = $retryResult;
                    $enriched = $retryEnriched;
                }
            }

            $enrichment->createSchedules($request->user()->id, $enriched);

            $profile->update([
                'onboarding_step' => 5,
                'ai_analysis' => $enriched,
            ]);

            return response()->json([
                'message' => 'Analysis complete. Confirm to finish onboarding.',
                'profile_completed' => false,
                'ai_analysis' => $enriched,
            ]);
        } catch (\Throwable $e) {
            Log::error('AI analysis failed in step5', [
                'user_id' => $request->user()->id,
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            $profile->update([
                'onboarding_step' => 4,
                'profile_completed' => false,
            ]);

            return response()->json([
                'message' => 'AI analysis unavailable. Please try again.',
                'profile_completed' => false,
                'ai_analysis' => null,
            ], 503);
        }
    }

    public function complete(Request $request): JsonResponse
    {
        $profile = $this->requireStep($request->user()->id, 5);

        if ($profile->profile_completed) {
            return response()->json([
                'message' => 'Onboarding already completed',
                'profile_completed' => true,
            ]);
        }

        $profile->update([
            'profile_completed' => true,
        ]);

        return response()->json([
            'message' => 'Onboarding completed successfully',
            'profile_completed' => true,
        ]);
    }

    private function getOrCreateProfile(int $userId, int $expectedStep): UserProfile
    {
        return UserProfile::firstOrCreate(
            ['user_id' => $userId],
            ['onboarding_step' => 0],
        );
    }

    private function requireStep(int $userId, int $requiredStep): UserProfile
    {
        $profile = $this->getOrCreateProfile($userId, $requiredStep);

        if ($profile->onboarding_step < $requiredStep) {
            abort(409, "Please complete step {$requiredStep} first");
        }

        return $profile;
    }

    private function buildSystemPrompt(UserProfile $profile): string
    {
        $exerciseList = implode(
            "\n",
            array_map(fn (string $name) => "- {$name}", $this->allowedExerciseNames($profile))
        );
        $foodList = implode(
            "\n",
            array_map(fn (string $name) => "- {$name}", $this->allowedFoodNames())
        );

        return "You are a professional fitness and nutrition consultant. Think step-by-step like a human trainer before producing the final JSON.

### YOUR THINKING PROCESS (do not output this — use it to guide your JSON)
1. Analyze the user profile: fitness goal, activity level, exercise frequency, injuries, dietary preferences, age, weight.
2. Assess their **fitness level**:
   - If frequency is \"never\" or \"1-2\" → BEGINNER. Recommend 3-4 exercises per day, lighter sets/reps (3x10-12).
   - If frequency is \"1-3\" → INTERMEDIATE. Recommend 4-5 exercises per day, moderate sets/reps (3-4x10-12).
   - If frequency is \"3+\" → ADVANCED. Recommend 5-6 exercises per day, higher volume (4x10-15).
3. Consider injuries/medical conditions — avoid risky exercises.
4. Match meal suggestions to dietary preferences and goals (e.g. high protein for muscle gain, low-calorie for weight loss).
5. Ensure the total weekly volume makes sense — do NOT overwhelm a beginner with 6 exercises a day.

### OUTPUT FORMAT — Respond ONLY with valid JSON:
{
  \"summary\": \"1-2 sentence personalized summary\",
  \"recommendations\": [\"3-4 short actionable tips\"],
  \"workout_plan\": \"e.g. 3x/week: Mon, Wed, Fri at 07:00\",
  \"exercise_suggestions\": [
    \"Exercise name - sets x reps | day_of_week | time\"
  ],
  \"meal_suggestions\": [
    \"Oatmeal (mentah) | breakfast | 07:30\",
    \"Nasi merah (matang) | lunch | 12:30\",
    \"Greek yogurt (plain, rendah lemak) | snack | 15:30\"
  ]
}

### ALLOWED EXERCISE NAMES
Recommend ONLY exercises from this list. Copy the name EXACTLY (spelling, parentheses, capitalisation) — never rename, translate, shorten, or invent.
{$exerciseList}

### ALLOWED FOOD NAMES
Recommend ONLY foods from this list. Copy the name EXACTLY (spelling, parentheses, capitalisation) — never rename, translate, shorten, or invent.
{$foodList}

### RULES
- exercise_suggestions: Each item format is \"Exercise name - sets x reps | day_of_week | time\". Example: \"Walking - 4x10 | monday | 07:00\". The Exercise name MUST be one of the ALLOWED EXERCISE NAMES, copied verbatim.
- meal_suggestions: Each item format is \"Food name | meal_time | time\". Example: \"Oatmeal (mentah) | breakfast | 07:30\". The Food name MUST be one of the ALLOWED FOOD NAMES, copied verbatim. Provide 2-3 DIFFERENT food options for EACH meal_time (breakfast, lunch, dinner, snack) — never list only one option for a meal_time. Do not repeat the same food for the same meal_time across days; rotate options so the weekly plan varies.
- day_of_week must be one or comma-separated from: monday,tuesday,wednesday,thursday,friday,saturday,sunday.
- meal_time must be one of: breakfast, lunch, dinner, snack.
- ADAPT the number of exercises per day to the user level — do NOT always give maximum.";
    }

    private function allowedExerciseNames(UserProfile $profile): array
    {
        $types = array_map('trim', array_map('strtolower', (array) $profile->exercise_types));
        $types = $types ?: ['gym / weight lifting'];

        $equipment = [];
        $categories = [];
        $keywords = [];

        foreach ($types as $type) {
            $equipment = array_merge($equipment, self::EXERCISE_EQUIPMENT_BY_TYPE[$type] ?? []);
            $categories = array_merge($categories, self::EXERCISE_CATEGORIES_BY_TYPE[$type] ?? []);
            $keywords = array_merge($keywords, self::EXERCISE_KEYWORDS_BY_TYPE[$type] ?? []);
        }

        // Always include a small variety of stretching/mobility/core options
        $equipment = array_merge($equipment, ['Floor Mat', 'Foam Roller', 'Stability Ball']);
        $categories = array_merge($categories, ['mobility', 'flexibility', 'stability', 'core', 'recovery']);
        $keywords = array_merge($keywords, ['stretch', 'plank']);

        $equipment = array_values(array_unique(array_map('strtolower', $equipment)));
        $categories = array_values(array_unique($categories));
        $keywords = array_values(array_unique($keywords));

        $categoryIds = ExerciseCategory::whereIn('slug', $categories)->pluck('id')->all();

        $candidates = [];
        foreach (Exercise::select(['id', 'name', 'equipment', 'category_id'])->get() as $exercise) {
            $name = mb_strtolower($exercise->name);
            $equipmentName = mb_strtolower((string) $exercise->equipment);
            $score = 0;

            if (in_array($equipmentName, $equipment, true)) {
                $score += 4;
            }

            if (in_array($exercise->category_id, $categoryIds, true)) {
                $score += 2;
            }

            foreach ($keywords as $keyword) {
                if (str_contains($name, $keyword)) {
                    $score += 1;
                    break;
                }
            }

            if ($score > 0) {
                $candidates[] = ['name' => $exercise->name, 'score' => $score, 'length' => mb_strlen($exercise->name)];
            }
        }

        usort($candidates, function (array $a, array $b) {
            if ($a['score'] !== $b['score']) {
                return $b['score'] <=> $a['score'];
            }

            return $a['length'] <=> $b['length'];
        });

        return array_slice(array_values(array_unique(array_column($candidates, 'name'))), 0, 150);
    }

    private function allowedFoodNames(): array
    {
        return Food::orderBy('name')->pluck('name')->all();
    }

    private function extractAiContent(array $response): string
    {
        $content = $response['choices'][0]['message']['content'] ?? '{}';

        // Strip markdown code fences if the AI wraps JSON in them
        return preg_replace('/^```(?:json)?\s*\n?|\n?```\s*$/i', '', trim($content));
    }

    private function decodeAiJson(string $content, int $userId): array
    {
        $aiResult = json_decode($content, true);

        if (! is_array($aiResult)) {
            Log::warning('AI returned invalid JSON in step5', [
                'user_id' => $userId,
                'raw' => substr($content, 0, 500),
            ]);

            throw new \RuntimeException('AI returned invalid JSON in step5');
        }

        return $aiResult;
    }

    private function isThin(array $enriched): bool
    {
        $exerciseCount = count($enriched['exercise_suggestions'] ?? []);
        $mealCount = count($enriched['meal_suggestions'] ?? []);

        return $exerciseCount < 3 || $mealCount < 3;
    }

    private function isBetter(array $candidate, array $current): bool
    {
        $candidateCount = count($candidate['exercise_suggestions'] ?? []) + count($candidate['meal_suggestions'] ?? []);
        $currentCount = count($current['exercise_suggestions'] ?? []) + count($current['meal_suggestions'] ?? []);

        return $candidateCount > $currentCount;
    }

    private function buildAiPrompt(UserProfile $profile, $user): string
    {
        return "User data:
- Name: {$user->name}
- Date of birth: {$profile->date_of_birth}
- Gender: {$profile->gender}
- Height: {$profile->height_cm} cm
- Weight: {$profile->weight_kg} kg
- Fitness goal: {$profile->fitness_goal}
- Goal weight: {$profile->goal_weight_kg} kg
- Activity level: {$profile->activity_level}
- Dietary preferences: ".implode(', ', (array) $profile->dietary_preferences).'
- Dietary restrictions: '.implode(', ', (array) $profile->dietary_restrictions).'
- Allergies: '.implode(', ', (array) $profile->allergies)."
- Medical conditions: {$profile->medical_conditions}
- Exercise frequency: {$profile->exercise_frequency} times/week
- Exercise types: ".implode(', ', (array) $profile->exercise_types)."
- Injuries: {$profile->injuries}

Based on the data above, provide an initial analysis and personalized recommendations.";
    }
}
