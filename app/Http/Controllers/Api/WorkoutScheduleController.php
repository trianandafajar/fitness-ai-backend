<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkoutSchedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WorkoutScheduleController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $schedules = WorkoutSchedule::where('user_id', $request->user()->id)
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
            ->orderBy('scheduled_time')
            ->get();

        return response()->json($schedules);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'day_of_week' => ['required', Rule::in(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])],
            'scheduled_time' => 'nullable|date_format:H:i',
            'exercises' => 'required|array|min:1',
            'exercises.*.name' => 'required|string|max:255',
            'exercises.*.sets' => 'nullable|integer|min:1',
            'exercises.*.reps' => 'nullable|integer|min:1',
            'exercises.*.notes' => 'nullable|string|max:500',
        ]);

        $schedule = WorkoutSchedule::updateOrCreate(
            [
                'user_id' => $request->user()->id,
                'day_of_week' => $validated['day_of_week'],
                'scheduled_time' => $validated['scheduled_time'] ?? null,
            ],
            ['exercises' => $validated['exercises']],
        );

        return response()->json($schedule, 201);
    }

    public function update(Request $request, WorkoutSchedule $workoutSchedule): JsonResponse
    {
        if ($workoutSchedule->user_id !== $request->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'day_of_week' => ['required', Rule::in(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])],
            'scheduled_time' => 'nullable|date_format:H:i',
            'exercises' => 'required|array|min:1',
            'exercises.*.name' => 'required|string|max:255',
            'exercises.*.sets' => 'nullable|integer|min:1',
            'exercises.*.reps' => 'nullable|integer|min:1',
            'exercises.*.notes' => 'nullable|string|max:500',
        ]);

        $workoutSchedule->update($validated);

        return response()->json($workoutSchedule);
    }

    public function destroy(Request $request, WorkoutSchedule $workoutSchedule): JsonResponse
    {
        if ($workoutSchedule->user_id !== $request->user()->id) {
            abort(403);
        }

        $workoutSchedule->delete();

        return response()->json(['message' => 'Workout schedule deleted']);
    }

    public function sync(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'schedules' => 'required|array',
            'schedules.*.day_of_week' => ['required', Rule::in(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])],
            'schedules.*.scheduled_time' => 'nullable|date_format:H:i',
            'schedules.*.exercises' => 'required|array|min:1',
            'schedules.*.exercises.*.name' => 'required|string|max:255',
            'schedules.*.exercises.*.sets' => 'nullable|integer|min:1',
            'schedules.*.exercises.*.reps' => 'nullable|integer|min:1',
            'schedules.*.exercises.*.notes' => 'nullable|string|max:500',
        ]);

        $userId = $request->user()->id;

        $incomingKeys = collect($validated['schedules'])->map(
            fn($s) => $s['day_of_week'] . '|' . ($s['scheduled_time'] ?? '')
        );

        WorkoutSchedule::where('user_id', $userId)->get()->each(function ($schedule) use ($incomingKeys) {
            $key = $schedule->day_of_week . '|' . ($schedule->scheduled_time ?? '');
            if (!$incomingKeys->contains($key)) {
                $schedule->delete();
            }
        });

        $schedules = collect($validated['schedules'])->map(function ($item) use ($userId) {
            return WorkoutSchedule::updateOrCreate(
                [
                    'user_id' => $userId,
                    'day_of_week' => $item['day_of_week'],
                    'scheduled_time' => $item['scheduled_time'] ?? null,
                ],
                ['exercises' => $item['exercises']],
            );
        });

        return response()->json($schedules);
    }
}
