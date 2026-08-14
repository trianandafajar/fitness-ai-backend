<?php

namespace Database\Seeders;

use App\Models\EmailVerificationCode;
use App\Models\KpiTracking;
use App\Models\MealLog;
use App\Models\MealSchedule;
use App\Models\User;
use App\Models\UserGoal;
use App\Models\UserProfile;
use App\Models\WeightLog;
use App\Models\WorkoutSchedule;
use App\Services\AiEnrichmentService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    use WithoutModelEvents;

    public const DEMO_EMAIL = 'demo@fitness.ai';

    public const DEMO_PASSWORD = 'password';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->cleanup();

        $user = User::create([
            'name' => 'Demo User',
            'email' => self::DEMO_EMAIL,
            'password' => Hash::make(self::DEMO_PASSWORD),
            'is_admin' => false,
        ]);

        $user->forceFill(['email_verified_at' => now()])->save();

        UserProfile::create([
            'user_id' => $user->id,
            'date_of_birth' => now()->subYears(26)->format('Y-m-d'),
            'gender' => 'male',
            'height_cm' => 175,
            'weight_kg' => 78,
            'fitness_goal' => 'muscle-gain',
            'activity_level' => 'medium',
            'goal_weight_kg' => 85,
            'dietary_preferences' => ['high-protein'],
            'dietary_restrictions' => [],
            'allergies' => [],
            'medical_conditions' => null,
            'exercise_frequency' => '3-4',
            'exercise_types' => ['gym / weight lifting'],
            'injuries' => null,
            'onboarding_step' => 5,
            'profile_completed' => true,
        ]);

        UserGoal::create([
            'user_id' => $user->id,
            'goal_type' => 'muscle-gain',
            'target_weight_kg' => 85,
            'status' => 'active',
        ]);

        $aiResult = [
            'summary' => 'Demo user: 26yo male, 78kg, moderate activity. Focused on a 3-4 day gym plan to build muscle and reach 85kg.',
            'recommendations' => [
                'Eat a high-protein breakfast within 1 hour of waking.',
                'Progressively add 2.5kg to your main lifts each week.',
                'Keep rest days active with light walking.',
            ],
            'workout_plan' => '3x/week: Mon, Wed, Fri at 07:00',
            'exercise_suggestions' => [
                'Barbell Back Squat - 4x8 | monday | 07:00',
                'Dumbbell Bench Press (Flat) - 4x10 | monday | 07:00',
                'Barbell Conventional Deadlift - 4x6 | monday | 07:00',
                'Dumbbell Seated Overhead Press - 3x10 | wednesday | 07:00',
                'Floor Mat Push-Up - 3x15 | wednesday | 07:00',
                'Barbell Romanian Deadlift - 3x10 | wednesday | 07:00',
                'Dumbbell Lateral Raise - 3x12 | friday | 07:00',
                'Dumbbell Pullover - 3x12 | friday | 07:00',
                'Floor Mat Plank - 3x60 | friday | 07:00',
            ],
            'meal_suggestions' => [
                'Oatmeal (mentah) | breakfast | 07:30',
                'Greek yogurt (plain, rendah lemak) | breakfast | 07:30',
                'Nasi merah (matang) | lunch | 12:30',
                'Dada ayam panggang | lunch | 12:30',
                'Telur rebus | snack | 15:30',
                'Pisang | snack | 15:30',
                'Ubi jalar (kukus) | dinner | 18:30',
                'Ikan salmon | dinner | 18:30',
            ],
        ];

        $enriched = app(AiEnrichmentService::class)->enrichAndSave($user->id, $aiResult);

        $user->profile()->update([
            'ai_analysis' => $enriched,
        ]);

        $this->command?->info('Demo user created: '.self::DEMO_EMAIL.' / '.self::DEMO_PASSWORD);
    }

    /**
     * Remove any existing demo user and all of its child records.
     */
    public function cleanup(): void
    {
        $user = User::where('email', self::DEMO_EMAIL)->first();

        if (! $user) {
            return;
        }

        $this->cleanupForUserId($user->id);

        $user->delete();
    }

    /**
     * Remove all child records for a given demo user id.
     */
    public function cleanupForUserId(int $userId): void
    {
        WorkoutSchedule::where('user_id', $userId)->delete();
        MealSchedule::where('user_id', $userId)->delete();
        MealLog::where('user_id', $userId)->delete();
        WeightLog::where('user_id', $userId)->delete();
        UserGoal::where('user_id', $userId)->delete();
        UserProfile::where('user_id', $userId)->delete();
        KpiTracking::where('user_id', $userId)->delete();
        EmailVerificationCode::where('user_id', $userId)->delete();

        DB::table('attendances')->where('user_id', $userId)->delete();
        DB::table('personal_access_tokens')->where('tokenable_id', $userId)->where('tokenable_type', User::class)->delete();
        DB::table('notifications')->where('notifiable_id', $userId)->where('notifiable_type', User::class)->delete();
    }
}
