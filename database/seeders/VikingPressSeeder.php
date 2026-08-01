<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class VikingPressSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Viking Press Standard Press (Neutral Grip)', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders (All Heads)', 'Upper Chest', 'Triceps', 'Traps', 'Core', 'Forearms'], 'description' => 'Stand in rack, grip handles at shoulder height. Press overhead until arms extended. Lower with control. Strongman overhead press.'],
            ['name' => 'Viking Press Wide Grip', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Upper Chest', 'Traps', 'Triceps', 'Core', 'Forearms'], 'description' => 'Wide grip on handles. Press overhead. Emphasizes medial delts and upper chest.'],
            ['name' => 'Viking Press Narrow Grip', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Triceps', 'Upper Chest', 'Core', 'Traps', 'Forearms'], 'description' => 'Narrow grip on handles. Press overhead. Tricep and anterior delt emphasis.'],
            ['name' => 'Viking Press Single-Arm Press', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Obliques', 'Traps', 'Upper Chest', 'Stabilizers'], 'description' => 'Press with one arm only. Corrects imbalances and challenges core stability.'],
            ['name' => 'Viking Press Behind-the-Neck Press', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Rear Deltoids', 'Traps', 'Triceps', 'Core', 'Rhomboids'], 'description' => 'Press from behind the neck. Emphasizes medial and rear delts. Requires mobility.'],
            ['name' => 'Viking Press Isometric Hold (Top)', 'equipment' => 'Viking Press', 'category_slug' => 'core', 'target_muscles' => ['Shoulders', 'Triceps', 'Traps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Press to full extension and hold. Static shoulder and triceps strength.'],
            ['name' => 'Viking Press Isometric Hold (Mid-Contraction)', 'equipment' => 'Viking Press', 'category_slug' => 'core', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Traps', 'Forearms', 'Stabilizers'], 'description' => 'Hold at mid-point of press. Static shoulder endurance.'],
            ['name' => 'Viking Press Pause Reps (Top)', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Press, hold 2-3 seconds at top. Increases time under tension.'],
            ['name' => 'Viking Press Slow Tempo (3-1-3)', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => '3 sec press, 1 sec hold, 3 sec lower. Time under tension pressing.'],
            ['name' => 'Viking Press Eccentric Focus (Slow Negative)', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Press quickly, lower extremely slow (4-5 sec). Eccentric shoulder overload.'],
            ['name' => 'Viking Press Explosive Concentric', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Fast-Twitch Fibers', 'Core', 'Traps', 'Upper Chest'], 'description' => 'Explosive press, slow controlled lower. Power development for shoulders.'],
            ['name' => 'Viking Press Drop Set', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Start heavy, press to failure, reduce weight, continue. Shoulder hypertrophy dropset.'],
            ['name' => 'Viking Press Rest-Pause Set', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Press to failure, rest 10 sec, continue. Density training for shoulders.'],
            ['name' => 'Viking Press Single-Arm Isometric Hold', 'equipment' => 'Viking Press', 'category_slug' => 'core', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Obliques', 'Traps', 'Upper Chest', 'Stabilizers'], 'description' => 'Single-arm press hold. Unilateral shoulder endurance and stability.'],
            ['name' => 'Viking Press Single-Arm Pause Reps', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Obliques', 'Traps', 'Upper Chest', 'Stabilizers'], 'description' => 'Single-arm press with pause at top. Unilateral time under tension.'],
            ['name' => 'Viking Press 1.5 Reps', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Full press, half lower, full press again. Extended time under tension.'],
            ['name' => 'Viking Press 21s', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete shoulder development.'],
            ['name' => 'Viking Press Pulse Reps (Small Range)', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Traps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Small pulsing movements at top. Builds shoulder pump and endurance.'],
            ['name' => 'Viking Press Partial Reps (Top Half)', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Partial presses in top half. Emphasizes lockout and triceps.'],
            ['name' => 'Viking Press Partial Reps (Bottom Half)', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Upper Chest', 'Traps', 'Core', 'Forearms', 'Serratus Anterior'], 'description' => 'Partial presses in bottom half. Emphasizes stretch and delt engagement.'],
            ['name' => 'Viking Press Push Press Variation (Leg Drive)', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Quadriceps', 'Glutes', 'Core', 'Traps', 'Calves'], 'description' => 'Dip with legs then press explosively overhead. Leg drive for more power.'],
            ['name' => 'Viking Press Jerk Variation (Split or Squat)', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Quadriceps', 'Glutes', 'Calves', 'Traps'], 'description' => 'Dip-drive then split or squat under bar for lockout. Advanced overhead power.'],
            ['name' => 'Viking Press Seated Press', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Core', 'Traps', 'Forearms'], 'description' => 'Sit on bench or box. Press overhead. Eliminates leg drive, isolates shoulders.'],
            ['name' => 'Viking Press Behind-Head Seated Press', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Rear Deltoids', 'Traps', 'Triceps', 'Core', 'Rhomboids'], 'description' => 'Seated behind-the-neck press. Emphasizes medial and rear delts.'],
            ['name' => 'Viking Press Z-Press (Legs Extended)', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Upper Chest', 'Traps', 'Forearms', 'Hip Flexors'], 'description' => 'Sit with legs extended straight. Press overhead. Eliminates all leg drive. Core and shoulder stability.'],
            ['name' => 'Viking Press Clapping Press (Explosive)', 'equipment' => 'Viking Press', 'category_slug' => 'plyometric', 'target_muscles' => ['Shoulders', 'Triceps', 'Fast-Twitch Fibers', 'Core', 'Traps', 'Upper Chest'], 'description' => 'Explosive press, release handles, catch and press. Advanced power development.'],
            ['name' => 'Viking Press Alternating Single-Arm', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Obliques', 'Traps', 'Upper Chest', 'Stabilizers'], 'description' => 'Alternate pressing arms one at a time. Unilateral and rotational core engagement.'],
            ['name' => 'Viking Press Band Resisted', 'equipment' => 'Viking Press, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Attach band for variable resistance. Accommodating resistance press.'],
            ['name' => 'Viking Press Isometric Hold at Bottom', 'equipment' => 'Viking Press', 'category_slug' => 'core', 'target_muscles' => ['Shoulders (Stretched)', 'Upper Chest', 'Core', 'Serratus Anterior', 'Forearms'], 'description' => 'Hold at bottom position for 3-5 seconds. Eliminates stretch reflex.'],
            ['name' => 'Viking Press Temple Press (Broad Grip)', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Traps', 'Upper Chest', 'Triceps', 'Core', 'Rhomboids'], 'description' => 'Very wide grip press to temples. Emphasizes medial delts and traps.'],
            ['name' => 'Viking Press Single-Arm Alternate Height', 'equipment' => 'Viking Press', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Obliques', 'Traps', 'Stabilizers'], 'description' => 'Press one arm at a time with different heights. Coordination and stability.'],
            ['name' => 'Viking Press Towel Grip Press', 'equipment' => 'Viking Press, Towel', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Forearms', 'Grip Muscles', 'Core', 'Traps'], 'description' => 'Wrap towel around handles. Thicker grip press. Increased forearm and grip demand.'],
        ];

        $sourceDir = public_path('execises/viking-press');
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
