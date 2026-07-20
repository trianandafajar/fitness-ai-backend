<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserGoal;
use App\Models\UserProfile;
use App\Services\AiEnrichmentService;
use App\Services\AiProviderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class OnboardingController extends Controller
{
    public function step1(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today|after:' . now()->subYears(120)->format('Y-m-d'),
            'gender' => ['required', Rule::in(['male', 'female', 'other'])],
            'height_cm' => 'required|numeric|min:50|max:300',
            'weight_kg' => 'required|numeric|min:10|max:500',
        ]);

        $user = $request->user();
        $user->update(['name' => $validated['name']]);

        $profile = $this->getOrCreateProfile($user->id, 1);
        $profile->update([
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'height_cm' => $validated['height_cm'],
            'weight_kg' => $validated['weight_kg'],
            'onboarding_step' => 1,
        ]);

        return response()->json([
            'message' => 'Step 1 completed',
            'profile' => $profile->fresh(),
        ]);
    }

    public function step2(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'dietary_preferences' => 'nullable|array',
            'dietary_preferences.*' => 'string',
            'dietary_restrictions' => 'nullable|array',
            'dietary_restrictions.*' => 'string',
            'allergies' => 'nullable|array',
            'allergies.*' => 'string',
            'medical_conditions' => 'nullable|string|max:1000',
        ]);

        $profile = $this->requireStep($request->user()->id, 1);
        $profile->update([
            'dietary_preferences' => $validated['dietary_preferences'] ?? [],
            'dietary_restrictions' => $validated['dietary_restrictions'] ?? [],
            'allergies' => $validated['allergies'] ?? [],
            'medical_conditions' => $validated['medical_conditions'] ?? null,
            'onboarding_step' => 2,
        ]);

        return response()->json([
            'message' => 'Step 2 completed',
            'profile' => $profile->fresh(),
        ]);
    }

    public function step3(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'exercise_frequency' => ['required', Rule::in(['never', '1-2', '3-4', '5+'])],
            'exercise_types' => 'required|array|min:1',
            'exercise_types.*' => 'string',
            'injuries' => 'nullable|string|max:1000',
        ]);

        $profile = $this->requireStep($request->user()->id, 2);
        $profile->update([
            'exercise_frequency' => $validated['exercise_frequency'],
            'exercise_types' => $validated['exercise_types'],
            'injuries' => $validated['injuries'] ?? null,
            'onboarding_step' => 3,
        ]);

        return response()->json([
            'message' => 'Step 3 completed',
            'profile' => $profile->fresh(),
        ]);
    }

    public function step4(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'fitness_goal' => 'required|string|max:255',
            'activity_level' => ['required', Rule::in(['low', 'medium', 'high'])],
            'goal_weight_kg' => 'nullable|numeric|min:10|max:500',
        ]);

        $profile = $this->requireStep($request->user()->id, 3);
        $profile->update([
            'fitness_goal' => $validated['fitness_goal'],
            'activity_level' => $validated['activity_level'],
            'goal_weight_kg' => $validated['goal_weight_kg'] ?? null,
            'onboarding_step' => 4,
        ]);

        $request->user()->goals()->updateOrCreate(
            ['status' => 'active'],
            [
                'goal_type' => $validated['fitness_goal'],
                'target_weight_kg' => $validated['goal_weight_kg'] ?? null,
            ]
        );

        return response()->json([
            'message' => 'Step 4 completed',
            'profile' => $profile->fresh(),
        ]);
    }

    public function step5(Request $request): JsonResponse
    {
        $profile = $this->requireStep($request->user()->id, 4);

        $ai = app(AiProviderService::class);

        $prompt = $this->buildAiPrompt($profile, $request->user());

        try {
            $response = $ai->chat([
                ['role' => 'system', 'content' => 'You are a professional fitness and nutrition assistant. Analyze user onboarding data and respond in JSON. Keep everything short and actionable.
- "summary": 1-2 sentences max.
- "recommendations": array of 3-4 short strings (e.g. "Focus on compound lifts", "Eat 120g protein daily").
- "workout_plan": string describing weekly schedule (e.g. "3x/week: Mon, Wed, Fri at 07:00").
- "meal_suggestions": array of strings, each format: "Food name | meal_time | time". Example: "Oatmeal with Banana | breakfast | 07:30".
- "exercise_suggestions": array of strings, each format: "Exercise name - sets x reps | day_of_week | time". Example: "Bench Press - 4x12 | monday,thursday | 07:00".
Use specific exercise and food names. meal_time must be one of: breakfast, lunch, dinner, snack. day_of_week must be one or comma-separated from: monday,tuesday,wednesday,thursday,friday,saturday,sunday.'],
                ['role' => 'user', 'content' => $prompt],
            ], [
                'temperature' => 0.7,
                'max_tokens' => 2048,
            ]);

            $content = $response['choices'][0]['message']['content'] ?? '{}';
            // Strip markdown code fences if AI wraps JSON in them
            $content = preg_replace('/^```(?:json)?\s*\n?|\n?```\s*$/i', '', trim($content));
            $aiResult = json_decode($content, true);

            if (!is_array($aiResult)) {
                Log::warning('AI returned invalid JSON in step5', [
                    'user_id' => $request->user()->id,
                    'raw' => substr($content, 0, 500),
                ]);
                $aiResult = [
                    'summary' => 'AI analysis format error.',
                    'recommendations' => ['Please try again later.'],
                    'workout_plan' => '',
                    'meal_suggestions' => '',
                    'exercise_suggestions' => '',
                ];
            }

            // Enrich with images from database and create schedules
            $enrichment = app(AiEnrichmentService::class);
            $enriched = $enrichment->enrichAndSave($request->user()->id, $aiResult);

            $profile->update([
                'onboarding_step' => 5,
                'profile_completed' => true,
                'ai_analysis' => $enriched,
            ]);

            return response()->json([
                'message' => 'Onboarding completed',
                'profile_completed' => true,
                'ai_analysis' => $enriched,
            ]);
        } catch (\Throwable $e) {
            Log::error('AI analysis failed in step5', [
                'user_id' => $request->user()->id,
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            $profile->update([
                'onboarding_step' => 5,
                'profile_completed' => true,
            ]);

            return response()->json([
                'message' => 'Onboarding completed, but AI analysis unavailable. Please try again later.',
                'profile_completed' => true,
                'ai_analysis' => null,
            ]);
        }
    }

    private function getOrCreateProfile(int $userId, int $expectedStep): UserProfile
    {
        return UserProfile::firstOrCreate(
            ['user_id' => $userId],
            ['onboarding_step' => 0],
        );
    }

    private function requireStep(int $userId, int $requiredStep): UserProfile
    {
        $profile = $this->getOrCreateProfile($userId, $requiredStep);

        if ($profile->onboarding_step < $requiredStep) {
            abort(409, "Please complete step {$requiredStep} first");
        }

        return $profile;
    }

    private function buildAiPrompt(UserProfile $profile, $user): string
    {
        return "User data:
- Name: {$user->name}
- Date of birth: {$profile->date_of_birth}
- Gender: {$profile->gender}
- Height: {$profile->height_cm} cm
- Weight: {$profile->weight_kg} kg
- Fitness goal: {$profile->fitness_goal}
- Goal weight: {$profile->goal_weight_kg} kg
- Activity level: {$profile->activity_level}
- Dietary preferences: " . implode(', ', (array) $profile->dietary_preferences) . "
- Dietary restrictions: " . implode(', ', (array) $profile->dietary_restrictions) . "
- Allergies: " . implode(', ', (array) $profile->allergies) . "
- Medical conditions: {$profile->medical_conditions}
- Exercise frequency: {$profile->exercise_frequency} times/week
- Exercise types: " . implode(', ', (array) $profile->exercise_types) . "
- Injuries: {$profile->injuries}

Based on the data above, provide an initial analysis and personalized recommendations.";
    }
}
