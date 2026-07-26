<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class TreadmillExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Walking',
                'equipment' => 'Treadmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Low-intensity steady-state walking at a comfortable pace to build aerobic base and burn calories.',
            ],
            [
                'name' => 'Brisk Walking',
                'equipment' => 'Treadmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Walking at a faster pace without jogging to elevate heart rate and improve cardiovascular fitness.',
            ],
            [
                'name' => 'Power Walking',
                'equipment' => 'Treadmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Calves', 'Core'],
                'description' => 'Purposeful, rapid walking with vigorous arm swing, often performed at an incline for greater intensity.',
            ],
            [
                'name' => 'Jogging',
                'equipment' => 'Treadmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Hip Flexors', 'Core'],
                'description' => 'Light, steady running at a slow to moderate pace for endurance training and active recovery.',
            ],
            [
                'name' => 'Running',
                'equipment' => 'Treadmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Hip Flexors', 'Core'],
                'description' => 'Moderate to fast continuous running to improve aerobic capacity and running efficiency.',
            ],
            [
                'name' => 'Sprinting',
                'equipment' => 'Treadmill',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Hip Flexors', 'Core'],
                'description' => 'Maximum-effort running for short intervals to develop speed, explosive power and anaerobic fitness.',
            ],
            [
                'name' => 'Incline Walking',
                'equipment' => 'Treadmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Calves', 'Quadriceps', 'Core'],
                'description' => 'Walking with the deck elevated to increase resistance, emphasize posterior chain muscles and boost calorie burn.',
            ],
            [
                'name' => 'Incline Running (Hill Running)',
                'equipment' => 'Treadmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Calves', 'Core', 'Hip Flexors'],
                'description' => 'Running on an elevated incline to build leg strength, power and cardiovascular endurance simultaneously.',
            ],
            [
                'name' => 'Decline Walking',
                'equipment' => 'Treadmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Tibialis Anterior', 'Core'],
                'description' => 'Walking with the deck angled downward to mimic downhill movement, strengthening the shins and eccentrically loading the quads.',
            ],
            [
                'name' => 'Reverse Walking (Backward Walking)',
                'equipment' => 'Treadmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Walking backward on the treadmill to improve knee stability, balance and target the quadriceps differently.',
            ],
            [
                'name' => 'Side Shuffle',
                'equipment' => 'Treadmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Gluteus Medius', 'Adductors', 'Abductors', 'Quadriceps', 'Hamstrings', 'Core'],
                'description' => 'Shuffling sideways while the belt moves to improve lateral agility, hip strength and coordination.',
            ],
            [
                'name' => 'Walking Lunges (Treadmill)',
                'equipment' => 'Treadmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Performing alternating forward lunges at a slow belt speed to combine lower-body strength with cardiovascular work.',
            ],
            [
                'name' => 'High Knees',
                'equipment' => 'Treadmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Calves', 'Core'],
                'description' => 'Lifting knees toward the chest with each step on a slow-moving belt to raise heart rate and engage the core.',
            ],
            [
                'name' => 'Butt Kicks',
                'equipment' => 'Treadmill',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hamstrings', 'Calves', 'Quadriceps'],
                'description' => 'Jogging while kicking heels up to the glutes, actively engaging the hamstrings and promoting lower-leg mobility.',
            ],
            [
                'name' => 'Skipping',
                'equipment' => 'Treadmill',
                'category_slug' => 'plyometric',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Shoulders'],
                'description' => 'Performing a skipping motion on the moving belt to develop rhythm, coordination and plyometric power.',
            ],
            [
                'name' => 'Treadmill Push (Sled Push)',
                'equipment' => 'Treadmill',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Shoulders', 'Chest', 'Core'],
                'description' => 'With the treadmill turned off, lean forward and drive the belt by forcefully extending the legs while holding the handles, mimicking a sled push.',
            ],
        ];

        $sourceDir = public_path('execises/treadmil');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($exercises as $i => $data) {
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
