<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PreacherCurlBenchSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Barbell Preacher Curl (EZ-Bar)',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Sit on the bench with chest against the pad, grasp an EZ-bar with a shoulder-width underhand grip, curl the bar up by flexing the elbows, squeeze biceps at top, then lower with control.',
            ],
            [
                'name' => 'Straight Bar Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Using a straight barbell with an underhand grip, keep your upper arms and chest pressed against the pad, curl the bar from full extension to peak contraction.',
            ],
            [
                'name' => 'Dumbbell Single-Arm Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Hold a dumbbell in one hand, upper arm flat on the pad, curl the weight up while keeping the elbow stationary. Isolates each bicep and corrects imbalances.',
            ],
            [
                'name' => 'Dumbbell Alternating Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Curl one dumbbell at a time, alternating arms. Increases time under tension and focuses on each bicep individually.',
            ],
            [
                'name' => 'Dumbbell Both Arms Simultaneous Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Hold a dumbbell in each hand, upper arms resting on the pad, curl both weights up together, squeezing biceps at the top.',
            ],
            [
                'name' => 'Hammer Grip Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'isolation',
                'target_muscles' => ['Brachialis', 'Brachioradialis', 'Biceps Brachii'],
                'description' => 'Use dumbbells or a hammer bar with palms facing each other (neutral grip). Arm position on the pad remains the same; the neutral grip heavily recruits the brachialis and brachioradialis.',
            ],
            [
                'name' => 'Reverse Grip Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'isolation',
                'target_muscles' => ['Brachioradialis', 'Biceps Brachii', 'Wrist Extensors'],
                'description' => 'Grip the bar with palms facing down (pronated). Upper arms stay on the pad, curl the bar up focusing on the brachioradialis and forearms.',
            ],
            [
                'name' => 'Wide Grip Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps Brachii (short head emphasis)', 'Brachialis'],
                'description' => 'Take a grip wider than shoulder-width on an EZ-bar or straight bar. The wider grip shifts tension to the inner (short head) of the biceps.',
            ],
            [
                'name' => 'Close Grip Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps Brachii (long head emphasis)', 'Brachialis'],
                'description' => 'Hands placed closer than shoulder-width on the bar. This grip hits the outer (long head) of the biceps more directly.',
            ],
            [
                'name' => 'Concentration Curl on Preacher Bench',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Sit sideways on the bench, arm hanging vertically with the triceps resting against the pad, and curl a dumbbell across the body toward the opposite shoulder for peak contraction.',
            ],
            [
                'name' => 'Preacher Drag Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'With a barbell or EZ-bar, instead of curling in a strict arc, slide the bar up along the pad while pulling the elbows back slightly. Increases bicep tension at peak contraction.',
            ],
            [
                'name' => 'Wrist Curl (Forearm Flexion)',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'isolation',
                'target_muscles' => ['Forearm Flexors'],
                'description' => 'Rest the forearms on the pad with wrists hanging off, palms up. Curl the weight up by flexing the wrists only, then lower for a full stretch.',
            ],
            [
                'name' => 'Reverse Wrist Curl (Forearm Extension)',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'isolation',
                'target_muscles' => ['Forearm Extensors'],
                'description' => 'Forearms on the pad, palms down, weights in hands. Extend the wrists upward against resistance, then lower slowly to work the top of the forearms.',
            ],
            [
                'name' => 'Pause Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'At the top of the curl, hold the peak contraction for 1-2 seconds before lowering. Intensifies muscle fiber recruitment and time under tension.',
            ],
            [
                'name' => 'Eccentric-Emphasis Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Curl the weight up quickly (concentric), then lower it very slowly over 3-5 seconds. Overloads the negative phase for strength and muscle growth.',
            ],
            [
                'name' => 'Tempo Preacher Curl (3-1-3)',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => '3 seconds to curl up, 1-second peak squeeze, 3 seconds to lower. Maximizes time under tension for arm development.',
            ],
            [
                'name' => 'Isometric Hold Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Curl the weight to the midpoint or top and hold the position statically for 10-30 seconds. Builds endurance and mind-muscle connection.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Biceps Brachii (peak contraction zone)'],
                'description' => 'Only move through the top half of the range, from midpoint to full contraction, keeping constant tension on the biceps.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Biceps Brachii (stretch emphasis)'],
                'description' => 'Work only from the fully extended position to the midpoint, emphasizing the initial bicep activation and stretch.',
            ],
            [
                'name' => '21s Preacher Curl',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Perform 7 bottom-half reps, 7 top-half reps, and 7 full-range reps without rest. An intense technique for muscle pump and growth.',
            ],
            [
                'name' => 'Negative Preacher Curl (Single Arm)',
                'equipment' => 'Preacher Curl Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Biceps Brachii', 'Brachialis'],
                'description' => 'Use both hands to lift the weight, then lower with one arm over 4-5 seconds. Focuses eccentric overload on one bicep.',
            ],
        ];

        $sourceDir = public_path('execises/preacher-curl-bench');
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
