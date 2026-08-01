<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AbdominalCrunchMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Standard Seated Abdominal Crunch',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'Sit with chest against the pad or hands on handles, select weight, and crunch forward by contracting the abs, bringing the ribcage toward the pelvis. Pause and squeeze at the bottom, then return with control.',
            ],
            [
                'name' => 'Weighted Abdominal Crunch (Heavy)',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Rectus Abdominis', 'Obliques', 'Transverse Abdominis'],
                'description' => 'Use a heavier weight on the stack, perform the standard crunch with a powerful concentric contraction against higher resistance to build abdominal strength and muscle density.',
            ],
            [
                'name' => 'High-Rep Abdominal Crunch (Endurance)',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'endurance',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'Select a light weight and perform 20-50+ reps to fatigue, focusing on continuous tension and burn to improve muscular endurance and core stamina.',
            ],
            [
                'name' => 'Pause Abdominal Crunch',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'At the fully contracted position (elbows near knees or pad closest), hold the peak contraction for 1-2 seconds, forcefully squeezing the abs before returning.',
            ],
            [
                'name' => 'Eccentric-Emphasis Abdominal Crunch',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'Curl forward quickly (concentric), then take 3-5 seconds to slowly resist the weight as you return to the starting position, overloading the negative phase.',
            ],
            [
                'name' => 'Tempo Abdominal Crunch (3-1-3)',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'Take 3 seconds to crunch forward, hold the peak squeeze for 1 second, then take 3 seconds to return. Maximizes time under tension for ab development.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Abdominal Crunch',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rectus Abdominis (peak contraction zone)'],
                'description' => 'Only move through the final half of the crunch, from the midpoint to full contraction. Keeps constant tension on the upper abs and intensifies the squeeze.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Abdominal Crunch',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rectus Abdominis (stretch emphasis)'],
                'description' => 'Work from the extended starting position to the mid-point only, focusing on the initial abdominal contraction and stretch.',
            ],
            [
                'name' => '21s Abdominal Crunch',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'Perform 7 bottom-half reps, 7 top-half reps, then 7 full-range reps without any rest. An intense technique to fully fatigue the entire abdominal wall.',
            ],
            [
                'name' => 'Pulse Abdominal Crunch',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'At the bottom contracted position, perform small, rapid pulsing crunches without allowing the weight stack to rest. Maintains constant tension and creates a deep burn.',
            ],
            [
                'name' => 'Isometric Hold Abdominal Crunch (Mid-Range)',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Rectus Abdominis', 'Transverse Abdominis', 'Core'],
                'description' => 'Crunch to a position where the abs are highly activated (typically midway) and hold statically for 10-30 seconds. Builds core stability and endurance.',
            ],
            [
                'name' => 'Rotary Abdominal Crunch (Oblique Twist)',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Transverse Abdominis'],
                'description' => 'Crunch forward while simultaneously twisting the torso to one side, bringing the elbow toward the opposite knee. Alternate sides each rep to engage the obliques.',
            ],
            [
                'name' => 'Side-Bend Crunch (Oblique Focus)',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Obliques', 'Rectus Abdominis (lateral)'],
                'description' => 'Shift your weight slightly to one side and crunch down at an angle, targeting the obliques on that side. Perform all reps on one side before switching.',
            ],
            [
                'name' => 'Single-Side Abdominal Crunch',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rectus Abdominis', 'Obliques (unilateral)'],
                'description' => 'Crunch forward while consciously shifting tension to one side of the rectus abdominis. Helps to address imbalances and improve mind-muscle connection.',
            ],
            [
                'name' => 'Explosive Abdominal Crunch',
                'equipment' => 'Abdominal Crunch Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'Use a moderate weight, crunch forward as fast and explosively as possible, then return under control. Develops explosive core contraction power.',
            ],
        ];

        $sourceDir = public_path('execises/abdominal-crunch-machine');
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