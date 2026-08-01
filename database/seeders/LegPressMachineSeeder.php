<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Database\Seeder;

class LegPressMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Standard Leg Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors'],
                'description' => 'Place feet shoulder-width apart in the middle of the platform. Lower the sled until knees reach about 90 degrees, then press back up without locking out completely.',
            ],
            [
                'name' => 'High Foot Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps'],
                'description' => 'Position feet high on the platform. Increases hip extension and posterior chain recruitment, reducing knee flexion stress and emphasizing glutes and hamstrings.',
            ],
            [
                'name' => 'Low Foot Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Place feet low on the platform, heels near the bottom edge. Maximizes knee flexion and quadriceps engagement, minimizing glute involvement.',
            ],
            [
                'name' => 'Wide Stance Leg Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Adductors', 'Glutes', 'Quadriceps', 'Hamstrings'],
                'description' => 'Take a wide stance with toes pointed slightly outward. Increases inner thigh (adductor) activation while still pressing through the full range.',
            ],
            [
                'name' => 'Narrow Stance Leg Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Quadriceps (Vastus Lateralis)', 'Glutes'],
                'description' => 'Place feet close together in the center of the platform. Targets the outer quad sweep and can reduce hip adductor involvement.',
            ],
            [
                'name' => 'Single-Leg Leg Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Press with one leg at a time, the non-working foot resting on the frame. Corrects imbalances, challenges stability, and isolates each leg.',
            ],
            [
                'name' => 'Calf Press on Leg Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'Place the balls of your feet on the bottom edge of the platform, legs straight. Press through the toes to extend the ankles, then lower for a deep calf stretch.',
            ],
            [
                'name' => 'Toes-Out Leg Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Vastus Medialis Oblique (VMO)', 'Adductors', 'Quadriceps'],
                'description' => 'Turn toes outward with feet shoulder-width. Emphasizes the inner quad (VMO) and adductors through the pressing path.',
            ],
            [
                'name' => 'Toes-In Leg Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Vastus Lateralis', 'Quadriceps'],
                'description' => 'Turn toes inward slightly. Shifts tension to the outer quadriceps and can alter patellar tracking.',
            ],
            [
                'name' => 'Heels-Only Leg Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Quadriceps'],
                'description' => 'Press through the heels only, lifting the toes off the platform. Maximizes posterior chain drive and reduces quad emphasis.',
            ],
            [
                'name' => 'Pause Leg Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'Lower the weight and pause at the bottom (deepest position) for 1-3 seconds, then explode up. Eliminates momentum and increases time under tension.',
            ],
            [
                'name' => 'Tempo Leg Press (3-1-3)',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'Take 3 seconds to lower, pause 1 second at the bottom, and 3 seconds to press up. Enhances muscular control and growth through extended tension.',
            ],
            [
                'name' => 'Eccentric-Emphasis Leg Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'Lower the sled very slowly (4-5 seconds), then press up at normal speed. Overloads the negative phase, promoting strength and muscle damage.',
            ],
            [
                'name' => '1 & 1/4 Leg Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes'],
                'description' => 'Lower fully, rise a quarter of the way back up, go down again to full depth, then complete the press. Doubles the time under tension near the bottom.',
            ],
            [
                'name' => 'Explosive Leg Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'Use a moderate weight, lower under control, and press up as fast and explosively as possible. Develops rate of force production and athletic power.',
            ],
            [
                'name' => 'Isometric Hold Leg Press',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Press to a specific knee angle (e.g., 90 degrees) and hold the position for time (10-30 seconds). Builds static strength and muscular endurance.',
            ],
            [
                'name' => 'Partial Range Leg Press (Top Half)',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes'],
                'description' => 'Work only the top half of the movement, from near lockout to about 90 degrees. Keeps constant tension on the muscles without full knee flexion.',
            ],
            [
                'name' => 'Partial Range Leg Press (Bottom Half)',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes'],
                'description' => 'Press from the deep position to about halfway. Emphasizes the quad stretch and bottom-end strength without ever reaching lockout.',
            ],
            [
                'name' => 'High-Rep Leg Press (Endurance)',
                'equipment' => 'Leg Press Machine',
                'category_slug' => 'endurance',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors'],
                'description' => 'Use light weight and perform 20-50+ reps to failure. Builds muscular endurance, capillary density, and promotes metabolic stress for growth.',
            ],
        ];

        $sourceDir = public_path('execises/leg-press-machine');
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
