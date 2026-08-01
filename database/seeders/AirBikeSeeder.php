<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AirBikeSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Steady State Ride',
                'equipment' => 'Air Bike',
                'category_slug' => 'endurance',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Shoulders', 'Chest', 'Back', 'Core'],
                'description' => 'Continuous pedaling at a moderate, sustainable pace using both arms and legs to build aerobic capacity and improve cardiovascular endurance.',
            ],
            [
                'name' => 'Sprint Intervals',
                'equipment' => 'Air Bike',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Shoulders', 'Chest', 'Back', 'Core'],
                'description' => 'Alternating all-out maximum effort bursts (10–30 seconds) with equal or longer rest periods to improve anaerobic power and speed.',
            ],
            [
                'name' => 'Tabata',
                'equipment' => 'Air Bike',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Shoulders', 'Chest', 'Back', 'Core'],
                'description' => '20 seconds of all-out maximum effort followed by 10 seconds of rest, repeated for 8 rounds (4 minutes total) to push cardiovascular and mental limits.',
            ],
            [
                'name' => 'EMOM Sprints',
                'equipment' => 'Air Bike',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Shoulders', 'Chest', 'Back', 'Core'],
                'description' => 'Every minute on the minute, perform a 15–20 second sprint at maximum intensity, using the remainder of the minute for active recovery.',
            ],
            [
                'name' => 'Pyramid Intervals',
                'equipment' => 'Air Bike',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Shoulders', 'Chest', 'Back', 'Core'],
                'description' => 'Work intervals increase then decrease in duration (e.g., 20s, 30s, 40s, 30s, 20s) with rest periods, building and sustaining intensity throughout.',
            ],
            [
                'name' => 'Max Calorie Sprint',
                'equipment' => 'Air Bike',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Shoulders', 'Chest', 'Back', 'Core'],
                'description' => 'A single all-out effort for a set time (e.g., 30 seconds) aiming for the highest calorie output possible, driving maximal total-body power production.',
            ],
            [
                'name' => 'Arm-Only Ride',
                'equipment' => 'Air Bike',
                'category_slug' => 'cardio',
                'target_muscles' => ['Shoulders', 'Chest', 'Back', 'Biceps', 'Triceps', 'Core'],
                'description' => 'Place feet on the stationary pegs and pedal solely with the arms, isolating upper-body pushing and pulling muscles while maintaining cardiovascular demand.',
            ],
            [
                'name' => 'Leg-Only Ride',
                'equipment' => 'Air Bike',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Rest arms on the fixed handlebars and pedal only with the legs, focusing on lower-body endurance and hip drive without upper-body assistance.',
            ],
            [
                'name' => 'High Resistance Grind',
                'equipment' => 'Air Bike',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Shoulders', 'Chest', 'Back', 'Core'],
                'description' => 'Pedaling against progressively heavier resistance at a slow, controlled cadence to build muscular strength and power endurance.',
            ],
            [
                'name' => 'Reverse Pedaling',
                'equipment' => 'Air Bike',
                'category_slug' => 'coordination',
                'target_muscles' => ['Hamstrings', 'Calves', 'Quadriceps', 'Shoulders', 'Chest', 'Core'],
                'description' => 'Pedaling backward with light resistance to challenge coordination, improve knee and shoulder joint mobility, and engage muscles in a novel pattern.',
            ],
            [
                'name' => 'Recovery Ride',
                'equipment' => 'Air Bike',
                'category_slug' => 'recovery',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Shoulders', 'Core'],
                'description' => 'Very light resistance and low cadence pedaling to promote blood flow, flush metabolic waste, and aid active recovery without taxing the system.',
            ],
            [
                'name' => 'Descending Intervals',
                'equipment' => 'Air Bike',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Shoulders', 'Chest', 'Back', 'Core'],
                'description' => 'Work intervals start long (e.g., 60s) and progressively shorten (45s, 30s, 15s) while intensity increases, with rest between each.',
            ],
            [
                'name' => 'Ascending Intervals',
                'equipment' => 'Air Bike',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Shoulders', 'Chest', 'Back', 'Core'],
                'description' => 'Work intervals gradually lengthen (e.g., 15s, 30s, 45s, 60s) while maintaining high intensity, testing sustained power output and endurance.',
            ],
            [
                'name' => '1:1 Work-Rest Intervals',
                'equipment' => 'Air Bike',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Shoulders', 'Chest', 'Back', 'Core'],
                'description' => 'Equal work and rest periods (e.g., 30 seconds on, 30 seconds off) at a challenging but repeatable pace to develop consistent high-output capacity.',
            ],
            [
                'name' => 'Ladder Intervals',
                'equipment' => 'Air Bike',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Shoulders', 'Chest', 'Back', 'Core'],
                'description' => 'Work intervals increase in duration each round (e.g., 20s, 40s, 60s, 80s) before descending, pushing endurance limits with varied time domains.',
            ],
            [
                'name' => 'Explosive Start Sprints',
                'equipment' => 'Air Bike',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Shoulders', 'Core'],
                'description' => 'From a stationary or slow-moving start, explode into a maximal sprint for 5–10 seconds to develop starting power and rapid acceleration.',
            ],
        ];

        $sourceDir = public_path('execises/air-bike');
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
