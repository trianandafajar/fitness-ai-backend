<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Services\AiProviderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OnboardingController extends Controller
{
    public function step1(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'date_of_birth' => 'required|date|before:today|after:' . now()->subYears(120)->format('Y-m-d'),
            'gender' => ['required', Rule::in(['male', 'female', 'other'])],
        ]);

        $profile = $this->getOrCreateProfile($request->user()->id, 1);

        $profile->update([
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
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
            'height_cm' => 'required|numeric|min:50|max:300',
            'weight_kg' => 'required|numeric|min:10|max:500',
            'fitness_goal' => 'required|string|max:255',
            'activity_level' => ['required', Rule::in(['sedentary', 'light', 'moderate', 'active', 'very_active'])],
            'goal_weight_kg' => 'nullable|numeric|min:10|max:500',
        ]);

        $profile = $this->requireStep($request->user()->id, 1);
        $profile->update([
            'height_cm' => $validated['height_cm'],
            'weight_kg' => $validated['weight_kg'],
            'fitness_goal' => $validated['fitness_goal'],
            'activity_level' => $validated['activity_level'],
            'goal_weight_kg' => $validated['goal_weight_kg'] ?? null,
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
            'dietary_preferences' => 'nullable|array',
            'dietary_preferences.*' => 'string',
            'dietary_restrictions' => 'nullable|array',
            'dietary_restrictions.*' => 'string',
            'allergies' => 'nullable|array',
            'allergies.*' => 'string',
            'medical_conditions' => 'nullable|string|max:1000',
        ]);

        $profile = $this->requireStep($request->user()->id, 2);
        $profile->update([
            'dietary_preferences' => $validated['dietary_preferences'] ?? [],
            'dietary_restrictions' => $validated['dietary_restrictions'] ?? [],
            'allergies' => $validated['allergies'] ?? [],
            'medical_conditions' => $validated['medical_conditions'] ?? null,
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
            'exercise_frequency' => ['required', Rule::in(['never', '1-2', '3-4', '5+'])],
            'exercise_types' => 'required|array|min:1',
            'exercise_types.*' => 'string',
            'injuries' => 'nullable|string|max:1000',
        ]);

        $profile = $this->requireStep($request->user()->id, 3);
        $profile->update([
            'exercise_frequency' => $validated['exercise_frequency'],
            'exercise_types' => $validated['exercise_types'],
            'injuries' => $validated['injuries'] ?? null,
            'onboarding_step' => 4,
        ]);

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
                ['role' => 'system', 'content' => 'You are a professional fitness and nutrition assistant. Provide an initial analysis based on the user onboarding data. Respond in JSON format with keys: summary, recommendations, meal_suggestions, exercise_suggestions.'],
                ['role' => 'user', 'content' => $prompt],
            ], [
                'temperature' => 0.7,
                'max_tokens' => 2048,
            ]);

            $aiResult = json_decode($response['choices'][0]['message']['content'] ?? '{}', true);

            $profile->update([
                'onboarding_step' => 5,
                'profile_completed' => true,
            ]);

            return response()->json([
                'message' => 'Onboarding completed',
                'profile_completed' => true,
                'ai_analysis' => $aiResult,
            ]);
        } catch (\Throwable $e) {
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
