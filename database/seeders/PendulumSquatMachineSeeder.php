<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class PendulumSquatMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Standard Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Core'],
                'description' => 'Stand on the platform with shoulders secured under the pads, feet shoulder-width apart. Lower by bending knees and hips, allowing the machine to arc backward, until thighs reach at least parallel. Drive through mid-foot to return to start without locking out.',
            ],
            [
                'name' => 'High Foot Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps'],
                'description' => 'Place feet high and wide on the platform. Emphasizes hip extension and posterior chain, reducing knee flexion stress while increasing glute and hamstring recruitment.',
            ],
            [
                'name' => 'Low Foot Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Position feet low on the platform, heels near the bottom edge. Maximizes knee flexion and isolates the quadriceps, minimizing glute involvement.',
            ],
            [
                'name' => 'Wide Stance Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Adductors', 'Glutes', 'Quadriceps', 'Hamstrings'],
                'description' => 'Take a wide stance with toes slightly outward. Increases inner thigh and glute activation while still pressing through the full range.',
            ],
            [
                'name' => 'Narrow Stance Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Quadriceps (Vastus Lateralis)', 'Glutes'],
                'description' => 'Keep feet close together in the center of the platform. Emphasizes the outer quad sweep and reduces hip adductor involvement.',
            ],
            [
                'name' => 'Toes-Out Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Vastus Medialis Oblique (VMO)', 'Adductors', 'Quadriceps'],
                'description' => 'Turn toes outward with feet shoulder-width. Targets the inner quad (VMO) and adductors through the pressing path.',
            ],
            [
                'name' => 'Toes-In Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Vastus Lateralis', 'Quadriceps'],
                'description' => 'Point toes slightly inward. Biases the outer quadriceps and may alter patellar tracking.',
            ],
            [
                'name' => 'Single-Leg Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'stability',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Place one foot on the platform, keep the other foot off. Lower into a deep single-leg squat, maintaining balance. Corrects imbalances and builds unilateral strength.',
            ],
            [
                'name' => 'Pause Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'At the deepest point of the squat, pause for 1-3 seconds while maintaining tension, then explode upward. Eliminates momentum and increases time under tension.',
            ],
            [
                'name' => 'Eccentric-Emphasis Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'Lower the weight very slowly over 3-5 seconds, then push back up at normal speed. Overloads the negative phase for muscle growth and strength.',
            ],
            [
                'name' => 'Tempo Pendulum Squat (3-1-3)',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => '3 seconds to lower, 1-second pause at the bottom, 3 seconds to rise. Maximizes time under tension and control.',
            ],
            [
                'name' => 'Isometric Hold Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core'],
                'description' => 'Lower to the point of maximum quad tension (approximately 90 knee flexion) and hold for 10-30 seconds. Builds static strength and endurance.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Only work the top half of the movement, from mid-point to near lockout. Keeps continuous tension on the quadriceps.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes'],
                'description' => 'Move only from the deepest position to mid-point, focusing on the quad stretch and initial drive upward.',
            ],
            [
                'name' => '21s Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes'],
                'description' => '7 bottom-half reps, 7 top-half reps, and 7 full-range reps without rest. Intense metabolic stress technique for thigh development.',
            ],
            [
                'name' => 'Pulse Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes'],
                'description' => 'At the bottom of the movement, perform small rapid pulses without returning to standing. Creates constant tension and a deep burn.',
            ],
            [
                'name' => 'Explosive Pendulum Squat',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'Use a moderate weight, lower under control, and then drive upward as fast as possible. Develops explosive leg power and rate of force production.',
            ],
            [
                'name' => 'Pendulum Squat Calf Raise',
                'equipment' => 'Pendulum Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'With shoulders in pads and feet on the platform, keep legs nearly straight and press through the balls of your feet to raise your heels, squeezing the calves at the top, then lower for a stretch.',
            ],
        ];

        $sourceDir = public_path('execises/pendulum-squat-machine');
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
