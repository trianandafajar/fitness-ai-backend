<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => FoodCategory::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:food_categories,slug',
        ]);

        $category = FoodCategory::create($validated);

        return response()->json([
            'message' => 'Food category created successfully',
            'data' => $category,
        ], 201);
    }

    public function update(Request $request, FoodCategory $foodCategory): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:food_categories,slug,' . $foodCategory->id,
        ]);

        $foodCategory->update($validated);

        return response()->json([
            'message' => 'Food category updated successfully',
            'data' => $foodCategory,
        ]);
    }

    public function destroy(FoodCategory $foodCategory): JsonResponse
    {
        $foodCategory->delete();

        return response()->json([
            'message' => 'Food category deleted successfully',
        ]);
    }
}
