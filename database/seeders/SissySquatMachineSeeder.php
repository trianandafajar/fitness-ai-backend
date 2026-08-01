<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class SissySquatMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Standard Sissy Squat',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Quadriceps (Rectus Femoris, Vastus Lateralis, Vastus Medialis, Vastus Intermedius)', 'Core'],
                'description' => 'Secure your lower legs between the pads, grasp the handles for balance. Keeping your hips extended and torso upright, bend at the knees and lean backward, allowing your knees to travel forward over your toes. Lower until you feel a deep stretch in the quads, then drive through the thighs to return to standing without locking the knees.',
            ],
            [
                'name' => 'Single-Leg Sissy Squat',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'stability',
                'target_muscles' => ['Quadriceps', 'Core', 'Gluteus Medius'],
                'description' => 'Perform the sissy squat with only one leg anchored, the other foot held off the ground or resting lightly. Lowers the load and focuses on unilateral quad strength, balance, and knee stability.',
            ],
            [
                'name' => 'Weighted Sissy Squat (Plate on Chest)',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Core'],
                'description' => 'Hold a weight plate or dumbbell against your chest while performing the standard sissy squat. Increases resistance for progressive overload on the quads.',
            ],
            [
                'name' => 'Weighted Sissy Squat (Vest or Belt)',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Core'],
                'description' => 'Wear a weighted vest or attach a dip belt with a plate between your legs. Keeps your hands free to hold the machine for balance while adding load.',
            ],
            [
                'name' => 'Pause Sissy Squat',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps'],
                'description' => 'At the deepest point of the squat (maximum quad stretch), pause for 1-2 seconds and maintain full tension before driving back up. Eliminates momentum and intensifies muscle fiber recruitment.',
            ],
            [
                'name' => 'Eccentric-Emphasis Sissy Squat',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Lower yourself very slowly over 3-5 seconds, then push back to the start at a normal speed or with a slight assist from the arms. Overloads the eccentric phase for muscle damage and strength.',
            ],
            [
                'name' => 'Tempo Sissy Squat (3-1-3)',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps', 'Core'],
                'description' => 'Take 3 seconds to lower, pause for 1 second at the bottom, then take 3 seconds to rise. Maximises time under tension for quad growth.',
            ],
            [
                'name' => 'Isometric Hold Sissy Squat',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Core'],
                'description' => 'Lower to a point of maximum quad tension (often around 90 knee bend or deeper) and hold the position for 10-30 seconds. Builds static knee extensor strength and mental toughness.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Sissy Squat',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Only perform the top half of the movement, from near-standing to about mid-range. Keeps constant tension on the quads without a deep stretch.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Sissy Squat',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Work from the deepest position to the midpoint, focusing on the intense stretch and initial contraction of the quadriceps.',
            ],
            [
                'name' => '21s Sissy Squat',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Perform 7 bottom-half reps, 7 top-half reps, and 7 full-range reps without any rest. A high-intensity technique to induce metabolic stress and a deep muscle pump.',
            ],
            [
                'name' => 'Pulse Sissy Squat',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps'],
                'description' => 'At the deepest point of the squat, perform small, rapid pulsing movements (1-2 inches) without standing back up. Maintains constant tension and creates a severe burn.',
            ],
            [
                'name' => 'Explosive Sissy Squat',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Core'],
                'description' => 'Using bodyweight or light assistance, lower yourself under control and then explode back to the standing position as fast as possible. Develops explosive quad power.',
            ],
            [
                'name' => 'Sissy Squat to Forward Lean (Modified)',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rectus Femoris', 'Core'],
                'description' => 'Start with the torso slightly hinged forward at the hips before leaning back into the squat. This adjustment slightly increases the stretch on the rectus femoris across both the knee and hip joints.',
            ],
            [
                'name' => 'Toes-Out Sissy Squat (External Rotation)',
                'equipment' => 'Sissy Squat Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Vastus Medialis Oblique (VMO)', 'Quadriceps'],
                'description' => 'Turn the toes outward slightly while keeping the heels together. As you squat, this foot placement emphasizes the inner quadriceps (VMO) for better knee stability.',
            ],
        ];

        $sourceDir = public_path('execises/sissy-squat-machine');
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
