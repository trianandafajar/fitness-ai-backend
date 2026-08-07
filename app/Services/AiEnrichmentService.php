<?php

namespace App\Services;

use App\Models\Exercise;
use App\Models\Food;
use App\Models\MealSchedule;
use App\Models\WorkoutSchedule;
use Illuminate\Support\Facades\DB;

class AiEnrichmentService
{
    public function enrichAndSave(int $userId, array $aiResult): array
    {
        $enriched = $aiResult;

        // Normalize recommendations to array
        if (isset($enriched['recommendations']) && is_string($enriched['recommendations'])) {
            $enriched['recommendations'] = explode("\n", trim($enriched['recommendations']));
        }
        $enriched['recommendations'] = array_values(array_filter(
            $enriched['recommendations'] ?? [],
            fn($r) => trim($r) !== ''
        ));

        // Enrich exercise suggestions
        if (!empty($aiResult['exercise_suggestions'])) {
            $raw = $aiResult['exercise_suggestions'];
            if (is_string($raw)) $raw = explode("\n", trim($raw));
            $parsed = $this->parseExerciseLines($raw);
            $enriched['exercise_suggestions'] = $this->enrichExercises($parsed);
            $this->createWorkoutSchedules($userId, $enriched['exercise_suggestions']);
        }

        // Enrich meal suggestions
        if (!empty($aiResult['meal_suggestions'])) {
            $raw = $aiResult['meal_suggestions'];
            if (is_string($raw)) $raw = explode("\n", trim($raw));
            $parsed = $this->parseMealLines($raw);
            $enriched['meal_suggestions'] = $this->enrichMeals($parsed);
            $this->createMealSchedules($userId, $enriched['meal_suggestions']);
        }

        return $enriched;
    }

    private function parseExerciseLines(array $lines): array
    {
        $result = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) continue;
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
            if (empty($line)) continue;
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
        $exercises = Exercise::all()->keyBy(fn($e) => strtolower($e->name));
        $result = [];

        foreach ($parsed as $item) {
            $matched = null;
            $aiText = strtolower($item['text']);
            $aiName = trim(explode(' - ', $aiText)[0]);
            $aiName = preg_replace('/\s*\d.*$/', '', $aiName);
            $aiName = trim(str_replace('-', ' ', $aiName));

            foreach ($exercises as $key => $exercise) {
                if (str_contains(str_replace('-', ' ', $key), $aiName)) {
                    $matched = $exercise;
                    break;
                }
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

        return $result;
    }

    private function enrichMeals(array $parsed): array
    {
        $foods = Food::all()->keyBy(fn($f) => strtolower($f->name));
        $result = [];

        foreach ($parsed as $item) {
            $matched = null;
            foreach ($foods as $key => $food) {
                if (str_contains(strtolower($item['text']), $key)) {
                    $matched = $food;
                    break;
                }
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

        return $result;
    }

    private function createWorkoutSchedules(int $userId, array $enrichedExercises): void
    {
        foreach ($enrichedExercises as $item) {
            $exerciseName = $item['exercise']['name'] ?? null;
            if (!$exerciseName) continue;

            $days = $item['scheduled_day']
                ? array_map('trim', explode(',', $item['scheduled_day']))
                : ['monday'];

            foreach ($days as $day) {
                $day = strtolower(trim($day));
                if (!in_array($day, ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'])) {
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
                $existingNames = array_map(fn($e) => strtolower($e['name'] ?? ''), $exercises);
                if (in_array(strtolower($exerciseName), $existingNames)) continue;

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
            if (!$foodName) continue;

            $mealTime = $item['meal_time'] ?? 'breakfast';
            if (!in_array($mealTime, $validMealTimes)) $mealTime = 'breakfast';

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
                $existingFoods = array_map(fn($i) => strtolower($i['food'] ?? $i['name'] ?? ''), $existingItems);

                if (!in_array(strtolower($foodName), $existingFoods)) {
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
            if (!$name) continue;

            if (in_array(strtolower($name), array_map('strtolower', $foodNames), true)) continue;

            $foodNames[] = $name;
        }

        if (count($foodNames) >= 3) {
            return $foodNames;
        }

        $category = null;
        foreach ($items as $item) {
            if (!empty($item['food']['category'])) {
                $category = $item['food']['category'];
                break;
            }
        }

        $query = Food::query()
            ->whereNotIn(DB::raw('LOWER(name)'), array_map('strtolower', $foodNames))
            ->orderBy('id');

        if ($category) {
            $query->whereHas('categoryModel', fn($q) => $q->where('slug', $category));
        }

        foreach ($query->limit(3 - count($foodNames))->pluck('name') as $name) {
            $foodNames[] = $name;
        }

        return $foodNames;
    }
}
