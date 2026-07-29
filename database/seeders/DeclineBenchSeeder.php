<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class DeclineBenchSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Decline Bench Barbell Bench Press', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Chest (Sternocostal Head)', 'Triceps', 'Anterior Deltoids', 'Core', 'Serratus Anterior'], 'description' => 'Lie on decline bench. Lower barbell to lower chest, press up. Emphasizes lower chest.'],
            ['name' => 'Decline Bench Dumbbell Bench Press', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Lie on decline. Press dumbbells from chest. Lower chest and stabilizer engagement.'],
            ['name' => 'Decline Bench Dumbbell Fly', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Chest', 'Triceps', 'Core', 'Anterior Deltoids', 'Serratus Anterior'], 'description' => 'Lie on decline. Fly dumbbells with slight elbow bend. Lower chest isolation.'],
            ['name' => 'Decline Bench Barbell Pullover', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Lower Chest', 'Triceps (Long Head)', 'Core', 'Serratus Anterior'], 'description' => 'Lie on decline. Extend barbell overhead, lower behind head. Pull back. Lower chest and lats.'],
            ['name' => 'Decline Bench Dumbbell Pullover', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Lower Chest', 'Triceps (Long Head)', 'Core', 'Serratus Anterior'], 'description' => 'Decline dumbbell pullover. Stretch lats and lower chest.'],
            ['name' => 'Decline Bench Dumbbell Skull Crusher', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Triceps (Long Head)', 'Shoulders', 'Core', 'Forearms', 'Lats'], 'description' => 'Lie on decline. Extend dumbbells overhead, lower to forehead. Long head triceps.'],
            ['name' => 'Decline Bench Barbell Skull Crusher', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Triceps (Long Head)', 'Shoulders', 'Core', 'Forearms', 'Chest'], 'description' => 'Decline EZ bar skull crusher. Triceps extension with long head emphasis.'],
            ['name' => 'Decline Bench Dumbbell Triceps Extension (Behind Head)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Triceps (Long Head)', 'Shoulders', 'Core', 'Forearms', 'Lats'], 'description' => 'Decline position. Extend dumbbell behind head. Long head triceps isolation.'],
            ['name' => 'Decline Bench Dumbbell Row (Face Down)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Rear Deltoids', 'Traps'], 'description' => 'Lie face down on decline. Row dumbbells. Back work at downward angle.'],
            ['name' => 'Decline Bench Dumbbell Rear Delt Fly (Face Down)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Traps', 'Core', 'Rotator Cuff'], 'description' => 'Lie face down on decline. Fly dumbbells backward. Rear delt isolation.'],
            ['name' => 'Decline Bench Dumbbell Lateral Raise (Side Lean)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Traps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Lean sideways on decline. Raise dumbbell laterally. Lateral delt at angle.'],
            ['name' => 'Decline Bench Dumbbell Bicep Curl (Seated)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Biceps (Short Head)', 'Forearms', 'Core', 'Brachialis', 'Shoulders'], 'description' => 'Sit on decline. Curl dumbbells. Short head biceps emphasis.'],
            ['name' => 'Decline Bench Dumbbell Hammer Curl (Seated)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Brachialis', 'Brachioradialis', 'Forearms', 'Biceps', 'Core'], 'description' => 'Sit on decline. Neutral grip curl. Forearm and brachialis.'],
            ['name' => 'Decline Bench Dumbbell Shoulder Press', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Traps', 'Forearms'], 'description' => 'Sit on decline. Press dumbbells overhead. Shoulder press with angle.'],
            ['name' => 'Decline Bench Dumbbell Arnold Press', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders (All Heads)', 'Triceps', 'Core', 'Forearms', 'Upper Chest'], 'description' => 'Sit on decline. Rotate wrists as you press. Rotational shoulder.'],
            ['name' => 'Decline Bench Dumbbell Front Raise', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Upper Chest', 'Core', 'Forearms', 'Traps'], 'description' => 'Sit on decline. Raise dumbbells to front. Anterior delt.'],
            ['name' => 'Decline Bench Dumbbell Lateral Raise (Seated)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Traps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Sit on decline. Raise dumbbells to sides. Lateral delt.'],
            ['name' => 'Decline Bench Hip Thrust (Upper Back on Bench)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'], 'description' => 'Upper back on decline. Bridge hips up. Glute-dominant hip extension.'],
            ['name' => 'Decline Bench Single-Leg Glute Bridge', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Extensors', 'Stabilizers'], 'description' => 'Single-leg glute bridge on decline. Unilateral glute and hamstring.'],
            ['name' => 'Decline Bench Bulgarian Split Squat (Rear Foot Elevated)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Stabilizers', 'Calves'], 'description' => 'Rear foot on decline. Single-leg squat. Unilateral leg strength.'],
            ['name' => 'Decline Bench Step-Up', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Step onto decline with one leg. Unilateral leg work at angle.'],
            ['name' => 'Decline Bench Lateral Step-Up', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Adductors', 'Quadriceps', 'Core', 'Stabilizers'], 'description' => 'Step up sideways onto decline. Hip abductors and adductors.'],
            ['name' => 'Decline Bench Dips (Triceps)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Anterior Deltoids', 'Core', 'Chest', 'Forearms'], 'description' => 'Hands on decline, feet on floor. Lower hips, press up. Triceps bodyweight.'],
            ['name' => 'Decline Bench Push-Up (Hands on Bench)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Stabilizers'], 'description' => 'Hands on decline, feet on floor. Push-up with elevated upper body.'],
            ['name' => 'Decline Bench Plank (Hands on Bench)', 'equipment' => 'Decline Bench', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Shoulders', 'Chest', 'Triceps', 'Glutes', 'Stabilizers'], 'description' => 'Hands on decline. Hold plank. Elevated plank variation.'],
            ['name' => 'Decline Bench Bodyweight Squat (Box Squat)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Squat down until glutes touch decline, then stand. Box squat at angle.'],
            ['name' => 'Decline Bench Hamstring Curl (Feet on Bench)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Calves'], 'description' => 'Lie on floor, feet on decline. Bridge hips, curl heels toward glutes.'],
            ['name' => 'Decline Bench Single-Leg Hamstring Curl', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Stabilizers'], 'description' => 'Single-leg hamstring curl on decline. Unilateral hamstring.'],
            ['name' => 'Decline Bench Dumbbell Reverse Fly (Prone)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Traps', 'Core', 'Rotator Cuff'], 'description' => 'Lie face down on decline. Raise dumbbells to sides. Rear delt.'],
            ['name' => 'Decline Bench Dumbbell Y-Raise (Prone)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Traps', 'Rhomboids', 'Rear Deltoids', 'Core', 'Stabilizers'], 'description' => 'Lie face down on decline. Raise dumbbells into Y-shape. Lower traps.'],
            ['name' => 'Decline Bench Dumbbell T-Raise (Prone)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rhomboids', 'Middle Traps', 'Rear Deltoids', 'Core', 'Stabilizers'], 'description' => 'Lie face down on decline. Raise dumbbells into T-shape. Mid-back.'],
            ['name' => 'Decline Bench Dumbbell Wrist Curl (Seated)', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Wrist Flexors', 'Grip Muscles'], 'description' => 'Sit on decline. Wrist curl dumbbell over knees. Forearm isolation.'],
            ['name' => 'Decline Bench Dumbbell Reverse Wrist Curl', 'equipment' => 'Decline Bench', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Extensors', 'Wrist Extensors', 'Brachioradialis'], 'description' => 'Sit on decline. Reverse wrist curl. Forearm extensor isolation.'],
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
