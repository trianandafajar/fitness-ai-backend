<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class AdjustableBenchSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Flat Bench Dumbbell Press', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Pectoralis Major)', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Set bench flat. Press dumbbells from chest to full extension. Lower with control.'],
            ['name' => 'Incline Bench Dumbbell Press (30-45°)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest (Clavicular Head)', 'Anterior Deltoids', 'Triceps', 'Core', 'Serratus Anterior'], 'description' => 'Set bench to incline (30-45°). Press dumbbells overhead. Emphasizes upper chest.'],
            ['name' => 'Decline Bench Dumbbell Press', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Chest (Sternocostal Head)', 'Triceps', 'Anterior Deltoids', 'Core', 'Serratus Anterior'], 'description' => 'Set bench to decline. Press dumbbells upward. Emphasizes lower chest.'],
            ['name' => 'Flat Bench Dumbbell Fly', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Pectoralis Major)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Set bench flat. Fly dumbbells with slight elbow bend. Squeeze chest at top.'],
            ['name' => 'Incline Bench Dumbbell Fly', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Set bench to incline. Fly dumbbells upward. Upper chest isolation.'],
            ['name' => 'Decline Bench Dumbbell Fly', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Chest', 'Triceps', 'Core', 'Anterior Deltoids', 'Serratus Anterior'], 'description' => 'Set bench to decline. Fly dumbbells downward. Lower chest isolation.'],
            ['name' => 'Flat Bench Dumbbell Row (Single-Arm)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Rear Deltoids'], 'description' => 'Set bench flat. One knee on bench, row dumbbell to hip. Unilateral back work.'],
            ['name' => 'Incline Bench Dumbbell Row (Chest Supported)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Traps', 'Rear Deltoids'], 'description' => 'Set bench to incline. Lie chest against pad. Row dumbbells to sides. Back isolation.'],
            ['name' => 'Flat Bench Dumbbell Pullover', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps (Long Head)', 'Core', 'Serratus Anterior', 'Rhomboids'], 'description' => 'Lie flat on bench. Extend dumbbell overhead and lower behind head. Pull back.'],
            ['name' => 'Incline Bench Dumbbell Pullover', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Core', 'Serratus Anterior', 'Rhomboids'], 'description' => 'Set bench to incline. Pullover variation with upper body angle.'],
            ['name' => 'Flat Bench Dumbbell Skull Crusher', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Shoulders', 'Core', 'Forearms', 'Lats', 'Chest'], 'description' => 'Lie flat. Extend dumbbells overhead, lower to forehead. Triceps isolation.'],
            ['name' => 'Incline Bench Dumbbell Skull Crusher', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Triceps (Long Head)', 'Shoulders', 'Core', 'Forearms', 'Lats'], 'description' => 'Set bench to incline. Skull crusher variation for triceps long head.'],
            ['name' => 'Flat Bench Dumbbell Lateral Raise (Leaning)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Traps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Lean sideways on bench. Raise dumbbell laterally. Lateral delt isolation.'],
            ['name' => 'Flat Bench Dumbbell Rear Delt Fly', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Traps', 'Core', 'Rotator Cuff'], 'description' => 'Lie face down on flat bench. Fly dumbbells backward. Rear delt isolation.'],
            ['name' => 'Incline Bench Dumbbell Rear Delt Fly', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Traps', 'Core', 'Rotator Cuff'], 'description' => 'Set bench to incline. Lie face down. Rear delt fly with different angle.'],
            ['name' => 'Flat Bench Dumbbell Bicep Curl (Seated)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Brachialis', 'Shoulders'], 'description' => 'Sit on bench. Curl dumbbells from sides to shoulders. Bicep isolation.'],
            ['name' => 'Incline Bench Dumbbell Curl', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Biceps (Long Head)', 'Forearms', 'Core', 'Brachialis', 'Shoulders'], 'description' => 'Set bench to incline. Curl dumbbells with arms behind body. Long head biceps.'],
            ['name' => 'Decline Bench Dumbbell Curl', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Biceps (Short Head)', 'Forearms', 'Core', 'Brachialis'], 'description' => 'Set bench to decline. Curl dumbbells. Short head biceps emphasis.'],
            ['name' => 'Flat Bench Dumbbell Triceps Extension (Overhead)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Triceps (Long Head)', 'Shoulders', 'Core', 'Forearms', 'Lats'], 'description' => 'Lie flat. Extend dumbbell behind head. Long head triceps isolation.'],
            ['name' => 'Incline Bench Dumbbell Triceps Extension', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Triceps (Long Head)', 'Shoulders', 'Core', 'Forearms', 'Lats'], 'description' => 'Set bench to incline. Triceps extension with upper body angle.'],
            ['name' => 'Flat Bench Dumbbell Shoulder Press (Seated)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Traps', 'Forearms'], 'description' => 'Sit on flat bench. Press dumbbells overhead. Shoulder press.'],
            ['name' => 'Incline Bench Dumbbell Shoulder Press', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Upper Chest', 'Triceps', 'Core', 'Traps', 'Forearms'], 'description' => 'Set bench to incline. Press dumbbells overhead. Upper chest and shoulder emphasis.'],
            ['name' => 'Flat Bench Dumbbell Arnold Press', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders (All Heads)', 'Triceps', 'Upper Chest', 'Core', 'Forearms'], 'description' => 'Sit on flat bench. Rotate wrists as you press overhead. Rotational shoulder development.'],
            ['name' => 'Flat Bench Dumbbell Lateral Raise (Seated)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Traps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Sit on bench. Raise dumbbells to sides. Lateral delt isolation.'],
            ['name' => 'Flat Bench Dumbbell Front Raise (Seated)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Upper Chest', 'Core', 'Forearms', 'Traps'], 'description' => 'Sit on bench. Raise dumbbells to front. Anterior delt isolation.'],
            ['name' => 'Flat Bench Dumbbell Reverse Fly (Face Down)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Traps', 'Core', 'Rotator Cuff'], 'description' => 'Lie face down on bench. Fly dumbbells backward. Rear delt isolation.'],
            ['name' => 'Bench Glute Bridge (Feet on Floor)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'], 'description' => 'Lie with upper back on bench. Bridge hips up. Squeeze glutes at top.'],
            ['name' => 'Bench Single-Leg Glute Bridge', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Extensors', 'Stabilizers'], 'description' => 'Single-leg glute bridge on bench. Unilateral glute and hamstring work.'],
            ['name' => 'Bench Bulgarian Split Squat (Rear Foot Elevated)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Stabilizers', 'Calves'], 'description' => 'Set bench height. Rear foot on bench. Single-leg squat. Unilateral leg strength.'],
            ['name' => 'Bench Step-Up', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Step onto bench with one leg. Drive up to full extension. Unilateral leg work.'],
            ['name' => 'Bench Lateral Step-Up', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Adductors', 'Quadriceps', 'Core', 'Stabilizers'], 'description' => 'Step up sideways onto bench. Targets hip abductors and adductors.'],
            ['name' => 'Bench Dips (Triceps)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Anterior Deltoids', 'Core', 'Chest', 'Forearms'], 'description' => 'Hands on bench, feet on floor. Lower hips, press up. Triceps bodyweight dip.'],
            ['name' => 'Bench Incline Push-Up', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Stabilizers'], 'description' => 'Hands on bench, feet on floor. Push-up with elevated upper body. Easier variation.'],
            ['name' => 'Bench Decline Push-Up', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest', 'Anterior Deltoids', 'Triceps', 'Core'], 'description' => 'Feet on bench, hands on floor. Push-up with elevated lower body. Upper chest emphasis.'],
            ['name' => 'Bench Plank (Hands or Feet)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Shoulders', 'Chest', 'Triceps', 'Glutes', 'Stabilizers'], 'description' => 'Hands or feet on bench. Hold plank position. Elevated plank variation.'],
            ['name' => 'Bench Side Plank (Forearm on Bench)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Glutes', 'Hip Abductors', 'Stabilizers'], 'description' => 'Side plank with forearm or hand on bench. Elevated oblique work.'],
            ['name' => 'Bench Bodyweight Squat', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Squat down until glutes touch bench, then stand. Box squat variation.'],
            ['name' => 'Bench Hip Thrust (Upper Back on Bench)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'], 'description' => 'Upper back on bench, feet on floor. Bridge hips up. Glute-dominant hip extension.'],
            ['name' => 'Bench Hamstring Curl (Feet on Bench)', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Calves'], 'description' => 'Lie on floor, feet on bench. Bridge hips up, curl heels toward glutes. Hamstring isolation.'],
            ['name' => 'Bench Single-Leg Hamstring Curl', 'equipment' => 'Adjustable Bench', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Stabilizers'], 'description' => 'Single-leg hamstring curl on bench. Unilateral hamstring work.'],
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
