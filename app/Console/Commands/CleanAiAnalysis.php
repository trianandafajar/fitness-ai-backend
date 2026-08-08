<?php

namespace App\Console\Commands;

use App\Models\UserProfile;
use App\Services\AiEnrichmentService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:clean-ai-analysis')]
#[Description('Re-match stored AI suggestions against the DB and drop anything not found')]
class CleanAiAnalysis extends Command
{
    public function handle(AiEnrichmentService $enrichment): void
    {
        $profiles = UserProfile::whereNotNull('ai_analysis')->get();

        if ($profiles->isEmpty()) {
            $this->info('No profiles with ai_analysis found.');

            return;
        }

        $updated = 0;
        $droppedExercises = 0;
        $droppedFoods = 0;

        foreach ($profiles as $profile) {
            $analysis = $profile->ai_analysis;
            if (! is_array($analysis)) {
                continue;
            }

            $cleaned = $enrichment->cleanStoredAnalysis($analysis);

            $droppedExercises += $this->countNulls($cleaned['exercise_suggestions'] ?? [], 'exercise');
            $droppedFoods += $this->countNulls($cleaned['meal_suggestions'] ?? [], 'food');

            if ($cleaned !== $analysis) {
                $profile->update(['ai_analysis' => $cleaned]);
                $updated++;
            }
        }

        $this->info("Profiles processed: {$profiles->count()}");
        $this->info("Profiles updated: {$updated}");
        $this->info("Unmatched exercises dropped: {$droppedExercises}");
        $this->info("Unmatched foods dropped: {$droppedFoods}");
    }

    private function countNulls(array $items, string $key): int
    {
        return count(array_filter($items, fn ($item) => empty($item[$key] ?? null)));
    }
}
