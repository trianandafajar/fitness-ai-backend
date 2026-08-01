<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class AxleBarSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Axle Bar Deadlift (Standard)', 'equipment' => 'Axle Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Quadriceps', 'Traps', 'Forearms', 'Grip'], 'description' => 'Stand with feet hip-width, grip the bar with a double overhand or mixed grip. Due to the 2-inch thickness and lack of knurling, this heavily taxes the grip. Pull by extending hips and knees until standing tall.'],
            ['name' => 'Axle Bar Deficit Deadlift', 'equipment' => 'Axle Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Quadriceps', 'Traps', 'Forearms', 'Grip'], 'description' => 'Stand on a plate or platform to increase the range of motion. The thick bar challenges grip endurance and reinforces full-body power from a deeper start.'],
            ['name' => 'Axle Bar Rack Pull', 'equipment' => 'Axle Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Traps', 'Grip'], 'description' => 'Set pins just below the knees. Pull the bar from this elevated position. Overloads lockout and grip without the full range of motion.'],
            ['name' => 'Axle Bar Clean (Continental Clean)', 'equipment' => 'Axle Bar', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae', 'Traps', 'Biceps', 'Forearms', 'Core'], 'description' => 'Pull the bar from the floor, resting it on the belt or gut, then re-grip and pull it onto the chest. The thick bar and no rotation require a staggered hand transition.'],
            ['name' => 'Axle Bar Power Clean', 'equipment' => 'Axle Bar', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Traps', 'Deltoids', 'Biceps', 'Forearms', 'Core'], 'description' => 'Explosively pull the bar from the floor and catch it on the shoulders without a squat. The thick bar forces a strong hook or finger grip to prevent slipping.'],
            ['name' => 'Axle Bar Hang Clean', 'equipment' => 'Axle Bar', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Traps', 'Biceps', 'Forearms', 'Core'], 'description' => 'Start with the bar at hip level, dip, then explosively pull and catch it on the chest. Emphasizes the second pull and grip under fatigue.'],
            ['name' => 'Axle Bar Strict Press (Overhead Press)', 'equipment' => 'Axle Bar', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Upper Traps', 'Core'], 'description' => 'With the bar in the front rack position, press it overhead without leg drive. The thick bar forces the forearms and wrists to work harder to stabilize.'],
            ['name' => 'Axle Bar Push Press', 'equipment' => 'Axle Bar', 'category_slug' => 'power', 'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Quadriceps', 'Core'], 'description' => 'Dip, drive, and press the bar overhead. Leg drive overcomes the heavier load, while grip and wrist strength are constantly challenged.'],
            ['name' => 'Axle Bar Push Jerk', 'equipment' => 'Axle Bar', 'category_slug' => 'power', 'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Quadriceps', 'Glutes', 'Core'], 'description' => 'Dip, drive, and re-dip under the bar to catch it with locked arms, then stand. The axle\'s thickness requires a secure grip to receive the weight overhead.'],
            ['name' => 'Axle Bar Clean & Press', 'equipment' => 'Axle Bar', 'category_slug' => 'power', 'target_muscles' => ['Full Body: Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae', 'Traps', 'Deltoids', 'Triceps', 'Core'], 'description' => 'Clean the axle bar to the shoulders (using continental or power clean), then press it overhead. Strongman staple that tests grip, power, and shoulder strength.'],
            ['name' => 'Axle Bar Bent-Over Row', 'equipment' => 'Axle Bar', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Traps', 'Biceps', 'Rear Deltoids', 'Erector Spinae', 'Forearms'], 'description' => 'Hinge forward with a flat back, grip the bar just outside the legs, row it to the lower abdomen. The thick bar intensively trains the grip and back simultaneously.'],
            ['name' => 'Axle Bar Upright Row', 'equipment' => 'Axle Bar', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Upper Traps', 'Biceps', 'Forearms'], 'description' => 'Hold the bar with a narrow grip, pull it along the body to chin height, leading with the elbows. Grip endurance limits the reps before the shoulders do.'],
            ['name' => 'Axle Bar Shrug', 'equipment' => 'Axle Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae', 'Forearms'], 'description' => 'Hold the bar at arm\'s length in front, shrug the shoulders upward toward the ears. The thick bar builds massive grip and trap strength.'],
            ['name' => 'Axle Bar Curl', 'equipment' => 'Axle Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii', 'Brachialis', 'Forearms'], 'description' => 'Stand holding the bar with an underhand grip, curl it up while keeping the elbows stationary. The thick diameter heavily recruits the forearm flexors and brachialis.'],
            ['name' => 'Axle Bar Reverse Curl', 'equipment' => 'Axle Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Brachioradialis', 'Wrist Extensors', 'Biceps'], 'description' => 'Use an overhand grip, curl the bar up. The thick bar and pronated grip severely challenge the wrist extensors and brachioradialis.'],
            ['name' => 'Axle Bar Hammer Curl (Neutral Grip)', 'equipment' => 'Axle Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps', 'Brachialis', 'Brachioradialis', 'Forearms'], 'description' => 'If the axle has neutral grip handles or you lift it using plates as handles, curl the bar with palms facing each other. Targets the brachialis with extreme grip demand.'],
            ['name' => 'Axle Bar Drag Curl', 'equipment' => 'Axle Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii', 'Brachialis', 'Forearms'], 'description' => 'Slide the bar up the front of the body, pulling elbows back. The thick bar keeps constant tension on the biceps and forearms.'],
            ['name' => 'Axle Bar Lying Triceps Extension (Skull Crusher)', 'equipment' => 'Axle Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Triceps Brachii'], 'description' => 'Lie on a bench, press the bar overhead, lower it toward the forehead by bending elbows, then extend. The thick bar tests tricep control without knurling.'],
            ['name' => 'Axle Bar Overhead Triceps Extension', 'equipment' => 'Axle Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Triceps Brachii (Long Head)'], 'description' => 'Sit or stand holding the bar overhead, lower it behind the head, then extend. The thick bar challenges grip and shoulder stability.'],
            ['name' => 'Axle Bar Front Squat', 'equipment' => 'Axle Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Upper Back'], 'description' => 'Rest the bar on the front delts with the elbows high. Squat down while maintaining an upright posture. The lack of knurling forces the bar to sit securely on the shoulders.'],
            ['name' => 'Axle Bar Back Squat (Low Bar)', 'equipment' => 'Axle Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Erector Spinae', 'Core'], 'description' => 'Position the bar across the rear deltoids, squat to parallel or below. The thick bar makes it difficult to grip and stabilize, increasing upper back demand.'],
            ['name' => 'Axle Bar Zercher Squat', 'equipment' => 'Axle Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Biceps'], 'description' => 'Hold the bar in the crooks of the elbows and squat. The axle\'s thickness makes this extremely uncomfortable and demanding on the biceps and forearms.'],
            ['name' => 'Axle Bar Farmer\'s Walk', 'equipment' => 'Axle Bar', 'category_slug' => 'endurance', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes'], 'description' => 'Deadlift the axle bar to standing, hold it with both hands, and walk for distance. The thick bar builds world-class grip strength and full-body stability.'],
            ['name' => 'Axle Bar Suitcase Carry', 'equipment' => 'Axle Bar', 'category_slug' => 'stability', 'target_muscles' => ['Obliques', 'Core', 'Forearms', 'Traps', 'Gluteus Medius'], 'description' => 'Grip the axle bar in one hand, keeping it level, and walk while resisting lateral lean. The thick bar intensifies the anti-lateral flexion challenge.'],
            ['name' => 'Axle Bar Overhead Carry (Lockout Walk)', 'equipment' => 'Axle Bar', 'category_slug' => 'stability', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Traps', 'Forearms'], 'description' => 'Press the axle bar overhead with locked arms and walk. The thick bar demands constant grip tension and shoulder stabilization during movement.'],
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
