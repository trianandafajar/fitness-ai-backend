<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class SitUpBenchSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Sit-Up Bench Standard Sit-Up', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core', 'Obliques', 'Iliopsoas'], 'description' => 'Anchor feet, lie back. Curl up to sitting. Lower with control. Basic core exercise.'],
            ['name' => 'Sit-Up Bench Decline Sit-Up', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis (Upper)', 'Hip Flexors', 'Core', 'Obliques', 'Iliopsoas'], 'description' => 'Set bench to decline angle. Sit-ups with gravity resistance. Increased difficulty.'],
            ['name' => 'Sit-Up Bench Weighted Sit-Up', 'equipment' => 'Sit-up Bench, Weight Plate/Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core', 'Obliques', 'Iliopsoas'], 'description' => 'Hold weight on chest or behind head. Added resistance for core strength.'],
            ['name' => 'Sit-Up Bench Crunch', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis (Upper)', 'Core', 'Obliques', 'Hip Flexors'], 'description' => 'Partial sit-up. Curl only upper back off bench. Emphasizes upper abs.'],
            ['name' => 'Sit-Up Bench Weighted Crunch', 'equipment' => 'Sit-up Bench, Weight Plate/Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis (Upper)', 'Core', 'Obliques', 'Hip Flexors'], 'description' => 'Hold weight on chest. Partial crunch. Increased upper ab resistance.'],
            ['name' => 'Sit-Up Bench Decline Crunch', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis (Upper)', 'Core', 'Obliques', 'Hip Flexors'], 'description' => 'Decline position. Partial crunch with gravity resistance.'],
            ['name' => 'Sit-Up Bench Decline Weighted Crunch', 'equipment' => 'Sit-up Bench, Weight Plate/Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Core', 'Obliques', 'Hip Flexors'], 'description' => 'Decline crunch with added weight. Advanced upper ab development.'],
            ['name' => 'Sit-Up Bench Reverse Crunch', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Rectus Abdominis', 'Hip Flexors', 'Core', 'Iliopsoas'], 'description' => 'Knees to chest. Curl pelvis off bench. Lower ab emphasis.'],
            ['name' => 'Sit-Up Bench Weighted Reverse Crunch', 'equipment' => 'Sit-up Bench, Ankle Weight/Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas'], 'description' => 'Hold weight between feet or ankles. Added lower ab resistance.'],
            ['name' => 'Sit-Up Bench Leg Raise', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps', 'Iliopsoas'], 'description' => 'Lie on bench. Raise straight legs to 90°. Lower with control. Lower core.'],
            ['name' => 'Sit-Up Bench Weighted Leg Raise', 'equipment' => 'Sit-up Bench, Ankle Weight', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps', 'Iliopsoas'], 'description' => 'Ankle weights during leg raise. Increased lower ab resistance.'],
            ['name' => 'Sit-Up Bench Hanging Knee Raise', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas', 'Rectus Abdominis'], 'description' => 'Hold bench supports. Raise knees to chest. Lower ab and hip flexor.'],
            ['name' => 'Sit-Up Bench Straight Leg Sit-Up', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core', 'Obliques', 'Iliopsoas'], 'description' => 'Legs straight on bench. Sit-up with straight legs. Increased hip flexor.'],
            ['name' => 'Sit-Up Bench Decline Straight Leg Sit-Up', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core', 'Iliopsoas', 'Obliques'], 'description' => 'Decline with straight legs. Full sit-up with gravity resistance.'],
            ['name' => 'Sit-Up Bench Oblique Crunch (Twisting)', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Core', 'Hip Flexors', 'Iliopsoas'], 'description' => 'Crunch with rotation to one side. Oblique emphasis.'],
            ['name' => 'Sit-Up Bench Alternating Oblique Crunch', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Core', 'Hip Flexors'], 'description' => 'Alternate twisting to left and right. Rotational core work.'],
            ['name' => 'Sit-Up Bench Bicycle Crunch', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Hip Flexors', 'Core', 'Quadriceps'], 'description' => 'Sit-up position. Alternate elbow to opposite knee. Dynamic oblique.'],
            ['name' => 'Sit-Up Bench Russian Twist', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Rectus Abdominis'], 'description' => 'Sit on bench. Lean back, rotate side to side. Rotational core.'],
            ['name' => 'Sit-Up Bench Weighted Russian Twist', 'equipment' => 'Sit-up Bench, Weight Plate/Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Rectus Abdominis'], 'description' => 'Hold weight during Russian twist. Added rotational core resistance.'],
            ['name' => 'Sit-Up Bench V-Up', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core', 'Shoulders', 'Quadriceps'], 'description' => 'Simultaneously raise legs and torso to V-shape. Full core.'],
            ['name' => 'Sit-Up Bench Jackknife', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core', 'Shoulders', 'Hamstrings'], 'description' => 'Legs straight. Raise legs and torso together. V-up variation.'],
            ['name' => 'Sit-Up Bench Isometric Hold (Plank on Bench)', 'equipment' => 'Sit-up Bench', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Shoulders', 'Chest', 'Triceps', 'Glutes', 'Stabilizers'], 'description' => 'Elbows or hands on bench. Hold plank position. Core stability.'],
            ['name' => 'Sit-Up Bench Side Plank', 'equipment' => 'Sit-up Bench', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Glutes', 'Hip Abductors', 'Stabilizers'], 'description' => 'Side plank on bench. Oblique isometric stability.'],
            ['name' => 'Sit-Up Bench Flutter Kick', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Quadriceps', 'Core', 'Iliopsoas'], 'description' => 'Lie on bench. Alternating small kicks. Lower ab endurance.'],
            ['name' => 'Sit-Up Bench Scissor Kick', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Quadriceps', 'Core', 'Adductors'], 'description' => 'Alternate crossing legs. Lower ab and hip flexor.'],
            ['name' => 'Sit-Up Bench Reverse Crunch with Hip Lift', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas', 'Rectus Abdominis'], 'description' => 'Raise hips off bench, curl knees to chest. Advanced lower ab.'],
            ['name' => 'Sit-Up Bench Seated Knee Tuck', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas', 'Rectus Abdominis'], 'description' => 'Sit on bench. Lean back, tuck knees to chest. Dynamic lower ab.'],
            ['name' => 'Sit-Up Bench Decline Russian Twist', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Rectus Abdominis'], 'description' => 'Decline position. Russian twist with gravity resistance.'],
            ['name' => 'Sit-Up Bench Pike (Jackknife Variation)', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Hip Flexors', 'Hamstrings', 'Rectus Abdominis'], 'description' => 'Feet on bench, hands on floor. Pike hips up. Core and shoulder.'],
            ['name' => 'Sit-Up Bench Isometric Hollow Hold', 'equipment' => 'Sit-up Bench', 'category_slug' => 'core', 'target_muscles' => ['Core (Rectus Abdominis, Transversus)', 'Hip Flexors', 'Shoulders'], 'description' => 'Hold hollow body position on bench. Core endurance.'],
            ['name' => 'Sit-Up Bench Toes-to-Bar (Modified)', 'equipment' => 'Sit-up Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Lats', 'Obliques'], 'description' => 'Hold supports. Lift toes to bench top. Advanced core.'],
        ];

        foreach ($exercises as $data) {
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
