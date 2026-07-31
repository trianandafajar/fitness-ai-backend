<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

class SeatedRowMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Close Grip V-Bar Seated Row',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Middle Trapezius', 'Biceps', 'Rear Deltoids', 'Erector Spinae'],
                'description' => 'Sit with feet on platform, grasp V-bar with neutral grip, pull to lower abdomen while squeezing shoulder blades, then extend arms with control.',
            ],
            [
                'name' => 'Wide Grip Seated Row (Overhand)',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Middle Traps', 'Rear Deltoids', 'Biceps'],
                'description' => 'Attach a wide lat bar, grip with wide overhand (pronated) hands. Pull to upper abdomen, flaring elbows out to emphasize upper back and rear delts.',
            ],
            [
                'name' => 'Reverse Grip Seated Row (Underhand)',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Brachialis', 'Rhomboids', 'Middle Traps'],
                'description' => 'Use a shoulder-width underhand (supinated) grip on a straight bar or EZ-bar. Pull to lower belly, keeping elbows close to body, increasing bicep recruitment.',
            ],
            [
                'name' => 'Rope Seated Row (Neutral Grip)',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Middle Traps', 'Biceps', 'Brachialis'],
                'description' => 'Attach a rope, grasp ends with palms facing each other. Pull rope to torso, spreading the ropes apart at the end for a better contraction.',
            ],
            [
                'name' => 'Single-Arm Seated Row',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps', 'Core'],
                'description' => 'Use a single D-handle, pull with one arm while keeping torso stable. Corrects imbalances and engages obliques for anti-rotation.',
            ],
            [
                'name' => 'Alternating Single-Arm Seated Row',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps', 'Core'],
                'description' => 'Pull one arm at a time in a seesaw rhythm, increasing time under tension per side and requiring core stabilization.',
            ],
            [
                'name' => 'Straight Bar Seated Row (Overhand, Shoulder-Width)',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Middle Traps', 'Biceps'],
                'description' => 'Use a straight bar with overhand grip, hands shoulder-width. Pull to lower abdomen, keeping elbows slightly flared. Classic back-building movement.',
            ],
            [
                'name' => 'Pause Seated Row',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps'],
                'description' => 'Pull handle to torso, pause for 1-2 seconds squeezing back muscles at peak contraction. Eliminates momentum and strengthens the contraction.',
            ],
            [
                'name' => 'Eccentric-Emphasis Seated Row',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps'],
                'description' => 'Pull quickly, then take 3-5 seconds to slowly extend arms, overloading the negative phase for muscle growth and strength.',
            ],
            [
                'name' => 'Tempo Seated Row (3-1-3)',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps'],
                'description' => '3 seconds concentric pull, 1-second squeeze, 3 seconds eccentric return. Maximizes time under tension for back development.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Seated Row',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps'],
                'description' => 'Only perform the final half of the movement, from mid-point to fully pulled back. Keeps constant tension on the lats at peak squeeze.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Seated Row',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids'],
                'description' => 'Move only from the fully stretched arm position to the midpoint. Emphasizes the initial pull and lat stretch.',
            ],
            [
                'name' => '21s Seated Row',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps'],
                'description' => 'Perform 7 bottom-half reps, 7 top-half reps, then 7 full-range reps without rest. Intensely fatigues the entire back.',
            ],
            [
                'name' => 'Pulse Seated Row',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Rhomboids'],
                'description' => 'At the fully contracted position, perform small rapid pulses without letting the handle move forward. Creates a deep metabolic burn.',
            ],
            [
                'name' => 'Isometric Hold Seated Row',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps', 'Core'],
                'description' => 'Pull handle to torso and hold the position for 10-30 seconds. Builds static strength and muscular endurance in the back.',
            ],
            [
                'name' => 'Explosive Seated Row',
                'equipment' => 'Seated Row Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps'],
                'description' => 'Use moderate weight, pull handle as fast as possible, then return under control. Develops explosive pulling power and rate of force production.',
            ],
        ];

        $sourceDir = public_path('exercises/seated-row-machine');
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
            $data['category_id'] = $categoryId;

            Exercise::create($data);
        }
    }
}
