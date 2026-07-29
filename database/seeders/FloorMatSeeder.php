<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class FloorMatSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Floor Mat Push-Up', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Perform push-ups on mat. Provides cushioning and prevents slipping on smooth floors.'],
            ['name' => 'Floor Mat Plank', 'equipment' => 'Floor Mat', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Shoulders', 'Chest', 'Triceps', 'Glutes', 'Stabilizers'], 'description' => 'Hold plank position on mat. Mat provides comfort and traction for elbows and hands.'],
            ['name' => 'Floor Mat Side Plank', 'equipment' => 'Floor Mat', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Glutes', 'Hip Abductors', 'Stabilizers'], 'description' => 'Hold side plank on mat. Mat cushions forearm and prevents sliding.'],
            ['name' => 'Floor Mat Mountain Climber', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Hip Flexors', 'Shoulders', 'Quadriceps', 'Cardio', 'Stabilizers'], 'description' => 'Perform mountain climbers on mat. Mat provides grip for hands and feet during dynamic movement.'],
            ['name' => 'Floor Mat Burpee', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Shoulders', 'Cardio'], 'description' => 'Perform burpees on mat. Cushions impact and provides traction for jumps.'],
            ['name' => 'Floor Mat Sit-Up', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core', 'Obliques'], 'description' => 'Perform sit-ups on mat. Cushions tailbone and spine during full range motion.'],
            ['name' => 'Floor Mat Reverse Crunch', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Lower Rectus Abdominis', 'Hip Flexors', 'Core', 'Iliopsoas'], 'description' => 'Perform reverse crunches on mat. Mat protects lower back during pelvic curl.'],
            ['name' => 'Floor Mat Leg Raise', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps', 'Iliopsoas'], 'description' => 'Perform leg raises on mat. Mat supports lower back and prevents strain.'],
            ['name' => 'Floor Mat V-Up', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core', 'Shoulders', 'Quadriceps'], 'description' => 'Perform V-ups on mat. Cushions tailbone and provides comfortable base.'],
            ['name' => 'Floor Mat Russian Twist', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Stabilizers'], 'description' => 'Perform Russian twists on mat. Mat provides traction for seated rotation.'],
            ['name' => 'Floor Mat Bicycle Crunch', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Hip Flexors', 'Core', 'Quadriceps'], 'description' => 'Perform bicycle crunches on mat. Cushions spine during alternating rotation.'],
            ['name' => 'Floor Mat Flutter Kick', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Quadriceps', 'Core', 'Iliopsoas'], 'description' => 'Perform flutter kicks on mat. Mat protects lower back during leg movement.'],
            ['name' => 'Floor Mat Scissor Kick', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Quadriceps', 'Core', 'Adductors'], 'description' => 'Perform scissor kicks on mat. Mat cushions spine and provides traction.'],
            ['name' => 'Floor Mat Dead Bug', 'equipment' => 'Floor Mat', 'category_slug' => 'core', 'target_muscles' => ['Core (Transversus Abdominis)', 'Hip Flexors', 'Shoulders', 'Stabilizers'], 'description' => 'Perform dead bugs on mat. Mat supports spine during controlled movement.'],
            ['name' => 'Floor Mat Glute Bridge', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'], 'description' => 'Perform glute bridges on mat. Mat cushions spine and provides foot traction.'],
            ['name' => 'Floor Mat Single-Leg Glute Bridge', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Extensors', 'Stabilizers'], 'description' => 'Perform single-leg glute bridge on mat. Mat provides stability for unilateral work.'],
            ['name' => 'Floor Mat Superman', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Traps'], 'description' => 'Perform superman holds on mat. Cushions front body during back extension.'],
            ['name' => 'Floor Mat Bird Dog', 'equipment' => 'Floor Mat', 'category_slug' => 'core', 'target_muscles' => ['Core (Transversus)', 'Glutes', 'Hamstrings', 'Shoulders', 'Stabilizers'], 'description' => 'Perform bird dogs on mat. Mat cushions knees and hands during quadruped work.'],
            ['name' => 'Floor Mat Quadruped Hip Extension', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Erector Spinae', 'Hip Extensors'], 'description' => 'Perform quadruped hip extensions on mat. Mat cushions knees during glute kickbacks.'],
            ['name' => 'Floor Mat Fire Hydrant', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Hip Abductors', 'Core', 'Obliques', 'Tensor Fasciae Latae'], 'description' => 'Perform fire hydrants on mat. Mat cushions knees and provides traction.'],
            ['name' => 'Floor Mat Donkey Kick', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core', 'Hip Extensors', 'Quadratus Lumborum'], 'description' => 'Perform donkey kicks on mat. Mat protects knees during glute work.'],
            ['name' => 'Floor Mat Side-Lying Leg Raise', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Tensor Fasciae Latae', 'Core', 'Hip Abductors'], 'description' => 'Perform side-lying leg raises on mat. Cushions hips and provides grip.'],
            ['name' => 'Floor Mat Clam Shell', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Tensor Fasciae Latae', 'Core', 'Hip Abductors'], 'description' => 'Perform clam shells on mat. Mat cushions side-lying position and provides traction.'],
            ['name' => 'Floor Mat Stretching (Yoga/Pilates)', 'equipment' => 'Floor Mat', 'category_slug' => 'flexibility', 'target_muscles' => ['Full Body', 'Core', 'Hamstrings', 'Hip Flexors', 'Back', 'Shoulders'], 'description' => 'Perform stretching routines on mat. Mat provides comfortable non-slip surface.'],
            ['name' => 'Floor Mat Foam Rolling Base', 'equipment' => 'Floor Mat, Foam Roller', 'category_slug' => 'flexibility', 'target_muscles' => ['Full Body', 'Back', 'Hamstrings', 'Glutes', 'Calves', 'Quads'], 'description' => 'Place foam roller on mat. Mat prevents rolling and protects floor.'],
            ['name' => 'Floor Mat Ab Rollout (Kneeling)', 'equipment' => 'Floor Mat, Ab Wheel', 'category_slug' => 'strength', 'target_muscles' => ['Core (Rectus Abdominis, Transversus)', 'Shoulders', 'Lats', 'Triceps'], 'description' => 'Perform ab rollouts on mat. Mat cushions knees and provides traction for wheel.'],
            ['name' => 'Floor Mat Handstand Practice', 'equipment' => 'Floor Mat', 'category_slug' => 'core', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Wrist Stabilizers', 'Forearms'], 'description' => 'Practice handstands on mat. Cushions falls and provides wrist comfort.'],
            ['name' => 'Floor Mat L-Sit (Floor)', 'equipment' => 'Floor Mat', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Hip Flexors', 'Triceps', 'Shoulders', 'Quadriceps'], 'description' => 'Perform L-sit on floor mat. Mat cushions sit bones and provides grip.'],
            ['name' => 'Floor Mat V-Sit Hold', 'equipment' => 'Floor Mat', 'category_slug' => 'core', 'target_muscles' => ['Core (Entire)', 'Hip Flexors', 'Triceps', 'Shoulders', 'Hamstrings'], 'description' => 'Hold V-sit on mat. Mat provides comfortable base and traction.'],
            ['name' => 'Floor Mat Windshield Wiper (Supine)', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Core (Obliques)', 'Hip Flexors', 'Quadriceps', 'Shoulders', 'Stabilizers'], 'description' => 'Perform windshield wipers on mat. Mat supports spine during rotational core work.'],
            ['name' => 'Floor Mat Turkish Get-Up (Practice)', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Quadriceps', 'Glutes', 'Hamstrings', 'Stabilizers'], 'description' => 'Practice Turkish get-ups on mat. Cushions transitions and protects joints.'],
            ['name' => 'Floor Mat Bear Crawl', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Quadriceps', 'Glutes', 'Calves', 'Stabilizers'], 'description' => 'Perform bear crawls on mat. Mat cushions hands and knees during crawling.'],
            ['name' => 'Floor Mat Crab Walk', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Triceps', 'Glutes', 'Quadriceps', 'Hamstrings'], 'description' => 'Perform crab walks on mat. Mat provides traction and cushioning.'],
            ['name' => 'Floor Mat Inchworm', 'equipment' => 'Floor Mat', 'category_slug' => 'flexibility', 'target_muscles' => ['Core', 'Shoulders', 'Triceps', 'Hamstrings', 'Calves', 'Stabilizers'], 'description' => 'Perform inchworms on mat. Mat cushions hands and provides traction.'],
            ['name' => 'Floor Mat Frog Jump', 'equipment' => 'Floor Mat', 'category_slug' => 'plyometric', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core', 'Hip Flexors', 'Fast-Twitch Fibers'], 'description' => 'Perform frog jumps on mat. Cushions impact and provides non-slip landing.'],
            ['name' => 'Floor Mat Broad Jump', 'equipment' => 'Floor Mat', 'category_slug' => 'plyometric', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core', 'Hip Flexors'], 'description' => 'Perform broad jumps on mat. Mat provides traction for takeoff and impact absorption.'],
            ['name' => 'Floor Mat Squat (Bodyweight)', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Perform bodyweight squats on mat. Mat provides foot traction and cushioning.'],
            ['name' => 'Floor Mat Lunge (Bodyweight)', 'equipment' => 'Floor Mat', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Perform lunges on mat. Mat cushions knees and prevents slipping.'],
            ['name' => 'Floor Mat High Knee March', 'equipment' => 'Floor Mat', 'category_slug' => 'cardio', 'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Core', 'Calves', 'Cardio', 'Glutes'], 'description' => 'Perform high knee march on mat. Mat provides traction for dynamic cardio.'],
            ['name' => 'Floor Mat Jumping Jack', 'equipment' => 'Floor Mat', 'category_slug' => 'cardio', 'target_muscles' => ['Cardio', 'Shoulders', 'Hip Adductors/Abductors', 'Calves', 'Core'], 'description' => 'Perform jumping jacks on mat. Cushions impact and provides non-slip surface.'],
        ];

        foreach ($exercises as $data) {
            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categories[$data['category_slug']],
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
            ]);
        }
    }
}
