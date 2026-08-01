<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class WristWrapsSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Wrist Wraps Bench Press', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Wrist Stabilizers', 'Forearms'], 'description' => 'Wear wrist wraps tightly. Perform bench press. Wraps support wrists during heavy pressing.'],
            ['name' => 'Wrist Wraps Overhead Press', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Upper Chest', 'Traps', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform overhead press. Wraps provide wrist stability during heavy pressing.'],
            ['name' => 'Wrist Wraps Push Press', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Forearms', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform push press. Wraps support wrists during explosive pressing.'],
            ['name' => 'Wrist Wraps Jerk', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Calves', 'Traps', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform jerks. Wraps support wrists during overhead lockout.'],
            ['name' => 'Wrist Wraps Clean and Press', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Glutes', 'Hamstrings', 'Quadriceps', 'Forearms', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform clean and press. Wraps provide wrist support through both movements.'],
            ['name' => 'Wrist Wraps Push-Ups', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Wrist Stabilizers', 'Forearms'], 'description' => 'Wear wrist wraps. Perform push-ups. Wraps support painful or weak wrists during pressing.'],
            ['name' => 'Wrist Wraps Dips', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Wrist Stabilizers', 'Forearms'], 'description' => 'Wear wrist wraps. Perform dips. Wraps support wrists during heavy dip pressing.'],
            ['name' => 'Wrist Wraps Handstand Push-Up', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Upper Chest', 'Wrist Stabilizers', 'Forearms'], 'description' => 'Wear wrist wraps. Perform handstand push-ups. Wraps support wrists in inverted pressing.'],
            ['name' => 'Wrist Wraps Handstand Hold', 'equipment' => 'Wrist Wraps', 'category_slug' => 'core', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Wrist Stabilizers', 'Forearms', 'Stabilizers'], 'description' => 'Wear wrist wraps. Hold handstand. Wraps support wrists during extended inverted holds.'],
            ['name' => 'Wrist Wraps Ring Dip', 'equipment' => 'Wrist Wraps, Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Biceps', 'Shoulder Stabilizers', 'Wrist Stabilizers', 'Forearms'], 'description' => 'Wear wrist wraps. Perform ring dips. Wraps provide wrist support on unstable rings.'],
            ['name' => 'Wrist Wraps Ring Push-Up', 'equipment' => 'Wrist Wraps, Gymnastic Rings', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Shoulders', 'Stabilizers', 'Wrist Stabilizers', 'Forearms'], 'description' => 'Wear wrist wraps. Perform ring push-ups. Wraps support wrists on unstable ring surface.'],
            ['name' => 'Wrist Wraps Muscle-Up', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Biceps', 'Core', 'Shoulders', 'Forearms', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform muscle-ups. Wraps support wrists during transition and pressing.'],
            ['name' => 'Wrist Wraps Planche Hold', 'equipment' => 'Wrist Wraps', 'category_slug' => 'core', 'target_muscles' => ['Shoulders', 'Chest', 'Core', 'Triceps', 'Biceps', 'Hip Flexors', 'Wrist Stabilizers', 'Forearms'], 'description' => 'Wear wrist wraps. Hold planche. Wraps support wrists during extreme shoulder lean.'],
            ['name' => 'Wrist Wraps Planche Lean', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Chest', 'Core', 'Triceps', 'Lats', 'Forearms', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform planche leans. Wraps protect wrists during forward lean.'],
            ['name' => 'Wrist Wraps L-Sit (On Bars/Floor)', 'equipment' => 'Wrist Wraps', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Hip Flexors', 'Triceps', 'Shoulders', 'Quads', 'Wrist Stabilizers', 'Forearms'], 'description' => 'Wear wrist wraps. Hold L-sit. Wraps support wrists during extended support holds.'],
            ['name' => 'Wrist Wraps V-Sit', 'equipment' => 'Wrist Wraps', 'category_slug' => 'core', 'target_muscles' => ['Core (Entire)', 'Hip Flexors', 'Triceps', 'Shoulders', 'Hamstrings', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Hold V-sit. Wraps support wrists during advanced core holds.'],
            ['name' => 'Wrist Wraps Parallette L-Sit', 'equipment' => 'Wrist Wraps, Parallettes', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Hip Flexors', 'Triceps', 'Shoulders', 'Wrist Stabilizers', 'Forearms'], 'description' => 'Wear wrist wraps. Hold L-sit on parallettes. Wraps support wrists on elevated surface.'],
            ['name' => 'Wrist Wraps Parallette Planche', 'equipment' => 'Wrist Wraps, Parallettes', 'category_slug' => 'core', 'target_muscles' => ['Shoulders', 'Chest', 'Core', 'Triceps', 'Biceps', 'Hip Flexors', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Hold planche on parallettes. Wraps support wrists on parallel bars.'],
            ['name' => 'Wrist Wraps Dumbbell Bench Press', 'equipment' => 'Wrist Wraps, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Wrist Stabilizers', 'Forearms'], 'description' => 'Wear wrist wraps. Perform dumbbell bench press. Wraps support wrists with heavy DBs.'],
            ['name' => 'Wrist Wraps Dumbbell Overhead Press', 'equipment' => 'Wrist Wraps, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Upper Chest', 'Forearms', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform DB overhead press. Wraps stabilize wrists with heavy dumbbells.'],
            ['name' => 'Wrist Wraps Dumbbell Fly', 'equipment' => 'Wrist Wraps, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Pecs)', 'Anterior Deltoids', 'Core', 'Wrist Stabilizers', 'Forearms'], 'description' => 'Wear wrist wraps. Perform dumbbell fly. Wraps support wrists in stretched chest position.'],
            ['name' => 'Wrist Wraps Dumbbell Lateral Raise', 'equipment' => 'Wrist Wraps, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Lateral Deltoids', 'Traps', 'Core', 'Forearms', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform lateral raises. Wraps support wrists during shoulder abduction.'],
            ['name' => 'Wrist Wraps Dumbbell Front Raise', 'equipment' => 'Wrist Wraps, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Upper Chest', 'Core', 'Forearms', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform front raises. Wraps support wrists during shoulder flexion.'],
            ['name' => 'Wrist Wraps Kettlebell Press', 'equipment' => 'Wrist Wraps, Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Traps', 'Forearms', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform kettlebell overhead press. Wraps support wrists with offset load.'],
            ['name' => 'Wrist Wraps Kettlebell Snatch', 'equipment' => 'Wrist Wraps, Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Triceps', 'Forearms', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform kettlebell snatch. Wraps support wrists during explosive overhead catch.'],
            ['name' => 'Wrist Wraps Kettlebell Clean', 'equipment' => 'Wrist Wraps, Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Biceps', 'Forearms', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform kettlebell clean. Wraps support wrists during rack position catch.'],
            ['name' => 'Wrist Wraps Kettlebell Jerk', 'equipment' => 'Wrist Wraps, Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Forearms', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform kettlebell jerk. Wraps support wrists during overhead lockout.'],
            ['name' => 'Wrist Wraps Barbell Curl', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Shoulders', 'Brachialis', 'Wrist Flexors'], 'description' => 'Wear wrist wraps. Perform barbell curls. Wraps support wrists during heavy curling.'],
            ['name' => 'Wrist Wraps EZ Bar Curl', 'equipment' => 'Wrist Wraps, EZ Bar', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Brachialis', 'Wrist Flexors', 'Stabilizers'], 'description' => 'Wear wrist wraps. Perform EZ bar curls. Wraps support wrists in angled grip.'],
            ['name' => 'Wrist Wraps Zottman Curl', 'equipment' => 'Wrist Wraps, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Brachialis', 'Brachioradialis', 'Core', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform Zottman curls. Wraps support wrists during rotation movement.'],
            ['name' => 'Wrist Wraps Triceps Pushdown', 'equipment' => 'Wrist Wraps, Cable', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Forearms', 'Core', 'Shoulders', 'Wrist Stabilizers', 'Chest'], 'description' => 'Wear wrist wraps. Perform cable pushdowns. Wraps support wrists during extension.'],
            ['name' => 'Wrist Wraps Skull Crusher (Lying Triceps)', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Shoulders', 'Core', 'Forearms', 'Chest', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform skull crushers. Wraps support wrists in extended position.'],
            ['name' => 'Wrist Wraps Wrist Curl', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Wrist Flexors', 'Grip Muscles', 'Brachioradialis', 'Forearm Extensors'], 'description' => 'Wear wrist wraps. Perform wrist curls. Wraps support wrist joint during heavy flexion.'],
            ['name' => 'Wrist Wraps Reverse Wrist Curl', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Extensors', 'Wrist Extensors', 'Brachioradialis', 'Grip Muscles', 'Forearm Flexors'], 'description' => 'Wear wrist wraps. Perform reverse wrist curls. Wraps support wrists during heavy extension.'],
            ['name' => 'Wrist Wraps Farmer\'s Walk', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Core', 'Traps', 'Quadriceps', 'Glutes', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform farmer\'s walk. Wraps support wrists during heavy loaded carry.'],
            ['name' => 'Wrist Wraps Deadlift (Mixed Grip)', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Forearms', 'Lats', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Deadlift with mixed grip. Wraps support supinated wrist during heavy pull.'],
            ['name' => 'Wrist Wraps Barbell Squat (High Bar)', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Erector Spinae', 'Calves', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform high bar squat. Wraps support wrists in bar placement.'],
            ['name' => 'Wrist Wraps Barbell Squat (Low Bar)', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Core', 'Erector Spinae', 'Calves', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform low bar squat. Wraps support wrists during narrow grip placement.'],
            ['name' => 'Wrist Wraps Front Squat', 'equipment' => 'Wrist Wraps', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Shoulders', 'Traps', 'Hamstrings', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform front squat. Wraps support wrists in front rack position.'],
            ['name' => 'Wrist Wraps Safety Bar Squat', 'equipment' => 'Wrist Wraps, Safety Squat Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Wrist Stabilizers', 'Traps'], 'description' => 'Wear wrist wraps. Perform safety bar squat. Wraps support wrists during bar gripping.'],
            ['name' => 'Wrist Wraps Trap Bar Deadlift', 'equipment' => 'Wrist Wraps, Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Quadriceps', 'Forearms', 'Traps', 'Wrist Stabilizers'], 'description' => 'Wear wrist wraps. Perform trap bar deadlift. Wraps support wrists in neutral grip.'],
        ];

        $sourceDir = public_path('execises/wrist-wraps');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $imagePath = Storage::disk('public')->putFile('execises', new File($sourceFile));
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
