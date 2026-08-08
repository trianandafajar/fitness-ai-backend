<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExerciseController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Exercise::query()->with('categoryModel');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('category')) {
            $query->whereHas('categoryModel', fn ($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('search')) {
            $query->where('name', 'ilike', '%'.$request->search.'%');
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
            'equipment' => 'nullable|string|max:255',
            'target_muscles' => 'nullable|array',
            'target_muscles.*' => 'string',
            'category_id' => 'required|exists:exercise_categories,id',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('exercises', 'public');
        }

        $exercise = Exercise::create($validated);

        return response()->json([
            'message' => 'Exercise created successfully',
            'data' => $exercise,
        ], 201);
    }

    public function update(Request $request, Exercise $exercise): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'equipment' => 'nullable|string|max:255',
            'target_muscles' => 'nullable|array',
            'target_muscles.*' => 'string',
            'category_id' => 'required|exists:exercise_categories,id',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($exercise->image) {
                Storage::disk('public')->delete($exercise->image);
            }
            $validated['image'] = $request->file('image')->store('exercises', 'public');
        }

        $exercise->update($validated);

        return response()->json([
            'message' => 'Exercise updated successfully',
            'data' => $exercise,
        ]);
    }

    public function destroy(Exercise $exercise): JsonResponse
    {
        if ($exercise->image && ! str_starts_with($exercise->image, 'http')) {
            Storage::disk('public')->delete($exercise->image);
        }

        $exercise->delete();

        return response()->json([
            'message' => 'Exercise deleted successfully',
        ]);
    }
}
