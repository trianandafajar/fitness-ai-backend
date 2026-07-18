<?php

namespace App\Services;

use App\Models\Exercise;
use App\Models\Food;
use App\Models\MealSchedule;
use App\Models\WorkoutSchedule;

class AiEnrichmentService
{
    public function enrichAndSave(int $userId, array $aiResult): array
    {
        $enriched = $aiResult;

        // Enrich exercise suggestions
        if (!empty($aiResult['exercise_suggestions'])) {
            $text = $aiResult['exercise_suggestions'];
            if (is_array($text)) $text = implode("\n", $text);
            $enriched['exercise_suggestions'] = $this->enrichExercises($text);
            $this->createWorkoutSchedules($userId, $enriched['exercise_suggestions']);
        }

        // Enrich meal suggestions
        if (!empty($aiResult['meal_suggestions'])) {
            $text = $aiResult['meal_suggestions'];
            if (is_array($text)) $text = implode("\n", $text);
            $enriched['meal_suggestions'] = $this->enrichMeals($text);
            $this->createMealSchedules($userId, $enriched['meal_suggestions']);
        }

        return $enriched;
    }

    private function enrichExercises(string $text): array
    {
        $lines = explode("\n", trim($text));
        $exercises = Exercise::all()->keyBy(function ($e) {
            return strtolower($e->name);
        });

        $result = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) continue;

            $matched = null;
            foreach ($exercises as $key => $exercise) {
                if (str_contains(strtolower($line), $key)) {
                    $matched = $exercise;
                    break;
                }
            }

            $result[] = [
                'text' => $line,
                'exercise' => $matched ? [
                    'id' => $matched->id,
                    'name' => $matched->name,
                    'equipment' => $matched->equipment,
                    'image' => $matched->image,
                    'target_muscles' => $matched->target_muscles,
                    'category' => $matched->category,
                ] : null,
            ];
        }

        return $result;
    }

    private function enrichMeals(string $text): array
    {
        $lines = explode("\n", trim($text));
        $foods = Food::all()->keyBy(function ($f) {
            return strtolower($f->name);
        });

        $result = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) continue;

            $matched = null;
            foreach ($foods as $key => $food) {
                if (str_contains(strtolower($line), $key)) {
                    $matched = $food;
                    break;
                }
            }

            $result[] = [
                'text' => $line,
                'food' => $matched ? [
                    'id' => $matched->id,
                    'name' => $matched->name,
                    'image' => $matched->image,
                    'calories_per_100g' => $matched->calories_per_100g,
                    'protein_per_100g' => $matched->protein_per_100g,
                    'carbs_per_100g' => $matched->carbs_per_100g,
                    'fat_per_100g' => $matched->fat_per_100g,
                    'category' => $matched->category,
                ] : null,
            ];
        }

        return $result;
    }

    private function createWorkoutSchedules(int $userId, array $enrichedExercises): void
    {
        // Group exercises by day (Mon-Sun)
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $dayIndex = 0;

        foreach ($enrichedExercises as $item) {
            if (!$item['exercise']) continue;

            $day = $days[$dayIndex % 7];
            $dayIndex++;

            $schedule = WorkoutSchedule::firstOrCreate(
                [
                    'user_id' => $userId,
                    'day_of_week' => $day,
                    'scheduled_time' => '07:00',
                ],
                [
                    'exercises' => [],
                    'scheduled_time' => '07:00',
                ]
            );

            $exercises = $schedule->exercises ?? [];
            $exercises[] = [
                'name' => $item['exercise']['name'],
                'sets' => 3,
                'reps' => 12,
                'notes' => '',
            ];
            $schedule->update(['exercises' => $exercises]);
        }
    }

    private function createMealSchedules(int $userId, array $enrichedMeals): void
    {
        $mealTimes = ['breakfast', 'lunch', 'dinner', 'snack'];
        $timeIndex = 0;

        foreach ($enrichedMeals as $item) {
            if (!$item['food']) continue;

            $mealTime = $mealTimes[$timeIndex % count($mealTimes)];
            $timeIndex++;

            // Distribute across weekdays
            for ($day = 1; $day <= 5; $day++) {
                $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
                $schedule = MealSchedule::firstOrCreate(
                    [
                        'user_id' => $userId,
                        'day_of_week' => $days[$day - 1],
                        'meal_time' => $mealTime,
                    ],
                    [
                        'time' => match ($mealTime) {
                            'breakfast' => '07:30',
                            'lunch' => '12:30',
                            'dinner' => '18:30',
                            'snack' => '15:30',
                            default => '12:00',
                        },
                        'items' => [],
                    ]
                );

                $items = $schedule->items ?? [];
                $items[] = [
                    'name' => $item['food']['name'],
                    'portion' => '1 serving',
                    'calories' => $item['food']['calories_per_100g'] ?? null,
                ];
                $schedule->update(['items' => $items]);
            }
        }
    }
}
