<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ChalkSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Chalk Deadlift', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Lats', 'Forearms'], 'description' => 'Apply chalk to hands. Perform deadlifts. Chalk increases friction and reduces bar slip.'],
            ['name' => 'Chalk Pull-Up', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Rear Deltoids'], 'description' => 'Apply chalk to hands. Perform pull-ups. Chalk improves grip on smooth bars.'],
            ['name' => 'Chalk Chin-Up', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Core', 'Forearms', 'Rhomboids', 'Brachialis'], 'description' => 'Apply chalk to hands. Perform chin-ups. Chalk secures supinated grip.'],
            ['name' => 'Chalk Weighted Pull-Up', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Core', 'Forearms', 'Rhomboids', 'Traps'], 'description' => 'Apply chalk to hands. Perform weighted pull-ups. Chalk prevents bar slip under heavy load.'],
            ['name' => 'Chalk Muscle-Up', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Triceps', 'Biceps', 'Core', 'Shoulders', 'Forearms'], 'description' => 'Apply chalk to hands. Perform muscle-ups. Chalk secures grip during transition.'],
            ['name' => 'Chalk Barbell Row', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Hamstrings', 'Erector Spinae', 'Traps'], 'description' => 'Apply chalk to hands. Perform barbell rows. Chalk improves grip on heavy rowing.'],
            ['name' => 'Chalk Dumbbell Row', 'equipment' => 'Chalk, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Traps'], 'description' => 'Apply chalk to hands. Perform dumbbell rows. Chalk prevents DB slip during heavy pulls.'],
            ['name' => 'Chalk T-Bar Row', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Hamstrings', 'Traps', 'Rear Deltoids'], 'description' => 'Apply chalk to hands. Perform T-bar rows. Chalk secures grip on heavy rowing.'],
            ['name' => 'Chalk Cable Pulldown', 'equipment' => 'Chalk, Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Rear Deltoids'], 'description' => 'Apply chalk to hands. Perform lat pulldowns. Chalk improves grip on cable attachment.'],
            ['name' => 'Chalk Seated Cable Row', 'equipment' => 'Chalk, Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Rear Deltoids', 'Traps'], 'description' => 'Apply chalk to hands. Perform cable rows. Chalk prevents grip slip during heavy rows.'],
            ['name' => 'Chalk Farmer\'s Walk', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Traps', 'Forearms', 'Calves', 'Stabilizers'], 'description' => 'Apply chalk to hands. Perform farmer\'s walks. Chalk secures grip on heavy handles.'],
            ['name' => 'Chalk Deadlift (Hook Grip)', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Lats', 'Forearms'], 'description' => 'Apply chalk to hands. Use hook grip deadlift. Chalk essential for hook grip friction.'],
            ['name' => 'Chalk Olympic Lifts (Snatch, Clean)', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Traps', 'Forearms', 'Quads'], 'description' => 'Apply chalk to hands. Perform snatch or clean. Chalk critical for bar control during explosive lifts.'],
            ['name' => 'Chalk Clean and Jerk', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Triceps', 'Forearms', 'Quads'], 'description' => 'Apply chalk to hands. Perform clean and jerk. Chalk secures grip during dynamic movement.'],
            ['name' => 'Chalk Snatch', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Traps', 'Forearms', 'Quads'], 'description' => 'Apply chalk to hands. Perform snatch. Chalk prevents bar rotation slip.'],
            ['name' => 'Chalk Kettlebell Swing', 'equipment' => 'Chalk, Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Erector Spinae', 'Shoulders', 'Forearms'], 'description' => 'Apply chalk to hands. Perform KB swings. Chalk secures grip on kettlebell handle.'],
            ['name' => 'Chalk Kettlebell Clean', 'equipment' => 'Chalk, Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Biceps', 'Forearms'], 'description' => 'Apply chalk to hands. Perform KB cleans. Chalk essential for handle control.'],
            ['name' => 'Chalk Kettlebell Snatch', 'equipment' => 'Chalk, Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Triceps', 'Forearms'], 'description' => 'Apply chalk to hands. Perform KB snatches. Chalk prevents hand rotation slip.'],
            ['name' => 'Chalk Kettlebell Jerk', 'equipment' => 'Chalk, Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Forearms'], 'description' => 'Apply chalk to hands. Perform KB jerks. Chalk secures grip during overhead lockout.'],
            ['name' => 'Chalk Push-Up (Slippery Floor)', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Apply chalk to hands. Perform push-ups. Chalk prevents hand slippage on smooth surfaces.'],
            ['name' => 'Chalk Handstand Push-Up', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Upper Chest', 'Forearms'], 'description' => 'Apply chalk to hands. Perform handstand push-ups. Chalk secures inverted hand placement.'],
            ['name' => 'Chalk Handstand Hold', 'equipment' => 'Chalk', 'category_slug' => 'core', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Wrist Stabilizers', 'Forearms'], 'description' => 'Apply chalk to hands. Hold handstand. Chalk prevents hand slip in inverted position.'],
            ['name' => 'Chalk Rope Climb', 'equipment' => 'Chalk, Rope', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Core', 'Forearms', 'Rhomboids', 'Grip Muscles'], 'description' => 'Apply chalk to hands. Perform rope climbs. Chalk essential for rope grip friction.'],
            ['name' => 'Chalk Rope Pull-Ups (Thick Rope)', 'equipment' => 'Chalk, Rope', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Lats', 'Biceps', 'Core', 'Rhomboids'], 'description' => 'Apply chalk to hands. Perform rope pull-ups. Chalk secures grip on thick rope.'],
            ['name' => 'Chalk Dumbbell Bench Press (Heavy)', 'equipment' => 'Chalk, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Forearms'], 'description' => 'Apply chalk to hands. Perform DB bench press. Chalk prevents DB slip during heavy pressing.'],
            ['name' => 'Chalk Dumbbell Overhead Press', 'equipment' => 'Chalk, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Upper Chest', 'Forearms'], 'description' => 'Apply chalk to hands. Perform DB overhead press. Chalk secures grip on heavy dumbbells.'],
            ['name' => 'Chalk Plate Pinch Carry', 'equipment' => 'Chalk, Weight Plates', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Pinch Grip', 'Thenar Muscles', 'Core'], 'description' => 'Apply chalk to hands. Pinch carry weight plates. Chalk critical for pinch grip friction.'],
            ['name' => 'Chalk Plate Pinch Deadlift', 'equipment' => 'Chalk, Weight Plates', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Pinch Grip', 'Thenar Muscles', 'Finger Flexors'], 'description' => 'Apply chalk to hands. Pinch deadlift plates. Chalk secures pinch grip on smooth plates.'],
            ['name' => 'Chalk Hub Grip Lift', 'equipment' => 'Chalk, Hub Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Finger Flexors', 'Thumb Muscles', 'Brachioradialis'], 'description' => 'Apply chalk to hands. Lift hub grip. Chalk essential for hub friction grip.'],
            ['name' => 'Chalk Rolling Thunder (Thick Handle)', 'equipment' => 'Chalk, Rolling Thunder', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Finger Flexors', 'Brachioradialis', 'Wrist Flexors'], 'description' => 'Apply chalk to hands. Lift rolling thunder. Chalk secures grip on rotating thick handle.'],
            ['name' => 'Chalk Grip Trainer Squeeze', 'equipment' => 'Chalk, Grip Trainer', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Finger Flexors', 'Grip Muscles', 'Thenar Muscles'], 'description' => 'Apply chalk to hands. Squeeze grip trainer. Chalk improves tactile grip and control.'],
            ['name' => 'Chalk Inch Dumbbell Carry', 'equipment' => 'Chalk, Inch Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Finger Flexors', 'Thenar Muscles', 'Core', 'Traps'], 'description' => 'Apply chalk to hands. Carry inch dumbbell. Chalk critical for thick handle grip.'],
            ['name' => 'Chalk Barbell Curl', 'equipment' => 'Chalk', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Shoulders', 'Brachialis'], 'description' => 'Apply chalk to hands. Perform barbell curls. Chalk prevents bar slip during curling.'],
            ['name' => 'Chalk Fat Grip Pull-Up', 'equipment' => 'Chalk, Fat Grip Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Lats', 'Biceps', 'Core', 'Rhomboids'], 'description' => 'Apply chalk to hands. Pull-up on fat grips. Chalk essential for thick bar pulling.'],
            ['name' => 'Chalk Fat Grip Deadlift', 'equipment' => 'Chalk, Fat Grip Attachment', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Glutes', 'Hamstrings', 'Core', 'Traps'], 'description' => 'Apply chalk to hands. Deadlift with fat grips. Chalk critical for thick bar grip.'],
            ['name' => 'Chalk Axle Bar Deadlift', 'equipment' => 'Chalk, Axle Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Forearms', 'Core', 'Traps', 'Lats', 'Grip Muscles'], 'description' => 'Apply chalk to hands. Deadlift with axle bar. Chalk essential for thick axle grip.'],
            ['name' => 'Chalk Log Press', 'equipment' => 'Chalk, Log', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Chest', 'Traps', 'Forearms', 'Glutes', 'Quads'], 'description' => 'Apply chalk to hands. Perform log press. Chalk secures grip on thick log handles.'],
            ['name' => 'Chalk Sandbag Deadlift', 'equipment' => 'Chalk, Sandbag', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Forearms', 'Traps', 'Quads'], 'description' => 'Apply chalk to hands. Deadlift sandbag. Chalk improves friction on sandbag surface.'],
            ['name' => 'Chalk Tire Flip', 'equipment' => 'Chalk, Tire', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Core', 'Chest', 'Shoulders', 'Triceps', 'Traps'], 'description' => 'Apply chalk to hands. Perform tire flips. Chalk secures grip on tire treads.'],
            ['name' => 'Chalk Atlas Stone Lift', 'equipment' => 'Chalk, Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Erector Spinae', 'Traps', 'Biceps', 'Forearms'], 'description' => 'Apply chalk to hands. Lift atlas stone. Chalk essential for stone tacky/grip friction.'],
        ];

        $sourceDir = public_path('execises/chalk');
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
