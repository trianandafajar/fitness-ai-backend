<?php

namespace App\Jobs;

use App\Models\Attendance;
use App\Services\AiProviderService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProcessAttendancePhoto implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Attendance $attendance,
    ) {}

    public function handle(AiProviderService $ai): void
    {
        $photoPath = $this->attendance->photo;

        if (!Storage::disk('public')->exists($photoPath)) {
            Log::warning('Attendance photo not found', ['path' => $photoPath]);
            return;
        }

        $imageData = Storage::disk('public')->get($photoPath);
        $base64 = base64_encode($imageData);

        $prompt = 'Analyze this fitness attendance photo. Determine:
            1. has_person: whether there is a visible human in the photo
            2. is_exercising: whether the person appears to be exercising or at a workout location (gym, field, home workout area)
            3. confidence: confidence score from 0 to 1
            4. description: brief description of what you see

            Respond in JSON format only (no markdown).';

        try {
            $response = $ai->vision($prompt, $base64, [
                'max_tokens' => 500,
            ]);

            $analysis = json_decode(
                $response['choices'][0]['message']['content'] ?? '{}',
                true
            );

            $hasPerson = $analysis['has_person'] ?? false;
            $isExercising = $analysis['is_exercising'] ?? false;

            $this->attendance->update([
                'ai_analysis' => $analysis,
                'ai_verified' => $hasPerson && $isExercising,
                'status' => ($hasPerson && $isExercising) ? 'verified' : 'rejected',
            ]);
        } catch (\Throwable $e) {
            Log::error('Attendance photo AI analysis failed', [
                'attendance_id' => $this->attendance->id,
                'error' => $e->getMessage(),
            ]);

            $this->attendance->update([
                'ai_analysis' => ['error' => $e->getMessage()],
            ]);
        }
    }
}
