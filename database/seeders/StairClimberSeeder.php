<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class StairClimberSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Basic Steady State Climb',
                'equipment' => 'Stair Climber',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Continuous climbing at a moderate, consistent pace with light resistance to build aerobic endurance and burn calories.',
            ],
            [
                'name' => 'Interval Climb',
                'equipment' => 'Stair Climber',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Alternating periods of high-intensity climbing (increased speed or resistance) with active recovery at a slower pace to improve cardiovascular fitness and fat loss.',
            ],
            [
                'name' => 'Sprint Climb',
                'equipment' => 'Stair Climber',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core', 'Hip Flexors'],
                'description' => 'Maximum-effort climbing at the highest sustainable speed for short bursts (e.g., 20–30 seconds) to develop explosive power and anaerobic capacity.',
            ],
            [
                'name' => 'Side Step Climb (Lateral)',
                'equipment' => 'Stair Climber',
                'category_slug' => 'coordination',
                'target_muscles' => ['Gluteus Medius', 'Adductors', 'Abductors', 'Quadriceps', 'Obliques'],
                'description' => 'Facing sideways on the machine, stepping laterally with a crossover or shuffle motion to engage hip stabilizers and improve lateral movement.',
            ],
            [
                'name' => 'Crossover Step Climb',
                'equipment' => 'Stair Climber',
                'category_slug' => 'coordination',
                'target_muscles' => ['Gluteus Medius', 'Adductors', 'Quadriceps', 'Obliques', 'Core'],
                'description' => 'Crossing one leg over the other while stepping up sideways, emphasizing hip rotation and oblique engagement.',
            ],
            [
                'name' => 'Backward Climb',
                'equipment' => 'Stair Climber',
                'category_slug' => 'coordination',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Facing away from the machine, stepping backward onto the moving steps to challenge balance, coordination, and quad-dominant strength.',
            ],
            [
                'name' => 'Skip Step Climb',
                'equipment' => 'Stair Climber',
                'category_slug' => 'plyometric',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Hip Flexors', 'Core'],
                'description' => 'Hopping or skipping lightly from one step to the next to introduce a plyometric element, improving reactive power and calf endurance.',
            ],
            [
                'name' => 'Double Step Climb (Skip a Step)',
                'equipment' => 'Stair Climber',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Quadriceps', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Deliberately stepping onto every second step, increasing the range of motion and requiring greater force per stride to emphasize glute and hamstring power.',
            ],
            [
                'name' => 'High Knee Climb',
                'equipment' => 'Stair Climber',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Core', 'Glutes', 'Calves'],
                'description' => 'Exaggerating each step by driving the knee high towards the chest, intensifying hip flexor and core activation while maintaining climbing pace.',
            ],
            [
                'name' => 'Lunge Climb',
                'equipment' => 'Stair Climber',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Performing a walking lunge motion on the moving stairs, stepping deeply and bending both knees to mimic a weighted lunge for lower-body strength.',
            ],
            [
                'name' => 'No Hands Climb',
                'equipment' => 'Stair Climber',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Quadriceps', 'Hamstrings', 'Calves', 'Core', 'Erector Spinae'],
                'description' => 'Releasing the handrails and climbing with an upright posture, forcing the core and stabilizer muscles to work harder for balance.',
            ],
            [
                'name' => 'Weighted Vest Climb',
                'equipment' => 'Stair Climber',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Wearing a weighted vest during steady or interval climbing to increase resistance, boost calorie burn, and build lower-body strength.',
            ],
            [
                'name' => 'Resistance Build Climb',
                'equipment' => 'Stair Climber',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Gradually increasing the machine resistance every minute while maintaining a steady cadence to simulate an increasingly steep climb.',
            ],
            [
                'name' => 'Tempo Climb',
                'equipment' => 'Stair Climber',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Varying cadence with deliberate slow, moderate, and fast-paced intervals to improve leg speed control and cardiovascular efficiency.',
            ],
            [
                'name' => 'Single Leg Focus Climb',
                'equipment' => 'Stair Climber',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Lightly tapping or hovering the trailing foot to emphasize full weight bearing on the leading leg for a few steps, correcting imbalances.',
            ],
        ];

        $sourceDir = public_path('execises/stair-climber');
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
