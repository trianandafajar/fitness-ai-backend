<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class ShoulderPressMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Shoulder Press (Neutral Grip)',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps'],
                'description' => 'Sit with back against pad, grip neutral handles at shoulder height, press overhead to full extension without locking elbows, then lower under control.',
            ],
            [
                'name' => 'Standard Shoulder Press (Pronated Grip)',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps'],
                'description' => 'Use overhand (pronated) grip if handles allow, press upward keeping wrists straight. Emphasizes overall deltoid mass with slightly more medial head involvement.',
            ],
            [
                'name' => 'Wide Grip Shoulder Press',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Medial Deltoids', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Grip the widest available handles or position arms wide. Increases lateral deltoid stretch and recruitment for broader shoulder appearance.',
            ],
            [
                'name' => 'Close Grip Shoulder Press',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Triceps', 'Medial Deltoids'],
                'description' => 'Use a narrow, shoulder-width grip. Shifts more load to the triceps and front delts while reducing shoulder abduction stress.',
            ],
            [
                'name' => 'Single-Arm Shoulder Press',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'stability',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Core'],
                'description' => 'Press with one arm at a time while the other remains stationary. Corrects imbalances and forces core engagement to resist rotation.',
            ],
            [
                'name' => 'Alternating Arm Shoulder Press',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'stability',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Core'],
                'description' => 'Press arms alternately in a seesaw motion. Increases time under tension and recruits stabilizers for balance.',
            ],
            [
                'name' => 'Eccentric-Emphasis Shoulder Press',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps'],
                'description' => 'Press up quickly, then take 3-5 seconds to slowly lower the weight back to start. Overloads the eccentric phase for growth and strength.',
            ],
            [
                'name' => 'Tempo Shoulder Press (3-1-3)',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps'],
                'description' => '3 seconds to press up, 1-second pause at top, 3 seconds to lower. Maximizes time under tension and control.',
            ],
            [
                'name' => 'Pause Shoulder Press',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps'],
                'description' => 'Press to full extension, hold for 1-2 seconds with muscles fully contracted, then lower. Eliminates momentum and intensifies peak contraction.',
            ],
            [
                'name' => 'Explosive Shoulder Press',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps'],
                'description' => 'Use moderate weight, press upward as fast as possible, return under control. Develops explosive overhead power and rate of force production.',
            ],
            [
                'name' => 'Partial Reps (Top Half)',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps'],
                'description' => 'Work only from the midpoint to full overhead extension. Keeps constant tension on the deltoids without resting at the bottom.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half)',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps'],
                'description' => 'Press from shoulder height up to the midpoint only, emphasizing the initial drive and stretch through the front delts.',
            ],
            [
                'name' => '21s Shoulder Press',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps'],
                'description' => '7 bottom-half reps, 7 top-half reps, then 7 full-range reps without rest. Intensely fatigues all deltoid heads.',
            ],
            [
                'name' => 'Pulse Shoulder Press',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps'],
                'description' => 'At the fully pressed position, perform small, rapid pulses without bending the elbows fully back, maintaining constant deltoid tension.',
            ],
            [
                'name' => 'Isometric Hold Shoulder Press',
                'equipment' => 'Shoulder Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Core'],
                'description' => 'Press to mid-point or full extension and hold statically for 10-30 seconds. Builds muscular endurance and stability in the overhead position.',
            ],
        ];

        foreach ($exercises as $data) {
            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;

            Exercise::create($data);
        }
    }
}
