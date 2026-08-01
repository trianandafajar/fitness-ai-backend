<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class SkippingRopeSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Skipping Rope Basic Jump',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Shoulders', 'Forearms', 'Cardio'],
                'description' => 'Jump with both feet over rope. Turn wrists. Basic cardio and coordination.',
            ],
            [
                'name' => 'Skipping Rope Single-Leg Hop',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Core', 'Stabilizers', 'Cardio'],
                'description' => 'Hop on one leg while skipping. Unilateral calf and balance.',
            ],
            [
                'name' => 'Skipping Rope Alternating Foot Jump (Boxer Skip)',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Hip Flexors', 'Core', 'Cardio', 'Shoulders'],
                'description' => 'Alternate landing on each foot. Rhythmic boxing-style skipping.',
            ],
            [
                'name' => 'Skipping Rope Double Under',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Shoulders', 'Forearms', 'Cardio'],
                'description' => 'Rope passes under feet twice per jump. Advanced coordination and power.',
            ],
            [
                'name' => 'Skipping Rope Triple Under',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Shoulders', 'Forearms', 'Cardio'],
                'description' => 'Rope passes under feet three times per jump. Elite coordination.',
            ],
            [
                'name' => 'Skipping Rope High Knee Jump',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Core', 'Calves', 'Cardio', 'Glutes'],
                'description' => 'Drive knees high with each jump. Hip flexor and core emphasis.',
            ],
            [
                'name' => 'Skipping Rope Butt Kicker Jump',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Calves', 'Core', 'Cardio', 'Hip Flexors'],
                'description' => 'Kick heels to glutes with each jump. Hamstring and glute emphasis.',
            ],
            [
                'name' => 'Skipping Rope Side-to-Side Jump',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Jump side to side. Lateral agility and hip stabilizers.',
            ],
            [
                'name' => 'Skipping Rope Forward-Backward Jump',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Cardio', 'Hamstrings', 'Glutes'],
                'description' => 'Jump forward and backward. Agility and coordination.',
            ],
            [
                'name' => 'Skipping Rope Criss-Cross (Cross Over)',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Shoulders', 'Forearms', 'Calves', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Cross arms over each jump. Upper body coordination.',
            ],
            [
                'name' => 'Skipping Rope Reverse Jump (Backward Skip)',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Forearms', 'Shoulders', 'Cardio'],
                'description' => 'Swing rope backward. Reverse coordination challenge.',
            ],
            [
                'name' => 'Skipping Rope Double Leg Jump with Pause',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Quadriceps', 'Glutes', 'Cardio', 'Stabilizers'],
                'description' => 'Jump, pause, jump again. Rhythmic variation.',
            ],
            [
                'name' => 'Skipping Rope Crossed Feet Jump',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Core', 'Quadriceps', 'Cardio', 'Glutes'],
                'description' => 'Cross feet while jumping. Coordination and adductor work.',
            ],
            [
                'name' => 'Skipping Rope Split Step (Jack Jump)',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Abductors', 'Core', 'Quadriceps', 'Cardio'],
                'description' => 'Jump with legs apart like jumping jack. Hip mobility and coordination.',
            ],
            [
                'name' => 'Skipping Rope One-Handed Skipping',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Forearms', 'Shoulders', 'Calves', 'Core', 'Cardio', 'Stabilizers'],
                'description' => 'Swing rope with one hand. Unilateral upper body coordination.',
            ],
            [
                'name' => 'Skipping Rope Power Jump (Max Height)',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Fast-Twitch Fibers', 'Core', 'Glutes', 'Cardio'],
                'description' => 'Jump as high as possible. Plyometric power.',
            ],
            [
                'name' => 'Skipping Rope Sprint Skip (Fast Tempo)',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Quadriceps', 'Cardio', 'Shoulders', 'Forearms'],
                'description' => 'Maximum speed skipping. High-intensity cardio.',
            ],
            [
                'name' => 'Skipping Rope Slow Tempo Skip (Endurance)',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Cardio', 'Forearms', 'Shoulders', 'Stabilizers'],
                'description' => 'Slow controlled skipping. Cardio endurance and technique.',
            ],
            [
                'name' => 'Skipping Rope Interval Training',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Quadriceps', 'Cardio', 'Shoulders', 'Forearms'],
                'description' => 'Alternate fast and slow intervals. HIIT conditioning.',
            ],
            [
                'name' => 'Skipping Rope Freestyle',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Shoulders', 'Forearms', 'Cardio', 'Stabilizers'],
                'description' => 'Combination of all variations. Creativity and coordination.',
            ],
            [
                'name' => 'Skipping Rope Burpee Skip',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Chest', 'Triceps', 'Core', 'Quadriceps', 'Calves', 'Cardio', 'Shoulders'],
                'description' => 'Burpee with skipping rope. Full-body metabolic conditioning.',
            ],
            [
                'name' => 'Skipping Rope Weighted Rope Jump',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Shoulders', 'Forearms', 'Calves', 'Core', 'Cardio', 'Traps'],
                'description' => 'Use heavier rope. Upper body and shoulder emphasis.',
            ],
            [
                'name' => 'Skipping Rope Tabata Protocol',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Quadriceps', 'Cardio', 'Forearms', 'Shoulders'],
                'description' => '20 sec max effort, 10 sec rest. 8 rounds. High-intensity.',
            ],
            [
                'name' => 'Skipping Rope Ladder Drill',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Quadriceps', 'Cardio', 'Hip Flexors', 'Stabilizers'],
                'description' => 'Skip forward/backward in ladder pattern. Agility and coordination.',
            ],
            [
                'name' => 'Skipping Rope Single-Leg Boxer Skip',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Hip Flexors', 'Cardio', 'Stabilizers', 'Glutes'],
                'description' => 'Single-leg boxer skip. Unilateral balance and cardio.',
            ],
            [
                'name' => 'Skipping Rope Wide Stance Jump',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Adductors', 'Glutes', 'Core', 'Cardio', 'Quadriceps'],
                'description' => 'Wide stance during jump. Inner thigh emphasis.',
            ],
            [
                'name' => 'Skipping Rope Narrow Stance Jump',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Quadriceps', 'Core', 'Cardio', 'Stabilizers', 'Glutes'],
                'description' => 'Feet together. Traditional jumping position.',
            ],
            [
                'name' => 'Skipping Rope Crossover Double Under',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Shoulders', 'Forearms', 'Cardio', 'Quadriceps'],
                'description' => 'Double under with crossed arms. Advanced coordination.',
            ],
            [
                'name' => 'Skipping Rope Heel-to-Toe Jump',
                'equipment' => 'Skipping Rope',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Stabilizers', 'Cardio', 'Quadriceps', 'Glutes'],
                'description' => 'Alternate heel and toe landing. Footwork and agility.',
            ],
            [
                'name' => 'Skipping Rope Skipping with Weighted Vest',
                'equipment' => 'Skipping Rope, Weighted Vest',
                'category_slug' => 'cardio',
                'target_muscles' => ['Calves', 'Core', 'Quadriceps', 'Cardio', 'Shoulders', 'Glutes'],
                'description' => 'Wear weighted vest during skipping. Increased cardio load.',
            ],
        ];

        $sourceDir = public_path('execises/skipping-rope');
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
