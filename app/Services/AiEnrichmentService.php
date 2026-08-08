<?php

namespace App\Services;

use App\Models\Exercise;
use App\Models\Food;
use App\Models\MealSchedule;
use App\Models\WorkoutSchedule;
use Illuminate\Support\Facades\DB;

class AiEnrichmentService
{
    private const MATCH_THRESHOLD = 650;

    private const FOOD_SYNONYMS = [
        'banana' => 'pisang',
        'apple' => 'apel',
        'egg' => 'telur',
        'chicken' => 'ayam',
        'rice' => 'nasi',
        'bread' => 'roti',
        'milk' => 'susu',
        'potato' => 'kentang',
        'sweet potato' => 'ubi',
        'fish' => 'ikan',
        'beef' => 'daging sapi',
        'cheese' => 'keju',
        'oats' => 'oat',
        'coconut' => 'kelapa',
        'mango' => 'mangga',
        'orange' => 'jeruk',
        'grape' => 'anggur',
        'strawberry' => 'stroberi',
        'carrot' => 'wortel',
        'broccoli' => 'brokoli',
        'spinach' => 'bayam',
        'tomato' => 'tomat',
        'cucumber' => 'mentimun',
        'corn' => 'jagung',
        'soy' => 'kedelai',
        'tofu' => 'tahu',
        'shrimp' => 'udang',
        'peanut' => 'kacang',
        'almond' => 'almond',
        'yogurt' => 'yogurt',
        'salmon' => 'salmon',
        'tuna' => 'tuna',
    ];

    public function enrichAndSave(int $userId, array $aiResult): array
    {
        $enriched = $this->buildEnriched($aiResult);

        // Create schedules from DB-matched suggestions only
        if (! empty($enriched['exercise_suggestions'])) {
            $this->createWorkoutSchedules($userId, $enriched['exercise_suggestions']);
        }

        if (! empty($enriched['meal_suggestions'])) {
            $this->createMealSchedules($userId, $enriched['meal_suggestions']);
        }

        return $enriched;
    }

    /**
     * Re-match stored suggestions against the database without touching schedules.
     * Items that no longer match the DB are dropped so only DB data is ever shown.
     */
    public function cleanStoredAnalysis(array $analysis): array
    {
        $enriched = $analysis;

        if (is_array($analysis['exercise_suggestions'] ?? null)) {
            $parsed = [];
            foreach ($analysis['exercise_suggestions'] as $item) {
                $parsed[] = [
                    'text' => $item['text'] ?? '',
                    'day_of_week' => $item['scheduled_day'] ?? null,
                    'scheduled_time' => $item['scheduled_time'] ?? null,
                ];
            }
            $enriched['exercise_suggestions'] = $this->enrichExercises($parsed);
        }

        if (is_array($analysis['meal_suggestions'] ?? null)) {
            $parsed = [];
            foreach ($analysis['meal_suggestions'] as $item) {
                $parsed[] = [
                    'text' => $item['text'] ?? '',
                    'meal_time' => $item['meal_time'] ?? null,
                    'time' => $item['time'] ?? null,
                ];
            }
            $enriched['meal_suggestions'] = $this->enrichMeals($parsed);
        }

        return $enriched;
    }

    private function buildEnriched(array $aiResult): array
    {
        $enriched = $aiResult;

        // Normalize recommendations to array
        if (isset($enriched['recommendations']) && is_string($enriched['recommendations'])) {
            $enriched['recommendations'] = explode("\n", trim($enriched['recommendations']));
        }
        $enriched['recommendations'] = array_values(array_filter(
            $enriched['recommendations'] ?? [],
            fn ($r) => trim($r) !== ''
        ));

        // Enrich exercise suggestions
        if (! empty($aiResult['exercise_suggestions'])) {
            $raw = $aiResult['exercise_suggestions'];
            if (is_string($raw)) {
                $raw = explode("\n", trim($raw));
            }
            $parsed = $this->parseExerciseLines($raw);
            $enriched['exercise_suggestions'] = $this->enrichExercises($parsed);
        }

        // Enrich meal suggestions
        if (! empty($aiResult['meal_suggestions'])) {
            $raw = $aiResult['meal_suggestions'];
            if (is_string($raw)) {
                $raw = explode("\n", trim($raw));
            }
            $parsed = $this->parseMealLines($raw);
            $enriched['meal_suggestions'] = $this->enrichMeals($parsed);
        }

        return $enriched;
    }

