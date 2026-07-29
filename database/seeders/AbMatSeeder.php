<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class AbMatSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Ab Mat Crunch', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis (Upper and Lower)', 'Obliques'], 'description' => 'Lie back on Ab Mat with knees bent. Curl torso up by contracting abs, hold peak, then lower with control.'],
            ['name' => 'Weighted Ab Mat Crunch', 'equipment' => 'Ab Mat, Weight Plate/Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Obliques', 'Hip Flexors'], 'description' => 'Perform ab mat crunch while holding a weight plate on chest or behind head. Increases resistance and intensity.'],
            ['name' => 'Ab Mat Sit-Up', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques', 'Core'], 'description' => 'Full sit-up from supine to seated position using the Ab Mat for lumbar support and deeper spinal flexion.'],
            ['name' => 'Weighted Ab Mat Sit-Up', 'equipment' => 'Ab Mat, Weight Plate/Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques', 'Core'], 'description' => 'Ab Mat sit-up with weight held on chest or behind head. Increases load for greater strength gains.'],
            ['name' => 'Ab Mat Reverse Crunch', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Lower Rectus Abdominis', 'Hip Flexors', 'Core'], 'description' => 'Lie on Ab Mat with hands beside hips. Lift legs and curl pelvis off mat by contracting lower abs.'],
            ['name' => 'Ab Mat Leg Raise', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Lower Rectus Abdominis', 'Hip Flexors', 'Core'], 'description' => 'Lie flat on Ab Mat. Raise straight legs to 90° while pressing lower back into the mat. Lower with control.'],
            ['name' => 'Ab Mat Flutter Kick', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Quadriceps', 'Core'], 'description' => 'Lie on Ab Mat with legs elevated. Perform alternating small kicks up and down. Engages lower abs continuously.'],
            ['name' => 'Ab Mat Bicycle Crunch', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Obliques', 'Hip Flexors'], 'description' => 'Lie on Ab Mat. Alternate bringing opposite elbow to knee in a pedaling motion. Rotational core engagement.'],
            ['name' => 'Ab Mat Russian Twist', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Hip Flexors', 'Core'], 'description' => 'Sit on Ab Mat with feet elevated. Rotate torso side to side with hands clasped. Controlled twisting movement.'],
            ['name' => 'Weighted Ab Mat Russian Twist', 'equipment' => 'Ab Mat, Weight Plate/Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Hip Flexors', 'Core'], 'description' => 'Russian twist on Ab Mat while holding a weight. Adds resistance for stronger oblique development.'],
            ['name' => 'Ab Mat V-Up', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core', 'Shoulders'], 'description' => 'Lie on Ab Mat. Simultaneously raise legs and torso to form a V-shape. Touch hands to toes at peak.'],
            ['name' => 'Ab Mat Toe Touch', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core'], 'description' => 'Lie on Ab Mat with legs straight up (90°). Curl up and reach hands toward toes. Lower back stays on mat.'],
            ['name' => 'Ab Mat Heel Touch', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Core'], 'description' => 'Lie on Ab Mat with knees bent. Alternate reaching hands toward heels on each side. Targets obliques dynamically.'],
            ['name' => 'Ab Mat Cross-Body Mountain Climber', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Core (Abs', 'Obliques)', 'Hip Flexors', 'Shoulders'], 'description' => 'Lie on Ab Mat with legs extended. Bring alternate knee across body toward opposite shoulder. Dynamic core movement.'],
            ['name' => 'Ab Mat Straight Leg Sit-Up', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core'], 'description' => 'Sit-up with legs extended straight on floor. Full range motion with greater hip flexor engagement.'],
            ['name' => 'Ab Mat Weighted Straight Leg Sit-Up', 'equipment' => 'Ab Mat, Weight Plate/Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core'], 'description' => 'Straight leg sit-up on Ab Mat with weight added. Increases resistance for advanced core conditioning.'],
            ['name' => 'Ab Mat Hollow Body Hold', 'equipment' => 'Ab Mat', 'category_slug' => 'core', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core (Entire)', 'Shoulders'], 'description' => 'Lie on Ab Mat with arms extended overhead and legs raised. Hold hollow body position with lower back pressed down.'],
            ['name' => 'Ab Mat Hollow Body Rock', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Core (Entire)', 'Hip Flexors', 'Shoulders'], 'description' => 'Hollow body position on Ab Mat. Rock forward and backward using momentum. Engages core dynamically.'],
            ['name' => 'Ab Mat Plank with Feet on Mat', 'equipment' => 'Ab Mat', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Shoulders', 'Chest', 'Triceps', 'Glutes'], 'description' => 'Plank position with feet resting on the Ab Mat. Adds instability and engages core stabilizers more intensely.'],
            ['name' => 'Ab Mat Side Plank', 'equipment' => 'Ab Mat', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Glutes'], 'description' => 'Side plank position with feet or hips on Ab Mat. Unstable surface increases oblique and stabilizer activation.'],
            ['name' => 'Ab Mat Pike Crunch', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Shoulders'], 'description' => 'Lie on Ab Mat with legs straight up. Curl torso up and reach toward feet, keeping shoulders off mat.'],
            ['name' => 'Ab Mat Seated Knee Tuck', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis (Lower)', 'Hip Flexors', 'Core'], 'description' => 'Sit on Ab Mat with hands beside hips. Lean back slightly and tuck knees to chest, then extend. Dynamic lower ab work.'],
            ['name' => 'Ab Mat Windshield Wiper', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Hip Flexors', 'Core'], 'description' => 'Lie on Ab Mat with legs raised to 90°. Rotate legs side to side like windshield wipers. Advanced oblique control.'],
            ['name' => 'Ab Mat Dead Bug', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Core (Transversus Abdominis)', 'Hip Flexors', 'Shoulders'], 'description' => 'Lie on Ab Mat with arms and legs raised. Extend opposite arm and leg, return, alternate. Core stability and coordination.'],
            ['name' => 'Ab Mat Scissor Kick', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Quadriceps', 'Core'], 'description' => 'Lie on Ab Mat with legs raised. Alternate crossing legs over each other in scissor motion. Continuous lower ab tension.'],
            ['name' => 'Ab Mat Straight Leg Lowering', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core'], 'description' => 'Lie on Ab Mat with legs straight up. Lower legs slowly with control until heels hover above floor, then return.'],
            ['name' => 'Ab Mat Frog Crunch', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Rectus Abdominis', 'Hip Flexors'], 'description' => 'Lie on Ab Mat with soles of feet together (frog position). Crunch up and bring knees toward chest.'],
            ['name' => 'Ab Mat Single-Leg V-Up', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core', 'Obliques'], 'description' => 'V-up on Ab Mat lifting one straight leg while crunching torso toward it. Alternate sides for unilateral core work.'],
            ['name' => 'Ab Mat Dumbbell Pullover Crunch', 'equipment' => 'Ab Mat, Dumbbell', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Lats', 'Triceps', 'Core'], 'description' => 'Lie on Ab Mat holding dumbbell overhead. Perform a pullover while simultaneously crunching up. Combines back and abs.'],
            ['name' => 'Ab Mat Oblique Crunch', 'equipment' => 'Ab Mat', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Core'], 'description' => 'Lie sideways on Ab Mat with knees bent. Crunch up by bringing ribcage toward hips. Targets obliques specifically.'],
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
