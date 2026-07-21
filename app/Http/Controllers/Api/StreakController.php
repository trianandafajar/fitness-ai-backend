<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\StreakService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StreakController extends Controller
{
    public function calendar(Request $request, StreakService $streaks): JsonResponse
    {
        if ($request->filled('start_date')) {
            $validated = $request->validate([
                'start_date' => ['required', 'date_format:Y-m-d'],
                'days' => ['sometimes', 'integer', 'min:1', 'max:31'],
            ]);

            return response()->json($streaks->getRange(
                $request->user(),
                $validated['start_date'],
                $validated['days'] ?? 31,
            ));
        }

        $validated = $request->validate([
            'month' => ['required', 'date_format:Y-m'],
        ]);

        return response()->json($streaks->getCalendar($request->user(), $validated['month']));
    }

    public function count(Request $request, StreakService $streaks): JsonResponse
    {
        return response()->json([
            'count' => $streaks->currentCount($request->user()),
        ]);
    }
}
