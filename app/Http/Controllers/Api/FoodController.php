<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Food::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        return response()->json([
            'data' => $query->orderBy('name')->get(),
        ]);
    }
}
