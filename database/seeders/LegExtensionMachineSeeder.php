<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class LegExtensionMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Standard Leg Extension',
                'equipment' => 'Leg Extension Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Quadriceps (Rectus Femoris, Vastus Medialis, Vastus Lateralis, Vastus Intermedius)'],
                'description' => 'Lift the weight by extending the knees from 90 degrees to full lockout, squeezing the quads at the top, then lower under control.',
            ],
            [
                'name' => 'Single-Leg Extension',
                'equipment' => 'Leg Extension Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Quadriceps (all heads)', 'Core'],
                'description' => 'Perform the movement with one leg at a time to correct muscle imbalances and increase unilateral quad focus.',
            ],
            [
                'name' => 'Toes Outward Leg Extension (External Rotation)',
                'equipment' => 'Leg Extension Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Vastus Medialis Oblique (VMO)', 'Quadriceps'],
                'description' => 'Turn the toes outward slightly during the lift to place greater emphasis on the inner quad (VMO) for knee stability.',
            ],
            [
                'name' => 'Toes Inward Leg Extension (Internal Rotation)',
                'equipment' => 'Leg Extension Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Vastus Lateralis', 'Quadriceps'],
                'description' => 'Turn the toes slightly inward to bias the outer quad sweep (vastus lateralis) during the extension.',
            ],
            [
                'name' => 'Dorsiflexed Leg Extension (Toes Pulled Up)',
                'equipment' => 'Leg Extension Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rectus Femoris', 'Quadriceps'],
                'description' => 'Keep the ankles flexed (toes toward shins) throughout the movement to increase rectus femoris activation and maintain tension.',
            ],
            [
                'name' => 'Plantarflexed Leg Extension (Toes Pointed)',
                'equipment' => 'Leg Extension Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Point the toes away throughout the lift; may slightly reduce hamstring co-contraction and focus purely on quadriceps extension.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half)',
                'equipment' => 'Leg Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Perform the movement only through the bottom half of the range (90° to ~45°), keeping constant tension without lockout.',
            ],
            [
                'name' => 'Partial Reps (Top Half)',
                'equipment' => 'Leg Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Work only the top half of the movement, from ~45° to full lockout, emphasizing the final squeeze and peak contraction.',
            ],
            [
                'name' => 'Isometric Hold Leg Extension',
                'equipment' => 'Leg Extension Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Core'],
                'description' => 'Lift to a specific angle (e.g., 90° or fully extended) and hold the position statically for time to build muscular endurance and mind-muscle connection.',
            ],
            [
                'name' => 'Eccentric-Emphasis Leg Extension',
                'equipment' => 'Leg Extension Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Use both legs to lift the weight concentrically, then lower very slowly (3–5 seconds) with one leg to overload the eccentric phase.',
            ],
            [
                'name' => '21s Leg Extension',
                'equipment' => 'Leg Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Perform 7 reps in the bottom half, 7 reps in the top half, and finish with 7 full-range reps, all without rest, for an intense muscle-building technique.',
            ],
            [
                'name' => 'Pause-Rep Leg Extension',
                'equipment' => 'Leg Extension Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Quadriceps'],
                'description' => 'Pause for 1–2 seconds at the fully extended top position of each rep to maximize time under tension and peak contraction.',
            ],
        ];

        $sourceDir = public_path('execises/leg-extension-machine');
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
