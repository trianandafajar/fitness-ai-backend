<?php

namespace App\Http\Controllers\Api;

use App\Events\MealLogged;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MealLogController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $logs = $request->user()->mealLogs()
            ->orderBy('logged_at', 'desc')
            ->paginate(20);

        return response()->json($logs);
    }

    public function today(Request $request): JsonResponse
    {
        $logs = $request->user()->mealLogs()
            ->whereDate('logged_at', now())
            ->orderBy('logged_at', 'asc')
            ->get();

        $totals = [
            'total_calories' => $logs->sum('total_calories'),
            'total_protein_g' => $logs->sum('total_protein_g'),
            'total_carbs_g' => $logs->sum('total_carbs_g'),
            'total_fat_g' => $logs->sum('total_fat_g'),
        ];

        return response()->json([
            'logs' => $logs,
            'totals' => $totals,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'meal_type' => ['required', Rule::in(['breakfast', 'lunch', 'dinner', 'snack'])],
            'logged_at' => 'required|date',
            'total_calories' => 'required|integer|min:0|max:5000',
            'total_protein_g' => 'required|numeric|min:0|max:500',
            'total_carbs_g' => 'required|numeric|min:0|max:500',
            'total_fat_g' => 'required|numeric|min:0|max:500',
        ]);

        $log = $request->user()->mealLogs()->create($validated);

        event(new MealLogged($log));

        return response()->json($log, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $log = $request->user()->mealLogs()->findOrFail($id);

        $validated = $request->validate([
            'meal_type' => ['required', Rule::in(['breakfast', 'lunch', 'dinner', 'snack'])],
            'logged_at' => 'required|date',
            'total_calories' => 'required|integer|min:0|max:5000',
            'total_protein_g' => 'required|numeric|min:0|max:500',
            'total_carbs_g' => 'required|numeric|min:0|max:500',
            'total_fat_g' => 'required|numeric|min:0|max:500',
        ]);

        $log->update($validated);

        return response()->json($log);
    }

    public function destroy(Request $request, $id): JsonResponse
    {
        $log = $request->user()->mealLogs()->findOrFail($id);

        $log->delete();

        return response()->json(['message' => 'Meal log deleted']);
    }
}
