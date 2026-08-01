<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ChestPressMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Standard Chest Press (Neutral Grip)',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Sit with back flat, grasp neutral-grip handles at chest level, press forward to full extension without locking elbows, then return slowly.',
            ],
            [
                'name' => 'Standard Chest Press (Pronated Grip)',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Use an overhand (pronated) grip if available. Press the handles forward, keeping wrists straight, to emphasize mid-chest fibers.',
            ],
            [
                'name' => 'Wide Grip Chest Press',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major (outer fibers)', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Grip the widest set of handles or position arms wide. Increases stretch across the chest and targets outer pec fibers.',
            ],
            [
                'name' => 'Close Grip Chest Press',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Inner Pectoralis', 'Anterior Deltoids'],
                'description' => 'Use a narrow grip, hands shoulder-width or closer. Shifts emphasis to triceps and inner chest while reducing shoulder strain.',
            ],
            [
                'name' => 'Single-Arm Chest Press',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'stability',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps', 'Core'],
                'description' => 'Press with one arm at a time while keeping the other handle stationary. Corrects imbalances and challenges core anti-rotation.',
            ],
            [
                'name' => 'Alternating Arm Chest Press',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'stability',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps', 'Core'],
                'description' => 'Press arms alternately in a seesaw pattern. Increases time under tension and recruits stabilizers to maintain alignment.',
            ],
            [
                'name' => 'Eccentric-Emphasis Chest Press',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Press forward quickly, then take 3-5 seconds to resist the return. Overloads the eccentric phase for muscle growth and strength.',
            ],
            [
                'name' => 'Tempo Chest Press (3-1-3)',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'],
                'description' => '3 seconds to press out, 1-second pause at full extension, 3 seconds to return. Maximizes time under tension and control.',
            ],
            [
                'name' => 'Pause Chest Press',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Triceps'],
                'description' => 'Press to full extension and hold for 1-2 seconds before returning. Eliminates momentum and increases peak contraction intensity.',
            ],
            [
                'name' => 'Explosive Chest Press',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Use a moderate weight, press forward as fast as possible, then return under control. Develops upper-body power and rate of force production.',
            ],
            [
                'name' => 'Partial Reps (Top Half)',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major', 'Triceps'],
                'description' => 'Only press through the upper half of the range, from mid-point to full extension. Keeps constant tension on the pecs.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half)',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Work from the start position (handles near chest) to the mid-point, emphasizing the stretch and initial contraction.',
            ],
            [
                'name' => '21s Chest Press',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'],
                'description' => '7 bottom-half reps, 7 top-half reps, then 7 full-range reps without rest. Intense metabolic stress for chest growth.',
            ],
            [
                'name' => 'Pulse Chest Press',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major', 'Triceps'],
                'description' => 'At the fully pressed position, perform small, rapid pulses without bending the elbows fully back, maintaining tension.',
            ],
            [
                'name' => 'Isometric Hold Chest Press',
                'equipment' => 'Chest Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps', 'Core'],
                'description' => 'Press to the midpoint or full extension and hold statically for 10-30 seconds to build endurance and stability.',
            ],
        ];

        $sourceDir = public_path('execises/chest-press-machine');
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
