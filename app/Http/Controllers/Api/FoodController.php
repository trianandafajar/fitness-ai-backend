<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Food::query()->with('categoryModel');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('category')) {
            $query->whereHas('categoryModel', fn ($q) => $q->where('slug', $request->category));
        }

        $query->orderBy('name');

        $data = $request->has('page')
            ? $query->paginate($request->integer('per_page', 15))
            : $query->get();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:food_categories,id',
            'image' => 'nullable|image|max:2048',
            'calories_per_100g' => 'required|numeric|min:0',
            'protein_per_100g' => 'required|numeric|min:0',
            'carbs_per_100g' => 'required|numeric|min:0',
            'fat_per_100g' => 'required|numeric|min:0',
            'serving_unit' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('foods', 'public');
        }

        $food = Food::create($validated);

        return response()->json([
            'message' => 'Food created successfully',
            'data' => $food,
        ], 201);
    }

    public function update(Request $request, Food $food): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:food_categories,id',
            'image' => 'nullable|image|max:2048',
            'calories_per_100g' => 'required|numeric|min:0',
            'protein_per_100g' => 'required|numeric|min:0',
            'carbs_per_100g' => 'required|numeric|min:0',
            'fat_per_100g' => 'required|numeric|min:0',
            'serving_unit' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($food->image) {
                Storage::disk('public')->delete($food->image);
            }
            $validated['image'] = $request->file('image')->store('foods', 'public');
        }

        $food->update($validated);

        return response()->json([
            'message' => 'Food updated successfully',
            'data' => $food,
        ]);
    }

    public function destroy(Food $food): JsonResponse
    {
        if ($food->image && ! str_starts_with($food->image, 'http')) {
            Storage::disk('public')->delete($food->image);
        }

        $food->delete();

        return response()->json([
            'message' => 'Food deleted successfully',
        ]);
    }
}
