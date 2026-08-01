<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class StepmillSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Basic Step',
                'equipment' => 'Stepmill',
                'category_slug' => 'endurance',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Steady-state forward stepping at a consistent pace to build aerobic endurance and engage the entire lower body and core.',
            ],
            [
                'name' => 'Double Step',
                'equipment' => 'Stepmill',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Calves', 'Core'],
                'description' => 'Skip every other step to increase the range of motion, turning each step into a deep step-up that emphasizes glutes and hamstrings.',
            ],
            [
                'name' => 'Side Step (Lateral)',
                'equipment' => 'Stepmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Gluteus Medius', 'Adductors', 'Abductors', 'Quadriceps', 'Calves', 'Core'],
                'description' => 'Step sideways, alternating leading leg each flight, to target the lateral hip muscles and improve frontal-plane stability.',
            ],
            [
                'name' => 'Backward Step',
                'equipment' => 'Stepmill',
                'category_slug' => 'coordination',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Facing away from the console, step backward as the stairs descend, challenging balance, coordination, and quadriceps endurance.',
            ],
            [
                'name' => 'High Knee Step',
                'equipment' => 'Stepmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Calves', 'Core'],
                'description' => 'Exaggerate knee lift with each step to increase heart rate, engage the hip flexors, and recruit the core for stability.',
            ],
            [
                'name' => 'Skip Step',
                'equipment' => 'Stepmill',
                'category_slug' => 'plyometric',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Hip Flexors', 'Core'],
                'description' => 'Add a light hop or skip between steps to introduce a plyometric element, building reactive power and agility.',
            ],
            [
                'name' => 'Weighted Step',
                'equipment' => 'Stepmill, Weighted Vest',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Wear a weighted vest while stepping at a moderate pace to increase resistance, build strength, and boost calorie burn.',
            ],
            [
                'name' => 'Dumbbell Step',
                'equipment' => 'Stepmill, Dumbbells',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core', 'Forearms'],
                'description' => 'Hold a pair of dumbbells at your sides while stepping to add load, forcing the lower body and grip to work harder.',
            ],
            [
                'name' => 'Interval Step',
                'equipment' => 'Stepmill',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Alternate between high-intensity fast stepping and low-intensity recovery periods to improve both aerobic and anaerobic fitness.',
            ],
            [
                'name' => 'Sprint Step',
                'equipment' => 'Stepmill',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Step at maximum speed for short bursts (10–20 seconds) to develop explosive lower-body power and speed endurance.',
            ],
            [
                'name' => 'Crossover Step (Grapevine)',
                'equipment' => 'Stepmill',
                'category_slug' => 'agility',
                'target_muscles' => ['Gluteus Medius', 'Adductors', 'Abductors', 'Core', 'Quadriceps'],
                'description' => 'Cross one foot over the other in front and behind as you step sideways, improving hip mobility, agility, and coordination.',
            ],
            [
                'name' => 'Isometric Hold Step',
                'equipment' => 'Stepmill',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core'],
                'description' => 'Pause and hold a static position on one leg with the knee bent at 90 degrees for 5–10 seconds between steps to build isometric strength and stability.',
            ],
            [
                'name' => 'Tempo Step (Slow Eccentric)',
                'equipment' => 'Stepmill',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Slow down the lowering phase of each step (3–5 seconds) while stepping normally on the way up, emphasizing eccentric control.',
            ],
        ];

        $sourceDir = public_path('execises/stepmill');
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
