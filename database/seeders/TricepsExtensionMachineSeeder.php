<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class TricepsExtensionMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Standard Triceps Extension (Neutral Grip)',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps Brachii (Lateral Head, Medial Head, Long Head)'],
                'description' => 'Sit with back flat, grasp neutral grip handles, press down until arms are fully extended, squeeze triceps, then return slowly to the start without locking out.',
            ],
            [
                'name' => 'Standard Triceps Extension (Pronated Grip)',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps Brachii (Lateral Head emphasis)', 'Medial Head'],
                'description' => 'Grasp handles with palms facing down. Press down to full extension, keeping elbows stationary, and control the weight on the way back.',
            ],
            [
                'name' => 'Single-Arm Triceps Extension',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps Brachii', 'Core'],
                'description' => 'Perform the extension with one arm while the other remains stationary. Corrects muscle imbalances and requires slight core engagement to maintain stability.',
            ],
            [
                'name' => 'Alternating Triceps Extension',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps Brachii', 'Core'],
                'description' => 'Press one arm at a time in a seesaw rhythm. Increases time under tension per arm and demands core anti-rotation.',
            ],
            [
                'name' => 'Reverse Grip Triceps Extension (Supinated Grip)',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps Brachii (Medial Head emphasis)', 'Long Head'],
                'description' => 'If the machine allows, grasp handles with palms facing up (supinated). Press down keeping elbows close; targets the medial head more directly.',
            ],
            [
                'name' => 'Overhead Triceps Extension (Machine Variation)',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps Brachii (Long Head emphasis)'],
                'description' => 'If the machine converts to an overhead position, sit facing away and press handles upward. Stretches the long head intensely and fully contracts it overhead.',
            ],
            [
                'name' => 'Pause Triceps Extension',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Triceps Brachii (All Heads)'],
                'description' => 'At full extension, pause and squeeze the triceps for 1-2 seconds before slowly returning. Eliminates momentum and increases peak contraction.',
            ],
            [
                'name' => 'Eccentric-Emphasis Triceps Extension',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps Brachii (All Heads)'],
                'description' => 'Press down quickly (concentric), then take 3-5 seconds to resist the weight on the way back up. Overloads the eccentric phase for muscle growth.',
            ],
            [
                'name' => 'Tempo Triceps Extension (3-1-3)',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Triceps Brachii (All Heads)'],
                'description' => '3 seconds to press down, 1-second squeeze at lockout, 3 seconds to return. Maximizes time under tension and control.',
            ],
            [
                'name' => 'Isometric Hold Triceps Extension',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps Brachii (All Heads)', 'Core'],
                'description' => 'Press to a specific angle (e.g., 90 degrees or full lockout) and hold for 10-30 seconds. Builds static strength and triceps endurance.',
            ],
            [
                'name' => 'Partial Reps (Top Half)',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Triceps Brachii (Lateral Head emphasis)'],
                'description' => 'Only move through the top half of the range, from mid-point to full lockout. Keeps continuous tension on the triceps near full contraction.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half)',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Triceps Brachii (Long Head emphasis)'],
                'description' => 'Work from the starting position (elbows deeply bent) to the midpoint. Emphasizes the stretch and initial tricep activation.',
            ],
            [
                'name' => '21s Triceps Extension',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Triceps Brachii (All Heads)'],
                'description' => '7 bottom-half reps, 7 top-half reps, then 7 full-range reps without rest. Intense technique for triceps pump and growth.',
            ],
            [
                'name' => 'Pulse Triceps Extension',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Triceps Brachii (All Heads)'],
                'description' => 'At the fully pressed position, perform small, rapid pulses without bending the elbows back fully. Creates constant tension and a deep burn.',
            ],
            [
                'name' => 'Explosive Triceps Extension',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Triceps Brachii (All Heads)'],
                'description' => 'Use a moderate weight, press down as fast as possible, then return under control. Develops explosive pushing power and rate of force production.',
            ],
            [
                'name' => 'Negative Triceps Extension (Bilateral Concentric, Unilateral Eccentric)',
                'equipment' => 'Triceps Extension Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps Brachii', 'All Heads'],
                'description' => 'Press the weight down with both arms, then lower with one arm over 4-5 seconds. Provides heavy eccentric overload to one tricep.',
            ],
        ];

        $sourceDir = public_path('execises/triceps-extension-machine');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
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
