<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class LiftingStrapsSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Lifting Straps Deadlift', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Lats'], 'description' => 'Use lifting straps. Perform deadlifts. Straps secure grip, allowing focus on posterior chain without grip failure.'],
            ['name' => 'Lifting Straps Romanian Deadlift', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps'], 'description' => 'Use lifting straps. Perform RDLs. Straps maintain grip during heavy hinge movement.'],
            ['name' => 'Lifting Straps Sumo Deadlift', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Adductors', 'Quadriceps', 'Hamstrings', 'Core', 'Traps'], 'description' => 'Use lifting straps. Perform sumo deadlifts. Straps secure wide-grip pull.'],
            ['name' => 'Lifting Straps Rack Pull', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Forearms'], 'description' => 'Use lifting straps. Perform rack pulls. Straps support heavy partial deadlifts.'],
            ['name' => 'Lifting Straps Deficit Deadlift', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Quads'], 'description' => 'Use lifting straps. Deadlift from deficit. Straps secure grip during increased ROM.'],
            ['name' => 'Lifting Straps Trap Bar Deadlift', 'equipment' => 'Lifting Straps, Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Quadriceps', 'Traps'], 'description' => 'Use lifting straps. Perform trap bar deadlift. Straps secure neutral grip pull.'],
            ['name' => 'Lifting Straps Snatch Deadlift', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Lats'], 'description' => 'Use lifting straps. Perform snatch grip deadlift. Straps support wide-grip pull.'],
            ['name' => 'Lifting Straps Jeffersons Deadlift', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Erector Spinae', 'Adductors'], 'description' => 'Use lifting straps. Perform Jefferson deadlift. Straps secure asymmetrical grip.'],
            ['name' => 'Lifting Straps Bent-Over Row', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Hamstrings', 'Erector Spinae', 'Traps'], 'description' => 'Use lifting straps. Perform bent-over rows. Straps allow focus on back muscles without grip failure.'],
            ['name' => 'Lifting Straps Pendlay Row', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Hamstrings', 'Erector Spinae', 'Traps'], 'description' => 'Use lifting straps. Perform Pendlay rows. Straps secure explosive rowing grip.'],
            ['name' => 'Lifting Straps Yates Row', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Traps', 'Rear Deltoids', 'Forearms'], 'description' => 'Use lifting straps. Perform Yates rows. Straps support underhand grip rowing.'],
            ['name' => 'Lifting Straps T-Bar Row', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Hamstrings', 'Traps', 'Rear Deltoids'], 'description' => 'Use lifting straps. Perform T-bar rows. Straps secure heavy rowing grip.'],
            ['name' => 'Lifting Straps Single-Arm Dumbbell Row', 'equipment' => 'Lifting Straps, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Traps', 'Rear Deltoids'], 'description' => 'Use lifting straps. Perform DB rows. Straps allow heavy unilateral back work.'],
            ['name' => 'Lifting Straps Seated Cable Row', 'equipment' => 'Lifting Straps, Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Rear Deltoids', 'Traps', 'Forearms'], 'description' => 'Use lifting straps. Perform cable rows. Straps maintain grip during heavy rowing.'],
            ['name' => 'Lifting Straps Shrugs (Barbell)', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae', 'Forearms', 'Core', 'Rhomboids'], 'description' => 'Use lifting straps. Perform barbell shrugs. Straps support heavy trap work.'],
            ['name' => 'Lifting Straps Shrugs (Dumbbell)', 'equipment' => 'Lifting Straps, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae', 'Core', 'Forearms', 'Rhomboids'], 'description' => 'Use lifting straps. Perform DB shrugs. Straps allow focus on traps without grip fatigue.'],
            ['name' => 'Lifting Straps Farmers Walk', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Traps', 'Calves', 'Stabilizers'], 'description' => 'Use lifting straps. Perform farmer\'s walks. Straps assist grip during heavy loaded carries.'],
            ['name' => 'Lifting Straps Suitcase Carry', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Quadriceps', 'Glutes', 'Traps', 'Stabilizers'], 'description' => 'Use lifting straps. Perform suitcase carries. Straps support grip during unilateral carry.'],
            ['name' => 'Lifting Straps Upright Row', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Traps', 'Deltoids', 'Biceps', 'Core', 'Forearms', 'Rhomboids'], 'description' => 'Use lifting straps. Perform upright rows. Straps support grip during heavy upright pulling.'],
            ['name' => 'Lifting Straps Pull-Ups (Weighted)', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Rear Deltoids'], 'description' => 'Use lifting straps. Perform weighted pull-ups. Straps maintain grip during heavy pulling.'],
            ['name' => 'Lifting Straps Chin-Ups (Weighted)', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Core', 'Forearms', 'Rhomboids', 'Brachialis'], 'description' => 'Use lifting straps. Perform weighted chin-ups. Straps support grip during supinated pulling.'],
            ['name' => 'Lifting Straps Neutral Grip Pull-Ups', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Brachialis', 'Biceps', 'Core', 'Forearms', 'Rhomboids'], 'description' => 'Use lifting straps. Perform neutral grip pull-ups. Straps secure grip in neutral position.'],
            ['name' => 'Lifting Straps Cable Pulldowns', 'equipment' => 'Lifting Straps, Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Rear Deltoids'], 'description' => 'Use lifting straps. Perform lat pulldowns. Straps maintain grip during heavy pulldowns.'],
            ['name' => 'Lifting Straps Face Pulls', 'equipment' => 'Lifting Straps, Cable Machine', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Upper Traps', 'Rhomboids', 'Rotator Cuff', 'Core'], 'description' => 'Use lifting straps. Perform face pulls. Straps assist grip during pulling to face.'],
            ['name' => 'Lifting Straps Good Morning', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps'], 'description' => 'Use lifting straps. Perform good mornings. Straps secure bar placement behind neck.'],
            ['name' => 'Lifting Straps Barbell Curl', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Shoulders', 'Brachialis'], 'description' => 'Use lifting straps. Perform barbell curls. Straps allow focus on biceps without grip fatigue.'],
            ['name' => 'Lifting Straps EZ Bar Curl', 'equipment' => 'Lifting Straps, EZ Bar', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Brachialis', 'Stabilizers'], 'description' => 'Use lifting straps. Perform EZ bar curls. Straps support grip during curling.'],
            ['name' => 'Lifting Straps Hammer Curl (Dumbbell)', 'equipment' => 'Lifting Straps, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Brachialis', 'Brachioradialis', 'Forearms', 'Biceps', 'Core'], 'description' => 'Use lifting straps. Perform hammer curls. Straps support heavy neutral grip curling.'],
            ['name' => 'Lifting Straps Reverse Curl', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Brachioradialis', 'Forearms', 'Biceps', 'Core', 'Brachialis'], 'description' => 'Use lifting straps. Perform reverse curls. Straps secure pronated grip curling.'],
            ['name' => 'Lifting Straps Wrist Curl', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Wrist Flexors', 'Grip Muscles', 'Brachioradialis'], 'description' => 'Use lifting straps. Perform wrist curls. Straps allow focus on wrist flexion without grip failure.'],
            ['name' => 'Lifting Straps Reverse Wrist Curl', 'equipment' => 'Lifting Straps', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Extensors', 'Wrist Extensors', 'Brachioradialis', 'Grip Muscles'], 'description' => 'Use lifting straps. Perform reverse wrist curls. Straps support wrist extension work.'],
            ['name' => 'Lifting Straps Kettlebell Swings (Heavy)', 'equipment' => 'Lifting Straps, Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Erector Spinae', 'Shoulders', 'Forearms'], 'description' => 'Use lifting straps. Perform heavy kettlebell swings. Straps maintain grip during explosive swings.'],
            ['name' => 'Lifting Straps Kettlebell Snatch', 'equipment' => 'Lifting Straps, Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Triceps', 'Forearms'], 'description' => 'Use lifting straps. Perform kettlebell snatch. Straps secure grip during explosive overhead catch.'],
            ['name' => 'Lifting Straps Log Press', 'equipment' => 'Lifting Straps, Log', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Chest', 'Traps', 'Forearms', 'Glutes', 'Quads'], 'description' => 'Use lifting straps. Perform log press. Straps secure grip on thick log handle.'],
            ['name' => 'Lifting Straps Axle Deadlift', 'equipment' => 'Lifting Straps, Axle Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Lats'], 'description' => 'Use lifting straps. Perform axle deadlift. Straps essential for thick bar pulling.'],
            ['name' => 'Lifting Straps Atlas Stone Lift', 'equipment' => 'Lifting Straps, Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Erector Spinae', 'Traps', 'Biceps'], 'description' => 'Use lifting straps. Lift atlas stone. Straps assist grip during stone lifting.'],
            ['name' => 'Lifting Straps Sandbag Deadlift', 'equipment' => 'Lifting Straps, Sandbag', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Quads'], 'description' => 'Use lifting straps. Deadlift sandbag. Straps secure grip on awkward bag.'],
            ['name' => 'Lifting Straps Sandbag Carry', 'equipment' => 'Lifting Straps, Sandbag', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Traps', 'Forearms', 'Chest'], 'description' => 'Use lifting straps. Carry sandbag. Straps assist grip during loaded carries.'],
            ['name' => 'Lifting Straps Sled Pull (Rope Attached)', 'equipment' => 'Lifting Straps, Sled', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Calves', 'Hamstrings', 'Erector Spinae'], 'description' => 'Use lifting straps. Pull sled with rope. Straps maintain grip during heavy pulling.'],
            ['name' => 'Lifting Straps Tire Flip', 'equipment' => 'Lifting Straps, Tire', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Core', 'Chest', 'Shoulders', 'Triceps', 'Traps'], 'description' => 'Use lifting straps. Perform tire flips. Straps assist grip on tire tread.'],
            ['name' => 'Lifting Straps Rope Climb (Weighted)', 'equipment' => 'Lifting Straps, Rope', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Core', 'Forearms', 'Rhomboids', 'Grip Muscles'], 'description' => 'Use lifting straps. Perform rope climbs. Straps assist grip during weighted climbing.'],
        ];

        $sourceDir = public_path('execises/lifting-straps');
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
