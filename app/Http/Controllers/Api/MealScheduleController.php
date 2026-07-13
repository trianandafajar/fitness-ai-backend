<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MealSchedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MealScheduleController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $schedules = MealSchedule::where('user_id', $request->user()->id)
            ->orderByRaw("
                CASE day_of_week
                    WHEN 'monday' THEN 1
                    WHEN 'tuesday' THEN 2
                    WHEN 'wednesday' THEN 3
                    WHEN 'thursday' THEN 4
                    WHEN 'friday' THEN 5
                    WHEN 'saturday' THEN 6
                    WHEN 'sunday' THEN 7
                END
            ")
            ->orderByRaw("
                CASE meal_time
                    WHEN 'breakfast' THEN 1
                    WHEN 'lunch' THEN 2
                    WHEN 'dinner' THEN 3
                    WHEN 'snack' THEN 4
                END
            ")
            ->get();

        return response()->json($schedules);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'day_of_week' => ['required', Rule::in(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])],
            'meal_time' => ['required', Rule::in(['breakfast', 'lunch', 'dinner', 'snack'])],
            'time' => 'nullable|date_format:H:i',
            'items' => 'required|array|min:1',
            'items.*.food' => 'required|string|max:255',
            'items.*.portion' => 'nullable|string|max:255',
            'items.*.notes' => 'nullable|string|max:500',
        ]);

        $schedule = MealSchedule::updateOrCreate(
            [
                'user_id' => $request->user()->id,
                'day_of_week' => $validated['day_of_week'],
                'meal_time' => $validated['meal_time'],
            ],
            [
                'time' => $validated['time'] ?? null,
                'items' => $validated['items'],
            ],
        );

        return response()->json($schedule, 201);
    }

    public function update(Request $request, MealSchedule $mealSchedule): JsonResponse
    {
        if ($mealSchedule->user_id !== $request->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'day_of_week' => ['required', Rule::in(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])],
            'meal_time' => ['required', Rule::in(['breakfast', 'lunch', 'dinner', 'snack'])],
            'time' => 'nullable|date_format:H:i',
            'items' => 'required|array|min:1',
            'items.*.food' => 'required|string|max:255',
            'items.*.portion' => 'nullable|string|max:255',
            'items.*.notes' => 'nullable|string|max:500',
        ]);

        $mealSchedule->update($validated);

        return response()->json($mealSchedule);
    }

    public function destroy(Request $request, MealSchedule $mealSchedule): JsonResponse
    {
        if ($mealSchedule->user_id !== $request->user()->id) {
            abort(403);
        }

        $mealSchedule->delete();

        return response()->json(['message' => 'Meal schedule deleted']);
    }

    public function sync(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'schedules' => 'required|array',
            'schedules.*.day_of_week' => ['required', Rule::in(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])],
            'schedules.*.meal_time' => ['required', Rule::in(['breakfast', 'lunch', 'dinner', 'snack'])],
            'schedules.*.time' => 'nullable|date_format:H:i',
            'schedules.*.items' => 'required|array|min:1',
            'schedules.*.items.*.food' => 'required|string|max:255',
            'schedules.*.items.*.portion' => 'nullable|string|max:255',
            'schedules.*.items.*.notes' => 'nullable|string|max:500',
        ]);

        $userId = $request->user()->id;
        $incomingKeys = collect($validated['schedules'])->map(
            fn ($item) => $item['day_of_week'] . '_' . $item['meal_time']
        );

        $existing = MealSchedule::where('user_id', $userId)->get();

        foreach ($existing as $schedule) {
            $key = $schedule->day_of_week . '_' . $schedule->meal_time;
            if (!$incomingKeys->contains($key)) {
                $schedule->delete();
            }
        }

        $schedules = collect($validated['schedules'])->map(function ($item) use ($userId) {
            return MealSchedule::updateOrCreate(
                [
                    'user_id' => $userId,
                    'day_of_week' => $item['day_of_week'],
                    'meal_time' => $item['meal_time'],
                ],
                [
                    'time' => $item['time'] ?? null,
                    'items' => $item['items'],
                ],
            );
        });

        return response()->json($schedules);
    }
}
