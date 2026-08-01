<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class HackSquatMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Standard Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors'],
                'description' => 'Place feet shoulder-width apart in the middle of the platform, shoulders under pads. Lower by bending knees until thighs are at least parallel, then drive up without locking out.',
            ],
            [
                'name' => 'High Foot Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps'],
                'description' => 'Position feet high and wide on the platform. Increases posterior chain drive, shifting emphasis to glutes and hamstrings while reducing knee shear.',
            ],
            [
                'name' => 'Low Foot Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Place feet low on the platform, heels near the bottom edge. Maximizes knee flexion and isolates the quadriceps, minimizing glute contribution.',
            ],
            [
                'name' => 'Wide Stance Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Adductors', 'Glutes', 'Quadriceps', 'Hamstrings'],
                'description' => 'Adopt a wide stance with toes slightly out. Increases inner thigh and glute activation while still pressing through a full range of motion.',
            ],
            [
                'name' => 'Narrow Stance Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Quadriceps (Vastus Lateralis)', 'Glutes'],
                'description' => 'Keep feet close together in the center. Emphasizes the outer quad sweep and reduces hip adductor involvement.',
            ],
            [
                'name' => 'Toes-Out Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Vastus Medialis Oblique (VMO)', 'Adductors', 'Quadriceps'],
                'description' => 'Turn toes outward with feet shoulder-width. Targets the inner quad (VMO) and adductors through the pressing path.',
            ],
            [
                'name' => 'Toes-In Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Vastus Lateralis', 'Quadriceps'],
                'description' => 'Point toes slightly inward. Biases the outer quadriceps and may alter patellar tracking.',
            ],
            [
                'name' => 'Single-Leg Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Perform the movement with one leg at a time, the non-working foot resting on the frame. Corrects imbalances and challenges stability.',
            ],
            [
                'name' => 'Pause Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'Lower to the bottom position, pause for 1-3 seconds to eliminate momentum, then drive up explosively. Increases time under tension and starting strength.',
            ],
            [
                'name' => 'Tempo Hack Squat (3-1-3)',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'Take 3 seconds to lower, pause 1 second at the bottom, and 3 seconds to press up. Maximizes muscular control and time under tension for growth.',
            ],
            [
                'name' => 'Eccentric-Emphasis Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'Lower the sled slowly over 4-5 seconds, then press up at normal or assisted speed. Overloads the negative phase for strength and muscle damage.',
            ],
            [
                'name' => '1 & 1/4 Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes'],
                'description' => 'Lower fully, rise a quarter of the way, go back down to full depth, then complete the press. Doubles the bottom-range time under tension.',
            ],
            [
                'name' => 'Explosive Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings'],
                'description' => 'Use a moderate weight, lower under control, then press up as fast and explosively as possible. Develops rate of force production and athletic power.',
            ],
            [
                'name' => 'Isometric Hold Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Press to a specific knee angle (e.g., 90 degrees) and hold the position for 10-30 seconds. Builds static strength and muscular endurance.',
            ],
            [
                'name' => 'Partial Range Hack Squat (Top Half)',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Glutes'],
                'description' => 'Work only the top half of the movement, from near lockout to about 90 degrees knee flexion. Maintains constant tension without deep knee stress.',
            ],
            [
                'name' => 'Partial Range Hack Squat (Bottom Half)',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes'],
                'description' => 'Press from the deepest position to about halfway up. Emphasizes the quad stretch and bottom-end strength without reaching full lockout.',
            ],
            [
                'name' => 'Hack Squat Calf Raise',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'Place the balls of your feet on the bottom edge of the platform, legs straight. Press through the toes to extend the ankles, then lower for a deep stretch.',
            ],
            [
                'name' => 'High-Rep Hack Squat',
                'equipment' => 'Hack Squat Machine',
                'category_slug' => 'endurance',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors'],
                'description' => 'Use light weight and perform 20-50+ controlled reps. Builds muscular endurance, capillary density, and metabolic stress.',
            ],
        ];

        $sourceDir = public_path('execises/hack-squat-machine');
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
