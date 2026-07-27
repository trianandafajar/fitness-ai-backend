<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AgilityHurdlesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Agility Hurdles Forward Hop',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Hip Flexors'],
                'description' => 'Hop over hurdles forward. Plyometric leg power and coordination.',
            ],
            [
                'name' => 'Agility Hurdles Single-Leg Hop',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Stabilizers', 'Cardio'],
                'description' => 'Hop over hurdles on one leg. Unilateral balance and power.',
            ],
            [
                'name' => 'Agility Hurdles Lateral Hop',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Glutes'],
                'description' => 'Hop sideways over hurdles. Lateral power and hip stabilizers.',
            ],
            [
                'name' => 'Agility Hurdles Double-Leg Hop',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Fast-Twitch Fibers'],
                'description' => 'Both feet hop over hurdles. Explosive bilateral power.',
            ],
            [
                'name' => 'Agility Hurdles Run Over (High Knees)',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Calves', 'Core', 'Cardio', 'Glutes'],
                'description' => 'Run over hurdles with high knees. Speed and hip flexion.',
            ],
            [
                'name' => 'Agility Hurdles Lateral Run (Shuffle)',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Gluteus Medius', 'Adductors', 'Calves', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Shuffle sideways over hurdles. Lateral agility and hip strength.',
            ],
            [
                'name' => 'Agility Hurdles Quick Step (In-Between)',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Hip Flexors', 'Core', 'Cardio', 'Quadriceps', 'Stabilizers'],
                'description' => 'Quick feet between hurdles. Speed and footwork cadence.',
            ],
            [
                'name' => 'Agility Hurdles 180° Turn Hop',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Core', 'Obliques', 'Calves', 'Quadriceps', 'Cardio', 'Hip Rotators'],
                'description' => 'Hop over hurdle with 180° turn. Rotational power and coordination.',
            ],
            [
                'name' => 'Agility Hurdles Single-Leg Lateral Hop',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Gluteus Medius', 'Core', 'Stabilizers', 'Cardio', 'Adductors'],
                'description' => 'One-leg lateral hop over hurdles. Unilateral lateral power.',
            ],
            [
                'name' => 'Agility Hurdles Bounding (Long Strides)',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Calves', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Long explosive strides over hurdles. Power and speed.',
            ],
            [
                'name' => 'Agility Hurdles Depth Jump (Off Hurdle)',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Fast-Twitch Fibers'],
                'description' => 'Step off hurdle, jump immediately. Reactive strength and power.',
            ],
            [
                'name' => 'Agility Hurdles Ladder Pattern (In-Out)',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Hip Flexors', 'Core', 'Cardio', 'Quadriceps', 'Stabilizers'],
                'description' => 'Step in and out between hurdles. Footwork and agility.',
            ],
            [
                'name' => 'Agility Hurdles Straddle Hop (Scissors)',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Alternate feet over hurdles. Coordination and hip mobility.',
            ],
            [
                'name' => 'Agility Hurdles Zig-Zag Run',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Run zig-zag through hurdles. Multi-directional agility.',
            ],
            [
                'name' => 'Agility Hurdles Sideways Straddle',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Gluteus Medius', 'Core', 'Cardio', 'Hip Rotators'],
                'description' => 'Lateral straddle hops over hurdles. Hip mobility and lateral power.',
            ],
            [
                'name' => 'Agility Hurdles Backward Hop',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Calves', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Hop backward over hurdles. Posterior chain and coordination.',
            ],
            [
                'name' => 'Agility Hurdles Single-Leg Backward Hop',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Calves', 'Core', 'Stabilizers', 'Cardio'],
                'description' => 'One-leg backward hop. Unilateral posterior chain and balance.',
            ],
            [
                'name' => 'Agility Hurdles Lateral Bound (Power Step)',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Gluteus Medius', 'Calves', 'Adductors', 'Core', 'Cardio', 'Stabilizers'],
                'description' => 'Explosive lateral bounds over hurdles. Lateral power.',
            ],
            [
                'name' => 'Agility Hurdles Diagonal Hop',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Cardio', 'Glutes', 'Stabilizers'],
                'description' => 'Hop diagonally over hurdles. Multi-directional power.',
            ],
            [
                'name' => 'Agility Hurdles Rapid Fire (Quick Hops)',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Fast-Twitch Fibers', 'Cardio', 'Quadriceps', 'Hip Flexors'],
                'description' => 'Maximum speed hops over hurdles. Explosive power and speed.',
            ],
            [
                'name' => 'Agility Hurdles Step-Over (Marching)',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Core', 'Calves', 'Cardio', 'Glutes'],
                'description' => 'Step over hurdles with marching motion. Hip mobility.',
            ],
            [
                'name' => 'Agility Hurdles Lateral Step-Over',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Gluteus Medius', 'Hip Flexors', 'Core', 'Calves', 'Cardio', 'Adductors'],
                'description' => 'Step over hurdles laterally. Hip mobility and lateral agility.',
            ],
            [
                'name' => 'Agility Hurdles Hopscotch Pattern',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Cardio', 'Hip Flexors', 'Stabilizers'],
                'description' => 'Hopscotch over and between hurdles. Fun agility and coordination.',
            ],
            [
                'name' => 'Agility Hurdles Sprint Over (Max Speed)',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Hip Flexors'],
                'description' => 'Full sprint over hurdles. Speed and power conditioning.',
            ],
            [
                'name' => 'Agility Hurdles Crossover Step',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Rotators', 'Calves', 'Core', 'Adductors', 'Cardio', 'Stabilizers'],
                'description' => 'Crossover step over hurdles. Hip mobility and coordination.',
            ],
            [
                'name' => 'Agility Hurdles Intervals (HIIT)',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Hip Flexors'],
                'description' => 'Alternate high-intensity hops with rest. HIIT conditioning.',
            ],
            [
                'name' => 'Agility Hurdles Single-Leg Straddle Hop',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Core', 'Stabilizers', 'Cardio', 'Glutes'],
                'description' => 'Straddle hop over hurdles on one leg. Unilateral coordination.',
            ],
            [
                'name' => 'Agility Hurdles Double-Leg Lateral Hop',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Glutes'],
                'description' => 'Both feet lateral hop over hurdles. Bilateral lateral power.',
            ],
            [
                'name' => 'Agility Hurdles Depth to Jump',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Fast-Twitch Fibers'],
                'description' => 'Step off hurdle, jump over next. Reactive plyometric power.',
            ],
            [
                'name' => 'Agility Hurdles Lateral Lunge Over',
                'equipment' => 'Agility Hurdles',
                'category_slug' => 'strength',
                'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Core', 'Cardio', 'Stabilizers'],
                'description' => 'Lateral lunge over hurdle. Unilateral strength and agility.',
            ],
        ];

        $sourceDir = public_path('execises/agility-hurdles');
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
