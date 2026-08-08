<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmailVerificationCode;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    private const VERIFICATION_CODE_TTL_MINUTES = 10;

    private const RESEND_COOLDOWN_SECONDS = 60;

    public function register(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::query()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $this->sendVerificationCode($user);

        return response()->json([
            'message' => 'Registration successful. Please verify your email.',
            'user' => $user,
        ], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::query()->where('email', $validated['email'])->first();

        if (! $user || ! Hash::check($validated['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        if (! $user->is_admin && ! $user->email_verified_at) {
            $this->sendVerificationCode($user);

            return response()->json([
                'message' => 'Please verify your email address first.',
                'verified' => false,
                'email' => $user->email,
            ], 403);
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function verifyEmail(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|string|email|exists:users,email',
            'code' => 'required|string|digits:6',
        ]);

        $user = User::query()->where('email', $validated['email'])->first();

        if ($user->email_verified_at) {
            return response()->json(['message' => 'Email is already verified.']);
        }

        $record = EmailVerificationCode::query()
            ->where('user_id', $user->id)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (! $record || ! Hash::check($validated['code'], $record->code)) {
            throw ValidationException::withMessages([
                'code' => ['The verification code is invalid or has expired.'],
            ]);
        }

        $record->delete();
        $user->forceFill(['email_verified_at' => now()])->save();

        return response()->json([
            'message' => 'Email verified successfully. Please login.',
        ]);
    }

    public function resendVerification(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|string|email|exists:users,email',
        ]);

        $user = User::query()->where('email', $validated['email'])->first();

        if ($user->email_verified_at) {
            return response()->json(['message' => 'Email is already verified.']);
        }

        $existing = EmailVerificationCode::query()->where('user_id', $user->id)->latest()->first();

        if ($existing && $existing->created_at->gt(now()->subSeconds(self::RESEND_COOLDOWN_SECONDS))) {
            $retryAfter = $existing->created_at
                ->addSeconds(self::RESEND_COOLDOWN_SECONDS)
                ->diffInSeconds(now());

            return response()->json([
                'message' => 'Please wait before resending the verification code.',
                'retry_after' => $retryAfter,
            ], 429);
        }

        $this->sendVerificationCode($user);

        return response()->json([
            'message' => 'Verification code sent to your email.',
            'resend_after' => self::RESEND_COOLDOWN_SECONDS,
        ]);
    }

    public function verificationStatus(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|string|email|exists:users,email',
        ]);

        $user = User::query()->where('email', $validated['email'])->first();

        if ($user->email_verified_at) {
            return response()->json(['verified' => true]);
        }

        $record = EmailVerificationCode::query()->where('user_id', $user->id)->latest()->first();

        $expiresAt = $record?->expires_at;
        $cooldownUntil = $record ? $record->created_at->addSeconds(self::RESEND_COOLDOWN_SECONDS) : null;

        return response()->json([
            'verified' => false,
            'expires_in' => $expiresAt ? max(0, (int) $expiresAt->timestamp - now()->timestamp) : 0,
            'resend_after' => $cooldownUntil ? max(0, (int) $cooldownUntil->timestamp - now()->timestamp) : 0,
        ]);
    }

    private function sendVerificationCode(User $user): void
    {
        $code = (string) random_int(100000, 999999);

        EmailVerificationCode::query()
            ->where('user_id', $user->id)
            ->delete();

        EmailVerificationCode::query()->create([
            'user_id' => $user->id,
            'code' => Hash::make($code),
            'expires_at' => now()->addMinutes(self::VERIFICATION_CODE_TTL_MINUTES),
        ]);

        $user->notify(new VerifyEmailNotification($code, $user->email));
    }

    public function me(Request $request): JsonResponse
    {
        $user = $request->user()->load('profile');

        return response()->json([
            'user' => $user,
            'profile' => $user->profile,
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function forgotPassword(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|string|email|exists:users,email',
        ]);

        $status = Password::sendResetLink($validated);

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Reset link sent to your email']);
        }

        return response()->json(['message' => 'Unable to send reset link'], 500);
    }

    public function resetPassword(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'token' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $validated,
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return response()->json(['message' => 'Password has been reset successfully']);
        }

        return response()->json(['message' => 'Invalid or expired reset token'], 400);
    }
}
