<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class BattleRopeSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Alternating Waves (Bilateral)', 'equipment' => 'Battle Rope', 'category_slug' => 'cardio', 'target_muscles' => ['Shoulders', 'Forearms', 'Core', 'Quadriceps'], 'description' => 'Stand with feet shoulder-width, knees slightly bent, hold one rope end in each hand. Alternately whip the ropes up and down as fast as possible, creating continuous waves.'],
            ['name' => 'Double Waves (Simultaneous)', 'equipment' => 'Battle Rope', 'category_slug' => 'cardio', 'target_muscles' => ['Shoulders', 'Forearms', 'Core', 'Glutes', 'Quadriceps'], 'description' => 'Whip both ropes up and down together in unison, creating a single large wave. Engages the anterior deltoids and core more heavily than alternating waves.'],
            ['name' => 'Battle Rope Slams (Power Slams)', 'equipment' => 'Battle Rope', 'category_slug' => 'power', 'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Abdominals', 'Quadriceps', 'Glutes', 'Shoulders'], 'description' => 'Raise both ropes overhead by extending the hips and rising onto the toes, then forcefully slam them down to the ground, squatting slightly. Full-body explosive movement.'],
            ['name' => 'Side-to-Side Waves (Lateral Waves)', 'equipment' => 'Battle Rope', 'category_slug' => 'cardio', 'target_muscles' => ['Obliques', 'Shoulders', 'Forearms', 'Quadriceps'], 'description' => 'Move both ropes side to side in a sweeping motion across the floor, keeping the arms low. Targets the obliques and lateral hip stability.'],
            ['name' => 'Inside Circles (Inward Circles)', 'equipment' => 'Battle Rope', 'category_slug' => 'cardio', 'target_muscles' => ['Shoulders', 'Forearms', 'Core'], 'description' => 'With arms extended to the sides, move the ropes in small circular motions inward toward the body. Engages the medial deltoids and rotator cuff.'],
            ['name' => 'Outside Circles (Outward Circles)', 'equipment' => 'Battle Rope', 'category_slug' => 'cardio', 'target_muscles' => ['Shoulders', 'Forearms', 'Core'], 'description' => 'Circle the ropes outward away from the body with extended arms. Opens the chest and engages the posterior shoulder.'],
            ['name' => 'Alternating Circles (Figure-Eight)', 'equipment' => 'Battle Rope', 'category_slug' => 'coordination', 'target_muscles' => ['Shoulders', 'Obliques', 'Core', 'Forearms'], 'description' => 'Move one rope in an inward circle while the other does an outward circle, creating a figure-eight pattern. High coordination demand with oblique engagement.'],
            ['name' => 'Jumping Jack Waves', 'equipment' => 'Battle Rope', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Shoulders', 'Core'], 'description' => 'Perform alternating waves while simultaneously doing jumping jacks with the legs. Elevates heart rate rapidly and coordinates upper and lower body.'],
            ['name' => 'Squat with Waves', 'equipment' => 'Battle Rope', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Shoulders'], 'description' => 'Hold a squat position while continuously performing alternating or double waves. Challenges lower body endurance and core stability.'],
            ['name' => 'Lunge with Waves', 'equipment' => 'Battle Rope', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Shoulders'], 'description' => 'Perform alternating forward or reverse lunges while simultaneously making waves with the ropes. Full-body integration and balance.'],
            ['name' => 'Lateral Lunge with Waves', 'equipment' => 'Battle Rope', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Core', 'Shoulders'], 'description' => 'Step to the side into a lateral lunge while continuing rope waves. Targets the inner thighs and challenges lateral stability.'],
            ['name' => 'Jumping Slam (Squat Jump Slam)', 'equipment' => 'Battle Rope', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Latissimus Dorsi', 'Triceps', 'Core'], 'description' => 'Perform a rope slam, but as you slam, jump off the floor slightly. Explosive full-body power and plyometric conditioning.'],
            ['name' => 'Split Stance Waves', 'equipment' => 'Battle Rope', 'category_slug' => 'stability', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Forearms'], 'description' => 'Stand in a staggered split stance. Perform alternating or double waves while maintaining the stance. Works on unilateral leg stability and core anti-rotation.'],
            ['name' => 'Single-Arm Waves', 'equipment' => 'Battle Rope', 'category_slug' => 'stability', 'target_muscles' => ['Shoulders (unilateral)', 'Forearms', 'Obliques', 'Core'], 'description' => 'Hold one rope in a single hand, leaving the other on the floor. Whip the rope with one arm. Intensifies oblique engagement to resist rotation.'],
            ['name' => 'Plank with Rope Waves', 'equipment' => 'Battle Rope', 'category_slug' => 'core', 'target_muscles' => ['Transverse Abdominis', 'Rectus Abdominis', 'Obliques', 'Shoulders'], 'description' => 'Assume a plank position with the ropes in hand. Perform small alternating waves with one arm at a time, keeping the core braced and hips stable.'],
            ['name' => 'Seated Waves (Kneeling or Sitting)', 'equipment' => 'Battle Rope', 'category_slug' => 'isolation', 'target_muscles' => ['Shoulders', 'Forearms', 'Core'], 'description' => 'Sit on the floor or a bench, or kneel, and perform wave patterns. Removes the lower body, isolating the shoulders, arms, and upper core.'],
            ['name' => 'Tsunami Wave (Lateral Broad Wave)', 'equipment' => 'Battle Rope', 'category_slug' => 'power', 'target_muscles' => ['Obliques', 'Latissimus Dorsi', 'Glutes', 'Shoulders', 'Core'], 'description' => 'Send a massive lateral wave down the rope by forcefully whipping both arms to one side, then the other. Creates a huge side-to-side wave.'],
            ['name' => 'Rainbow (Arc) Waves', 'equipment' => 'Battle Rope', 'category_slug' => 'cardio', 'target_muscles' => ['Shoulders', 'Obliques', 'Core', 'Forearms'], 'description' => 'Hold the ropes together and make a large overhead arc from one side to the other, slamming them down at each side. Engages the entire shoulder girdle and obliques.'],
            ['name' => 'Rope Pull (Hand-Over-Hand Drag)', 'equipment' => 'Battle Rope', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Forearms', 'Core'], 'description' => 'Sit or stand and pull the rope toward you hand-over-hand. Can attach weight to the far end or pull against an anchored rope. Builds grip and back strength.'],
            ['name' => 'Rope Climb Simulator (Seated Pull)', 'equipment' => 'Battle Rope', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Forearms', 'Core'], 'description' => 'Sit on the floor with legs extended, pull the rope toward you hand-over-hand, simulating a rope climb. Engages the lats and arms.'],
            ['name' => 'Battle Rope Burpee', 'equipment' => 'Battle Rope', 'category_slug' => 'cardio', 'target_muscles' => ['Full Body', 'Quadriceps', 'Glutes', 'Shoulders', 'Core'], 'description' => 'Perform a slam, drop into a push-up position with hands on the ropes, jump feet back, do a push-up, jump feet forward, stand and repeat the slam.'],
            ['name' => 'Alternating Waves with High Knees', 'equipment' => 'Battle Rope', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Hip Flexors', 'Core', 'Shoulders', 'Forearms'], 'description' => 'Perform alternating waves while driving the knees up alternately toward the chest in a high-knee march. Increases heart rate and coordination.'],
            ['name' => 'Double Waves with Calf Raises', 'equipment' => 'Battle Rope', 'category_slug' => 'endurance', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Shoulders', 'Core'], 'description' => 'Simultaneously perform double waves and calf raises. Challenges the calves and shoulders to work rhythmically together.'],
            ['name' => 'Dynamic Lunge with Rotational Slam', 'equipment' => 'Battle Rope', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Obliques', 'Shoulders', 'Core'], 'description' => 'Hold both ropes to one side, step back into a reverse lunge while rotating the torso to slam the ropes diagonally across the body. Combines lower body, rotation, and power.'],
            ['name' => 'Isometric Hold with Waves (Wall Sit)', 'equipment' => 'Battle Rope', 'category_slug' => 'endurance', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Forearms'], 'description' => 'Assume a wall sit position against a wall and perform continuous rope waves. Severely burns the quads while challenging shoulder endurance.'],
        ];

        foreach ($execises as $data) {
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
