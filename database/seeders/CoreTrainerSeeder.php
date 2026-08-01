<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CoreTrainerSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Core Trainer Ab Crunch',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Rectus Abdominis', 'Obliques', 'Core', 'Hip Flexors'],
                'description' => 'Sit on trainer, anchor feet. Lean back, crunch forward. Core flexion.',
            ],
            [
                'name' => 'Core Trainer Oblique Crunch (Twist)',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Core', 'Hip Flexors'],
                'description' => 'Crunch with rotation to one side. Oblique emphasis.',
            ],
            [
                'name' => 'Core Trainer Alternating Oblique Crunch',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Core', 'Hip Flexors'],
                'description' => 'Alternate twisting to left and right. Rotational core.',
            ],
            [
                'name' => 'Core Trainer Isometric Hold (Crunch Position)',
                'equipment' => 'Core Trainer',
                'category_slug' => 'stability',
                'target_muscles' => ['Rectus Abdominis', 'Core', 'Obliques', 'Hip Flexors'],
                'description' => 'Hold crunch position. Static core contraction.',
            ],
            [
                'name' => 'Core Trainer Reverse Crunch',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas'],
                'description' => 'Curl pelvis off seat. Lower ab emphasis.',
            ],
            [
                'name' => 'Core Trainer Leg Raise',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps'],
                'description' => 'Raise straight legs to 90°. Lower core and hip flexor.',
            ],
            [
                'name' => 'Core Trainer Knee Raise',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas'],
                'description' => 'Raise knees to chest. Lower ab work.',
            ],
            [
                'name' => 'Core Trainer Weighted Crunch',
                'equipment' => 'Core Trainer, Weight Plate/Dumbbell',
                'category_slug' => 'strength',
                'target_muscles' => ['Rectus Abdominis', 'Core', 'Obliques', 'Hip Flexors'],
                'description' => 'Hold weight on chest during crunch. Added resistance.',
            ],
            [
                'name' => 'Core Trainer Side Bends',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Quadratus Lumborum', 'Core', 'Hip Flexors'],
                'description' => 'Lean side to side. Lateral core and oblique work.',
            ],
            [
                'name' => 'Core Trainer Bicycle Crunch',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Hip Flexors', 'Core'],
                'description' => 'Alternate elbow to opposite knee. Dynamic oblique work.',
            ],
            [
                'name' => 'Core Trainer Russian Twist',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders'],
                'description' => 'Sit on trainer, lean back, rotate side to side. Rotational core.',
            ],
            [
                'name' => 'Core Trainer Weighted Russian Twist',
                'equipment' => 'Core Trainer, Weight Plate/Dumbbell',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders'],
                'description' => 'Hold weight during Russian twist. Added rotational resistance.',
            ],
            [
                'name' => 'Core Trainer V-Up',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core', 'Shoulders'],
                'description' => 'Simultaneously raise legs and torso. Full core.',
            ],
            [
                'name' => 'Core Trainer Isometric Plank (Hands on Trainer)',
                'equipment' => 'Core Trainer',
                'category_slug' => 'stability',
                'target_muscles' => ['Core', 'Shoulders', 'Chest', 'Triceps', 'Glutes'],
                'description' => 'Hands on trainer, hold plank. Unstable core stability.',
            ],
            [
                'name' => 'Core Trainer Side Plank',
                'equipment' => 'Core Trainer',
                'category_slug' => 'stability',
                'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Glutes', 'Hip Abductors'],
                'description' => 'Side plank on trainer. Oblique stability.',
            ],
            [
                'name' => 'Core Trainer Flutter Kick',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps'],
                'description' => 'Alternating small kicks. Lower ab endurance.',
            ],
            [
                'name' => 'Core Trainer Scissor Kick',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Adductors'],
                'description' => 'Alternate crossing legs. Lower ab and hip flexor.',
            ],
            [
                'name' => 'Core Trainer Toes-to-Trainer (Advanced)',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Lats', 'Obliques'],
                'description' => 'Lift legs to touch trainer. Advanced core strength.',
            ],
            [
                'name' => 'Core Trainer Reverse Crunch with Hip Lift',
                'equipment' => 'Core Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas'],
                'description' => 'Lift hips off trainer. Advanced lower ab contraction.',
            ],
            [
                'name' => 'Core Trainer Band Resisted Crunch',
                'equipment' => 'Core Trainer, Resistance Band',
                'category_slug' => 'strength',
                'target_muscles' => ['Rectus Abdominis', 'Core', 'Obliques', 'Hip Flexors'],
                'description' => 'Attach band for resistance. Accommodating core resistance.',
            ],
        ];

        $sourceDir = public_path('execises/core-trainer');
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
