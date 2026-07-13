<?php

namespace App\Http\Controllers\Api;

use App\Events\WeightLogged;
use App\Http\Controllers\Controller;
use App\Models\WeightLog;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WeightLogController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = WeightLog::where('user_id', $request->user()->id)
            ->orderBy('week_start', 'desc');

        if ($weeks = $request->integer('weeks')) {
            $query->where('week_start', '>=', now()->subWeeks($weeks)->startOfWeek()->format('Y-m-d'));
        }

        $logs = $query->get();

        return response()->json($logs);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'recorded_at' => 'required|date',
            'weight_kg' => 'required|numeric|min:20|max:500',
            'notes' => 'nullable|string|max:255',
        ]);

        $weekStart = Carbon::parse($validated['recorded_at'])->startOfWeek()->format('Y-m-d');

        $log = WeightLog::updateOrCreate(
            [
                'user_id' => $request->user()->id,
                'week_start' => $weekStart,
            ],
            [
                'weight_kg' => $validated['weight_kg'],
                'notes' => $validated['notes'] ?? null,
            ],
        );

        event(new WeightLogged($log));

        return response()->json($log, 201);
    }

    public function update(Request $request, WeightLog $weightLog): JsonResponse
    {
        if ($weightLog->user_id !== $request->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'weight_kg' => 'required|numeric|min:20|max:500',
            'notes' => 'nullable|string|max:255',
        ]);

        $weightLog->update($validated);

        return response()->json($weightLog);
    }

    public function destroy(Request $request, WeightLog $weightLog): JsonResponse
    {
        if ($weightLog->user_id !== $request->user()->id) {
            abort(403);
        }

        $weightLog->delete();

        return response()->json(['message' => 'Weight log deleted']);
    }
}
