<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class TrapBarSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Trap Bar Deadlift (Low Handle)', 'equipment' => 'Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Erector Spinae', 'Traps', 'Grip'], 'description' => 'Stand inside the trap bar, grab the low handles with a neutral grip. Keep your back flat and chest up. Drive through the legs by extending the hips and knees until standing tall. The lower handle increases the range of motion, building full-body strength.'],
            ['name' => 'Trap Bar Deadlift (High Handle)', 'equipment' => 'Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Erector Spinae', 'Traps', 'Grip'], 'description' => 'Use the raised handles on the trap bar. This shortens the range of motion, reducing the demand on the lower back while still overloading the hips and legs. Ideal for heavier loading or for those with limited mobility.'],
            ['name' => 'Trap Bar Romanian Deadlift', 'equipment' => 'Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae'], 'description' => 'Stand holding the trap bar at hip level with a slight knee bend. Hinge at the hips to push them back, keeping the back straight. Lower the bar until a deep stretch is felt in the hamstrings, then drive the hips forward to return.'],
            ['name' => 'Trap Bar Stiff-Leg Deadlift', 'equipment' => 'Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae'], 'description' => 'Keep your legs almost straight and push your hips back to lower the trap bar toward the floor. The neutral grip helps isolate the posterior chain with less back strain.'],
            ['name' => 'Trap Bar Deficit Deadlift', 'equipment' => 'Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Erector Spinae'], 'description' => 'Stand on a small platform or plates to increase the range of motion while holding the low handles. Enhances strength off the floor and increases muscle activation.'],
            ['name' => 'Trap Bar Pause Deadlift', 'equipment' => 'Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core'], 'description' => 'Pull the bar just a few inches off the floor and hold for 1–2 seconds before finishing the lift. Removes momentum and builds explosive starting strength.'],
            ['name' => 'Trap Bar Eccentric-Emphasis Deadlift', 'equipment' => 'Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae'], 'description' => 'Lift the weight quickly, then lower it back to the floor over 3–5 seconds. Intensifies the negative phase for muscle growth and control.'],
            ['name' => 'Trap Bar Farmer\'s Walk', 'equipment' => 'Trap Bar', 'category_slug' => 'endurance', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes'], 'description' => 'Deadlift the trap bar to standing, then walk forward for distance or time. Maintain an upright posture and tight grip. Excellent for building grip strength and full-body stability.'],
            ['name' => 'Trap Bar Shrug', 'equipment' => 'Trap Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae'], 'description' => 'Hold the trap bar with the high handles. Keeping your arms straight, shrug your shoulders upward toward your ears, squeeze at the top, and lower with control.'],
            ['name' => 'Trap Bar Jump Shrug', 'equipment' => 'Trap Bar', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Traps', 'Shoulders'], 'description' => 'From a deadlift starting position, explosively extend the ankles, knees, and hips while shrugging the shoulders upward. The feet may leave the floor slightly. Develops triple extension power.'],
            ['name' => 'Trap Bar Bent-Over Row', 'equipment' => 'Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Middle Traps', 'Biceps', 'Erector Spinae'], 'description' => 'Hinge forward while holding the trap bar with the high handles. Pull the bar toward your lower abdomen, squeezing the shoulder blades together. The neutral grip reduces wrist strain.'],
            ['name' => 'Trap Bar Overhead Press', 'equipment' => 'Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Core'], 'description' => 'Grip the high handles and clean the bar to your shoulders. Press the trap bar overhead to full lockout. The neutral grip can be more shoulder-friendly than a straight bar.'],
            ['name' => 'Trap Bar Suitcase Carry', 'equipment' => 'Trap Bar', 'category_slug' => 'stability', 'target_muscles' => ['Obliques', 'Core', 'Forearms', 'Gluteus Medius'], 'description' => 'Deadlift the trap bar with one hand to the side, keeping the bar level. Walk forward while resisting the urge to lean to the side. This dramatically challenges the obliques and anti-lateral flexion.'],
            ['name' => 'Trap Bar Split Squat', 'equipment' => 'Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Stand inside the trap bar with a staggered stance (one foot forward, one back). Grip the high handles and squat down, then drive back up. Adds a different loading profile to the unilateral leg movement.'],
            ['name' => 'Trap Bar Floor Press', 'equipment' => 'Trap Bar', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Pectoralis Major', 'Anterior Deltoids'], 'description' => 'Lie on the floor inside the trap bar, grip the low handles. Press the bar upward until the arms are fully extended. The fixed neutral grip mimics a dumbbell press with built-in safety.'],
        ];


        $sourceDir = public_path('execises/trap-bar');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $imagePath = Storage::disk('public')->putFile('execises', new File($sourceFile));
                $data['image'] = $imagePath;
            }

            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;

            Exercise::create($data);
        }
    }
}
