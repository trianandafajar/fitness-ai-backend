<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class WristRollerSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Wrist Roller (Standard Roll Up)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Forearm Extensors', 'Grip Muscles', 'Brachioradialis', 'Biceps'], 'description' => 'Hold roller with arms extended. Roll weight up by alternating wrist flexion/extension. Lower with control.'],
            ['name' => 'Wrist Roller (Reverse Roll Up)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Extensors', 'Brachioradialis', 'Grip Muscles', 'Forearm Flexors', 'Biceps'], 'description' => 'Roll weight up in opposite direction. Emphasizes extensors more than standard roll.'],
            ['name' => 'Wrist Roller (Pronated Grip)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Pronator Teres', 'Grip Muscles', 'Brachioradialis', 'Biceps'], 'description' => 'Palms facing down (pronated). Roll up and down. Focuses on wrist flexors and pronators.'],
            ['name' => 'Wrist Roller (Supinated Grip)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Extensors', 'Supinator', 'Brachioradialis', 'Grip Muscles', 'Biceps'], 'description' => 'Palms facing up (supinated). Roll up and down. Focuses on extensors and supinators.'],
            ['name' => 'Wrist Roller (Single-Arm Roll Up)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Forearm Extensors', 'Grip Muscles', 'Brachioradialis', 'Stabilizers'], 'description' => 'Use one arm only to roll up. Unilateral forearm and grip strength development.'],
            ['name' => 'Wrist Roller (Single-Arm Reverse Roll Up)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Extensors', 'Brachioradialis', 'Grip Muscles', 'Forearm Flexors', 'Stabilizers'], 'description' => 'Reverse roll with one arm only. Unilateral extensor and grip emphasis.'],
            ['name' => 'Wrist Roller (Shoulder Height Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Shoulders', 'Biceps', 'Core', 'Traps', 'Deltoids', 'Grip Muscles'], 'description' => 'Hold roller at shoulder height. Roll up and down. Engages shoulders and core more.'],
            ['name' => 'Wrist Roller (Overhead Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Shoulders', 'Triceps', 'Core', 'Traps', 'Stabilizers', 'Grip Muscles'], 'description' => 'Hold roller overhead with arms extended. Roll up and down. Extreme shoulder and forearm endurance.'],
            ['name' => 'Wrist Roller (Behind Back Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Rear Deltoids', 'Biceps', 'Core', 'Traps', 'Rhomboids', 'Grip Muscles'], 'description' => 'Hold roller behind back. Roll up and down. Unusual angle challenges forearms differently.'],
            ['name' => 'Wrist Roller (Seated Roll on Thighs)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Forearm Extensors', 'Grip Muscles', 'Brachioradialis'], 'description' => 'Sit with roller resting on thighs. Roll up and down. Isolates forearms without shoulder involvement.'],
            ['name' => 'Wrist Roller (Isometric Hold)', 'equipment' => 'Wrist Roller', 'category_slug' => 'core', 'target_muscles' => ['Forearm Flexors', 'Forearm Extensors', 'Grip Muscles', 'Brachioradialis', 'Biceps'], 'description' => 'Hold weight at mid-point without rolling. Static grip and forearm endurance.'],
            ['name' => 'Wrist Roller (Isometric Hold at Top)', 'equipment' => 'Wrist Roller', 'category_slug' => 'core', 'target_muscles' => ['Forearm Flexors', 'Grip Muscles', 'Brachioradialis', 'Biceps', 'Forearm Extensors'], 'description' => 'Hold weight at fully rolled up position. Static contraction of flexors and grip.'],
            ['name' => 'Wrist Roller (Isometric Hold at Bottom)', 'equipment' => 'Wrist Roller', 'category_slug' => 'core', 'target_muscles' => ['Forearm Extensors', 'Grip Muscles', 'Brachioradialis', 'Forearm Flexors'], 'description' => 'Hold weight at fully unrolled position. Static contraction of extensors.'],
            ['name' => 'Wrist Roller (Eccentric Focus - Slow Lower)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Forearm Extensors', 'Grip Muscles', 'Brachioradialis'], 'description' => 'Roll up quickly, lower extremely slow (3-5 seconds). Eccentric forearm hypertrophy.'],
            ['name' => 'Wrist Roller (Concentric Focus - Fast Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Grip Muscles', 'Brachioradialis', 'Forearm Extensors'], 'description' => 'Roll up as fast as possible, lower controlled. Power and speed for forearms.'],
            ['name' => 'Wrist Roller (Alternating Forward/Reverse)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Forearm Extensors', 'Grip Muscles', 'Brachioradialis'], 'description' => 'Roll up forward, then roll down reverse. Alternating between flexors and extensors.'],
            ['name' => 'Wrist Roller (Figure-8 Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Brachioradialis', 'Biceps', 'Core', 'Stabilizers'], 'description' => 'Roll in figure-8 pattern. Adds coordination and stabilizer engagement.'],
            ['name' => 'Wrist Roller (Lying Face Down Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Extensors', 'Grip Muscles', 'Brachioradialis', 'Forearm Flexors'], 'description' => 'Lie face down with arms extended forward. Roll up and down. Isolates extensors.'],
            ['name' => 'Wrist Roller (Lying Face Up Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearm Flexors', 'Grip Muscles', 'Brachioradialis', 'Forearm Extensors'], 'description' => 'Lie face up with arms extended. Roll up and down. Isolates flexors.'],
            ['name' => 'Wrist Roller (Wrist Curl Hold)', 'equipment' => 'Wrist Roller', 'category_slug' => 'core', 'target_muscles' => ['Forearm Flexors', 'Grip Muscles', 'Brachioradialis', 'Palmaris Longus'], 'description' => 'Roll weight halfway. Hold in wrist flexed position. Static flexor endurance.'],
            ['name' => 'Wrist Roller (Wrist Extension Hold)', 'equipment' => 'Wrist Roller', 'category_slug' => 'core', 'target_muscles' => ['Forearm Extensors', 'Grip Muscles', 'Brachioradialis', 'Extensor Digitorum'], 'description' => 'Roll weight halfway. Hold in wrist extended position. Static extensor endurance.'],
            ['name' => 'Wrist Roller (Two-Handed Separate Rolls)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Brachioradialis', 'Biceps', 'Core'], 'description' => 'Roll both ends separately with alternating hands. Advanced coordination and forearm work.'],
            ['name' => 'Wrist Roller (Finger Curl Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Finger Flexors', 'Grip Muscles', 'Forearm Flexors', 'Lumbricals', 'Interossei'], 'description' => 'Roll using finger flexion only (minimal wrist movement). Finger and grip specific.'],
            ['name' => 'Wrist Roller (Thick Grip Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Brachioradialis', 'Finger Flexors', 'Thumb Muscles'], 'description' => 'Use thicker roller or add padding. Increases grip difficulty and forearm activation.'],
            ['name' => 'Wrist Roller (Pinky Finger Focus)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Flexor Digitorum Profundus (Pinky)', 'Grip Muscles', 'Forearms'], 'description' => 'Roll with emphasis on pinky and ring fingers. Corrects grip imbalances.'],
            ['name' => 'Wrist Roller (Thumb Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Thumb Muscles', 'Thenar Eminence', 'Forearm Flexors', 'Grip Muscles'], 'description' => 'Roll using thumb-over-grip. Emphasizes thumb and thenar muscles.'],
            ['name' => 'Wrist Roller (Elbow Supported Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Brachioradialis', 'Forearm Flexors', 'Extensors'], 'description' => 'Rest elbows on knees or bench. Isolates forearms by removing shoulder involvement.'],
            ['name' => 'Wrist Roller (Resistance Band Wrist Roller)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Brachioradialis', 'Forearm Flexors', 'Extensors'], 'description' => 'Attach band instead of weight. Variable resistance wrist rolling.'],
            ['name' => 'Wrist Roller (Plate Pinch Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Pinch Grip', 'Finger Flexors', 'Thenar Muscles'], 'description' => 'Pinch weight plates while rolling. Combines pinch grip with wrist work.'],
            ['name' => 'Wrist Roller (Towel Wrapped Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Brachioradialis', 'Finger Flexors', 'Extensors'], 'description' => 'Wrap towel around roller for thicker grip. Forearm and grip endurance.'],
            ['name' => 'Wrist Roller (Double Weight Drop Set)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Brachioradialis', 'Flexors', 'Extensors'], 'description' => 'Roll heavy weight up, drop to medium, continue. Progressive overload drop set.'],
            ['name' => 'Wrist Roller (Tempo Roll - 3-1-3)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Brachioradialis', 'Flexors', 'Extensors'], 'description' => '3 sec up, 1 sec pause, 3 sec down. Time under tension forearm training.'],
            ['name' => 'Wrist Roller (Incline Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Brachioradialis', 'Shoulders', 'Core'], 'description' => 'Roll at an incline (one end higher). Unbalanced load challenges stabilizers.'],
            ['name' => 'Wrist Roller (Standing Arm Curl Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Biceps', 'Grip Muscles', 'Brachioradialis', 'Core', 'Shoulders'], 'description' => 'Roll while curling arms. Combines bicep curl with wrist roller.'],
            ['name' => 'Wrist Roller (Overhead Triceps Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Triceps', 'Shoulders', 'Core', 'Grip Muscles', 'Brachioradialis'], 'description' => 'Hold roller behind head, roll while extending arms. Triceps and forearms combined.'],
            ['name' => 'Wrist Roller (Chest Fly Roll)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Chest', 'Shoulders', 'Core', 'Grip Muscles', 'Brachioradialis'], 'description' => 'Roll while performing chest fly motion. Combines pectoral and forearm work.'],
            ['name' => 'Wrist Roller (Standing Roll with Knee Drive)', 'equipment' => 'Wrist Roller', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Hip Flexors', 'Core', 'Quadriceps', 'Grip Muscles', 'Brachioradialis'], 'description' => 'Roll while driving knees up alternately. Adds cardio and hip flexor engagement.'],
        ];

        $sourceDir = public_path('execises/wrist-roller');
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

            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categoryId,
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
                'image' => $data['image'] ?? null,
            ]);
        }
    }
}
