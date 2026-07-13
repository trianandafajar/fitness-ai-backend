<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\AiProviderService;
use App\Services\KpiCalculator;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class GenerateWeeklyKpiReportJob implements ShouldQueue
{
    use Queueable;

    public function handle(KpiCalculator $kpi, AiProviderService $ai): void
    {
        $weekStart = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $weekEnd = Carbon::now()->endOfWeek(Carbon::SUNDAY);

        User::chunk(100, function ($users) use ($kpi, $ai, $weekStart, $weekEnd) {
            foreach ($users as $user) {
                $record = $kpi->calculateWeekly($user, $weekStart);

                try {
                    $summary = $this->generateAiSummary($user, $record, $kpi, $ai);

                    $record->update(['ai_summary' => $summary]);
                } catch (\Throwable $e) {
                    $record->update([
                        'ai_summary' => 'AI summary unavailable for this week.',
                    ]);
                }
            }
        });
    }

    protected function generateAiSummary(
        User $user,
        $record,
        KpiCalculator $kpi,
        AiProviderService $ai,
    ): string {
        $status = KpiCalculator::generateKpiStatus($record->overall_score);

        $prompt = "Based on the following weekly fitness KPI data for {$user->name}, provide a brief personal summary (max 3 sentences) with motivational tone:

- Workout compliance: {$record->workout_compliance_pct}%
- Nutrition score: {$record->nutrition_score}/100
- Weight trend score: {$record->weight_trend_score}/100
- Consistency score: {$record->consistency_score}/100
- Overall score: {$record->overall_score}/100 ({$status})
- Weight change: {$record->weight_change_kg} kg

Write a short encouraging paragraph in the same language as their name context.";

        $response = $ai->chat([
            ['role' => 'system', 'content' => 'You are a motivational fitness coach. Keep responses brief, personal, and encouraging.'],
            ['role' => 'user', 'content' => $prompt],
        ], [
            'temperature' => 0.7,
            'max_tokens' => 300,
        ]);

        return $response['choices'][0]['message']['content'] ?? 'Great work this week! Keep pushing forward.';
    }
}
