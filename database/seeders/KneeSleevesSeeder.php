<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class KneeSleevesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Knee Sleeves Squat', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform back squats. Sleeves provide warmth, compression, and joint support.'],
            ['name' => 'Knee Sleeves Front Squat', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Glutes', 'Shoulders', 'Traps', 'Hamstrings'], 'description' => 'Wear knee sleeves. Perform front squats. Sleeves support knees in upright torso position.'],
            ['name' => 'Knee Sleeves Overhead Squat', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Triceps', 'Stabilizers', 'Calves'], 'description' => 'Wear knee sleeves. Perform overhead squats. Sleeves support knees during deep squat with stability demand.'],
            ['name' => 'Knee Sleeves Box Squat', 'equipment' => 'Knee Sleeves, Box', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform box squats. Sleeves support knees during paused squatting.'],
            ['name' => 'Knee Sleeves Deadlift', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Forearms', 'Lats'], 'description' => 'Wear knee sleeves. Perform deadlifts. Sleeves support knee joints during heavy pulling.'],
            ['name' => 'Knee Sleeves Sumo Deadlift', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Adductors', 'Quadriceps', 'Hamstrings', 'Core', 'Traps', 'Forearms'], 'description' => 'Wear knee sleeves. Perform sumo deadlifts. Sleeves support wide-stance knees during pull.'],
            ['name' => 'Knee Sleeves Romanian Deadlift', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Forearms'], 'description' => 'Wear knee sleeves. Perform RDLs. Sleeves support knees during hip hinge.'],
            ['name' => 'Knee Sleeves Lunge (Walking)', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform walking lunges. Sleeves support knee joints during unilateral work.'],
            ['name' => 'Knee Sleeves Reverse Lunge', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform reverse lunges. Sleeves support knees during backward stepping.'],
            ['name' => 'Knee Sleeves Lateral Lunge', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform lateral lunges. Sleeves support knee during side-stepping lunge.'],
            ['name' => 'Knee Sleeves Bulgarian Split Squat', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Stabilizers', 'Calves'], 'description' => 'Wear knee sleeves. Perform Bulgarian split squats. Sleeves support front knee during unilateral work.'],
            ['name' => 'Knee Sleeves Pistol Squat', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform pistol squats. Sleeves support working knee during extreme range.'],
            ['name' => 'Knee Sleeves Step-Up', 'equipment' => 'Knee Sleeves, Box/Platform', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform step-ups. Sleeves support front knee during step movement.'],
            ['name' => 'Knee Sleeves Depth Jump', 'equipment' => 'Knee Sleeves, Box/Platform', 'category_slug' => 'plyometric', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Stabilizers', 'Fast-Twitch Fibers'], 'description' => 'Wear knee sleeves. Perform depth jumps. Sleeves absorb shock and support knees on landing.'],
            ['name' => 'Knee Sleeves Box Jump', 'equipment' => 'Knee Sleeves, Box/Platform', 'category_slug' => 'plyometric', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hip Flexors', 'Fast-Twitch Fibers'], 'description' => 'Wear knee sleeves. Perform box jumps. Sleeves support knees during explosive takeoff and landing.'],
            ['name' => 'Knee Sleeves Broad Jump', 'equipment' => 'Knee Sleeves', 'category_slug' => 'plyometric', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core', 'Hip Flexors'], 'description' => 'Wear knee sleeves. Perform broad jumps. Sleeves support knees during horizontal power jump.'],
            ['name' => 'Knee Sleeves Jump Squat', 'equipment' => 'Knee Sleeves', 'category_slug' => 'plyometric', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Fast-Twitch Fibers', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform jump squats. Sleeves support knees during explosive squat jumps.'],
            ['name' => 'Knee Sleeves Split Squat Jump', 'equipment' => 'Knee Sleeves', 'category_slug' => 'plyometric', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hip Flexors', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform split squat jumps. Sleeves support knees during alternating plyo lunges.'],
            ['name' => 'Knee Sleeves Hip Thrust', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'], 'description' => 'Wear knee sleeves. Perform hip thrusts. Sleeves support knees during hip extension.'],
            ['name' => 'Knee Sleeves Single-Leg Glute Bridge', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Extensors', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform single-leg glute bridge. Sleeves support working knee during hip drive.'],
            ['name' => 'Knee Sleeves Calf Raise (Standing)', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform standing calf raises. Sleeves support knees during ankle extension.'],
            ['name' => 'Knee Sleeves Single-Leg Calf Raise', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform single-leg calf raises. Sleeves support working knee during calf work.'],
            ['name' => 'Knee Sleeves Sled Push', 'equipment' => 'Knee Sleeves, Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Calves', 'Shoulders', 'Chest', 'Hamstrings'], 'description' => 'Wear knee sleeves. Push sled. Sleeves support knees during explosive pushing.'],
            ['name' => 'Knee Sleeves Sled Pull (Backward Walk)', 'equipment' => 'Knee Sleeves, Sled', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Erector Spinae'], 'description' => 'Wear knee sleeves. Walk backward pulling sled. Sleeves support knees during resisted backward walking.'],
            ['name' => 'Knee Sleeves Tire Flip', 'equipment' => 'Knee Sleeves, Tire', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Core', 'Chest', 'Shoulders', 'Triceps', 'Traps'], 'description' => 'Wear knee sleeves. Perform tire flips. Sleeves support knees during explosive squat-flip movement.'],
            ['name' => 'Knee Sleeves Farmer\'s Walk', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Traps', 'Forearms', 'Calves', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform farmer\'s walks. Sleeves support knees during loaded carries.'],
            ['name' => 'Knee Sleeves Yoke Carry', 'equipment' => 'Knee Sleeves, Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Calves', 'Traps', 'Stabilizers', 'Forearms'], 'description' => 'Wear knee sleeves. Perform yoke carry. Sleeves support knees during heavy overhead carrying.'],
            ['name' => 'Knee Sleeves Sandbag Squat', 'equipment' => 'Knee Sleeves, Sandbag', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Stabilizers'], 'description' => 'Wear knee sleeves. Squat with sandbag. Sleeves support knees during awkward load squat.'],
            ['name' => 'Knee Sleeves Sandbag Lunge', 'equipment' => 'Knee Sleeves, Sandbag', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear knee sleeves. Lunge with sandbag. Sleeves support front knee during lunge with awkward load.'],
            ['name' => 'Knee Sleeves Atlas Stone Lift', 'equipment' => 'Knee Sleeves, Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Erector Spinae', 'Traps', 'Biceps', 'Forearms'], 'description' => 'Wear knee sleeves. Lift atlas stone. Sleeves support knees during stone lifting squat.'],
            ['name' => 'Knee Sleeves Atlas Stone Load', 'equipment' => 'Knee Sleeves, Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Core', 'Shoulders', 'Traps', 'Biceps', 'Forearms', 'Erector Spinae'], 'description' => 'Wear knee sleeves. Load atlas stone to platform. Sleeves support knees during explosive loading.'],
            ['name' => 'Knee Sleeves Barbell Lunge (Walking)', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform barbell lunges. Sleeves support knees during weighted unilateral work.'],
            ['name' => 'Knee Sleeves Cyclist Squat (Heels Elevated)', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Calves', 'Stabilizers', 'Hamstrings'], 'description' => 'Wear knee sleeves. Perform heels-elevated squats. Sleeves support knees in deep quad-dominant position.'],
            ['name' => 'Knee Sleeves Knee Extension (Machine)', 'equipment' => 'Knee Sleeves, Leg Extension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Rectus Femoris', 'Vastus Lateralis', 'Vastus Medialis'], 'description' => 'Wear knee sleeves. Perform leg extensions. Sleeves provide warmth and support to knees during isolation.'],
            ['name' => 'Knee Sleeves Leg Curl (Machine)', 'equipment' => 'Knee Sleeves, Leg Curl Machine', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Calves', 'Core', 'Hip Extensors'], 'description' => 'Wear knee sleeves. Perform leg curls. Sleeves support knees during hamstring isolation.'],
            ['name' => 'Knee Sleeves Cardio Workouts (Running, Jump Rope)', 'equipment' => 'Knee Sleeves', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hamstrings', 'Stabilizers'], 'description' => 'Wear knee sleeves during running or jump rope. Sleeves absorb impact and support knees.'],
            ['name' => 'Knee Sleeves Plyometric Training', 'equipment' => 'Knee Sleeves', 'category_slug' => 'plyometric', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Fast-Twitch Fibers', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform plyometric drills. Sleeves provide shock absorption and joint protection.'],
            ['name' => 'Knee Sleeves Recovery Compression', 'equipment' => 'Knee Sleeves', 'category_slug' => 'flexibility', 'target_muscles' => ['Knee Joint', 'Quadriceps', 'Hamstrings', 'Calves', 'Stabilizers'], 'description' => 'Wear knee sleeves post-workout or between sets. Compression promotes blood flow and recovery.'],
            ['name' => 'Knee Sleeves Warm-Up Squats', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Stabilizers'], 'description' => 'Wear knee sleeves. Perform light warm-up squats. Sleeves increase knee joint temperature and mobility.'],
            ['name' => 'Knee Sleeves Good Morning', 'equipment' => 'Knee Sleeves', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Forearms'], 'description' => 'Wear knee sleeves. Perform good mornings. Sleeves support knees during hip hinge with slight knee bend.'],
        ];

        $sourceDir = public_path('execises/knee-sleeves');
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
