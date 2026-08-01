<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class RowingMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Standard Rowing',
                'equipment' => 'Rowing Machine',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Latissimus Dorsi', 'Rhomboids', 'Trapezius', 'Rear Deltoids', 'Biceps', 'Forearms', 'Abdominals', 'Erector Spinae'],
                'description' => 'The full rowing cycle combining leg drive, hip hinge, and arm pull in one fluid motion, engaging nearly the entire body.',
            ],
            [
                'name' => 'Arms-Only Rowing',
                'equipment' => 'Rowing Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Biceps', 'Forearms', 'Latissimus Dorsi', 'Rhomboids', 'Rear Deltoids', 'Abdominals'],
                'description' => 'Keep legs straight and back upright, row only by pulling with the arms and squeezing the shoulder blades, isolating the upper body pull.',
            ],
            [
                'name' => 'Legs-Only Rowing',
                'equipment' => 'Rowing Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Erector Spinae'],
                'description' => 'Keep arms extended and torso still, drive back using only the legs against resistance, focusing on the lower body push phase.',
            ],
            [
                'name' => 'Power Stroke Rowing',
                'equipment' => 'Rowing Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Latissimus Dorsi', 'Rhomboids', 'Biceps', 'Forearms', 'Abdominals'],
                'description' => 'Explosive, maximum-force drive on each stroke followed by a slow recovery, developing raw power output per pull.',
            ],
            [
                'name' => 'Sprint Interval Rowing',
                'equipment' => 'Rowing Machine',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Latissimus Dorsi', 'Biceps', 'Abdominals'],
                'description' => 'Repeated short, all-out efforts (100–500m) with rest periods, targeting anaerobic capacity and speed.',
            ],
            [
                'name' => 'Steady State Rowing',
                'equipment' => 'Rowing Machine',
                'category_slug' => 'endurance',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Latissimus Dorsi', 'Rhomboids', 'Biceps', 'Abdominals'],
                'description' => 'Continuous moderate-pace rowing for 20–60 minutes to build aerobic base and cardiovascular efficiency.',
            ],
            [
                'name' => 'Pyramid Interval Rowing',
                'equipment' => 'Rowing Machine',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Latissimus Dorsi', 'Biceps', 'Abdominals'],
                'description' => 'Distances or times that increase and then decrease (e.g., 100m, 200m, 300m, 200m, 100m) with minimal rest to challenge endurance and pacing.',
            ],
            [
                'name' => 'Pause Drill Rowing',
                'equipment' => 'Rowing Machine',
                'category_slug' => 'technique',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Latissimus Dorsi', 'Biceps', 'Abdominals'],
                'description' => 'Deliberate pauses at the finish, arms-away, or body-over positions to isolate and correct sequencing for a more efficient stroke.',
            ],
            [
                'name' => 'Reverse Grip Rowing',
                'equipment' => 'Rowing Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Biceps', 'Forearms', 'Latissimus Dorsi', 'Rhomboids', 'Abdominals'],
                'description' => 'Use an underhand (supinated) grip on the handle throughout the full stroke to increase bicep engagement and alter the pull angle.',
            ],
            [
                'name' => 'Tempo Rowing',
                'equipment' => 'Rowing Machine',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Latissimus Dorsi', 'Biceps', 'Abdominals'],
                'description' => 'Varying stroke speed ratios (e.g., explosive drive/slow recovery, or slow drive/fast hands) to develop power control and endurance.',
            ],
            [
                'name' => 'Fartlek Rowing',
                'equipment' => 'Rowing Machine',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Latissimus Dorsi', 'Biceps', 'Abdominals'],
                'description' => 'Unstructured speed play mixing easy paddling, moderate rowing, and random sprints based on feel to enhance all energy systems.',
            ],
        ];

        $sourceDir = public_path('execises/rowing-machine');
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
