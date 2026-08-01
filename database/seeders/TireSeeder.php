<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class TireSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Tire Flip', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Core', 'Chest', 'Shoulders', 'Triceps', 'Traps'], 'description' => 'Squat low, grip tire tread, drive through legs, and flip tire over. Full-body explosive power movement.'],
            ['name' => 'Tire Flip (Consecutive)', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Core', 'Chest', 'Shoulders', 'Triceps'], 'description' => 'Flip tire repeatedly for distance or time. Cardio and muscular endurance combined with explosive power.'],
            ['name' => 'Tire Sledgehammer Strike', 'equipment' => 'Tire, Sledgehammer', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Lats', 'Triceps', 'Forearms', 'Obliques', 'Glutes'], 'description' => 'Swing sledgehammer down onto tire. Rotational core power and upper body striking strength.'],
            ['name' => 'Tire Sledgehammer (Alternating Sides)', 'equipment' => 'Tire, Sledgehammer', 'category_slug' => 'strength', 'target_muscles' => ['Core (Obliques)', 'Shoulders', 'Lats', 'Triceps', 'Forearms', 'Hip Rotators'], 'description' => 'Alternate striking tire from left and right sides. Rotational power and oblique engagement.'],
            ['name' => 'Tire Sledgehammer (Overhead Swing)', 'equipment' => 'Tire, Sledgehammer', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Lats', 'Core', 'Triceps', 'Forearms', 'Glutes', 'Hamstrings'], 'description' => 'Swing sledgehammer overhead and strike tire. Full arc movement engaging entire posterior chain.'],
            ['name' => 'Tire Jump (Box Jump)', 'equipment' => 'Tire', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hip Flexors', 'Hamstrings'], 'description' => 'Jump onto tire from standing or squat position. Explosive lower body power and coordination.'],
            ['name' => 'Tire Jump (Lateral)', 'equipment' => 'Tire', 'category_slug' => 'power', 'target_muscles' => ['Adductors', 'Abductors', 'Quadriceps', 'Glutes', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Jump laterally from one side of tire to the other. Agility and hip stability.'],
            ['name' => 'Tire Step-Up', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core', 'Hip Flexors'], 'description' => 'Step onto tire and drive up with one leg. Unilateral leg strength and stability.'],
            ['name' => 'Tire Lateral Step-Up', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Adductors', 'Quadriceps', 'Core', 'Glutes', 'Stabilizers'], 'description' => 'Step up sideways onto tire. Targets hip abductors and adductors unilaterally.'],
            ['name' => 'Tire Incline Push-Up', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Stabilizers'], 'description' => 'Hands on tire, perform push-up with elevated upper body. Great for beginners or volume work.'],
            ['name' => 'Tire Decline Push-Up', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest', 'Anterior Deltoids', 'Triceps', 'Core'], 'description' => 'Feet on tire, hands on floor. Perform push-up with elevated lower body. Emphasizes upper chest.'],
            ['name' => 'Tire Pike Push-Up', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Hip Flexors'], 'description' => 'Feet on tire, hands on floor. Pike hips up and perform push-up. Shoulder-dominant variation.'],
            ['name' => 'Tire Inverted Row', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Forearms'], 'description' => 'Lie under tire, grip tread, pull chest to tire. Bodyweight row variation with tire stability challenge.'],
            ['name' => 'Tire Pull-Up (On Top)', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Traps'], 'description' => 'Stand on or inside tire. Perform pull-ups on tire edges or overhead structure. Grip and back strength.'],
            ['name' => 'Tire Carry (Hug)', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Biceps', 'Forearms', 'Chest', 'Traps', 'Quadriceps', 'Glutes', 'Calves'], 'description' => 'Hug tire against chest and walk forward. Grip, core, and trunk stability heavily taxed.'],
            ['name' => 'Tire Zercher Carry', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Quadriceps', 'Glutes', 'Traps', 'Erector Spinae'], 'description' => 'Hold tire in crook of elbows. Walk forward. Biceps and core intensively engaged.'],
            ['name' => 'Tire Suitcase Carry (One Side)', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Forearms', 'Biceps', 'Quadriceps', 'Glutes', 'Traps'], 'description' => 'Carry tire at one side like suitcase. Walk forward. Extreme core anti-lateral flexion.'],
            ['name' => 'Tire Overhead Carry', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Traps', 'Quadriceps', 'Glutes', 'Calves'], 'description' => 'Press tire overhead with arms locked. Walk forward. Extreme shoulder stability and core engagement.'],
            ['name' => 'Tire Squat', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Forearms', 'Biceps'], 'description' => 'Hold tire against chest or overhead. Perform squats. Adds stability challenge to traditional squat.'],
            ['name' => 'Tire Front Squat', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Shoulders', 'Traps', 'Glutes', 'Forearms', 'Biceps'], 'description' => 'Hold tire in front rack position. Perform front squats. Quad-dominant squat with tire stability challenge.'],
            ['name' => 'Tire Overhead Squat', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Stabilizers', 'Traps'], 'description' => 'Hold tire overhead with arms locked. Perform squats. Extreme mobility and stability requirement.'],
            ['name' => 'Tire Lunge (Walking)', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Biceps', 'Forearms', 'Traps'], 'description' => 'Hold tire against chest. Perform walking lunges. Unilateral leg work with heavy tire load.'],
            ['name' => 'Tire Bulgarian Split Squat', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Biceps', 'Forearms', 'Stabilizers'], 'description' => 'Rear foot on tire. Hold tire against chest. Single-leg squat. Unilateral stability challenge.'],
            ['name' => 'Tire Good Morning', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core', 'Traps', 'Forearms', 'Biceps'], 'description' => 'Hold tire behind neck or against chest. Hinge forward at hips. Emphasizes posterior chain.'],
            ['name' => 'Tire Deadlift (Off Floor)', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Traps', 'Biceps', 'Forearms'], 'description' => 'Lift tire from floor to standing by gripping tread. Deadlift variation with awkward load.'],
            ['name' => 'Tire Row (Bent-Over)', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Forearms', 'Core', 'Hamstrings', 'Traps'], 'description' => 'Bend over with tire. Row tire toward chest. Unstable tire challenges back and grip strength.'],
            ['name' => 'Tire Curl', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Biceps', 'Forearms', 'Core', 'Traps', 'Deltoids', 'Glutes'], 'description' => 'Curl tire from lap to chest. Bicep-focused with tire\'s awkward shape increasing difficulty.'],
            ['name' => 'Tire Triceps Extension (Lying)', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Shoulders', 'Core', 'Forearms', 'Chest', 'Lats'], 'description' => 'Lie down, hold tire behind head. Extend arms overhead. Triceps extension with awkward tire load.'],
            ['name' => 'Tire Russian Twist (Seated)', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Forearms', 'Biceps'], 'description' => 'Sit on floor holding tire. Rotate torso side to side. Oblique and rotational core work.'],
            ['name' => 'Tire Plank (Hands on Tire)', 'equipment' => 'Tire', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Shoulders', 'Chest', 'Triceps', 'Glutes', 'Stabilizers'], 'description' => 'Plank position with hands on tire. Unstable surface demands high core and shoulder stabilization.'],
            ['name' => 'Tire Mountain Climber', 'equipment' => 'Tire', 'category_slug' => 'strength', 'target_muscles' => ['Core (Lower Abs)', 'Hip Flexors', 'Shoulders', 'Quadriceps'], 'description' => 'Plank with feet on tire or hands on tire. Alternate driving knees to chest. Dynamic core and cardio.'],
            ['name' => 'Tire Burpee', 'equipment' => 'Tire', 'category_slug' => 'cardio', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Shoulders'], 'description' => 'Perform burpee with jump onto or over tire. Full-body metabolic conditioning with plyometric element.'],
            ['name' => 'Tire Broad Jump (Over Tire)', 'equipment' => 'Tire', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core', 'Hip Flexors'], 'description' => 'Jump forward over tire from standing position. Explosive horizontal power development.'],
            ['name' => 'Tire Box Jump (From Kneeling)', 'equipment' => 'Tire', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hip Flexors', 'Hamstrings'], 'description' => 'Start kneeling, explode up onto tire. Requires hip drive and explosive power from dead stop.'],
            ['name' => 'Tire Depth Jump (Off Tire)', 'equipment' => 'Tire', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Stabilizers', 'Hip Flexors'], 'description' => 'Step off tire and immediately jump up upon landing. Reactive strength and plyometric power.'],
        ];

        $sourceDir = public_path('execises/tire');
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
