<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class BulgarianBagSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Bulgarian Bag Spin (Basic)', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Forearms', 'Traps', 'Lats', 'Obliques', 'Hip Flexors'], 'description' => 'Swing bag around body horizontally. Continuous spin engages core and shoulder stabilizers.'],
            ['name' => 'Bulgarian Bag Reverse Spin', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Forearms', 'Traps', 'Lats', 'Obliques', 'Hip Flexors'], 'description' => 'Reverse direction spin. Balances rotational development and challenges opposite musculature.'],
            ['name' => 'Bulgarian Bag Around the Body (Figure-8)', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Forearms', 'Traps', 'Lats', 'Obliques', 'Hip Flexors'], 'description' => 'Circle bag around entire body in figure-8 pattern. Coordination and rotational conditioning.'],
            ['name' => 'Bulgarian Bag Snatch', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Triceps', 'Forearms', 'Traps', 'Quadriceps'], 'description' => 'Explosively pull bag from floor to overhead in one motion. Full-body power movement.'],
            ['name' => 'Bulgarian Bag Clean', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Biceps', 'Forearms', 'Traps', 'Quadriceps'], 'description' => 'Pull bag from floor to shoulder position. Hip drive and upper body pull.'],
            ['name' => 'Bulgarian Bag Shoulder Clean', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Core', 'Shoulders', 'Traps', 'Biceps', 'Forearms', 'Hamstrings', 'Quadriceps'], 'description' => 'Clean bag directly to shoulder. Emphasis on rotational shoulder stability.'],
            ['name' => 'Bulgarian Bag Press (Overhead)', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Traps', 'Forearms', 'Upper Chest', 'Stabilizers'], 'description' => 'Press bag overhead from shoulder. Unstable load challenges shoulder stabilizers.'],
            ['name' => 'Bulgarian Bag Push Press', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Forearms', 'Traps'], 'description' => 'Dip and drive with legs to press bag overhead. Explosive overhead strength.'],
            ['name' => 'Bulgarian Bag Jerk', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Forearms', 'Traps', 'Calves'], 'description' => 'Explosive dip-drive then split or squat under bag to lockout overhead. Advanced overhead power.'],
            ['name' => 'Bulgarian Bag Squat (Front Load)', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Shoulders', 'Forearms'], 'description' => 'Hold bag in front rack. Perform squats. Quad-dominant squat with unstable load.'],
            ['name' => 'Bulgarian Bag Overhead Squat', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Stabilizers', 'Traps'], 'description' => 'Hold bag overhead. Perform squats. Extreme mobility and stability challenge.'],
            ['name' => 'Bulgarian Bag Lunge (Walking)', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Forearms', 'Stabilizers'], 'description' => 'Hold bag on shoulders. Perform walking lunges. Unilateral leg work with unstable load.'],
            ['name' => 'Bulgarian Bag Reverse Lunge', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Forearms', 'Stabilizers'], 'description' => 'Hold bag on shoulders. Step backward into lunge. Knee stability and unilateral strength.'],
            ['name' => 'Bulgarian Bag Lateral Lunge', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Forearms', 'Stabilizers'], 'description' => 'Hold bag on shoulders. Step laterally into deep lunge. Targets inner thighs and hip stabilizers.'],
            ['name' => 'Bulgarian Bag Good Morning', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Shoulders', 'Forearms'], 'description' => 'Hold bag behind neck. Hinge forward at hips. Posterior chain emphasis.'],
            ['name' => 'Bulgarian Bag Deadlift (Off Floor)', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Forearms', 'Traps', 'Biceps'], 'description' => 'Lift bag from floor to standing. Deadlift variation with awkward offset load.'],
            ['name' => 'Bulgarian Bag Single-Leg Deadlift', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Forearms', 'Traps', 'Biceps', 'Stabilizers'], 'description' => 'Balance on one leg. Hinge forward with bag. Unilateral posterior chain and stability.'],
            ['name' => 'Bulgarian Bag Row (Bent-Over)', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Forearms', 'Traps'], 'description' => 'Bend over, row bag toward chest. Unstable bag challenges back and grip strength.'],
            ['name' => 'Bulgarian Bag Single-Arm Row', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Forearms', 'Traps'], 'description' => 'Row bag with one arm while stabilizing with other. Unilateral back and core engagement.'],
            ['name' => 'Bulgarian Bag Upright Row', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Traps', 'Deltoids', 'Biceps', 'Forearms', 'Core', 'Rhomboids'], 'description' => 'Pull bag to chin with narrow grip. Emphasizes traps and lateral delts.'],
            ['name' => 'Bulgarian Bag Windmill', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Core (Obliques)', 'Shoulders', 'Hamstrings', 'Glutes', 'Traps', 'Forearms', 'Hip Flexors'], 'description' => 'Bend sideways holding bag overhead. Rotational core and hip mobility exercise.'],
            ['name' => 'Bulgarian Bag Side Bend', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Quadratus Lumborum', 'Traps', 'Forearms', 'Hip Flexors'], 'description' => 'Hold bag on one shoulder. Bend sideways. Targets obliques and lateral core.'],
            ['name' => 'Bulgarian Bag Russian Twist', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Forearms', 'Biceps', 'Traps'], 'description' => 'Sit holding bag. Rotate torso side to side. Rotational core and shoulder engagement.'],
            ['name' => 'Bulgarian Bag Slam', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Triceps', 'Lats', 'Forearms', 'Glutes', 'Quadriceps'], 'description' => 'Lift bag overhead and slam to ground. Explosive full-body power and conditioning.'],
            ['name' => 'Bulgarian Bag Chopper (Diagonal Slam)', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Core (Obliques)', 'Shoulders', 'Lats', 'Forearms', 'Glutes', 'Triceps', 'Hip Rotators'], 'description' => 'Lift bag and chop diagonally to opposite side. Rotational power and core engagement.'],
            ['name' => 'Bulgarian Bag Hip Toss', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hip Flexors', 'Core', 'Shoulders', 'Forearms', 'Quadriceps', 'Hamstrings'], 'description' => 'Swing bag and toss from one hip to other. Rhythmic hip and core movement.'],
            ['name' => 'Bulgarian Bag Lunge with Rotation', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Obliques', 'Shoulders', 'Forearms', 'Stabilizers'], 'description' => 'Lunge forward while rotating bag across body. Combines lower body with rotational core work.'],
            ['name' => 'Bulgarian Bag Pullover', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Triceps', 'Chest', 'Core', 'Shoulders', 'Forearms'], 'description' => 'Hold bag overhead lying down. Lower bag behind head then pull over. Lat and core engagement.'],
            ['name' => 'Bulgarian Bag Curl', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Shoulders', 'Traps', 'Brachialis'], 'description' => 'Curl bag from lap to chest. Bicep curl with unstable load.'],
            ['name' => 'Bulgarian Bag Triceps Extension', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Shoulders', 'Core', 'Forearms', 'Lats', 'Chest'], 'description' => 'Hold bag behind head. Extend arms overhead. Triceps extension with unstable bag.'],
            ['name' => 'Bulgarian Bag Hip Swing (Side-to-Side)', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Obliques', 'Hip Flexors', 'Shoulders', 'Forearms', 'Glutes', 'Quadriceps'], 'description' => 'Swing bag side to side in front of body. Dynamic core and hip mobility work.'],
            ['name' => 'Bulgarian Bag Figure-8 Between Legs', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Hip Flexors', 'Glutes', 'Forearms', 'Shoulders', 'Traps', 'Quadriceps'], 'description' => 'Swing bag in figure-8 pattern between and around legs. Coordination and hip mobility.'],
            ['name' => 'Bulgarian Bag Shoulder Toss (Behind Neck)', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Traps', 'Core', 'Forearms', 'Lats', 'Triceps', 'Obliques'], 'description' => 'Toss bag from front to back over shoulder. Dynamic shoulder and core stability.'],
            ['name' => 'Bulgarian Bag Stepping Swing', 'equipment' => 'Bulgarian Bag', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Forearms', 'Calves', 'Hip Flexors'], 'description' => 'Step forward while swinging bag. Combines walking with rhythmic swinging motion.'],
        ];

        foreach ($execises as $data) {
            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categories[$data['category_slug']],
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
            ]);
        }
    }
}
