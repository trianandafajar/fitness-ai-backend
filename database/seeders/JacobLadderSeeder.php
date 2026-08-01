<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class JacobLadderSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Basic Climb',
                'equipment' => "Jacob's Ladder",
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Latissimus Dorsi', 'Biceps', 'Forearms', 'Abdominals', 'Obliques'],
                'description' => 'Steady-state climbing using all four limbs in a natural alternating pattern to build full-body endurance and cardiovascular fitness.',
            ],
            [
                'name' => 'Sprint Climb',
                'equipment' => "Jacob's Ladder",
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Latissimus Dorsi', 'Biceps', 'Abdominals'],
                'description' => 'All-out maximum-effort climbing for short durations to develop explosive power, speed, and anaerobic capacity.',
            ],
            [
                'name' => 'High-Knee Climb',
                'equipment' => "Jacob's Ladder",
                'category_slug' => 'cardio',
                'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Abdominals', 'Glutes', 'Calves', 'Biceps'],
                'description' => 'Exaggerating the knee lift with each step while maintaining pace to increase hip flexor recruitment and core activation.',
            ],
            [
                'name' => 'Lateral Climb (Sideways)',
                'equipment' => "Jacob's Ladder",
                'category_slug' => 'cardio',
                'target_muscles' => ['Gluteus Medius', 'Adductors', 'Abductors', 'Obliques', 'Quadriceps', 'Hamstrings'],
                'description' => 'Facing sideways, crossing the trailing leg over to climb laterally; improves hip stability, lateral movement, and oblique strength.',
            ],
            [
                'name' => 'Backward Climb',
                'equipment' => "Jacob's Ladder",
                'category_slug' => 'coordination',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Facing away from the ladder and stepping in reverse to challenge coordination, balance, and emphasize the quadriceps through a different pattern.',
            ],
            [
                'name' => 'Skip Climb',
                'equipment' => "Jacob's Ladder",
                'category_slug' => 'plyometric',
                'target_muscles' => ['Calves', 'Quadriceps', 'Glutes', 'Hip Flexors', 'Core', 'Shoulders'],
                'description' => 'Adding a light skip or hop between rungs to introduce a plyometric element that boosts reactive power and agility.',
            ],
            [
                'name' => 'Tempo Interval Climb',
                'equipment' => "Jacob's Ladder",
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Latissimus Dorsi', 'Abdominals'],
                'description' => 'Alternating between moderate pace and high-intensity bursts (or changing stroke rates) to improve both aerobic endurance and speed endurance.',
            ],
            [
                'name' => 'Isometric Hold Climb',
                'equipment' => "Jacob's Ladder",
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Latissimus Dorsi', 'Biceps', 'Forearms', 'Abdominals'],
                'description' => 'Pausing and holding a fixed rung position under tension for several seconds during the climb to build grip strength and full-body static endurance.',
            ],
            [
                'name' => 'Single-Arm Focus Climb',
                'equipment' => "Jacob's Ladder",
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Forearms', 'Abdominals', 'Quadriceps'],
                'description' => 'Emphasizing a strong pull with one arm while the other only assists lightly, alternating sides to correct imbalances and increase unilateral upper-body load.',
            ],
        ];

        $sourceDir = public_path('execises/jacobs-ladder');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $imagePath = Storage::disk('public')->putFile('execises', new File($sourceFile));
                $data['image'] = $imagePath;
            }

            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;

            Exercise::create($data);
        }
    }
}
