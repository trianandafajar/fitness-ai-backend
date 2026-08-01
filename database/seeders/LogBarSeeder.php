<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class LogBarSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Log Clean (From Floor)', 'equipment' => 'Log Bar', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae', 'Traps', 'Biceps', 'Forearms', 'Core'], 'description' => 'Grip the log by its internal handles in a squat stance. Pull the log from the floor explosively, extending hips and knees, and catch it high on the chest in the front rack position with the elbows high. The log rests on the shoulders, not the hands.'],
            ['name' => 'Log Clean (From Lap)', 'equipment' => 'Log Bar', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae', 'Traps', 'Core'], 'description' => 'Start with the log resting on the lap, arms bent. Explosively extend the hips and knees, pulling the log upward and catching it on the chest. Reduces the pull from the floor and emphasizes hip drive.'],
            ['name' => 'Log Hang Clean', 'equipment' => 'Log Bar', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae', 'Traps', 'Core'], 'description' => 'Begin with the log at hip level, dip slightly, then forcefully extend the hips, knees, and ankles, pulling the log onto the chest in one motion. Emphasizes the second pull.'],
            ['name' => 'Log Strict Press (Overhead Press)', 'equipment' => 'Log Bar', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Upper Traps', 'Core'], 'description' => 'With the log in the front rack position, press it overhead without any leg drive. Lock the arms fully and stabilize the weight overhead. Tests pure shoulder and triceps strength.'],
            ['name' => 'Log Push Press', 'equipment' => 'Log Bar', 'category_slug' => 'power', 'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Quadriceps', 'Core'], 'description' => 'Dip slightly at the knees, then drive explosively upward and press the log overhead in one motion. The leg drive assists the press, allowing heavier weights than a strict press.'],
            ['name' => 'Log Push Jerk', 'equipment' => 'Log Bar', 'category_slug' => 'power', 'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Quadriceps', 'Glutes', 'Core'], 'description' => 'Dip, drive, and re-dip under the log to catch it with locked arms overhead, then stand. The log remains in a stable position; the legs absorb the weight before locking out.'],
            ['name' => 'Log Split Jerk', 'equipment' => 'Log Bar', 'category_slug' => 'power', 'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Similar to the push jerk, but split the legs into a lunge position to catch the log overhead, then recover to standing. The split allows greater stability under maximum loads.'],
            ['name' => 'Log Clean & Press (Full Movement)', 'equipment' => 'Log Bar', 'category_slug' => 'power', 'target_muscles' => ['Full Body: Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae', 'Traps', 'Deltoids', 'Triceps', 'Core'], 'description' => 'Clean the log from the floor to the shoulders, then press it overhead. This can be done as a strict press, push press, or jerk. A true strongman classic.'],
            ['name' => 'Log Clean & Jerk', 'equipment' => 'Log Bar', 'category_slug' => 'power', 'target_muscles' => ['Full Body: Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae', 'Deltoids', 'Triceps', 'Core'], 'description' => 'Clean the log to the chest, then drive it overhead using a split or push jerk. The complete Olympic-style lift adapted for the log.'],
            ['name' => 'Log Viper Press (One-Motion Press)', 'equipment' => 'Log Bar', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Deltoids', 'Triceps', 'Core'], 'description' => 'From the floor, in one explosive movement, clean the log and immediately press it overhead without pausing in the front rack. A high-speed, full-body power movement.'],
            ['name' => 'Log Front Squat', 'equipment' => 'Log Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Upper Back'], 'description' => 'With the log resting on the chest and front delts, squat down while maintaining an upright torso. The neutral grip handles and thick diameter challenge the upper back and core stability.'],
            ['name' => 'Log Zercher Squat', 'equipment' => 'Log Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Biceps'], 'description' => 'Hold the log in the crooks of the elbows (Zercher position) and squat down. The forward load forces massive core engagement and tests upper body strength.'],
            ['name' => 'Log Deadlift (Neutral Grip)', 'equipment' => 'Log Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Quadriceps', 'Traps', 'Forearms'], 'description' => 'Stand over the log, grip the internal handles, and deadlift it with a neutral grip. The log\'s thickness increases grip demand and the handles reduce range of motion slightly.'],
            ['name' => 'Log Bent-Over Row (Neutral Grip)', 'equipment' => 'Log Bar', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Traps', 'Biceps', 'Rear Deltoids', 'Erector Spinae'], 'description' => 'Hinge forward, hold the log by the handles, and row it to the lower abdomen. The thick bar and neutral grip emphasize the lats and upper back.'],
            ['name' => 'Log Shrug', 'equipment' => 'Log Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae'], 'description' => 'Hold the log at arm\'s length with the neutral handles, then shrug the shoulders up to the ears, squeezing at the top. The thick bar builds grip and trap strength.'],
            ['name' => 'Log Front Rack Carry', 'equipment' => 'Log Bar', 'category_slug' => 'endurance', 'target_muscles' => ['Core', 'Upper Back', 'Shoulders', 'Biceps', 'Quadriceps', 'Glutes'], 'description' => 'Clean the log to the front rack position and walk for distance or time. Maintain an upright posture while the heavy log tests full-body stability and endurance.'],
            ['name' => 'Log Overhead Carry', 'equipment' => 'Log Bar', 'category_slug' => 'stability', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Traps', 'Glutes'], 'description' => 'Press the log overhead and lock out the arms, then walk. Demands extreme shoulder stability, core strength, and balance under a moving load.'],
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
