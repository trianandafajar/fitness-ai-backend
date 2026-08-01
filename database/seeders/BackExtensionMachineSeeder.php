<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class BackExtensionMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => '45-Degree Back Extension (Bodyweight)',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Position yourself on the 45-degree bench with hips just above the pad and ankles secured. Cross arms over chest, hinge at the hips to lower your torso toward the floor, then lift back to neutral using the lower back and glutes. Do not hyperextend.',
            ],
            [
                'name' => 'Weighted Back Extension (Plate or Dumbbell)',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Perform the standard 45-degree back extension while holding a weight plate or dumbbell against your chest. Add resistance progressively to build spinal erector and glute strength.',
            ],
            [
                'name' => 'Roman Chair Back Extension (Horizontal)',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'If the machine adjusts to a horizontal position (Roman Chair), lie face down with hips on the pad. Lift the torso until the body forms a straight line, squeezing the glutes and back muscles. More challenging due to the longer lever arm.',
            ],
            [
                'name' => 'Pause Back Extension',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Lift the torso to the fully extended position and hold for 1-3 seconds, squeezing the glutes and erector spinae. Eliminates momentum and enhances muscle activation.',
            ],
            [
                'name' => 'Tempo Back Extension (3-1-3)',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Take 3 seconds to lift, pause 1 second at the top, then take 3 seconds to lower. Increases time under tension for muscular endurance and growth.',
            ],
            [
                'name' => 'Eccentric-Emphasis Back Extension',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings'],
                'description' => 'Lift to the top quickly, then lower the torso very slowly over 4-5 seconds. Overloads the eccentric (lowering) phase, promoting strength and muscle damage.',
            ],
            [
                'name' => 'Single-Leg Back Extension',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'stability',
                'target_muscles' => ['Erector Spinae', 'Glutes (unilateral)', 'Hamstrings', 'Core'],
                'description' => 'Perform the movement with only one leg secured, the other leg tucked toward the chest. This increases the demand on the working glute and challenges pelvic stability.',
            ],
            [
                'name' => 'Band-Resisted Back Extension',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings'],
                'description' => 'Anchor a resistance band under the footplate and loop it around your upper back. The band adds accommodating resistance, increasing the load at the top where the back is strongest.',
            ],
            [
                'name' => 'Isometric Hold Back Extension (Top Position)',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Core'],
                'description' => 'Lift until the body is in a straight line and hold that position for 10-30 seconds. Builds static endurance in the entire posterior chain.',
            ],
            [
                'name' => 'Pulse Back Extension (Top Partial)',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Erector Spinae', 'Glutes'],
                'description' => 'At the top of the movement, perform small, rapid pulses without fully lowering the torso. Creates constant tension and a deep burn in the spinal erectors and glutes.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Back Extension',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Erector Spinae', 'Glutes'],
                'description' => 'Work only the upper half of the range, from the mid-point to full hip extension. Emphasizes peak contraction and maintains continuous muscle tension.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Back Extension',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Erector Spinae', 'Hamstrings', 'Glutes'],
                'description' => 'Move from the fully flexed (bottom) position to the mid-point only, focusing on the initial contraction and stretch of the hamstrings and lower back.',
            ],
            [
                'name' => '21s Back Extension',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings'],
                'description' => 'Perform 7 bottom-half reps, 7 top-half reps, then 7 full-range reps without rest. An intense metabolic stress technique for the posterior chain.',
            ],
            [
                'name' => 'Twisting Back Extension',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Obliques', 'Glutes', 'Multifidus'],
                'description' => 'At the top of each extension, rotate the torso to one side, pause, return to center, and then lower. Alternate sides each rep to engage the obliques and deep spinal muscles.',
            ],
            [
                'name' => 'Machine Back Extension (Lever/Selectorized)',
                'equipment' => 'Back Extension Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Erector Spinae', 'Glutes'],
                'description' => 'Sit in the dedicated back extension machine with a chest pad or back pad. Push backward against the resistance lever, extending the spine against the load. The machine isolates the lower back without the need for a hip hinge.',
            ],
        ];

        $sourceDir = public_path('execises/back-extension-machine');
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
