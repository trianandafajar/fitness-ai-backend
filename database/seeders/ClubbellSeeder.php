<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ClubbellSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Clubbell One-Arm Swipe', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Core', 'Forearms', 'Traps', 'Lats', 'Obliques'], 'description' => 'Swing club in arc from behind shoulder to front. Rotational shoulder and core engagement.'],
            ['name' => 'Clubbell Two-Arm Swipe', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Core', 'Forearms', 'Traps', 'Chest', 'Lats'], 'description' => 'Swing both clubs simultaneously from behind shoulders to front. Synchronized shoulder and core work.'],
            ['name' => 'Clubbell Mill (Helicopter)', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Core', 'Traps', 'Forearms', 'Lats', 'Rhomboids', 'Obliques'], 'description' => 'Circle club continuously around head in windmill pattern. Full shoulder mobility and core stability.'],
            ['name' => 'Clubbell Inside Mill', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Core', 'Traps', 'Forearms', 'Lats', 'Obliques', 'Chest'], 'description' => 'Circle club around head but inside closer to body. Tighter rotation demands more shoulder and core control.'],
            ['name' => 'Clubbell Outside Mill', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Core', 'Traps', 'Forearms', 'Lats', 'Rhomboids', 'Obliques'], 'description' => 'Circle club around head with wider arc (outside pattern). Increases leverage and shoulder challenge.'],
            ['name' => 'Clubbell Reverse Mill', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Core', 'Traps', 'Forearms', 'Lats', 'Rhomboids', 'Obliques'], 'description' => 'Mill rotation in opposite direction. Balances shoulder development and mobility.'],
            ['name' => 'Clubbell Shield Cast', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Core', 'Forearms', 'Biceps', 'Traps', 'Lats', 'Chest'], 'description' => 'Start at shoulder, cast club outward and forward like a shield. Dynamic shoulder and core stabilization.'],
            ['name' => 'Clubbell Reverse Shield Cast', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Core', 'Forearms', 'Biceps', 'Traps', 'Lats', 'Rhomboids'], 'description' => 'Shield cast in reverse direction. Engages opposite shoulder and back musculature.'],
            ['name' => 'Clubbell Squat Press', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Triceps', 'Forearms', 'Traps'], 'description' => 'Squat down while pressing club overhead simultaneously. Combines lower body and overhead stability.'],
            ['name' => 'Clubbell Squat Swing', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Lats', 'Forearms', 'Hamstrings'], 'description' => 'Squat while swinging club between legs and behind. Dynamic hip hinge and shoulder engagement.'],
            ['name' => 'Clubbell Lunge Swipe', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Forearms', 'Hamstrings', 'Stabilizers'], 'description' => 'Lunge forward while swiping club from shoulder to front. Unilateral leg work with shoulder rotation.'],
            ['name' => 'Clubbell Lunge Mill', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Forearms', 'Traps', 'Stabilizers'], 'description' => 'Lunge while performing club mill overhead. Combines lower body stability with shoulder mobility.'],
            ['name' => 'Clubbell Windmill', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Core (Obliques)', 'Shoulders', 'Hamstrings', 'Glutes', 'Traps', 'Forearms', 'Hip Flexors'], 'description' => 'Bend sideways with one hand on floor, other hand holding club overhead. Classic rotational core and hip mobility.'],
            ['name' => 'Clubbell Turkish Get-Up', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Quadriceps', 'Glutes', 'Hamstrings', 'Forearms', 'Stabilizers'], 'description' => 'Hold club overhead while transitioning from lying to standing. Full-body stability and rotational control.'],
            ['name' => 'Clubbell Clean', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Biceps', 'Forearms', 'Traps'], 'description' => 'Explosively pull club from floor to shoulder position. Hip drive and upper body pull.'],
            ['name' => 'Clubbell Jerk Press', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Glutes', 'Quadriceps', 'Forearms', 'Traps'], 'description' => 'Push press club overhead using leg drive. Explosive overhead pressing with club rotation.'],
            ['name' => 'Clubbell Push Press', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Forearms', 'Traps'], 'description' => 'Dip and drive using legs to press club overhead. Explosive overhead strength.'],
            ['name' => 'Clubbell Strict Press', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Forearms', 'Traps', 'Stabilizers'], 'description' => 'Press club overhead from shoulder with no leg drive. Pure shoulder and triceps strength.'],
            ['name' => 'Clubbell Cuban Press (Rotational Press)', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Rotator Cuff', 'Forearms', 'Traps', 'Core', 'Rhomboids'], 'description' => 'Press club overhead with external rotation at top. Rotator cuff and shoulder health focus.'],
            ['name' => 'Clubbell Arnold Press', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Biceps', 'Core', 'Forearms', 'Traps', 'Chest'], 'description' => 'Start with clubs at chest, rotate as you press overhead. Rotational shoulder development.'],
            ['name' => 'Clubbell Bent-Over Row', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Forearms', 'Traps'], 'description' => 'Bend over, row club toward chest. Unstable club challenges back and grip strength.'],
            ['name' => 'Clubbell Deadlift', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Forearms', 'Traps', 'Biceps'], 'description' => 'Lift club from floor to standing by gripping handle. Deadlift variation with offset load.'],
            ['name' => 'Clubbell Farmer\'s Carry', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes', 'Calves', 'Stabilizers'], 'description' => 'Hold clubs at sides and walk forward. Grip, core, and trunk stability challenged.'],
            ['name' => 'Clubbell Suitcase Carry', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Forearms', 'Traps', 'Quadriceps', 'Glutes', 'Stabilizers'], 'description' => 'Carry one club at side. Walk forward. Anti-lateral flexion core work.'],
            ['name' => 'Clubbell Waiter\'s Carry', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Obliques', 'Forearms', 'Quadriceps', 'Glutes'], 'description' => 'Hold club overhead with one arm. Walk forward. Extreme shoulder stability and anti-lateral flexion.'],
            ['name' => 'Clubbell Halo', 'equipment' => 'Clubbell', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Upper Traps', 'Forearms', 'Core', 'Neck Stabilizers', 'Rhomboids'], 'description' => 'Circle club around head in a halo pattern. Shoulder mobility and stability exercise.'],
            ['name' => 'Clubbell Reverse Halo', 'equipment' => 'Clubbell', 'category_slug' => 'mobility', 'target_muscles' => ['Shoulders', 'Upper Traps', 'Forearms', 'Core', 'Neck Stabilizers', 'Lats'], 'description' => 'Halo rotation in reverse direction. Balances shoulder development and mobility.'],
            ['name' => 'Clubbell Side Bend', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Quadratus Lumborum', 'Traps', 'Forearms', 'Hip Flexors'], 'description' => 'Hold club at side or overhead. Bend sideways. Targets obliques and lateral core.'],
            ['name' => 'Clubbell Russian Twist', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Forearms', 'Biceps'], 'description' => 'Sit holding club. Rotate torso side to side. Rotational core and shoulder engagement.'],
            ['name' => 'Clubbell Figure-8', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Core', 'Forearms', 'Traps', 'Lats', 'Obliques', 'Hip Flexors'], 'description' => 'Swing club in figure-8 pattern around legs. Coordination, grip, and rotational conditioning.'],
            ['name' => 'Clubbell Pendulum Swings', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Core', 'Forearms', 'Lats', 'Traps', 'Obliques', 'Hip Flexors'], 'description' => 'Swing club like pendulum between legs and behind. Dynamic shoulder and hip coordination.'],
            ['name' => 'Clubbell Side Rotation (Rotational Lunge)', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Quadriceps', 'Glutes', 'Hamstrings', 'Shoulders', 'Forearms'], 'description' => 'Step into lunge while rotating club across body. Rotational power and lower body stability.'],
            ['name' => 'Clubbell Triceps Extension', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Shoulders', 'Core', 'Forearms', 'Lats', 'Traps'], 'description' => 'Hold club behind head. Extend arms overhead. Triceps extension with offset load challenge.'],
            ['name' => 'Clubbell Bicep Curl', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Shoulders', 'Traps', 'Brachialis'], 'description' => 'Curl club from waist to shoulder. Bicep curl with club\'s unstable offset load.'],
            ['name' => 'Clubbell Hammer Curl', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Brachialis', 'Brachioradialis', 'Forearms', 'Biceps', 'Core', 'Traps'], 'description' => 'Curl club with neutral grip (hammer style). Forearm and brachialis emphasis.'],
            ['name' => 'Clubbell Wrist Rotation', 'equipment' => 'Clubbell', 'category_slug' => 'strength', 'target_muscles' => ['Forearms (Flexors/Extensors)', 'Biceps', 'Brachioradialis', 'Grip Muscles'], 'description' => 'Rotate wrist while holding club. Forearm and grip strength development.'],
        ];

        $sourceDir = public_path('execises/clubbell');
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
