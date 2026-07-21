<?php

namespace App\Services;

use App\Models\AiRecommendation;
use App\Models\Attendance;
use App\Models\KpiTracking;
use App\Models\MealLog;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WorkoutSchedule;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class KpiCalculator
{
    public function __construct(
        private readonly StreakService $streaks,
    ) {}

    public function calculateDaily(User $user, Carbon $date): KpiTracking
    {
        $dayOfWeek = strtolower($date->format('l'));
        $periodStart = $date->copy()->startOfDay();
        $periodEnd = $date->copy()->endOfDay();

        $hasSchedule = WorkoutSchedule::where('user_id', $user->id)
            ->where('day_of_week', $dayOfWeek)
            ->exists();

        $attended = Attendance::where('user_id', $user->id)
            ->whereDate('checked_in_at', $date)
            ->where('status', 'verified')
            ->exists();

        $workoutsTarget = $hasSchedule ? 1 : 0;
        $workoutsCompleted = $attended ? 1 : 0;
        $compliance = $workoutsTarget > 0 ? round(($workoutsCompleted / $workoutsTarget) * 100, 2) : 0;

        $nutritionScore = $this->calculateNutritionScore($user, $date);

        $weightTrendScore = $this->calculateWeightTrendScore($user, $periodEnd);
        $latestWeight = WeightLog::where('user_id', $user->id)
            ->where('week_start', '<=', $date->format('Y-m-d'))
            ->orderBy('week_start', 'desc')
            ->first();

        $consistencyScore = $this->calculateConsistencyScore($user, $date);

        $engagementScore = $this->calculateEngagementScore($user, $periodStart, $periodEnd);

        $overall = $this->calculateOverallScore([
            'compliance' => $compliance,
            'nutrition' => $nutritionScore,
            'weight_trend' => $weightTrendScore,
            'consistency' => $consistencyScore,
            'engagement' => $engagementScore,
        ]);

        $data = [
            'user_id' => $user->id,
            'period_type' => 'daily',
            'period_start' => $periodStart->format('Y-m-d'),
            'period_end' => $periodEnd->format('Y-m-d'),
            'workouts_completed' => $workoutsCompleted,
            'workouts_target' => $workoutsTarget,
            'workout_compliance_pct' => $compliance,
            'current_weight_kg' => $latestWeight?->weight_kg,
            'weight_change_kg' => $this->getWeightChange($user, $date),
            'weight_trend_score' => $weightTrendScore,
            'nutrition_score' => $nutritionScore,
            'consistency_score' => $consistencyScore,
            'engagement_score' => $engagementScore,
            'overall_score' => $overall,
        ];

        return KpiTracking::updateOrCreate(
            [
                'user_id' => $user->id,
                'period_type' => 'daily',
                'period_start' => $periodStart->format('Y-m-d'),
            ],
            $data,
        );
    }

    public function calculateWeekly(User $user, Carbon $weekStart): KpiTracking
    {
        $periodStart = $weekStart->copy()->startOfWeek(Carbon::MONDAY);
        $periodEnd = $weekStart->copy()->endOfWeek(Carbon::SUNDAY);

        $schedules = WorkoutSchedule::where('user_id', $user->id)->get();
        $workoutsTarget = $schedules->count();

        $attendances = Attendance::where('user_id', $user->id)
            ->whereBetween('checked_in_at', [$periodStart, $periodEnd])
            ->where('status', 'verified')
            ->count();

        $compliance = $workoutsTarget > 0 ? round(($attendances / $workoutsTarget) * 100, 2) : 0;

        $nutritionScore = $this->calculateWeeklyNutritionScore($user, $periodStart, $periodEnd);

        $latestWeight = WeightLog::where('user_id', $user->id)
            ->where('week_start', '<=', $periodEnd->format('Y-m-d'))
            ->orderBy('week_start', 'desc')
            ->first();

        $weightTrendScore = $this->calculateWeightTrendScore($user, $periodEnd);
        $consistencyScore = $this->calculateConsistencyScore($user, $periodEnd);

        $engagementScore = $this->calculateEngagementScore($user, $periodStart, $periodEnd);

        $overall = $this->calculateOverallScore([
            'compliance' => $compliance,
            'nutrition' => $nutritionScore,
            'weight_trend' => $weightTrendScore,
            'consistency' => $consistencyScore,
            'engagement' => $engagementScore,
        ]);

        $prevWeek = KpiTracking::where('user_id', $user->id)
            ->where('period_type', 'weekly')
            ->where('period_end', '<', $periodStart)
            ->orderBy('period_end', 'desc')
            ->first();

        $weightChange = null;
        if ($latestWeight && $prevWeek?->current_weight_kg) {
            $weightChange = round($latestWeight->weight_kg - $prevWeek->current_weight_kg, 2);
        }

        $data = [
            'user_id' => $user->id,
            'period_type' => 'weekly',
            'period_start' => $periodStart->format('Y-m-d'),
            'period_end' => $periodEnd->format('Y-m-d'),
            'workouts_completed' => $attendances,
            'workouts_target' => $workoutsTarget,
            'workout_compliance_pct' => $compliance,
            'current_weight_kg' => $latestWeight?->weight_kg,
            'weight_change_kg' => $weightChange,
            'weight_trend_score' => $weightTrendScore,
            'nutrition_score' => $nutritionScore,
            'consistency_score' => $consistencyScore,
            'engagement_score' => $engagementScore,
            'overall_score' => $overall,
        ];

        return KpiTracking::updateOrCreate(
            [
                'user_id' => $user->id,
                'period_type' => 'weekly',
                'period_start' => $periodStart->format('Y-m-d'),
            ],
            $data,
        );
    }

    public function calculateOverallScore(array $scores): int
    {
        $weights = [
            'compliance' => 0.30,
            'nutrition' => 0.20,
            'weight_trend' => 0.20,
            'consistency' => 0.15,
            'engagement' => 0.15,
        ];

        $total = 0;
        foreach ($weights as $key => $weight) {
            $total += ($scores[$key] ?? 0) * $weight;
        }

        return (int) round($total);
    }

    public static function generateKpiStatus(int $score): string
    {
        return match (true) {
            $score >= 85 => 'excellent',
            $score >= 70 => 'good',
            $score >= 50 => 'needs_attention',
            default => 'critical',
        };
    }

    protected function calculateNutritionScore(User $user, Carbon $date): int
    {
        $mealLogs = MealLog::where('user_id', $user->id)
            ->whereDate('logged_at', $date)
            ->get();

        if ($mealLogs->isEmpty()) {
            return 0;
        }

        $types = $mealLogs->pluck('meal_type')->unique();
        $variety = min(count($types) * 25, 50);

        $totalCalories = $mealLogs->sum('total_calories');
        $totalProtein = $mealLogs->sum('total_protein_g');

        $calorieScore = match (true) {
            $totalCalories >= 1500 && $totalCalories <= 3000 => 25,
            $totalCalories >= 1200 && $totalCalories <= 3500 => 15,
            default => 5,
        };

        $proteinScore = match (true) {
            $totalProtein >= 60 => 25,
            $totalProtein >= 40 => 15,
            $totalProtein >= 20 => 10,
            default => 0,
        };

        return min($variety + $calorieScore + $proteinScore, 100);
    }

    protected function calculateWeeklyNutritionScore(User $user, Carbon $start, Carbon $end): int
    {
        $mealLogs = MealLog::where('user_id', $user->id)
            ->whereBetween('logged_at', [$start, $end])
            ->get();

        if ($mealLogs->isEmpty()) {
            return 0;
        }

        $daysWithMeals = $mealLogs->groupBy(fn ($l) => $l->logged_at->format('Y-m-d'))->count();
        $consistency = min($daysWithMeals * 12, 60);

        $avgCalories = $mealLogs->avg('total_calories');
        $avgProtein = $mealLogs->avg('total_protein_g');

        $calorieScore = $avgCalories >= 1500 && $avgCalories <= 3000 ? 20 : 10;
        $proteinScore = $avgProtein >= 60 ? 20 : ($avgProtein >= 40 ? 12 : ($avgProtein >= 20 ? 6 : 0));

        return min($consistency + $calorieScore + $proteinScore, 100);
    }

    protected function calculateWeightTrendScore(User $user, Carbon $date): int
    {
        $goal = $user->activeGoal;

        if (!$goal) {
            return 50;
        }

        $latestTwo = WeightLog::where('user_id', $user->id)
            ->where('week_start', '<=', $date->format('Y-m-d'))
            ->orderBy('week_start', 'desc')
            ->take(2)
            ->get();

        if ($latestTwo->count() < 2) {
            return 50;
        }

        $change = $latestTwo->first()->weight_kg - $latestTwo->last()->weight_kg;

        return match ($goal->goal_type) {
            'lose_weight' => $change < 0 ? 90 : ($change == 0 ? 50 : 20),
            'gain_muscle' => $change > 0 ? 90 : ($change == 0 ? 50 : 20),
            default => 60,
        };
    }

    protected function calculateConsistencyScore(User $user, Carbon $date): int
    {
        $streak = $this->streaks->currentCount($user, $date);

        return match (true) {
            $streak >= 14 => 100,
            $streak >= 7 => 80,
            $streak >= 3 => 60,
            $streak >= 1 => 40,
            default => 0,
        };
    }

    protected function calculateEngagementScore(User $user, Carbon $start, Carbon $end): int
    {
        $total = AiRecommendation::where('user_id', $user->id)
            ->whereBetween('created_at', [$start, $end])
            ->count();

        if ($total === 0) {
            return 50;
        }

        $applied = AiRecommendation::where('user_id', $user->id)
            ->whereBetween('created_at', [$start, $end])
            ->where('is_applied', true)
            ->count();

        return (int) round(($applied / $total) * 100);
    }

    protected function getWeightChange(User $user, Carbon $date): ?float
    {
        $latestTwo = WeightLog::where('user_id', $user->id)
            ->where('week_start', '<=', $date->format('Y-m-d'))
            ->orderBy('week_start', 'desc')
            ->take(2)
            ->get();

        if ($latestTwo->count() < 2) {
            return null;
        }

        return round($latestTwo->first()->weight_kg - $latestTwo->last()->weight_kg, 2);
    }
}
