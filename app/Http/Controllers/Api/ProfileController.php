<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    private const EMAIL_CHANGE_TTL_MINUTES = 10;

    private const EMAIL_CHANGE_COOLDOWN_SECONDS = 60;

    private const MAX_ATTEMPTS = 3;

    private const ATTEMPT_DELAY_SECONDS = 60;

    public function update(Request $request): JsonResponse
    {
        $user = $request->user();

        $userRules = [];
        if ($request->has('name')) {
            $userRules['name'] = 'string|max:255';
        }
        $userRules['email'] = 'prohibited'; // Email only changes through the verified flow below

        $profileRules = [
            'date_of_birth' => 'nullable|date|before:today|after:' . now()->subYears(120)->format('Y-m-d'),
            'gender' => ['nullable', Rule::in(['male', 'female', 'other'])],
            'height_cm' => 'nullable|numeric|min:50|max:300',
            'weight_kg' => 'nullable|numeric|min:10|max:500',
            'fitness_goal' => 'nullable|string|max:255',
            'activity_level' => ['nullable', Rule::in(['low', 'medium', 'high'])],
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

        if ($request->has('name')) {
            $user->update(['name' => $validated['name']]);
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

    public function initiateEmailChange(Request $request): JsonResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'new_email' => 'required|string|email|max:255|unique:users,email',
        ]);

        $newEmail = strtolower($validated['new_email']);

        if ($newEmail === strtolower($user->email)) {
            throw ValidationException::withMessages([
                'new_email' => ['The new email is the same as your current email.'],
            ]);
        }

        $lastSent = $user->pending_email_sent_at;
        if ($lastSent && $lastSent->gt(now()->subSeconds(self::EMAIL_CHANGE_COOLDOWN_SECONDS))) {
            $retryAfter = max(0, (int) floor(
                $lastSent->copy()->addSeconds(self::EMAIL_CHANGE_COOLDOWN_SECONDS)->timestamp - now()->timestamp
            ));

            return response()->json([
                'message' => 'Please wait before requesting another code.',
                'retry_after' => $retryAfter,
            ], 429);
        }

        $code = (string) random_int(100000, 999999);

        $user->forceFill([
            'pending_email' => $newEmail,
            'pending_email_code' => Hash::make($code),
            'pending_email_expires_at' => now()->addMinutes(self::EMAIL_CHANGE_TTL_MINUTES),
            'pending_email_sent_at' => now(),
            'pending_email_attempts' => 0,
            'pending_email_next_attempt_at' => null,
        ])->save();

        Notification::route('mail', $newEmail)
            ->notify(new VerifyEmailNotification($code, $newEmail));

        return response()->json([
            'message' => 'Verification code sent to your new email address.',
            'resend_after' => self::EMAIL_CHANGE_COOLDOWN_SECONDS,
        ]);
    }

    public function verifyEmailChange(Request $request): JsonResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'code' => 'required|string|digits:6',
        ]);

        if (!$user->pending_email || !$user->pending_email_code) {
            throw ValidationException::withMessages([
                'code' => ['No pending email change was requested.'],
            ]);
        }

        if ($user->pending_email_expires_at && $user->pending_email_expires_at->isPast()) {
            throw ValidationException::withMessages([
                'code' => ['The verification code has expired. Please request a new one.'],
            ]);
        }

        if ($user->pending_email_attempts >= self::MAX_ATTEMPTS) {
            return response()->json([
                'message' => 'Too many failed attempts. Please request a new code.',
                'retry_after' => null,
            ], 429);
        }

        if ($user->pending_email_next_attempt_at && $user->pending_email_next_attempt_at->isFuture()) {
            $retryAfter = max(0, (int) ceil(
                $user->pending_email_next_attempt_at->timestamp - now()->timestamp
            ));

            return response()->json([
                'message' => 'Too many attempts. Please wait before trying again.',
                'retry_after' => $retryAfter,
            ], 429);
        }

        if (!Hash::check($validated['code'], $user->pending_email_code)) {
            $user->forceFill([
                'pending_email_attempts' => $user->pending_email_attempts + 1,
                'pending_email_next_attempt_at' => now()->addSeconds(self::ATTEMPT_DELAY_SECONDS),
            ])->save();

            throw ValidationException::withMessages([
                'code' => ['The verification code is invalid.'],
            ]);
        }

        $user->forceFill([
            'email' => $user->pending_email,
            'email_verified_at' => now(),
            'pending_email' => null,
            'pending_email_code' => null,
            'pending_email_expires_at' => null,
            'pending_email_sent_at' => null,
            'pending_email_attempts' => 0,
            'pending_email_next_attempt_at' => null,
        ])->save();

        return response()->json([
            'message' => 'Email changed successfully.',
            'user' => $user->fresh(),
        ]);
    }

    public function cancelEmailChange(Request $request): JsonResponse
    {
        $user = $request->user();

        $user->forceFill([
            'pending_email' => null,
            'pending_email_code' => null,
            'pending_email_expires_at' => null,
            'pending_email_sent_at' => null,
            'pending_email_attempts' => 0,
            'pending_email_next_attempt_at' => null,
        ])->save();

        return response()->json(['message' => 'Email change was cancelled.']);
    }

    public function emailChangeStatus(Request $request): JsonResponse
    {
        $user = $request->user();

        if (!$user->pending_email) {
            return response()->json(['pending' => false]);
        }

        return response()->json([
            'pending' => true,
            'new_email' => $user->pending_email,
            'expires_in' => $user->pending_email_expires_at
                ? max(0, (int) $user->pending_email_expires_at->timestamp - now()->timestamp)
                : 0,
            'resend_after' => $user->pending_email_sent_at
                ? max(0, (int) $user->pending_email_sent_at
                    ->copy()
                    ->addSeconds(self::EMAIL_CHANGE_COOLDOWN_SECONDS)
                    ->timestamp - now()->timestamp)
                : 0,
        ]);
    }
}