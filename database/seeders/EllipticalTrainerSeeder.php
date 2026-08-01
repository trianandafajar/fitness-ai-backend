<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class EllipticalTrainerSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Forward Stride',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Standard forward pedaling motion at a steady pace to improve cardiovascular endurance and lower body conditioning.',
            ],
            [
                'name' => 'Reverse Stride (Backward)',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Pedaling backward to shift emphasis to the quadriceps, reduce knee stress, and challenge coordination.',
            ],
            [
                'name' => 'High Incline Forward',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Calves', 'Quadriceps', 'Core'],
                'description' => 'Increasing the ramp incline while striding forward to heavily target the glutes and hamstrings with each step.',
            ],
            [
                'name' => 'High Incline Reverse',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Calves', 'Core'],
                'description' => 'Combining a high incline with backward pedaling to intensify posterior chain engagement and glute activation.',
            ],
            [
                'name' => 'Low Incline / Flat Forward',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Calves', 'Core'],
                'description' => 'Setting the ramp to the lowest level to mimic a flat running motion and emphasize quadriceps endurance.',
            ],
            [
                'name' => 'High Resistance Climb',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Quadriceps', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Using maximum resistance and a moderate incline to simulate climbing, building lower body strength and power.',
            ],
            [
                'name' => 'Sprint Intervals',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Hip Flexors', 'Core'],
                'description' => 'Alternating short, all-out high-speed bursts with active recovery periods to improve anaerobic capacity and speed.',
            ],
            [
                'name' => 'Steady-State Endurance',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'endurance',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Maintaining a consistent moderate pace and resistance for an extended duration to build aerobic base.',
            ],
            [
                'name' => 'Hands-Free Stride',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'balance',
                'target_muscles' => ['Core', 'Quadriceps', 'Glutes', 'Hamstrings', 'Calves'],
                'description' => 'Releasing the handlebars and balancing with the core while pedaling to improve stability and proprioception.',
            ],
            [
                'name' => 'Upper Body Push-Pull',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Pectorals', 'Triceps', 'Latissimus Dorsi', 'Biceps', 'Quadriceps', 'Glutes'],
                'description' => 'Actively pushing and pulling the moving handles with each stride to engage the chest, back, and arms for a full-body workout.',
            ],
            [
                'name' => 'Upper Body Push Only',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Pectorals', 'Anterior Deltoids', 'Triceps', 'Quadriceps', 'Glutes'],
                'description' => 'Focusing solely on pushing the handles while the lower body strides, letting the arms return passively to target the chest and triceps.',
            ],
            [
                'name' => 'Upper Body Pull Only',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Rear Deltoids', 'Quadriceps', 'Glutes'],
                'description' => 'Emphasizing the pulling motion on the handles while pedaling to engage the back and biceps.',
            ],
            [
                'name' => 'Single-Leg Pedal',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'stability',
                'target_muscles' => ['Glutes', 'Quadriceps', 'Hamstrings', 'Core'],
                'description' => 'Allowing one leg to do the majority of the work by lightly resting the other foot, correcting imbalances and increasing unilateral strength.',
            ],
            [
                'name' => 'Lateral Movement (Side Step)',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Gluteus Medius', 'Adductors', 'Abductors', 'Quadriceps', 'Core'],
                'description' => 'Shifting body weight side-to-side with each stride while keeping the feet firmly on the pedals to engage the inner and outer thighs.',
            ],
            [
                'name' => 'Interval Incline/Ramp Variation',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Calves', 'Core'],
                'description' => 'Periodically changing the ramp incline level during the workout to simulate hill intervals and target different lower body muscles.',
            ],
            [
                'name' => 'Reverse Lunge Stride',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'With a slow speed, take an exaggerated rearward push on one leg to mimic a reverse lunge, increasing glute and quad engagement.',
            ],
            [
                'name' => 'Isometric Squat Hold & Pedal',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core'],
                'description' => 'Maintaining a slight squat position (knees bent) throughout the entire stride cycle to increase time under tension on the quads and glutes.',
            ],
            [
                'name' => 'Heart Rate Zone Cruise',
                'equipment' => 'Elliptical Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves'],
                'description' => 'Adjusting speed and resistance to stay within a specific heart rate zone (e.g., fat-burning zone) for an entire session.',
            ],
        ];

        $sourceDir = public_path('execises/elliptical-trainer');
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
