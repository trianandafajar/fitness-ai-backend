<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AtlasStoneSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Atlas Stone Lift (Standard)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Biceps', 'Forearms'], 'description' => 'Squat down, hug stone, extend hips and knees to lift stone to lap. Full-body posterior chain movement.'],
            ['name' => 'Atlas Stone Load (To Platform)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Traps', 'Biceps', 'Forearms', 'Quadriceps'], 'description' => 'Lift stone to lap then press/roll to shoulder height to load onto raised platform. Explosive hip and shoulder drive.'],
            ['name' => 'Atlas Stone Shoulder (Over Shoulder)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Core', 'Shoulders', 'Traps', 'Triceps', 'Forearms', 'Erector Spinae'], 'description' => 'Lift stone to chest, then press/pop it over one shoulder. Extreme full-body power and stability.'],
            ['name' => 'Atlas Stone Over Bar (Load to Height)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Traps', 'Biceps', 'Lats', 'Forearms'], 'description' => 'Lift stone and load over a high bar. Requires explosive hip drive and upper body pressing power.'],
            ['name' => 'Atlas Stone Lap (Holding Position)', 'equipment' => 'Atlas Stone', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Hip Flexors', 'Glutes', 'Forearms', 'Biceps', 'Erector Spinae', 'Quadriceps'], 'description' => 'Lift stone and hold in lap position for time. Isometric strength in core and hips.'],
            ['name' => 'Atlas Stone Squat Hold', 'equipment' => 'Atlas Stone', 'category_slug' => 'core', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Forearms', 'Biceps', 'Traps', 'Erector Spinae'], 'description' => 'Hold stone in lap while holding a squat position. Isometric lower body and grip endurance.'],
            ['name' => 'Atlas Stone Deadlift (Off Floor)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Forearms', 'Biceps', 'Traps'], 'description' => 'Lift stone from floor to standing without lap pause. Pure deadlift-style stone lifting.'],
            ['name' => 'Atlas Stone Carry (Bear Hug)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Traps', 'Biceps', 'Forearms', 'Quadriceps', 'Glutes', 'Calves', 'Chest'], 'description' => 'Hug stone against chest and walk forward. Grip, core, and trunk stability heavily taxed.'],
            ['name' => 'Atlas Stone Zercher Carry', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Quadriceps', 'Glutes', 'Traps', 'Erector Spinae'], 'description' => 'Hold stone in crook of elbows (Zercher position). Walk forward. Biceps and core intensively engaged.'],
            ['name' => 'Atlas Stone Overhead Press', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Glutes', 'Traps', 'Forearms'], 'description' => 'Lift stone to chest then press overhead. Extreme shoulder strength and full-body stability.'],
            ['name' => 'Atlas Stone Floor Press (Lying)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Biceps', 'Forearms'], 'description' => 'Lie on floor with stone on chest. Press stone upward. Bench press variation with awkward stone shape.'],
            ['name' => 'Atlas Stone Clean (To Chest)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Biceps', 'Traps', 'Forearms'], 'description' => 'Explosively pull stone from floor to chest position. Uses hip drive and upper body pull.'],
            ['name' => 'Atlas Stone Hug Squat', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Biceps', 'Forearms', 'Traps', 'Erector Spinae'], 'description' => 'Hug stone against chest. Perform deep squats. Adds stability challenge to traditional squat.'],
            ['name' => 'Atlas Stone Good Morning', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Forearms', 'Biceps'], 'description' => 'Hug stone behind neck or against chest. Hinge forward at hips. Emphasizes posterior chain.'],
            ['name' => 'Atlas Stone Row (Bent-Over)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Forearms', 'Core', 'Hamstrings', 'Traps'], 'description' => 'Bend over with stone. Row stone toward chest using back and arms. Unstable stone challenges strength.'],
            ['name' => 'Atlas Stone Curl', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Traps', 'Deltoids', 'Glutes'], 'description' => 'Curl stone from lap to chest. Bicep-focused with stone\'s awkward shape increasing difficulty.'],
            ['name' => 'Atlas Stone Triceps Extension', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Shoulders', 'Core', 'Forearms', 'Chest', 'Traps'], 'description' => 'Hold stone behind head. Extend arms overhead. Triceps extension with awkward load.'],
            ['name' => 'Atlas Stone Front Raise', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Upper Chest', 'Core', 'Forearms', 'Traps', 'Biceps'], 'description' => 'Hold stone with both hands. Raise to shoulder height in front. Controlled anterior shoulder work.'],
            ['name' => 'Atlas Stone Lateral Raise', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Lateral Deltoids', 'Traps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Hold stone at side. Raise laterally to shoulder height. Unstable stone challenges lateral delts.'],
            ['name' => 'Atlas Stone Shrug', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae', 'Forearms', 'Core', 'Biceps'], 'description' => 'Hold stone at sides or front. Shrug shoulders upward. Hold peak contraction. Builds traps.'],
            ['name' => 'Atlas Stone Lunge (Walking)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Biceps', 'Forearms', 'Traps'], 'description' => 'Hold stone against chest. Perform walking lunges. Unilateral leg work with heavy stone load.'],
            ['name' => 'Atlas Stone Bulgarian Split Squat', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Biceps', 'Forearms', 'Stabilizers'], 'description' => 'Hold stone against chest. Perform single-leg squats with rear foot elevated. Unilateral stability challenge.'],
            ['name' => 'Atlas Stone Step-Up', 'equipment' => 'Atlas Stone, Box/Platform', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Biceps', 'Forearms', 'Traps', 'Calves'], 'description' => 'Hold stone against chest. Step up onto platform. Unilateral leg power and hip drive.'],
            ['name' => 'Atlas Stone One-Armed Hug', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Biceps', 'Forearms', 'Traps', 'Quadriceps', 'Glutes'], 'description' => 'Hug stone with one arm only. Walk or lift. Intense core anti-lateral flexion and grip strength.'],
            ['name' => 'Atlas Stone Off-Platform Deadlift', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Forearms', 'Biceps', 'Traps'], 'description' => 'Stone on elevated platform. Lift from platform height. Challenges different hip angles and leverages.'],
            ['name' => 'Atlas Stone Truck Push (Rolling Stone)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Calves'], 'description' => 'Push stone forward along floor like a truck push. Dynamic full-body pushing movement.'],
            ['name' => 'Atlas Stone Suitcase Carry (One Side)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Forearms', 'Biceps', 'Quadriceps', 'Glutes', 'Traps'], 'description' => 'Carry stone at one side like suitcase. Walk forward. Extreme core anti-lateral flexion.'],
            ['name' => 'Atlas Stone Rotational Load', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Lats', 'Glutes', 'Forearms', 'Biceps', 'Traps'], 'description' => 'Lift stone and rotate torso to load on side. Rotational power and core stability demanded.'],
            ['name' => 'Atlas Stone Throw (For Distance)', 'equipment' => 'Atlas Stone', 'category_slug' => 'power', 'target_muscles' => ['Glutes', 'Core', 'Shoulders', 'Triceps', 'Lats', 'Forearms', 'Quadriceps'], 'description' => 'Lift stone and explosively throw forward for distance. Full-body explosive power movement.'],
            ['name' => 'Atlas Stone Overhead Throw (Behind Neck)', 'equipment' => 'Atlas Stone', 'category_slug' => 'power', 'target_muscles' => ['Shoulders', 'Lats', 'Triceps', 'Core', 'Glutes', 'Hamstrings', 'Forearms'], 'description' => 'Lift stone behind head. Explosively throw backward. High-risk advanced explosive power movement.'],
            ['name' => 'Atlas Stone Lap Press (Seated)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Core', 'Shoulders', 'Triceps', 'Forearms', 'Traps', 'Quadriceps'], 'description' => 'Sit with stone in lap. Press stone upward while seated. Emphasizes upper body pressing without leg drive.'],
            ['name' => 'Atlas Stone Vertical Carry (Loading Pin)', 'equipment' => 'Atlas Stone', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Biceps', 'Forearms', 'Traps', 'Quadriceps', 'Glutes', 'Calves'], 'description' => 'Carry stone vertically using stone handles or straps. Walks forward. Unique grip and core challenge.'],
        ];

        $sourceDir = public_path('execises/atlas-stone');
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
