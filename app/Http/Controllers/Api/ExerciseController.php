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
        $query = Exercise::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $exercises = $query->orderBy('name')->get()->map(function ($exercise) {
            $exercise->image_url = $exercise->image ? Storage::disk('public')->url($exercise->image) : null;
            return $exercise;
        });

        return response()->json([
            'data' => $exercises,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'equipment' => 'nullable|string|max:255',
            'target_muscles' => 'nullable|array',
            'target_muscles.*' => 'string',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('exercises', 'public');
        }

        unset($validated['image_file']);

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
            'category' => 'required|string|max:255',
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
        if ($exercise->image) {
            Storage::disk('public')->delete($exercise->image);
        }

        $exercise->delete();

        return response()->json([
            'message' => 'Exercise deleted successfully',
        ]);
    }
}
