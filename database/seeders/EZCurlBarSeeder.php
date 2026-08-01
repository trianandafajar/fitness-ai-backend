<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class EZCurlBarSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Standing EZ Bar Curl', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii', 'Brachialis'], 'description' => 'Hold the EZ bar with a shoulder-width underhand grip, curl the bar up by flexing the elbows, squeeze at the top, then lower with control.'],
            ['name' => 'EZ Bar Preacher Curl', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii', 'Brachialis'], 'description' => 'Using a preacher bench, curl the EZ bar with the upper arms supported on the pad, focusing on strict form and peak contraction.'],
            ['name' => 'EZ Bar Reverse Curl', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Brachioradialis', 'Wrist Extensors', 'Biceps'], 'description' => 'Grip the EZ bar with an overhand (pronated) grip, curl upward keeping elbows stationary. Emphasises the forearms and brachioradialis.'],
            ['name' => 'EZ Bar Wide Grip Curl', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii (short head)', 'Brachialis'], 'description' => 'Take a wider than shoulder-width grip on the outer angled sections. Curls shift tension to the inner bicep (short head).'],
            ['name' => 'EZ Bar Close Grip Curl', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii (long head)', 'Brachialis'], 'description' => 'Grip the inner angled sections with hands close together, curling up to target the outer bicep (long head).'],
            ['name' => 'EZ Bar Drag Curl', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii', 'Brachialis'], 'description' => 'Slide the EZ bar up the front of the torso, elbows moving back, keeping constant tension on the biceps throughout the movement.'],
            ['name' => 'EZ Bar Spider Curl', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii', 'Brachialis'], 'description' => 'Lie face down on an incline bench, arms hanging straight down, curl the EZ bar up. Eliminates momentum and isolates the biceps.'],
            ['name' => 'EZ Bar Seated Incline Curl', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii (long head)', 'Brachialis'], 'description' => 'Sit on an incline bench with arms hanging behind the body, curl the EZ bar up, stretching the long head of the biceps at the bottom.'],
            ['name' => 'EZ Bar Concentration Curl (Single Arm)', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii', 'Brachialis'], 'description' => 'Hold the EZ bar in one hand with a neutral or underhand grip, brace the back of the arm against inner thigh, curl the weight up. Isolates one bicep.'],
            ['name' => 'EZ Bar 21s Curl', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'hypertrophy', 'target_muscles' => ['Biceps Brachii', 'Brachialis'], 'description' => 'Perform 7 bottom-half reps, 7 top-half reps, and 7 full-range reps without rest. Intense metabolic stress technique for arm growth.'],
            ['name' => 'EZ Bar Eccentric-Emphasis Curl', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'strength', 'target_muscles' => ['Biceps Brachii', 'Brachialis'], 'description' => 'Curl the weight up quickly, then lower over 3–5 seconds. Overloads the negative phase for muscle damage and strength gains.'],
            ['name' => 'Lying EZ Bar Triceps Extension (Skull Crusher)', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Triceps Brachii'], 'description' => 'Lie on a flat bench, hold the EZ bar above the chest, lower it toward the forehead by bending elbows, then extend back to lockout.'],
            ['name' => 'EZ Bar Overhead Triceps Extension', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Triceps Brachii (long head)'], 'description' => 'Sit or stand holding the EZ bar overhead, lower it behind the head by bending elbows, then extend arms straight up.'],
            ['name' => 'EZ Bar Close-Grip Bench Press', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Inner Pectoralis', 'Anterior Deltoids'], 'description' => 'Lie on a bench, grip the inner angled sections of the EZ bar, lower to the lower chest, and press up. Emphasises triceps.'],
            ['name' => 'EZ Bar JM Press', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Triceps', 'Pectorals'], 'description' => 'A hybrid between a close-grip bench press and a skull crusher. Lower the EZ bar to the chin or upper chest with elbows slightly flared, then drive back.'],
            ['name' => 'EZ Bar Triceps Pushdown (with Cable)', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Triceps (Lateral Head)', 'Triceps (Medial Head)'], 'description' => 'Attach the EZ bar to a high pulley, grip overhand, press the bar down to full arm extension with elbows pinned to sides, then return with control.'],
            ['name' => 'EZ Bar Upright Row', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Upper Traps', 'Biceps'], 'description' => 'Hold the EZ bar with a close overhand grip, pull it up along the body to chin height, leading with the elbows.'],
            ['name' => 'EZ Bar Bent-Over Row (Underhand)', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Rhomboids', 'Middle Traps', 'Erector Spinae'], 'description' => 'Hinge forward with a flat back, hold the EZ bar with a shoulder-width underhand grip, row to the lower belly, squeezing the back.'],
            ['name' => 'EZ Bar Bent-Over Row (Overhand)', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Traps', 'Rear Deltoids', 'Biceps', 'Erector Spinae'], 'description' => 'Hinge forward, grip the EZ bar with a wide overhand grip, pull to the abdomen, focusing on the upper back and lats.'],
            ['name' => 'EZ Bar Pullover', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Latissimus Dorsi', 'Pectoralis Major', 'Serratus Anterior', 'Triceps Long Head'], 'description' => 'Lie across a bench, hold the EZ bar overhead with arms slightly bent, pull it in an arc over the chest until it is above the hips.'],
            ['name' => 'EZ Bar Front Raise', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Anterior Deltoids', 'Pectoralis Minor'], 'description' => 'Stand holding the EZ bar with an overhand grip in front of thighs, raise it straight forward to shoulder height, then lower slowly.'],
            ['name' => 'EZ Bar Wrist Curl (Palms Up)', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Forearm Flexors'], 'description' => 'Rest forearms on thighs or a bench, palms up holding the EZ bar, curl the wrists upward to work the inner forearms.'],
            ['name' => 'EZ Bar Reverse Wrist Curl (Palms Down)', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Forearm Extensors'], 'description' => 'With forearms supported and palms down, extend the wrists upward against the resistance of the EZ bar, then lower.'],
            ['name' => 'EZ Bar Shrug', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'isolation', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae'], 'description' => 'Hold the EZ bar at arm\'s length in front of the thighs, shrug the shoulders straight up toward the ears, squeeze, and lower.'],
            ['name' => 'EZ Bar Good Morning', 'equipment' => 'EZ Curl Bar', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Erector Spinae', 'Core'], 'description' => 'Place the EZ bar across the upper back, hinge forward at the hips with a flat back, then return to standing. The curved bar can be more comfortable on the neck.'],
        ];


        $sourceDir = public_path('execises/ez-curl-bar');
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
