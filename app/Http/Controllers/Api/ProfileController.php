<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update(Request $request): JsonResponse
    {
        $user = $request->user();

        $userRules = [];
        if ($request->has('name')) {
            $userRules['name'] = 'string|max:255';
        }
        if ($request->has('email')) {
            $userRules['email'] = 'string|email|max:255|unique:users,email,' . $user->id;
        }

        $profileRules = [
            'date_of_birth' => 'nullable|date|before:today|after:' . now()->subYears(120)->format('Y-m-d'),
            'gender' => ['nullable', Rule::in(['male', 'female', 'other'])],
            'height_cm' => 'nullable|numeric|min:50|max:300',
            'weight_kg' => 'nullable|numeric|min:10|max:500',
            'fitness_goal' => 'nullable|string|max:255',
            'activity_level' => ['nullable', Rule::in(['sedentary', 'light', 'moderate', 'active', 'very_active'])],
            'goal_weight_kg' => 'nullable|numeric|min:10|max:500',
            'dietary_preferences' => 'nullable|array',
            'dietary_preferences.*' => 'string',
            'dietary_restrictions' => 'nullable|array',
            'dietary_restrictions.*' => 'string',
            'allergies' => 'nullable|array',
            'allergies.*' => 'string',
            'medical_conditions' => 'nullable|string|max:1000',
            'exercise_frequency' => ['nullable', Rule::in(['never', '1-2', '3-4', '5+'])],
            'exercise_types' => 'nullable|array',
            'exercise_types.*' => 'string',
            'injuries' => 'nullable|string|max:1000',
        ];

        $validated = $request->validate(array_merge($userRules, $profileRules));

        if ($request->has('name') || $request->has('email')) {
            $user->update(array_intersect_key($validated, ['name' => true, 'email' => true]));
        }

        $profileFields = array_intersect_key($validated, $profileRules);
        if (!empty($profileFields)) {
            $profile = $user->profile()->firstOrCreate([], ['onboarding_step' => 5, 'profile_completed' => true]);
            $profile->update($profileFields);
        }

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user->fresh(),
            'profile' => $user->fresh()->profile,
        ]);
    }
}
