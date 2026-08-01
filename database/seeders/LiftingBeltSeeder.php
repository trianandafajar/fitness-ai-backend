<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class LiftingBeltSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Lifting Belt Squat', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Erector Spinae', 'Calves'], 'description' => 'Wear lifting belt snugly. Perform back squats. Belt increases intra-abdominal pressure and core stability.'],
            ['name' => 'Lifting Belt Front Squat', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Shoulders', 'Traps', 'Hamstrings'], 'description' => 'Wear lifting belt. Perform front squats. Belt supports upright torso and core bracing.'],
            ['name' => 'Lifting Belt Deadlift', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Forearms', 'Lats'], 'description' => 'Wear lifting belt. Perform deadlifts. Belt protects lower back and enhances bracing.'],
            ['name' => 'Lifting Belt Romanian Deadlift', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Forearms'], 'description' => 'Wear lifting belt. Perform RDLs. Belt supports lumbar spine during hip hinge.'],
            ['name' => 'Lifting Belt Good Morning', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Forearms'], 'description' => 'Wear lifting belt. Perform good mornings. Belt stabilizes lower back during forward fold.'],
            ['name' => 'Lifting Belt Overhead Press', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Traps', 'Upper Chest', 'Stabilizers'], 'description' => 'Wear lifting belt. Perform standing overhead press. Belt supports core during heavy pressing.'],
            ['name' => 'Lifting Belt Push Press', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Traps', 'Forearms'], 'description' => 'Wear lifting belt. Perform push press. Belt enhances core stability during leg drive pressing.'],
            ['name' => 'Lifting Belt Bent-Over Row', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Hamstrings', 'Erector Spinae', 'Traps'], 'description' => 'Wear lifting belt. Perform bent-over rows. Belt protects lower back during hinged rowing.'],
            ['name' => 'Lifting Belt Pendlay Row', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Hamstrings', 'Erector Spinae', 'Traps'], 'description' => 'Wear lifting belt. Perform Pendlay rows from floor. Belt supports explosive back pulling.'],
            ['name' => 'Lifting Belt T-Bar Row', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Hamstrings', 'Traps', 'Rear Deltoids'], 'description' => 'Wear lifting belt. Perform T-bar rows. Belt stabilizes core during heavy rowing.'],
            ['name' => 'Lifting Belt Farmer\'s Walk', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Traps', 'Forearms', 'Calves', 'Stabilizers'], 'description' => 'Wear lifting belt. Perform farmer\'s walks. Belt supports core during loaded carries.'],
            ['name' => 'Lifting Belt Yoke Carry', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Calves', 'Traps', 'Stabilizers', 'Forearms'], 'description' => 'Wear lifting belt. Perform yoke carry. Belt enhances core support for heavy overhead load.'],
            ['name' => 'Lifting Belt Suitcase Carry', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Forearms', 'Quadriceps', 'Glutes', 'Traps', 'Stabilizers'], 'description' => 'Wear lifting belt. Perform suitcase carries. Belt provides anti-lateral flexion stability.'],
            ['name' => 'Lifting Belt Barbell Lunge', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Stabilizers', 'Calves'], 'description' => 'Wear lifting belt. Perform barbell lunges. Belt supports core during unilateral leg work.'],
            ['name' => 'Lifting Belt Reverse Lunge', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Stabilizers', 'Calves'], 'description' => 'Wear lifting belt. Perform reverse lunges. Belt stabilizes core during backward stepping.'],
            ['name' => 'Lifting Belt Step-Up', 'equipment' => 'Lifting Belt, Box/Platform', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear lifting belt. Perform step-ups. Belt supports core during unilateral leg drive.'],
            ['name' => 'Lifting Belt Hip Thrust', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'], 'description' => 'Wear lifting belt. Perform hip thrusts. Belt supports pelvis and core during hip extension.'],
            ['name' => 'Lifting Belt Zercher Squat', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Biceps', 'Forearms', 'Erector Spinae', 'Hamstrings'], 'description' => 'Wear lifting belt. Perform Zercher squats. Belt supports core during front-loaded squat.'],
            ['name' => 'Lifting Belt Zercher Deadlift', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Biceps', 'Forearms', 'Erector Spinae', 'Quads'], 'description' => 'Wear lifting belt. Perform Zercher deadlifts. Belt supports core during awkward hinge.'],
            ['name' => 'Lifting Belt Deficit Deadlift', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Forearms', 'Quads'], 'description' => 'Wear lifting belt. Deadlift from elevated deficit. Belt supports increased range of motion.'],
            ['name' => 'Lifting Belt Rack Pull', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Forearms', 'Lats'], 'description' => 'Wear lifting belt. Perform rack pulls from knee height. Belt supports heavy partial deadlifts.'],
            ['name' => 'Lifting Belt Block Pull', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Forearms', 'Lats'], 'description' => 'Wear lifting belt. Deadlift from blocks. Belt supports deadlift variation with reduced range.'],
            ['name' => 'Lifting Belt Snatch Deadlift', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Forearms', 'Lats'], 'description' => 'Wear lifting belt. Perform snatch grip deadlift. Belt supports wide-grip pulling.'],
            ['name' => 'Lifting Belt Jefferson Deadlift', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Erector Spinae', 'Adductors', 'Forearms'], 'description' => 'Wear lifting belt. Perform Jefferson deadlift (straddle bar). Belt supports asymmetrical loading.'],
            ['name' => 'Lifting Belt Trap Bar Deadlift', 'equipment' => 'Lifting Belt, Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Quadriceps', 'Forearms', 'Traps'], 'description' => 'Wear lifting belt. Perform trap bar deadlift. Belt supports neutral grip deadlift.'],
            ['name' => 'Lifting Belt Log Press', 'equipment' => 'Lifting Belt, Log', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Chest', 'Traps', 'Forearms', 'Glutes', 'Quads'], 'description' => 'Wear lifting belt. Perform log press. Belt supports core during heavy overhead pressing.'],
            ['name' => 'Lifting Belt Axle Deadlift', 'equipment' => 'Lifting Belt, Axle Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Forearms', 'Traps', 'Lats'], 'description' => 'Wear lifting belt. Perform axle deadlift. Belt supports lower back during thick bar pull.'],
            ['name' => 'Lifting Belt Atlas Stone Lift', 'equipment' => 'Lifting Belt, Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Erector Spinae', 'Traps', 'Biceps', 'Forearms'], 'description' => 'Wear lifting belt. Lift atlas stone. Belt supports core during stone lifting.'],
            ['name' => 'Lifting Belt Atlas Stone Load', 'equipment' => 'Lifting Belt, Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Core', 'Shoulders', 'Traps', 'Biceps', 'Forearms', 'Erector Spinae'], 'description' => 'Wear lifting belt. Load atlas stone to platform. Belt provides core stability during loading.'],
            ['name' => 'Lifting Belt Sandbag Squat', 'equipment' => 'Lifting Belt, Sandbag', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Stabilizers'], 'description' => 'Wear lifting belt. Hold sandbag, perform squats. Belt supports core during awkward load squat.'],
            ['name' => 'Lifting Belt Sandbag Deadlift', 'equipment' => 'Lifting Belt, Sandbag', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Forearms', 'Traps', 'Quads'], 'description' => 'Wear lifting belt. Deadlift sandbag. Belt supports lower back during awkward lifting.'],
            ['name' => 'Lifting Belt Sandbag Carry (Bear Hug)', 'equipment' => 'Lifting Belt, Sandbag', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Calves', 'Traps', 'Forearms', 'Chest'], 'description' => 'Wear lifting belt. Bear hug sandbag carry. Belt supports core during loaded carry.'],
            ['name' => 'Lifting Belt Tire Flip', 'equipment' => 'Lifting Belt, Tire', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Core', 'Chest', 'Shoulders', 'Triceps', 'Traps'], 'description' => 'Wear lifting belt. Perform tire flips. Belt supports core and lower back during explosive flip.'],
            ['name' => 'Lifting Belt Prowler Push', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Calves', 'Shoulders', 'Chest', 'Hamstrings'], 'description' => 'Wear lifting belt. Push prowler/sled. Belt supports core during explosive pushing.'],
            ['name' => 'Lifting Belt Sled Drag (Forward Pull)', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Calves', 'Hamstrings', 'Erector Spinae', 'Forearms'], 'description' => 'Wear lifting belt. Attach rope, walk forward pulling sled. Belt supports pulling load.'],
            ['name' => 'Lifting Belt Sled Drag (Backward Walk)', 'equipment' => 'Lifting Belt', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Erector Spinae'], 'description' => 'Wear lifting belt. Walk backward pulling sled. Belt supports posterior chain during resisted walk.'],
            ['name' => 'Lifting Belt Belt Squat', 'equipment' => 'Lifting Belt, Belt Squat Machine', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Stabilizers'], 'description' => 'Wear lifting belt. Perform belt squat with loaded belt. Unloaded spine squat variation.'],
            ['name' => 'Lifting Belt Glute-Ham Raise', 'equipment' => 'Lifting Belt, GHR Machine', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Erector Spinae', 'Calves', 'Hip Extensors'], 'description' => 'Wear lifting belt. Perform glute-ham raises. Belt supports core during hamstring curl.'],
            ['name' => 'Lifting Belt Back Extension', 'equipment' => 'Lifting Belt, Hyperextension Bench', 'category_slug' => 'strength', 'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Stabilizers', 'Traps'], 'description' => 'Wear lifting belt. Perform hyperextensions. Belt supports lower back during extension.'],
            ['name' => 'Lifting Belt Isometric Bracing', 'equipment' => 'Lifting Belt', 'category_slug' => 'core', 'target_muscles' => ['Core (Transversus Abdominis, Rectus Abdominis)', 'Obliques', 'Erector Spinae'], 'description' => 'Wear lifting belt. Practice breathing and bracing against belt. Core activation and stability training.'],
        ];

        $sourceDir = public_path('execises/lifting-belt');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
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
