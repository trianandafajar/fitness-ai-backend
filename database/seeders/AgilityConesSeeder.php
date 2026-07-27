<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AgilityConesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Agility Cones Weave (Figure-8)',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Hip Rotators', 'Core', 'Cardio', 'Stabilizers'],
                'description' => 'Weave in and out of cones. Agility, coordination, and change of direction.',
            ],
            [
                'name' => 'Agility Cones Shuttle Run (5-10-5)',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Hamstrings', 'Core', 'Cardio', 'Glutes'],
                'description' => 'Sprint 5 yards, touch cone, sprint back 10, touch, sprint 5. Speed and agility.',
            ],
            [
                'name' => 'Agility Cones Lateral Shuffle',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Gluteus Medius', 'Adductors', 'Calves', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Shuffle laterally between cones. Hip stability and lateral agility.',
            ],
            [
                'name' => 'Agility Cones Zig-Zag Run',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Hip Rotators'],
                'description' => 'Run zig-zag pattern through cones. Multi-directional agility.',
            ],
            [
                'name' => 'Agility Cones T-Drill',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Hamstrings', 'Core', 'Cardio', 'Hip Rotators'],
                'description' => 'T-shaped movement: sprint, shuffle, backpedal. Speed and agility.',
            ],
            [
                'name' => 'Agility Cones Box Drill',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Cardio', 'Hip Rotators', 'Stabilizers'],
                'description' => 'Run square pattern around cones. Change of direction and speed.',
            ],
            [
                'name' => 'Agility Cones 3-Cone Drill (L-Drill)',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Hamstrings', 'Core', 'Cardio', 'Hip Rotators'],
                'description' => 'Sprint, cut, weave around 3 cones in L-shape. Agility and speed.',
            ],
            [
                'name' => 'Agility Cones 4-Cone Diamond Drill',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Cardio', 'Hip Rotators', 'Stabilizers'],
                'description' => 'Diamond pattern around 4 cones. Multi-directional agility.',
            ],
            [
                'name' => 'Agility Cones Single-Leg Hops (Around Cones)',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Stabilizers', 'Cardio'],
                'description' => 'Hop on one leg around cones. Unilateral balance and power.',
            ],
            [
                'name' => 'Agility Cones Double-Leg Hops (Around Cones)',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Fast-Twitch Fibers'],
                'description' => 'Hop with both feet around cones. Plyometric power and agility.',
            ],
            [
                'name' => 'Agility Cones Backpedal Drill',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Calves', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Backpedal between cones. Posterior chain and coordination.',
            ],
            [
                'name' => 'Agility Cones Carioca (Grapevine)',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Rotators', 'Calves', 'Core', 'Adductors', 'Cardio', 'Stabilizers'],
                'description' => 'Cross-over step between cones. Hip mobility and coordination.',
            ],
            [
                'name' => 'Agility Cones Lateral Bound (Power Step)',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Gluteus Medius', 'Calves', 'Adductors', 'Core', 'Cardio', 'Stabilizers'],
                'description' => 'Explosive lateral bounds between cones. Lateral power and stability.',
            ],
            [
                'name' => 'Agility Cones Icky Shuffle',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Hip Flexors', 'Cardio', 'Stabilizers'],
                'description' => 'In-out-in footwork pattern through cones. Agility and cadence.',
            ],
            [
                'name' => 'Agility Cones Sprint-to-Shuffle',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Calves', 'Gluteus Medius', 'Core', 'Cardio', 'Hamstrings'],
                'description' => 'Sprint then shuffle at cones. Speed and transition agility.',
            ],
            [
                'name' => 'Agility Cones Figure-8 Run',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Hip Rotators', 'Core', 'Cardio', 'Quadriceps', 'Stabilizers'],
                'description' => 'Run figure-8 around two cones. Change of direction and speed.',
            ],
            [
                'name' => 'Agility Cones Turn and Sprint',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Hip Rotators'],
                'description' => 'Sprint to cone, touch, turn, sprint back. Change of direction.',
            ],
            [
                'name' => 'Agility Cones Slalom',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Hip Rotators', 'Core', 'Cardio', 'Quadriceps', 'Stabilizers'],
                'description' => 'Slalom run through cones. Agility and body control.',
            ],
            [
                'name' => 'Agility Cones In-and-Out Drill',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Hip Flexors'],
                'description' => 'Step in and out between cones. Footwork and coordination.',
            ],
            [
                'name' => 'Agility Cones 5-Cone Star Drill',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Cardio', 'Hip Rotators', 'Stabilizers'],
                'description' => 'Star pattern around 5 cones. Multi-directional agility.',
            ],
            [
                'name' => 'Agility Cones Zig-Zag Hop (Single-Leg)',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Stabilizers', 'Cardio', 'Glutes'],
                'description' => 'Zig-zag hop on one leg through cones. Unilateral agility.',
            ],
            [
                'name' => 'Agility Cones Lateral Shuffle to Sprint',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Gluteus Medius', 'Calves', 'Core', 'Cardio', 'Quadriceps', 'Hamstrings'],
                'description' => 'Shuffle then sprint to next cone. Transition agility.',
            ],
            [
                'name' => 'Agility Cones 6-Cone Hexagon Drill',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Cardio', 'Hip Rotators', 'Stabilizers'],
                'description' => 'Hexagon pattern around 6 cones. Multi-directional speed.',
            ],
            [
                'name' => 'Agility Cones Mirror Drill',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Cardio', 'Hip Rotators', 'Stabilizers', 'Quadriceps'],
                'description' => 'Follow partner\'s movement around cones. Reactive agility.',
            ],
            [
                'name' => 'Agility Cones Broad Jump Over Cones',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core', 'Cardio'],
                'description' => 'Broad jump over cones. Explosive horizontal power.',
            ],
            [
                'name' => 'Agility Cones Stride Bounds',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Calves', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Long bounds between cones. Power and speed development.',
            ],
            [
                'name' => 'Agility Cones Reaction Drill',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Cardio', 'Hip Flexors', 'Stabilizers'],
                'description' => 'React to cone direction changes. Cognitive and physical agility.',
            ],
            [
                'name' => 'Agility Cones Suicides (Line Drills)',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Calves', 'Hamstrings', 'Core', 'Cardio', 'Glutes'],
                'description' => 'Sprint to progressive cone distances. Speed and endurance.',
            ],
            [
                'name' => 'Agility Cones Lateral Shuffle with Touch',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Gluteus Medius', 'Adductors', 'Calves', 'Core', 'Cardio', 'Stabilizers'],
                'description' => 'Shuffle and touch each cone. Lateral agility and coordination.',
            ],
            [
                'name' => 'Agility Cones 2-2-2 Drill',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Cardio', 'Hip Rotators', 'Stabilizers'],
                'description' => '2 forward, 2 lateral, 2 back. Multi-directional pattern.',
            ],
            [
                'name' => 'Agility Cones Power Skip',
                'equipment' => 'Agility Cones',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Hip Flexors', 'Core', 'Cardio', 'Quadriceps', 'Glutes'],
                'description' => 'Power skip between cones. Speed and coordination.',
            ],
        ];

        $sourceDir = public_path('execises/agility-cones');
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
