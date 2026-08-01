<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ArmCurlMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Standard Seated Arm Curl (Both Arms)',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Sit with arms resting on the pad, grasp handles with an underhand grip, curl the handles up toward the shoulders by flexing the elbows, squeeze biceps at the top, then lower with control.',
            ],
            [
                'name' => 'Alternating Arm Curl',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Curl one arm at a time while the other remains stationary. Increases time under tension per arm and helps correct imbalances.',
            ],
            [
                'name' => 'Single-Arm Curl',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Perform the entire set with one arm, keeping the other arm off the pad or resting. Maximizes isolation and unilateral strength.',
            ],
            [
                'name' => 'Hammer Grip Curl (Neutral Grip)',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Brachialis', 'Brachioradialis', 'Biceps Brachii'],
                'description' => 'If the machine allows a neutral grip (palms facing each other), curl the handles maintaining that grip. Emphasizes the brachialis and forearm.',
            ],
            [
                'name' => 'Reverse Grip Curl (Pronated Grip)',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Brachioradialis', 'Wrist Extensors', 'Biceps Brachii'],
                'description' => 'Grip the handles with palms facing down (pronated). Curl the handles up while keeping the forearms stable, targeting the brachioradialis and forearm extensors.',
            ],
            [
                'name' => 'Pause Arm Curl',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'At the peak contraction (handles near shoulders), hold for 1-2 seconds and squeeze the biceps hard before lowering. Eliminates momentum.',
            ],
            [
                'name' => 'Eccentric-Emphasis Arm Curl',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Curl the weight up quickly (concentric), then take 3-5 seconds to lower the handles back to the start. Overloads the negative phase.',
            ],
            [
                'name' => 'Tempo Arm Curl (3-1-3)',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => '3 seconds to curl up, 1-second squeeze at the top, 3 seconds to lower. Maximizes time under tension and control.',
            ],
            [
                'name' => 'Isometric Hold Arm Curl',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Curl to a specific angle (e.g., 90 degrees elbow flexion) and hold the position for 10-30 seconds. Builds static strength and endurance.',
            ],
            [
                'name' => 'Partial Reps (Top Half)',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Biceps Brachii (peak contraction zone)'],
                'description' => 'Only move through the upper half of the range, from mid-point to full contraction. Keeps constant tension on the biceps.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half)',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Curl from the fully extended position to the midpoint only. Emphasizes the initial bicep activation and stretch.',
            ],
            [
                'name' => '21s Arm Curl',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Perform 7 bottom-half reps, 7 top-half reps, and 7 full-range reps without any rest. Intensifies metabolic stress for arm growth.',
            ],
            [
                'name' => 'Pulse Arm Curl',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'At the top contracted position, perform small, rapid pulses without lowering the handles fully. Maintains constant tension and creates a deep burn.',
            ],
            [
                'name' => 'Explosive Arm Curl',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Use a moderate weight, curl the handles up as fast as possible, then lower under control. Develops explosive bicep power.',
            ],
            [
                'name' => 'Negative Arm Curl (Single-Arm Eccentric Overload)',
                'equipment' => 'Arm Curl Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Use both arms to lift the weight, then lower with one arm over 4-5 seconds. Applies heavy eccentric overload to one bicep at a time.',
            ],
        ];

        $sourceDir = public_path('execises/arm-curl-machine');
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
