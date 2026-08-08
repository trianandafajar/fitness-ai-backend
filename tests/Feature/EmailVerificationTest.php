<?php

namespace Tests\Feature;

use App\Models\EmailVerificationCode;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_sends_verification_code_and_login_is_blocked_until_verified(): void
    {
        Notification::fake();

        $email = 'verify@example.com';

        $register = $this->postJson('/api/auth/register', [
            'name' => 'Verify User',
            'email' => $email,
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $register->assertStatus(201);

        $user = User::query()->where('email', $email)->first();
        $this->assertNotNull($user);
        $this->assertNull($user->email_verified_at);

        $code = null;
        Notification::assertSentTo($user, VerifyEmailNotification::class, function ($notification) use (&$code) {
            $code = $notification->code;

            return true;
        });
        $this->assertIsString($code);
        $this->assertMatchesRegularExpression('/^\d{6}$/', $code);

        $login = $this->postJson('/api/auth/login', [
            'email' => $email,
            'password' => 'password123',
        ]);

        $login->assertStatus(403)->assertJson([
            'verified' => false,
            'email' => $email,
        ]);

        $this->postJson('/api/auth/verify-email', [
            'email' => $email,
            'code' => '000000',
        ])->assertStatus(422);

        $this->postJson('/api/auth/verify-email', [
            'email' => $email,
            'code' => $code,
        ])->assertStatus(200);

        $this->assertNotNull($user->fresh()->email_verified_at);

        $this->postJson('/api/auth/login', [
            'email' => $email,
            'password' => 'password123',
        ])->assertStatus(200)->assertJsonStructure(['token', 'user']);

        $this->assertDatabaseMissing('email_verification_codes', ['user_id' => $user->id]);
    }

    public function test_resend_verification_sends_a_new_code(): void
    {
        Notification::fake();

        $user = User::factory()->unverified()->create();
        $code = null;

        $this->postJson('/api/auth/verify-email/resend', [
            'email' => $user->email,
        ])->assertStatus(200);

        Notification::assertSentTo($user, VerifyEmailNotification::class, function ($notification) use (&$code) {
            $code = $notification->code;

            return true;
        });
        $this->assertMatchesRegularExpression('/^\d{6}$/', $code);

        $this->postJson('/api/auth/verify-email', [
            'email' => $user->email,
            'code' => $code,
        ])->assertStatus(200);

        $this->assertNotNull($user->fresh()->email_verified_at);
    }

    public function test_resend_verification_for_verified_email_returns_message(): void
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->postJson('/api/auth/verify-email/resend', [
            'email' => $user->email,
        ])->assertStatus(200)->assertJson(['message' => 'Email is already verified.']);

        Notification::assertNothingSent();
    }

    public function test_resend_is_rate_limited_until_cooldown_and_status_reports_countdowns(): void
    {
        Notification::fake();

        $user = User::factory()->unverified()->create();
        $this->postJson('/api/auth/verify-email/resend', ['email' => $user->email])->assertStatus(200);

        $status = $this->getJson('/api/auth/verify-email/status?email='.$user->email)
            ->assertStatus(200)
            ->assertJsonPath('verified', false);

        $this->assertGreaterThan(0, $status->json('expires_in'));
        $this->assertEquals(60, $status->json('resend_after'));

        $this->postJson('/api/auth/verify-email/resend', ['email' => $user->email])
            ->assertStatus(429)
            ->assertJsonStructure(['message', 'retry_after']);

        EmailVerificationCode::query()
            ->where('user_id', $user->id)
            ->update(['created_at' => now()->subMinutes(2)]);

        $status = $this->getJson('/api/auth/verify-email/status?email='.$user->email)->assertStatus(200);
        $this->assertEquals(0, $status->json('resend_after'));

        $this->postJson('/api/auth/verify-email/resend', ['email' => $user->email])
            ->assertStatus(200)
            ->assertJson(['resend_after' => 60]);

        Notification::assertSentToTimes($user, VerifyEmailNotification::class, 2);
    }
}
