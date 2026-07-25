<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ExerciseCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExerciseCategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => ExerciseCategory::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:exercise_categories,slug',
        ]);

        $category = ExerciseCategory::create($validated);

        return response()->json([
            'message' => 'Exercise category created successfully',
            'data' => $category,
        ], 201);
    }

    public function update(Request $request, ExerciseCategory $exerciseCategory): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:exercise_categories,slug,' . $exerciseCategory->id,
        ]);

        $exerciseCategory->update($validated);

        return response()->json([
            'message' => 'Exercise category updated successfully',
            'data' => $exerciseCategory,
        ]);
    }

    public function destroy(ExerciseCategory $exerciseCategory): JsonResponse
    {
        $exerciseCategory->delete();

        return response()->json([
            'message' => 'Exercise category deleted successfully',
        ]);
    }
}