    private function parseExerciseLines(array $lines): array
    {
        $result = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) {
                continue;
            }
            $parts = array_map('trim', explode('|', $line));
            $result[] = [
                'text' => $parts[0],
                'day_of_week' => $parts[1] ?? null,
                'scheduled_time' => $parts[2] ?? null,
            ];
        }

        return $result;
    }

    private function parseMealLines(array $lines): array
    {
        $result = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) {
                continue;
            }
            $parts = array_map('trim', explode('|', $line));
            $result[] = [
                'text' => $parts[0],
                'meal_time' => $parts[1] ?? null,
                'time' => $parts[2] ?? null,
            ];
        }

        return $result;
    }

    private function enrichExercises(array $parsed): array
    {
        $normalized = $this->normalizedExercises();
        $result = [];

        foreach ($parsed as $item) {
            $matched = null;
            $aiText = strtolower($item['text']);
            $aiName = trim(explode(' - ', $aiText)[0]);
            $aiName = preg_replace('/\s*\d.*$/', '', $aiName);
            $aiName = $this->normalizeName($aiName);

            if ($aiName !== '') {
                $matched = $this->matchExerciseName($aiName, $normalized);
            }

            $result[] = [
                'text' => $item['text'],
                'exercise' => $matched ? [
                    'id' => $matched->id,
                    'name' => $matched->name,
                    'equipment' => $matched->equipment,
                    'image' => $matched->image,
                    'image_url' => $matched->image_url,
                    'target_muscles' => $matched->target_muscles,
                    'category' => $matched->category,
                ] : null,
                'scheduled_day' => $item['day_of_week'],
                'scheduled_time' => $item['scheduled_time'],
            ];
        }

        // Only keep suggestions that exist in the database
        return array_values(array_filter($result, fn ($item) => $item['exercise'] !== null));
    }

    private function enrichMeals(array $parsed): array
    {
        $normalized = $this->normalizedFoods();
        $result = [];

        foreach ($parsed as $item) {
            $matched = null;
            $aiText = $this->normalizeName($item['text']);

            if ($aiText !== '') {
                $matched = $this->matchFoodName($aiText, $normalized);
            }

            $result[] = [
                'text' => $item['text'],
                'food' => $matched ? [
                    'id' => $matched->id,
                    'name' => $matched->name,
                    'image' => $matched->image,
                    'image_url' => $matched->image_url,
                    'calories_per_100g' => $matched->calories_per_100g,
                    'protein_per_100g' => $matched->protein_per_100g,
                    'carbs_per_100g' => $matched->carbs_per_100g,
                    'fat_per_100g' => $matched->fat_per_100g,
                    'category' => $matched->category,
                ] : null,
                'meal_time' => $item['meal_time'],
                'time' => $item['time'],
            ];
        }

        // Only keep suggestions that exist in the database
        return array_values(array_filter($result, fn ($item) => $item['food'] !== null));
    }

    private function normalizedExercises()
    {
        return Exercise::all()->mapWithKeys(
            fn ($e) => [$this->normalizeName($e->name) => $e]
        );
    }

    private function normalizedFoods()
    {
        return Food::all()->mapWithKeys(
            fn ($f) => [$this->normalizeFoodName($f->name) => $f]
        );
    }

    private function matchExerciseName(string $aiName, $normalized): ?Exercise
    {
        if (isset($normalized[$aiName])) {
            return $normalized[$aiName];
        }

        $best = null;
        $bestScore = 0;
        $aiTokens = $this->significantTokens($aiName);

        foreach ($normalized as $dbName => $exercise) {
            if ($dbName === '') {
                continue;
            }

            $score = $this->scoreMatch($aiTokens, $this->significantTokens($dbName));

            if ($score > $bestScore) {
                $bestScore = $score;
                $best = $exercise;
            }
        }

        return $bestScore >= self::MATCH_THRESHOLD ? $best : null;
    }

    private function matchFoodName(string $aiText, $normalized): ?Food
    {
        $best = null;
        $bestLength = -1;
        $aiText = $this->stripParenthetical($aiText);

        foreach ($normalized as $dbName => $food) {
            if ($dbName === '') {
                continue;
            }

            $hit = str_contains($aiText, $dbName) || str_contains($dbName, $aiText);

            if (! $hit) {
                $hit = $this->synonymMatch($aiText, $dbName);
            }

            // Prefer the most specific (longest) DB name
            if ($hit && strlen($dbName) > $bestLength) {
                $best = $food;
                $bestLength = strlen($dbName);
            }
        }

        return $best;
    }

    private function synonymMatch(string $aiText, string $dbName): bool
    {
        $aliases = $this->foodAliasMap();

        foreach ($this->significantTokens($dbName) as $token) {
            $candidates = $aliases[$token] ?? [$token];

            foreach ($candidates as $candidate) {
                if (str_contains($aiText, $candidate)) {
                    return true;
                }
            }
        }

        return false;
    }

    private function foodAliasMap(): array
    {
        $map = [];

        foreach (self::FOOD_SYNONYMS as $english => $indonesian) {
            $map[$english][] = $indonesian;
            $map[$indonesian][] = $english;
        }

        return $map;
    }

    /**
     * Higher is better. 1000 exact, 900 same token set,
     * otherwise prefer fewest missing/extra tokens.
     */
    private function scoreMatch(array $aiTokens, array $dbTokens): int
    {
        if ($aiTokens === $dbTokens) {
            return 1000;
        }

        $missing = array_values(array_diff($aiTokens, $dbTokens));
        $extra = array_values(array_diff($dbTokens, $aiTokens));

        if (count($missing) === 0) {
            return 800 - count($extra) * 10;
        }

        if (count($extra) === 0) {
            return 700 - count($missing) * 10;
        }

        return 0;
    }

    private function significantTokens(string $name): array
    {
        return array_values(array_filter(
            explode(' ', $name),
            fn ($token) => strlen($token) > 2
        ));
    }

    private function normalizeName(string $name): string
    {
        $name = mb_strtolower(trim($name));
        $name = preg_replace('/[^a-z0-9\s]/', ' ', $name);
        $name = preg_replace('/\s+/', ' ', $name);

        return trim($name);
    }

    private function normalizeFoodName(string $name): string
    {
        return $this->normalizeName($this->stripParenthetical($name));
    }

    private function stripParenthetical(string $name): string
    {
        return preg_replace('/\([^)]*\)/', ' ', $name) ?? $name;
    }

    private function createWorkoutSchedules(int $userId, array $enrichedExercises): void
    {
        foreach ($enrichedExercises as $item) {
            $exerciseName = $item['exercise']['name'] ?? null;
            if (! $exerciseName) {
                continue;
            }

            $days = $item['scheduled_day']
                ? array_map('trim', explode(',', $item['scheduled_day']))
                : ['monday'];

            foreach ($days as $day) {
                $day = strtolower(trim($day));
                if (! in_array($day, ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])) {
                    $day = 'monday';
                }

                $time = $item['scheduled_time'] ?? '07:00';

                $schedule = WorkoutSchedule::firstOrCreate(
                    [
                        'user_id' => $userId,
                        'day_of_week' => $day,
                        'scheduled_time' => $time,
                    ],
                    [
                        'exercises' => [],
                        'scheduled_time' => $time,
                    ]
                );

                $exercises = $schedule->exercises ?? [];

                // Avoid duplicates
                $existingNames = array_map(fn ($e) => strtolower($e['name'] ?? ''), $exercises);
                if (in_array(strtolower($exerciseName), $existingNames)) {
                    continue;
                }

                $exercises[] = [
                    'name' => $exerciseName,
                    'sets' => 3,
                    'reps' => 12,
                    'notes' => '',
                ];
                $schedule->update(['exercises' => $exercises]);
            }
        }
    }

    private function createMealSchedules(int $userId, array $enrichedMeals): void
    {
        $validMealTimes = ['breakfast', 'lunch', 'dinner', 'snack'];
        $defaultTimes = [
            'breakfast' => '07:30',
            'lunch' => '12:30',
            'dinner' => '18:30',
            'snack' => '15:30',
        ];

        // Group enriched meals by meal_time
        $grouped = [];
        foreach ($enrichedMeals as $item) {
            $foodName = $item['food']['name'] ?? null;
            if (! $foodName) {
                continue;
            }

            $mealTime = $item['meal_time'] ?? 'breakfast';
            if (! in_array($mealTime, $validMealTimes)) {
                $mealTime = 'breakfast';
            }

            $grouped[$mealTime][] = $item;
        }

        $weekdays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];

        foreach ($grouped as $mealTime => $items) {
            $time = $items[0]['time'] ?? $defaultTimes[$mealTime];
            $foodNames = $this->distinctMealFoods($items);
            $foodCount = count($foodNames);

            foreach ($weekdays as $index => $day) {
                // Rotate food options across days
                $foodName = $foodNames[$index % $foodCount];

                $schedule = MealSchedule::firstOrCreate(
                    [
                        'user_id' => $userId,
                        'day_of_week' => $day,
                        'meal_time' => $mealTime,
                    ],
                    [
                        'time' => $time,
                        'items' => [],
                    ]
                );

                $existingItems = $schedule->items ?? [];
                $existingFoods = array_map(fn ($i) => strtolower($i['food'] ?? $i['name'] ?? ''), $existingItems);

                if (! in_array(strtolower($foodName), $existingFoods)) {
                    $existingItems[] = [
                        'food' => $foodName,
                        'portion' => '1 serving',
                        'notes' => '',
                    ];
                    $schedule->update(['items' => $existingItems]);
                }
            }
        }
    }

    private function distinctMealFoods(array $items): array
    {
        $foodNames = [];

        foreach ($items as $item) {
            $name = $item['food']['name'] ?? null;
            if (! $name) {
                continue;
            }

            if (in_array(strtolower($name), array_map('strtolower', $foodNames), true)) {
                continue;
            }

            $foodNames[] = $name;
        }

        if (count($foodNames) >= 3) {
            return $foodNames;
        }

        $category = null;
        foreach ($items as $item) {
            if (! empty($item['food']['category'])) {
                $category = $item['food']['category'];
                break;
            }
        }

        $query = Food::query()
            ->whereNotIn(DB::raw('LOWER(name)'), array_map('strtolower', $foodNames))
            ->orderBy('id');

        if ($category) {
            $query->whereHas('categoryModel', fn ($q) => $q->where('slug', $category));
        }

        foreach ($query->limit(3 - count($foodNames))->pluck('name') as $name) {
            $foodNames[] = $name;
        }

        return $foodNames;
    }
}
