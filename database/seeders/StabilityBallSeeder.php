<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class StabilityBallSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Stability Ball Squat (Wall Squat)', 'equipment' => 'Stability Ball', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Place the ball between your lower back and a wall. Stand with feet shoulder-width apart, squat down rolling the ball with your back, then return to standing. Supports the spine while guiding proper squat form.'],
            ['name' => 'Stability Ball Overhead Squat', 'equipment' => 'Stability Ball', 'category_slug' => 'mobility', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Shoulders', 'Core'], 'description' => 'Hold the ball overhead with both hands, arms straight. Squat down keeping the ball stable above. Tests shoulder mobility and core control.'],
            ['name' => 'Stability Ball Goblet Squat', 'equipment' => 'Stability Ball', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Hold the ball against your chest with both hands, elbows tucked. Squat down keeping an upright torso, then stand. The ball adds resistance while challenging grip and core.'],
            ['name' => 'Stability Ball Bulgarian Split Squat', 'equipment' => 'Stability Ball', 'category_slug' => 'stability', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Place the rear foot on top of the ball behind you. Squat down with the front leg until the thigh is parallel. The unstable ball demands maximum hip and core stability.'],
            ['name' => 'Stability Ball Lunge (Back Foot on Ball)', 'equipment' => 'Stability Ball', 'category_slug' => 'stability', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Place the top of one foot on the ball behind you. Lower into a lunge, rolling the ball backward. Return by driving through the front heel. Dynamic unilateral stability.'],
            ['name' => 'Stability Ball Hamstring Curl (Supine)', 'equipment' => 'Stability Ball', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core'], 'description' => 'Lie on your back, calves and heels on top of the ball. Lift hips off the floor, then curl the ball toward you by bending the knees. Extend back out. Excellent posterior chain exercise.'],
            ['name' => 'Stability Ball Single-Leg Hamstring Curl', 'equipment' => 'Stability Ball', 'category_slug' => 'stability', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core (unilateral)'], 'description' => 'Perform the hamstring curl with one leg on the ball, the other held in the air. Doubles the hamstring and core demand on the working leg.'],
            ['name' => 'Stability Ball Glute Bridge', 'equipment' => 'Stability Ball', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core'], 'description' => 'Lie on your back, feet flat on top of the ball, arms at sides. Drive through the heels to lift the hips until the body forms a straight line. Squeeze glutes at the top.'],
            ['name' => 'Stability Ball Single-Leg Glute Bridge', 'equipment' => 'Stability Ball', 'category_slug' => 'stability', 'target_muscles' => ['Glutes', 'Hamstrings (unilateral)', 'Core'], 'description' => 'Place one foot on the ball, the other leg extended up or straight. Perform the glute bridge, keeping the hips level. The ball challenges the stabilisers.'],
            ['name' => 'Stability Ball Hip Thrust (Shoulders on Ball)', 'equipment' => 'Stability Ball', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core'], 'description' => 'Sit on the floor with upper back against the ball. Place weight across the hips and thrust upward to full extension. The ball\'s movement forces constant glute activation.'],
            ['name' => 'Stability Ball Push-Up (Hands on Ball)', 'equipment' => 'Stability Ball', 'category_slug' => 'strength', 'target_muscles' => ['Pectoralis Major', 'Triceps', 'Anterior Deltoids', 'Core'], 'description' => 'Place hands on the ball, feet on the floor in a plank. Perform push-ups, lowering the chest to the ball. The unstable surface intensely activates the chest and stabilisers.'],
            ['name' => 'Stability Ball Push-Up (Feet on Ball)', 'equipment' => 'Stability Ball', 'category_slug' => 'strength', 'target_muscles' => ['Upper Pectorals', 'Anterior Deltoids', 'Triceps', 'Core'], 'description' => 'Place feet or shins on the ball, hands on the floor. Perform push-ups at a decline. The rolling ball challenges core anti-extension.'],
            ['name' => 'Stability Ball Pike Push-Up', 'equipment' => 'Stability Ball', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Triceps', 'Upper Pectorals', 'Core'], 'description' => 'Start in a push-up position with shins on the ball. Pike the hips up, rolling the ball toward the hands until the body forms an inverted V. Lower the head toward the floor, press back up.'],
            ['name' => 'Stability Ball Stir-the-Pot', 'equipment' => 'Stability Ball', 'category_slug' => 'core', 'target_muscles' => ['Transverse Abdominis', 'Rectus Abdominis', 'Obliques', 'Shoulders'], 'description' => 'Assume a plank with forearms on the ball. Move the forearms in small circles as if stirring a pot, keeping the body rigid. Advanced anti-rotation and core stability.'],
            ['name' => 'Stability Ball Plank (Forearms on Ball)', 'equipment' => 'Stability Ball', 'category_slug' => 'core', 'target_muscles' => ['Transverse Abdominis', 'Rectus Abdominis', 'Obliques', 'Shoulders'], 'description' => 'Place forearms on the ball, extend legs back. Hold a plank while keeping the ball stable. Core and shoulder stability exercise.'],
            ['name' => 'Stability Ball Plank (Hands on Ball)', 'equipment' => 'Stability Ball', 'category_slug' => 'core', 'target_muscles' => ['Transverse Abdominis', 'Rectus Abdominis', 'Obliques', 'Shoulders'], 'description' => 'Place hands on the ball, arms straight, feet on the floor. Hold a plank. Greater shoulder and wrist demand than forearm plank.'],
            ['name' => 'Stability Ball Mountain Climbers', 'equipment' => 'Stability Ball', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Hip Flexors', 'Core', 'Shoulders'], 'description' => 'Hands on the ball in a plank position. Drive knees alternately toward the chest rapidly while keeping the ball stable.'],
            ['name' => 'Stability Ball Knee Tuck (Pike to Plank)', 'equipment' => 'Stability Ball', 'category_slug' => 'core', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Transverse Abdominis', 'Shoulders'], 'description' => 'Start in a plank with shins on the ball. Tuck the knees toward the chest, rolling the ball forward. Extend back to plank. Intense core compression.'],
            ['name' => 'Stability Ball Jackknife', 'equipment' => 'Stability Ball', 'category_slug' => 'core', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques', 'Shoulders'], 'description' => 'Hands on the floor, shins on the ball. Tuck the knees in and rotate them to one side, then the other, or just straight tuck. Oblique and ab engagement.'],
            ['name' => 'Stability Ball Crunch (Supine on Ball)', 'equipment' => 'Stability Ball', 'category_slug' => 'core', 'target_muscles' => ['Rectus Abdominis', 'Obliques'], 'description' => 'Sit on the ball, walk forward until the lower back is supported on the ball. Crunch upward, squeezing the abs. Increased range of motion over floor crunches.'],
            ['name' => 'Stability Ball Oblique Crunch (Side Lying)', 'equipment' => 'Stability Ball', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Quadratus Lumborum'], 'description' => 'Lie sideways with the hip against the ball, feet braced against a wall or on the floor. Crunch the torso upward laterally.'],
            ['name' => 'Stability Ball Russian Twist', 'equipment' => 'Stability Ball', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Transverse Abdominis'], 'description' => 'Lie with shoulders on the ball, feet flat on the floor, hips high. Hold a weight or hands together, rotate the torso side to side.'],
            ['name' => 'Stability Ball Back Extension (Prone)', 'equipment' => 'Stability Ball', 'category_slug' => 'strength', 'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings'], 'description' => 'Lie face down with hips on the ball, feet against a wall or floor. Extend the spine to raise the chest, squeezing the lower back. Then lower.'],
            ['name' => 'Stability Ball Reverse Hyperextension', 'equipment' => 'Stability Ball', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae'], 'description' => 'Lie face down on the ball with hands on the floor. Raise the legs up behind you, squeezing the glutes and lower back.'],
            ['name' => 'Stability Ball Dead Bug', 'equipment' => 'Stability Ball', 'category_slug' => 'core', 'target_muscles' => ['Transverse Abdominis', 'Rectus Abdominis', 'Obliques', 'Hip Flexors'], 'description' => 'Lie on your back, hold the ball between your hands and knees. Extend one arm and the opposite leg, pressing the ball between the other limbs. Return and alternate.'],
            ['name' => 'Stability Ball Pass Through (Hands to Feet)', 'equipment' => 'Stability Ball', 'category_slug' => 'core', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques'], 'description' => 'Lie on your back, ball between hands, legs straight. Crunch up and pass the ball from hands to feet, then lower arms and legs. Reverse the motion.'],
            ['name' => 'Stability Ball Wall Sit', 'equipment' => 'Stability Ball', 'category_slug' => 'endurance', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core'], 'description' => 'Place the ball between your back and a wall. Slide down into a squat position and hold. The ball moves with you, allowing a comfortable static hold.'],
            ['name' => 'Stability Ball Seated March', 'equipment' => 'Stability Ball', 'category_slug' => 'stability', 'target_muscles' => ['Hip Flexors', 'Core', 'Quadriceps'], 'description' => 'Sit tall on the ball. Slowly lift one knee toward the chest, lower, and alternate. Challenges the core to maintain balance on the ball.'],
            ['name' => 'Stability Ball Single-Leg Balance', 'equipment' => 'Stability Ball', 'category_slug' => 'stability', 'target_muscles' => ['Core', 'Gluteus Medius', 'Ankle Stabilizers'], 'description' => 'Sit or kneel on the ball, or stand on it against a wall, lifting one foot off. Enhances proprioception and balance.'],
            ['name' => 'Stability Ball Push-Up to Knee Tuck', 'equipment' => 'Stability Ball', 'category_slug' => 'core', 'target_muscles' => ['Pectorals', 'Triceps', 'Core', 'Hip Flexors'], 'description' => 'Perform a push-up with hands on the ball, then immediately tuck the knees to the chest (if feet are elevated) or do a mountain climber. Dynamic upper body and core combo.'],
            ['name' => 'Stability Ball Donkey Kick', 'equipment' => 'Stability Ball', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core'], 'description' => 'Lie face down on the ball with hands on the floor. Kick one leg up toward the ceiling, squeezing the glute at the top. Lower and alternate.'],
            ['name' => 'Stability Ball Superman Hold', 'equipment' => 'Stability Ball', 'category_slug' => 'strength', 'target_muscles' => ['Erector Spinae', 'Glutes', 'Rhomboids', 'Shoulders'], 'description' => 'Lie face down with belly on the ball. Extend arms and legs out straight, lifting them off the floor, and hold. Challenges the entire posterior chain.'],
            ['name' => 'Stability Ball Triceps Dip (Hands on Ball, Feet on Floor)', 'equipment' => 'Stability Ball', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Anterior Deltoids', 'Pectorals'], 'description' => 'Sit on the edge of the ball, walk feet forward. Place hands on the ball next to hips and dip the body by bending the elbows. The instability engages the core.'],
            ['name' => 'Stability Ball Calf Raise (Standing on Ball)', 'equipment' => 'Stability Ball', 'category_slug' => 'stability', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Ankle Stabilizers'], 'description' => 'Stand on the ball (advanced) or place the ball under one foot while holding a wall. Raise the heel. Trains ankle stability and calf strength.'],
            ['name' => 'Stability Ball Hamstring Stretch (Roll-Out)', 'equipment' => 'Stability Ball', 'category_slug' => 'mobility', 'target_muscles' => ['Hamstrings', 'Glutes', 'Calves'], 'description' => 'Sit on the ball, extend one leg straight with the heel on the floor. Lean forward from the hips until a stretch is felt in the hamstring.'],
            ['name' => 'Stability Ball Chest Stretch', 'equipment' => 'Stability Ball', 'category_slug' => 'mobility', 'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Biceps'], 'description' => 'Kneel beside the ball, place one arm on the ball with the elbow bent 90°. Roll the ball forward to stretch the chest and shoulder.'],
            ['name' => 'Stability Ball Lat Stretch', 'equipment' => 'Stability Ball', 'category_slug' => 'mobility', 'target_muscles' => ['Latissimus Dorsi', 'Teres Major', 'Core'], 'description' => 'Kneel facing the ball, place both hands on it, and roll the ball forward, lowering the chest toward the floor, feeling a stretch in the lats and shoulders.'],
        ];

        $sourceDir = public_path('execises/stability-ball');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $data['image'] = Storage::disk('public')->putFile('exercises', new File($sourceFile));
            }

            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categories[$data['category_slug']],
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
                'image' => $data['image'] ?? null,
            ]);
        }
    }
}
