<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KpiTracking;
use App\Services\KpiCalculator;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KpiTrackingController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = $request->user()->kpiTrackings()
            ->orderBy('period_start', 'desc');

        if ($period = $request->input('period')) {
            $query->where('period_type', $period);
        }

        if ($weeks = $request->integer('weeks')) {
            $query->where('period_start', '>=', now()->subWeeks($weeks)->startOfWeek()->format('Y-m-d'));
        }

        $records = $query->get();

        $records->each(function ($record) {
            $record->status = KpiCalculator::generateKpiStatus($record->overall_score);
        });

        return response()->json($records);
    }

    public function current(Request $request): JsonResponse
    {
        $user = $request->user();
        $today = Carbon::today();

        $daily = KpiTracking::where('user_id', $user->id)
            ->where('period_type', 'daily')
            ->where('period_start', $today->format('Y-m-d'))
            ->first();

        $weekStart = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $weekEnd = Carbon::now()->endOfWeek(Carbon::SUNDAY);

        $weekly = KpiTracking::where('user_id', $user->id)
            ->where('period_type', 'weekly')
            ->where('period_start', $weekStart->format('Y-m-d'))
            ->first();

        return response()->json([
            'today' => $daily ? [
                'data' => $daily,
                'status' => KpiCalculator::generateKpiStatus($daily->overall_score),
            ] : null,
            'this_week' => $weekly ? [
                'data' => $weekly,
                'status' => KpiCalculator::generateKpiStatus($weekly->overall_score),
            ] : null,
        ]);
    }
}
