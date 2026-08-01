<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class RotaryTorsoMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Seated Rotary Torso',
                'equipment' => 'Rotary Torso Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques (External and Internal)', 'Rectus Abdominis', 'Transverse Abdominis'],
                'description' => 'Sit with chest against the pad or arms secured, rotate the torso smoothly to one side as far as possible, return to center, and repeat to the other side. Keep hips stationary and movement controlled.',
            ],
            [
                'name' => 'Single-Side Rotary Torso',
                'equipment' => 'Rotary Torso Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques (unilateral)', 'Rectus Abdominis', 'Transverse Abdominis'],
                'description' => 'Perform all repetitions rotating to only one side before switching. Emphasizes unilateral oblique strength and corrects imbalances.',
            ],
            [
                'name' => 'Pause Rotary Torso',
                'equipment' => 'Rotary Torso Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Obliques', 'Rectus Abdominis'],
                'description' => 'At the fully rotated position, pause and squeeze the obliques for 1-2 seconds before returning to center. Eliminates momentum and intensifies contraction.',
            ],
            [
                'name' => 'Eccentric-Emphasis Rotary Torso',
                'equipment' => 'Rotary Torso Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Transverse Abdominis'],
                'description' => 'Rotate quickly to the side, then resist the return to center over 3-5 seconds. Overloads the eccentric phase of the obliques.',
            ],
            [
                'name' => 'Tempo Rotary Torso (3-1-3)',
                'equipment' => 'Rotary Torso Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Obliques', 'Rectus Abdominis'],
                'description' => 'Take 3 seconds to rotate, 1-second squeeze at the end, and 3 seconds to return. Maximizes time under tension.',
            ],
            [
                'name' => 'Isometric Hold Rotary Torso',
                'equipment' => 'Rotary Torso Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Transverse Abdominis'],
                'description' => 'Rotate to the point of maximal contraction or mid-range and hold for 10-30 seconds. Builds static core strength and stability.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Rotary Torso',
                'equipment' => 'Rotary Torso Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Obliques (peak contraction zone)'],
                'description' => 'Only rotate through the final half of the range, from midpoint to full rotation. Keeps constant tension on the obliques.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Rotary Torso',
                'equipment' => 'Rotary Torso Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Obliques', 'Rectus Abdominis'],
                'description' => 'Move from the starting position to the midpoint only, focusing on initial core engagement and stretch.',
            ],
            [
                'name' => '21s Rotary Torso',
                'equipment' => 'Rotary Torso Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Obliques', 'Rectus Abdominis'],
                'description' => 'Perform 7 bottom-half reps, 7 top-half reps, and 7 full-range reps to one side without rest, then switch. Intensely fatigues the obliques.',
            ],
            [
                'name' => 'Pulse Rotary Torso',
                'equipment' => 'Rotary Torso Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Obliques'],
                'description' => 'At the fully rotated position, perform small, rapid pulses without returning to center. Maintains continuous tension and creates a deep burn.',
            ],
            [
                'name' => 'High-Rep Rotary Torso (Endurance)',
                'equipment' => 'Rotary Torso Machine',
                'category_slug' => 'endurance',
                'target_muscles' => ['Obliques', 'Transverse Abdominis'],
                'description' => 'Use a light weight and perform 20-50+ continuous rotational reps, alternating sides, to build core muscular endurance.',
            ],
        ];

        $sourceDir = public_path('exercises/rotary-torso-machine');
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
