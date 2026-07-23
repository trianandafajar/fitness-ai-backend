<?php

namespace App\Http\Controllers\Api;

use App\Events\AttendanceLogged;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessAttendancePhoto;
use App\Models\WorkoutSchedule;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $attendances = $request->user()->attendances()
            ->with('workoutSchedule')
            ->orderBy('checked_in_at', 'desc')
            ->paginate(20);

        return response()->json($attendances);
    }

    public function today(Request $request): JsonResponse
    {
        $today = Carbon::today();
        $dayOfWeek = strtolower($today->format('l'));

        $schedule = WorkoutSchedule::where('user_id', $request->user()->id)
            ->where('day_of_week', $dayOfWeek)
            ->first();

        $attendance = $request->user()->attendances()
            ->whereDate('checked_in_at', $today)
            ->with('workoutSchedule')
            ->first();

        return response()->json([
            'has_schedule' => !is_null($schedule),
            'schedule' => $schedule,
            'has_attended' => !is_null($attendance),
            'attendance' => $attendance,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $today = Carbon::today();
        $dayOfWeek = strtolower($today->format('l'));

        $schedule = WorkoutSchedule::where('user_id', $request->user()->id)
            ->where('day_of_week', $dayOfWeek)
            ->first();

        if (!$schedule) {
            return response()->json([
                'message' => 'No workout scheduled for today',
            ], 409);
        }

        $existing = $request->user()->attendances()
            ->whereDate('checked_in_at', $today)
            ->exists();

        if ($existing) {
            return response()->json([
                'message' => 'Already checked in today',
            ], 409);
        }

        $validated = $request->validate([
            'photo' => 'required|image|max:5120',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'address' => 'nullable|string|max:255',
        ]);

        $photoPath = $request->file('photo')->store('attendances', 'public');

        $attendance = $request->user()->attendances()->create([
            'workout_schedule_id' => $schedule->id,
            'photo' => $photoPath,
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'address' => $validated['address'] ?? null,
            'checked_in_at' => now(),
            'status' => 'verified',
        ]);

        // ProcessAttendancePhoto::dispatch($attendance);

        event(new AttendanceLogged($attendance));

        $attendance->load('workoutSchedule');

        return response()->json($attendance, 201);
    }

    public function show(Request $request, $id): JsonResponse
    {
        $attendance = $request->user()->attendances()
            ->with('workoutSchedule')
            ->findOrFail($id);

        return response()->json($attendance);
    }
}
