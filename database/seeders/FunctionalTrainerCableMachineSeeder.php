<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FunctionalTrainerCableMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Cable Chest Fly (Standing)', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Pectoralis Major)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Stand between pulleys at chest height. Bring handles together in front. Squeeze chest at peak. Constant tension.'],
            ['name' => 'Cable Upper Chest Fly (Low to High)', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest (Clavicular Head)', 'Anterior Deltoids', 'Core', 'Serratus Anterior'], 'description' => 'Set pulleys low. Pull cables upward and inward. Emphasizes upper chest.'],
            ['name' => 'Cable Lower Chest Fly (High to Low)', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lower Chest (Sternocostal Head)', 'Triceps', 'Core', 'Anterior Deltoids'], 'description' => 'Set pulleys high. Pull cables downward and inward. Emphasizes lower chest.'],
            ['name' => 'Cable Crossover', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Full)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Stand in center, arms extended. Cross cables in front. Classic chest isolation.'],
            ['name' => 'Cable Single-Arm Fly', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Core', 'Obliques', 'Anterior Deltoids', 'Serratus Anterior'], 'description' => 'Single-arm cable fly. Corrects imbalances and challenges core stability.'],
            ['name' => 'Cable Rear Delt Fly (Face Pull)', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Upper Traps', 'Rotator Cuff', 'Core'], 'description' => 'Set pulleys at face height. Pull cables toward face with elbows high. Shoulder health.'],
            ['name' => 'Cable Rear Delt Fly (Reverse Crossover)', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Traps', 'Core', 'Rotator Cuff'], 'description' => 'Set pulleys high. Pull cables backward and apart. Rear delt and upper back.'],
            ['name' => 'Cable Single-Arm Face Pull', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Traps', 'Rotator Cuff', 'Core', 'Obliques'], 'description' => 'Single-arm face pull. Unilateral rear delt and shoulder health.'],
            ['name' => 'Cable Lat Pulldown (Wide Grip)', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Rear Deltoids', 'Forearms'], 'description' => 'Set pulley high. Wide grip pull-down. Emphasizes lat width.'],
            ['name' => 'Cable Lat Pulldown (Narrow Grip)', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Core', 'Rhomboids', 'Forearms', 'Brachialis'], 'description' => 'Set pulley high. Narrow grip pull-down. Emphasizes lower lats and biceps.'],
            ['name' => 'Cable Single-Arm Pulldown', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Core', 'Obliques', 'Rhomboids', 'Forearms'], 'description' => 'Single-arm lat pulldown. Unilateral back work and core anti-rotation.'],
            ['name' => 'Cable Standing Row (Seated Cable Row)', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Rear Deltoids', 'Traps'], 'description' => 'Set pulley low. Pull cable to abdomen. Row variation with constant tension.'],
            ['name' => 'Cable Single-Arm Row', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Traps'], 'description' => 'Single-arm cable row. Unilateral back development and core stability.'],
            ['name' => 'Cable Pull-Through (Glute)', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Set pulley low. Walk away, pull cable between legs. Hip hinge glute isolation.'],
            ['name' => 'Cable Squat', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Stabilizers'], 'description' => 'Hold cables at shoulders or chest. Perform squats. Constant tension.'],
            ['name' => 'Cable Overhead Press', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Traps', 'Forearms'], 'description' => 'Set pulleys low. Press cables overhead. Shoulder press with constant tension.'],
            ['name' => 'Cable Single-Arm Overhead Press', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Obliques', 'Traps', 'Upper Chest'], 'description' => 'Single-arm overhead press. Unilateral shoulder work and core anti-rotation.'],
            ['name' => 'Cable Lateral Raise', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Traps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Set pulley low. Raise cable to side. Lateral delt isolation.'],
            ['name' => 'Cable Single-Arm Lateral Raise', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Core', 'Obliques', 'Traps', 'Stabilizers'], 'description' => 'Single-arm lateral raise. Unilateral delt work.'],
            ['name' => 'Cable Front Raise', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Upper Chest', 'Core', 'Forearms', 'Traps'], 'description' => 'Set pulley low. Raise cable to front. Anterior delt isolation.'],
            ['name' => 'Cable Upright Row', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Traps', 'Deltoids', 'Biceps', 'Core', 'Forearms', 'Rhomboids'], 'description' => 'Set pulley low. Pull cable to chin. Trap and delt emphasis.'],
            ['name' => 'Cable Bicep Curl', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Brachialis', 'Shoulders'], 'description' => 'Set pulley low. Curl cable upward. Constant tension bicep curl.'],
            ['name' => 'Cable Single-Arm Bicep Curl', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Brachialis', 'Stabilizers'], 'description' => 'Single-arm cable curl. Unilateral bicep development.'],
            ['name' => 'Cable Hammer Curl', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Brachialis', 'Brachioradialis', 'Forearms', 'Biceps', 'Core'], 'description' => 'Set pulley low. Neutral grip curl. Forearm and brachialis emphasis.'],
            ['name' => 'Cable Triceps Pushdown', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Forearms', 'Core', 'Shoulders', 'Chest'], 'description' => 'Set pulley high. Push cable downward. Triceps isolation.'],
            ['name' => 'Cable Triceps Extension (Overhead)', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Triceps (Long Head)', 'Shoulders', 'Core', 'Forearms', 'Lats'], 'description' => 'Set pulley low. Extend cable overhead behind head. Long head triceps.'],
            ['name' => 'Cable Single-Arm Triceps Pushdown', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Core', 'Obliques', 'Forearms', 'Stabilizers'], 'description' => 'Single-arm pushdown. Unilateral triceps work.'],
            ['name' => 'Cable Woodchopper (Diagonal Chop)', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Lats', 'Forearms', 'Glutes', 'Hip Rotators'], 'description' => 'Set pulley high or low. Chop cable diagonally. Rotational core power.'],
            ['name' => 'Cable Reverse Woodchopper', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Lats', 'Forearms', 'Hip Rotators'], 'description' => 'Reverse direction woodchopper. Balances rotational development.'],
            ['name' => 'Cable Russian Twist', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Forearms'], 'description' => 'Sit or stand. Rotate cable across body. Rotational core work.'],
            ['name' => 'Cable Pallof Press', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'core', 'target_muscles' => ['Core (Transversus Abdominis, Obliques)', 'Shoulders', 'Stabilizers'], 'description' => 'Stand perpendicular to pulley. Press cable forward and hold. Anti-rotation core.'],
            ['name' => 'Cable Pallof Press with Rotation', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Rotators', 'Stabilizers'], 'description' => 'Press cable forward and rotate away. Dynamic anti-rotation.'],
            ['name' => 'Cable Hip Adduction', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Core', 'Hip Flexors', 'Pelvic Floor'], 'description' => 'Attach ankle strap. Pull cable inward. Adductor isolation.'],
            ['name' => 'Cable Hip Abduction', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Attach ankle strap. Pull cable outward. Glute medius isolation.'],
            ['name' => 'Cable Glute Kickback', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core', 'Hip Extensors'], 'description' => 'Attach ankle strap. Kick cable backward. Glute isolation.'],
            ['name' => 'Cable Hamstring Curl (Standing)', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Core', 'Calves', 'Glutes', 'Hip Extensors'], 'description' => 'Attach ankle strap. Curl heel toward glutes. Hamstring isolation.'],
            ['name' => 'Cable Leg Raise (Standing)', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Hip Flexors', 'Core', 'Quadriceps', 'Iliopsoas'], 'description' => 'Attach ankle strap. Raise leg forward. Hip flexor isolation.'],
            ['name' => 'Cable Crossover Lunge', 'equipment' => 'Functional Trainer Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Stabilizers'], 'description' => 'Lunge while pulling cables across body. Combines lower with rotational core.'],
        ];

        $sourceDir = public_path('execises/functional-trainer-cable-machine');
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
