<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class ParallettesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Parallette Push-Up', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core'], 'description' => 'Push-up on parallettes with full range of motion. Lower chest below hand level for deeper stretch.'],
            ['name' => 'Parallette L-Sit', 'equipment' => 'Parallettes', 'category_slug' => 'core', 'target_muscles' => ['Core (Rectus Abdominis', 'Hip Flexors)', 'Triceps', 'Shoulders'], 'description' => 'Support hold with legs extended straight out in L-position. Depress shoulders and engage core.'],
            ['name' => 'Parallette V-Sit', 'equipment' => 'Parallettes', 'category_slug' => 'core', 'target_muscles' => ['Core (Entire)', 'Hip Flexors', 'Triceps', 'Shoulders', 'Hamstrings'], 'description' => 'Lift legs and torso into a V-shape (45-60°). Requires extreme core and hamstring flexibility.'],
            ['name' => 'Parallette Tuck Planche', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Chest', 'Triceps', 'Core', 'Hip Flexors'], 'description' => 'Lean forward with knees tucked to chest, body horizontal. Hands positioned near hips. Beginner planche progression.'],
            ['name' => 'Parallette Advanced Tuck Planche', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Chest', 'Core', 'Hip Flexors', 'Triceps'], 'description' => 'Tuck planche with knees pulled closer to shoulders, extending the back horizontally. More challenging.'],
            ['name' => 'Parallette Straddle Planche', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Chest', 'Core', 'Adductors', 'Triceps'], 'description' => 'Full planche with legs straddled wide. Reduces leverage compared to full planche. Advanced.'],
            ['name' => 'Parallette Full Planche', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Chest', 'Core', 'Glutes', 'Triceps', 'Lats'], 'description' => 'Body completely horizontal with straight legs, supported only by hands. Elite-level strength hold.'],
            ['name' => 'Parallette Planche Lean', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Chest', 'Core', 'Triceps', 'Lats'], 'description' => 'Lean forward from push-up position until shoulders pass hands. Builds planche strength progressively.'],
            ['name' => 'Parallette Handstand Push-Up', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core'], 'description' => 'Kick to handstand on parallettes. Lower head below hand level, then press up. Requires balance and power.'],
            ['name' => 'Parallette Handstand Hold', 'equipment' => 'Parallettes', 'category_slug' => 'core', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Hold vertical handstand on parallettes. Engages full body for balance and stability.'],
            ['name' => 'Parallette Pike Push-Up', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core'], 'description' => 'Pike position with hips high. Lower head between hands, push up. Emphasizes deltoids and triceps.'],
            ['name' => 'Parallette Dive Bomber Push-Up (Hindu Push-Up)', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Shoulders', 'Triceps', 'Core', 'Lats'], 'description' => 'Start pike, dip chest down and forward into upward dog, then reverse. Full range push-up variation.'],
            ['name' => 'Parallette Tiger Bend (Hollowback Press)', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Shoulders', 'Core', 'Triceps', 'Forearms'], 'description' => 'From push-up position, lean forward and lower to forearm-stand, then press back up. Extreme bicep and shoulder strength.'],
            ['name' => 'Parallette Crunch (Knee Tuck)', 'equipment' => 'Parallettes', 'category_slug' => 'core', 'target_muscles' => ['Core (Lower Abs)', 'Hip Flexors', 'Shoulders'], 'description' => 'Support hold with straight arms. Tuck knees to chest dynamically, then extend. Continuous core movement.'],
            ['name' => 'Parallette V-Up', 'equipment' => 'Parallettes', 'category_slug' => 'core', 'target_muscles' => ['Core (Rectus Abdominis', 'Obliques)', 'Hip Flexors', 'Shoulders'], 'description' => 'Support hold. Raise straight legs and torso simultaneously to form a V, then lower with control.'],
            ['name' => 'Parallette Hanging Leg Raise', 'equipment' => 'Parallettes', 'category_slug' => 'core', 'target_muscles' => ['Core (Lower Abs)', 'Hip Flexors', 'Lats'], 'description' => 'Support hold. Raise straight legs to 90° or higher while maintaining locked arms. Strict form.'],
            ['name' => 'Parallette Windshield Wiper', 'equipment' => 'Parallettes', 'category_slug' => 'core', 'target_muscles' => ['Core (Obliques)', 'Hip Flexors', 'Shoulders'], 'description' => 'L-sit position. Rotate legs side-to-side in windshield wiper motion. Advanced oblique and core control.'],
            ['name' => 'Parallette Jump Squat', 'equipment' => 'Parallettes', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Hold parallettes for balance. Squat down and explode upward into a jump. Great for power development.'],
            ['name' => 'Parallette Single-Leg Squat (Pistol Squat)', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Stabilizers'], 'description' => 'Hold parallettes for balance. Perform one-legged squat to full depth and press up. Unilateral leg strength.'],
            ['name' => 'Parallette Bulgarian Split Squat', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Rear foot elevated on parallettes. Perform lunge-style squat. Unilateral leg work with balance challenge.'],
            ['name' => 'Parallette Step-Up', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core'], 'description' => 'Step onto parallettes with one foot, drive up to standing, then step back down. Unilateral leg movement.'],
            ['name' => 'Parallette Triceps Extension (Bench Dip on Parallettes)', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Anterior Deltoids', 'Core'], 'description' => 'Support body with hands on parallettes and feet on floor. Lower hips between bars, push back up.'],
            ['name' => 'Parallette Decline Push-Up', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest', 'Anterior Deltoids', 'Triceps', 'Core'], 'description' => 'Feet elevated on parallettes, hands on floor. Performs push-up with greater upper chest emphasis.'],
            ['name' => 'Parallette Incline Push-Up', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Lower Chest', 'Triceps', 'Core'], 'description' => 'Hands elevated on parallettes, feet on floor. Easier push-up variation for beginners or volume work.'],
            ['name' => 'Parallette Spiderman Push-Up', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Hip Flexors', 'Adductors'], 'description' => 'Push-up while bringing one knee to the same-side elbow at the bottom. Engages core and hip mobility.'],
            ['name' => 'Parallette Archer Push-Up', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Shoulder Stabilizers'], 'description' => 'Push-up with one arm extended wide and the other doing the work. Shift weight to working side.'],
            ['name' => 'Parallette Pseudoplanche Push-Up', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Chest', 'Triceps', 'Core'], 'description' => 'Push-up with hands positioned near hips (lean forward). Emulates planche mechanics in a dynamic rep.'],
            ['name' => 'Parallette Handstand Walk (On Parallettes)', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Walk forward or backward in a handstand on parallettes. Requires extreme balance and upper body control.'],
            ['name' => 'Parallette Shoulder Tap', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'In push-up or handstand position, lift one hand to tap opposite shoulder. Challenges balance and stability.'],
            ['name' => 'Parallette Hip Lift (Glute Bridge)', 'equipment' => 'Parallettes', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Lower Back'], 'description' => 'Lie with upper back on parallettes, feet on floor. Lift hips to full extension, squeeze glutes, lower.'],
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
