<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FlatBenchSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Flat Bench Barbell Bench Press', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Pectoralis Major)', 'Triceps', 'Anterior Deltoids', 'Core', 'Serratus Anterior'], 'description' => 'Lie flat on bench. Lower barbell to chest, press up. Compound chest press.'],
            ['name' => 'Flat Bench Dumbbell Bench Press', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Lie flat. Press dumbbells from chest to full extension. Greater ROM and stabilizer engagement.'],
            ['name' => 'Flat Bench Dumbbell Fly', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Pectoralis Major)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Lie flat. Fly dumbbells with slight elbow bend. Squeeze chest at peak.'],
            ['name' => 'Flat Bench Barbell Pullover', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps (Long Head)', 'Core', 'Serratus Anterior', 'Rhomboids'], 'description' => 'Lie flat. Extend barbell overhead and lower behind head. Pull back to start.'],
            ['name' => 'Flat Bench Dumbbell Pullover', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps (Long Head)', 'Core', 'Serratus Anterior', 'Rhomboids'], 'description' => 'Lie flat. Dumbbell pullover variation. Stretch lats and chest.'],
            ['name' => 'Flat Bench Dumbbell Skull Crusher', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Shoulders', 'Core', 'Forearms', 'Lats', 'Chest'], 'description' => 'Lie flat. Extend dumbbells overhead, lower to forehead. Triceps isolation.'],
            ['name' => 'Flat Bench Barbell Skull Crusher (EZ Bar)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Shoulders', 'Core', 'Forearms', 'Chest'], 'description' => 'Lie flat. EZ bar skull crusher. Triceps extension with wrist-friendly grip.'],
            ['name' => 'Flat Bench Dumbbell Triceps Extension (Overhead)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Triceps (Long Head)', 'Shoulders', 'Core', 'Forearms', 'Lats'], 'description' => 'Lie flat. Extend dumbbell behind head. Long head triceps isolation.'],
            ['name' => 'Flat Bench Dumbbell Row (Single-Arm)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Rear Deltoids'], 'description' => 'One knee on bench. Row dumbbell to hip. Unilateral back work.'],
            ['name' => 'Flat Bench Dumbbell Row (Both Arms)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Traps', 'Rear Deltoids'], 'description' => 'Knees on bench, row both dumbbells simultaneously. Bilateral back work.'],
            ['name' => 'Flat Bench Dumbbell Lateral Raise (Leaning)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Traps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Lean sideways on bench. Raise dumbbell laterally. Lateral delt isolation.'],
            ['name' => 'Flat Bench Dumbbell Rear Delt Fly (Face Down)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Traps', 'Core', 'Rotator Cuff'], 'description' => 'Lie face down on bench. Fly dumbbells backward. Rear delt isolation.'],
            ['name' => 'Flat Bench Dumbbell Bicep Curl (Seated)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Brachialis', 'Shoulders'], 'description' => 'Sit on bench. Curl dumbbells from sides to shoulders. Bicep isolation.'],
            ['name' => 'Flat Bench Dumbbell Hammer Curl (Seated)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Brachialis', 'Brachioradialis', 'Forearms', 'Biceps', 'Core'], 'description' => 'Sit on bench. Neutral grip curl. Forearm and brachialis emphasis.'],
            ['name' => 'Flat Bench Dumbbell Concentration Curl', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Brachialis', 'Stabilizers'], 'description' => 'Sit on bench. Curl dumbbell across body. Peak bicep contraction.'],
            ['name' => 'Flat Bench Dumbbell Shoulder Press (Seated)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Traps', 'Forearms'], 'description' => 'Sit on bench. Press dumbbells overhead. Shoulder press.'],
            ['name' => 'Flat Bench Dumbbell Arnold Press', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders (All Heads)', 'Triceps', 'Upper Chest', 'Core', 'Forearms'], 'description' => 'Sit on bench. Rotate wrists as you press overhead. Rotational shoulder.'],
            ['name' => 'Flat Bench Dumbbell Lateral Raise (Seated)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Traps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Sit on bench. Raise dumbbells to sides. Lateral delt isolation.'],
            ['name' => 'Flat Bench Dumbbell Front Raise (Seated)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Upper Chest', 'Core', 'Forearms', 'Traps'], 'description' => 'Sit on bench. Raise dumbbells to front. Anterior delt isolation.'],
            ['name' => 'Flat Bench Hip Thrust (Upper Back on Bench)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'], 'description' => 'Upper back on bench, feet on floor. Bridge hips up. Glute-dominant hip extension.'],
            ['name' => 'Flat Bench Single-Leg Glute Bridge', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Extensors', 'Stabilizers'], 'description' => 'Single-leg glute bridge on bench. Unilateral glute and hamstring.'],
            ['name' => 'Flat Bench Bulgarian Split Squat (Rear Foot Elevated)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Stabilizers', 'Calves'], 'description' => 'Rear foot on bench. Single-leg squat. Unilateral leg strength.'],
            ['name' => 'Flat Bench Step-Up', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Step onto bench with one leg. Drive up. Unilateral leg work.'],
            ['name' => 'Flat Bench Lateral Step-Up', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Adductors', 'Quadriceps', 'Core', 'Stabilizers'], 'description' => 'Step up sideways onto bench. Hip abductors and adductors.'],
            ['name' => 'Flat Bench Dips (Triceps)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Anterior Deltoids', 'Core', 'Chest', 'Forearms'], 'description' => 'Hands on bench, feet on floor. Lower hips, press up. Triceps bodyweight.'],
            ['name' => 'Flat Bench Incline Push-Up (Hands on Bench)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Stabilizers'], 'description' => 'Hands on bench, feet on floor. Push-up with elevated upper body.'],
            ['name' => 'Flat Bench Decline Push-Up (Feet on Bench)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest', 'Anterior Deltoids', 'Triceps', 'Core'], 'description' => 'Feet on bench, hands on floor. Push-up with elevated lower body.'],
            ['name' => 'Flat Bench Plank (Hands or Feet)', 'equipment' => 'Flat Bench', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Shoulders', 'Chest', 'Triceps', 'Glutes', 'Stabilizers'], 'description' => 'Hands or feet on bench. Hold plank. Elevated plank variation.'],
            ['name' => 'Flat Bench Side Plank (Forearm on Bench)', 'equipment' => 'Flat Bench', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Glutes', 'Hip Abductors', 'Stabilizers'], 'description' => 'Side plank with forearm or hand on bench. Elevated oblique work.'],
            ['name' => 'Flat Bench Bodyweight Squat (Box Squat)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Squat down until glutes touch bench, then stand. Box squat.'],
            ['name' => 'Flat Bench Bodyweight Lunge (Foot on Bench)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Rear foot on bench. Single-leg lunge. Bulgarian split squat.'],
            ['name' => 'Flat Bench Hamstring Curl (Feet on Bench)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Calves'], 'description' => 'Lie on floor, feet on bench. Bridge hips, curl heels toward glutes.'],
            ['name' => 'Flat Bench Single-Leg Hamstring Curl', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Stabilizers'], 'description' => 'Single-leg hamstring curl on bench. Unilateral hamstring.'],
            ['name' => 'Flat Bench Dumbbell Wrist Curl (Seated)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Wrist Flexors', 'Grip Muscles', 'Forearm Extensors'], 'description' => 'Sit on bench. Wrist curl dumbbell over knees. Forearm isolation.'],
            ['name' => 'Flat Bench Dumbbell Reverse Wrist Curl', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Extensors', 'Wrist Extensors', 'Brachioradialis', 'Grip Muscles'], 'description' => 'Sit on bench. Reverse wrist curl. Forearm extensor isolation.'],
            ['name' => 'Flat Bench Seal Row (Face Down)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps'], 'description' => 'Lie face down on bench. Row dumbbells to sides. Back isolation.'],
            ['name' => 'Flat Bench Dumbbell Reverse Fly (Prone)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Traps', 'Core', 'Rotator Cuff'], 'description' => 'Lie face down on bench. Raise dumbbells to sides. Rear delt and upper back.'],
            ['name' => 'Flat Bench Dumbbell Y-Raise (Prone)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Lower Traps', 'Rhomboids', 'Rear Deltoids', 'Core', 'Stabilizers'], 'description' => 'Lie face down. Raise dumbbells into Y-shape. Lower trap emphasis.'],
            ['name' => 'Flat Bench Dumbbell T-Raise (Prone)', 'equipment' => 'Flat Bench', 'category_slug' => 'strength', 'target_muscles' => ['Rhomboids', 'Middle Traps', 'Rear Deltoids', 'Core', 'Stabilizers'], 'description' => 'Lie face down. Raise dumbbells into T-shape. Mid-back emphasis.'],
        ];

        $sourceDir = public_path('execises/flat-bench');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($exercises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $imagePath = Storage::disk('public')->putFile('exercises', new File($sourceFile));
                $data['image'] = $imagePath;
            }

            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);

            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categoryId,
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
                'image' => $data['image'] ?? null,
            ]);
        }
    }
}
