<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Food;
use App\Models\MealSchedule;
use App\Models\WorkoutSchedule;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DayController extends Controller
{
    private const MEAL_TIME_ORDER = <<<'SQL'
        CASE meal_time
            WHEN 'breakfast' THEN 1
            WHEN 'lunch' THEN 2
            WHEN 'dinner' THEN 3
            WHEN 'snack' THEN 4
        END
    SQL;

    public function index(Request $request, string $date): JsonResponse
    {
        $validated = Validator::validate(
            ['date' => $date],
            ['date' => ['required', 'date_format:Y-m-d']],
        );

        $requestedDate = Carbon::createFromFormat(
            'Y-m-d',
            $validated['date'],
        )->startOfDay();

        $dayOfWeek = strtolower($requestedDate->format('l'));
        $user = $request->user();

        $workouts = $this->getWorkouts(
            userId: $user->id,
            dayOfWeek: $dayOfWeek,
        );

        $meals = $this->getMeals(
            userId: $user->id,
            dayOfWeek: $dayOfWeek,
        );

        $this->attachExerciseImages($workouts);
        $this->attachFoodImages($meals);

        $schedule = $workouts->first();

        $attendance = $user
            ->attendances()
            ->whereDate('checked_in_at', $requestedDate)
            ->with('workoutSchedule')
            ->first();

        if ($attendance && $schedule) {
            $attendance->setRelation('workoutSchedule', $schedule);
        }

        return response()->json([
            'data' => [
                'workouts' => $workouts->values(),
                'meals' => $meals->values(),
                'attendance' => [
                    'has_schedule' => $schedule !== null,
                    'schedule' => $schedule,
                    'has_attended' => $attendance !== null,
                    'attendance' => $attendance,
                ],
            ],
        ]);
    }

    private function getWorkouts(int $userId, string $dayOfWeek,): EloquentCollection
    {
        return WorkoutSchedule::query()
            ->where('user_id', $userId)
            ->where('day_of_week', $dayOfWeek)
            ->orderBy('scheduled_time')
            ->get();
    }

    private function getMeals(int $userId, string $dayOfWeek): EloquentCollection
    {
        return MealSchedule::query()
            ->where('user_id', $userId)
            ->where('day_of_week', $dayOfWeek)
            ->orderByRaw(self::MEAL_TIME_ORDER)
            ->get();
    }

    private function attachExerciseImages(EloquentCollection $workouts,): void
    {
        $exerciseNames = $workouts->flatMap(
            fn(WorkoutSchedule $schedule) => collect(
                $schedule->exercises ?? [],
            )->pluck('name'),
        )
            ->filter(fn(mixed $name) => $this->isValidName($name))
            ->map(fn(string $name) => self::normalizeName($name))
            ->unique()
            ->values();

        $exercisesByName = $this->getExercisesByName($exerciseNames);

        $workouts->each(
            function (WorkoutSchedule $schedule) use ($exercisesByName): void {
                $schedule->exercises = collect($schedule->exercises ?? [])
                    ->map(
                        function (array $exercise) use ($exercisesByName): array {
                            $normalizedName = self::normalizeName(
                                $exercise['name'] ?? '',
                            );

                            $matchedExercise = $exercisesByName->get(
                                $normalizedName,
                            );

                            $exercise['image'] = $matchedExercise?->image;
                            $exercise['image_url'] = $matchedExercise?->image_url;

                            return $exercise;
                        },
                    )
                    ->values()
                    ->all();
            },
        );
    }

    private function attachFoodImages(EloquentCollection $meals): void
    {
        $foodNames = $meals
            ->flatMap(
                fn(MealSchedule $schedule) => collect(
                    $schedule->items ?? [],
                )->pluck('food')
            )
            ->filter(
                fn(mixed $name) => $this->isValidName($name),
            )
            ->map(
                fn(string $name) => self::normalizeName($name),
            )
            ->unique()
            ->values();

        $foodsByName = $this->getFoodsByName($foodNames);

        $meals->each(
            function (MealSchedule $schedule) use ($foodsByName): void {
                $schedule->items = collect($schedule->items ?? [])
                    ->map(
                        function (array $item) use ($foodsByName): array {
                            $normalizedName = self::normalizeName(
                                $item['food'] ?? '',
                            );

                            $matchedFood = $foodsByName->get($normalizedName);

                            $item['image'] = $matchedFood?->image;
                            $item['image_url'] = $matchedFood?->image_url;

                            return $item;
                        },
                    )
                    ->values()
                    ->all();
            },
        );
    }

    private function getExercisesByName(Collection $names): Collection
    {
        if ($names->isEmpty()) {
            return collect();
        }

        return Exercise::query()
            ->whereIn(
                DB::raw('LOWER(TRIM(name))'),
                $names->all(),
            )
            ->get()
            ->keyBy(
                fn(Exercise $exercise) => self::normalizeName(
                    $exercise->name,
                ),
            );
    }

    private function getFoodsByName(Collection $names): Collection
    {
        if ($names->isEmpty()) {
            return collect();
        }

        return Food::query()
            ->whereIn(
                DB::raw('LOWER(TRIM(name))'),
                $names->all(),
            )
            ->get()
            ->keyBy(
                fn(Food $food) => self::normalizeName($food->name),
            );
    }

    private function isValidName(mixed $name): bool
    {
        return is_string($name) && trim($name) !== '';
    }

    private static function normalizeName(mixed $name): string
    {
        return preg_replace(
            '/\s+/',
            ' ',
            mb_strtolower(trim((string) $name)),
        ) ?? '';
    }
}
