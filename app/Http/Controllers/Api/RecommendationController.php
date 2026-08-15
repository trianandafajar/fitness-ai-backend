<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AiRecommendation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $recommendations = $request->user()->aiRecommendations()
            ->where('is_dismissed', false)
            ->where(function ($query) {
                $query->whereNull('expires_at')->orWhere('expires_at', '>', now());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json(['data' => $recommendations]);
    }

    public function dismiss(Request $request, AiRecommendation $recommendation): JsonResponse
    {
        $this->authorizeOwner($request, $recommendation);

        $recommendation->update(['is_dismissed' => true]);

        return response()->json($recommendation);
    }

    public function apply(Request $request, AiRecommendation $recommendation): JsonResponse
    {
        $this->authorizeOwner($request, $recommendation);

        $recommendation->update(['is_applied' => true]);

        return response()->json($recommendation);
    }

    private function authorizeOwner(Request $request, AiRecommendation $recommendation): void
    {
        abort_unless($recommendation->user_id === $request->user()->id, 403);
    }
}
