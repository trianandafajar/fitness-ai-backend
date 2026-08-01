<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class YokeSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Yoke Carry (Front Rack)', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Traps', 'Core', 'Quadriceps', 'Glutes', 'Calves', 'Forearms'], 'description' => 'Load yoke on front shoulders. Walk forward with upright posture. Core and legs stabilize heavy load.'],
            ['name' => 'Yoke Carry (Back Rack)', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Traps', 'Rhomboids', 'Core', 'Quadriceps', 'Glutes', 'Hamstrings'], 'description' => 'Load yoke behind neck on rear delts/traps. Walk forward. Similar to back squat carry position.'],
            ['name' => 'Yoke Squat', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Traps', 'Hamstrings', 'Calves'], 'description' => 'Hold yoke in front rack position. Perform deep squats while holding weight. Combines squat with yoke stability.'],
            ['name' => 'Yoke Lunge (Walking)', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Traps', 'Stabilizers'], 'description' => 'Carry yoke and perform walking lunges. Unilateral leg work with heavy load on shoulders.'],
            ['name' => 'Yoke Reverse Lunge', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Traps', 'Stabilizers'], 'description' => 'Carry yoke and step backward into lunges. Great for knee stability and unilateral strength.'],
            ['name' => 'Yoke Overhead Carry (Zercher Style)', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Quadriceps', 'Calves'], 'description' => 'Hold yoke overhead with arms locked. Walk forward. Extreme shoulder stability and core engagement.'],
            ['name' => 'Yoke Zercher Carry', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Quadriceps', 'Glutes', 'Traps'], 'description' => 'Hold yoke in crook of elbows (Zercher position). Walk forward. Biceps and core heavily engaged.'],
            ['name' => 'Yoke Side Carry (One-Sided)', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Traps', 'Quadriceps', 'Glutes', 'Stabilizers'], 'description' => 'Load yoke on one shoulder only. Walk forward while counterbalancing. Intense oblique and core anti-lateral flexion.'],
            ['name' => 'Yoke Single-Arm Overhead Carry', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Obliques', 'Quadriceps', 'Glutes'], 'description' => 'Hold yoke overhead with one arm. Walk forward. Extreme shoulder stability and anti-lateral flexion.'],
            ['name' => 'Yoke Good Morning', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps'], 'description' => 'Load yoke on back (high bar). Bend forward at hips with slight knee bend. Return upright. Posterior chain dominant.'],
            ['name' => 'Yoke Romanian Deadlift (RDL)', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Forearms'], 'description' => 'Hold yoke in front or back. Hinge at hips lowering yoke to mid-shin. Stretch hamstrings, then return.'],
            ['name' => 'Yoke Deadlift (From Floor)', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Forearms'], 'description' => 'Lift loaded yoke from floor to standing. Similar to deadlift but with yoke\'s unstable load distribution.'],
            ['name' => 'Yoke Farmer\'s Carry (On Yoke)', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes', 'Calves'], 'description' => 'Grip yoke handles at sides with arms straight. Walk forward. Intense grip and upper back work.'],
            ['name' => 'Yoke Shrugs', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae', 'Rhomboids', 'Forearms'], 'description' => 'Hold yoke at sides or front. Shrug shoulders upward. Hold peak contraction. Builds massive traps.'],
            ['name' => 'Yoke Bent-Over Row', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Hamstrings'], 'description' => 'Bend over with yoke in hands. Row yoke toward chest. Use back and arms to pull.'],
            ['name' => 'Yoke Upright Row', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Traps', 'Deltoids', 'Biceps', 'Forearms', 'Core'], 'description' => 'Hold yoke in front with narrow grip. Pull upward to chin. Emphasizes traps and lateral delts.'],
            ['name' => 'Yoke Hip Thrust', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'], 'description' => 'Sit with yoke across hips. Drive hips upward to full extension. Squeeze glutes at top.'],
            ['name' => 'Yoke Step-Up', 'equipment' => 'Yoke, Box/Platform', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Traps', 'Calves', 'Stabilizers'], 'description' => 'Hold yoke on shoulders. Step up onto elevated platform. Unilateral leg strength with heavy load.'],
            ['name' => 'Yoke Side Step-Up', 'equipment' => 'Yoke, Box/Platform', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Adductors', 'Quadriceps', 'Core', 'Traps'], 'description' => 'Hold yoke and step up sideways. Targets hip abductors and adductors with heavy load.'],
            ['name' => 'Yoke Carry (Walking Lunge)', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Traps', 'Stabilizers'], 'description' => 'Hold yoke and walk forward with staggered lunge steps. Continuous unilateral leg tension and stability.'],
            ['name' => 'Yoke Sled Hybrid Push', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Calves', 'Traps'], 'description' => 'Push yoke forward like a sled. Low angle drive. Combines yoke carry and sled push mechanics.'],
            ['name' => 'Yoke Front Squat', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Traps', 'Glutes', 'Hamstrings', 'Shoulders'], 'description' => 'Hold yoke in front rack. Perform front squat. Quad-dominant squat with yoke stability challenge.'],
            ['name' => 'Yoke Back Squat', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Traps', 'Erector Spinae'], 'description' => 'Load yoke on back (back squat position). Perform squats. Heavy compound leg movement.'],
            ['name' => 'Yoke Overhead Squat', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Stabilizers'], 'description' => 'Hold yoke overhead with arms locked. Perform squats. Extreme mobility and stability requirement.'],
            ['name' => 'Yoke Lateral Lunge', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Core', 'Traps', 'Stabilizers'], 'description' => 'Hold yoke on shoulders. Step laterally into deep lunge. Targets inner thighs and hip mobility.'],
            ['name' => 'Yoke Calf Raise', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Core', 'Traps', 'Quadriceps'], 'description' => 'Hold yoke on shoulders. Rise up on toes. Lower with control. Heavy calf development.'],
            ['name' => 'Yoke Isometric Hold', 'equipment' => 'Yoke', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Traps', 'Quadriceps', 'Glutes', 'Forearms', 'Erector Spinae'], 'description' => 'Load yoke on shoulders. Hold stationary position for time. Builds static strength and endurance.'],
            ['name' => 'Yoke March (High Knee)', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Core', 'Glutes', 'Calves', 'Traps'], 'description' => 'Hold yoke and march in place with high knees. Dynamic stability under heavy load.'],
            ['name' => 'Yoke Carry (Sandbag Style)', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Traps', 'Quadriceps', 'Glutes', 'Forearms', 'Lats'], 'description' => 'Load yoke asymmetrically. Walk with uneven weight distribution. Demands high core stabilization.'],
            ['name' => 'Yoke Farmer\'s Walk + Carry Combo', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes', 'Biceps', 'Lats'], 'description' => 'Start with farmer\'s carry on yoke handles, transition to shoulder carry. Mixed grip and load positions.'],
            ['name' => 'Yoke Y-Bell Clean and Press', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Traps', 'Triceps', 'Core', 'Glutes', 'Quadriceps', 'Forearms'], 'description' => 'Clean yoke to shoulders then press overhead. Dynamic movement combining hip drive and overhead strength.'],
            ['name' => 'Yoke Zercher Squat', 'equipment' => 'Yoke', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Biceps', 'Forearms', 'Erector Spinae'], 'description' => 'Hold yoke in Zercher position (elbow crook). Perform squats. Builds core and biceps while squatting.'],
        ];

        $sourceDir = public_path('execises/yoke');
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
