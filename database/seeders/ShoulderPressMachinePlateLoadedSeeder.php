<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ShoulderPressMachinePlateLoadedSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Shoulder Press Machine Standard Press', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids (All Heads)', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Sit with back against pad. Grip handles at shoulder height. Press overhead until arms extended. Lower with control.'],
            ['name' => 'Shoulder Press Machine Neutral Grip', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Biceps'], 'description' => 'Palms facing each other. Press overhead. Joint-friendly shoulder press.'],
            ['name' => 'Shoulder Press Machine Pronated Grip (Overhand)', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Traps', 'Upper Chest', 'Core'], 'description' => 'Palms facing forward. Press overhead. Standard shoulder press grip.'],
            ['name' => 'Shoulder Press Machine Supinated Grip (Underhand)', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Biceps', 'Upper Chest', 'Triceps', 'Core', 'Forearms'], 'description' => 'Palms facing up. Press overhead. Bicep and anterior delt emphasis.'],
            ['name' => 'Shoulder Press Machine Wide Grip', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Upper Chest', 'Traps', 'Triceps', 'Core', 'Forearms'], 'description' => 'Wide grip on handles. Press overhead. Emphasizes medial delts and upper chest.'],
            ['name' => 'Shoulder Press Machine Narrow Grip', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Triceps', 'Upper Chest', 'Core', 'Forearms', 'Traps'], 'description' => 'Narrow grip on handles. Press overhead. Tricep and anterior delt emphasis.'],
            ['name' => 'Shoulder Press Machine Behind-the-Neck Press', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Rear Deltoids', 'Traps', 'Triceps', 'Core', 'Upper Back'], 'description' => 'Press overhead from behind the neck. Emphasizes medial and rear delts. Requires mobility.'],
            ['name' => 'Shoulder Press Machine Isometric Hold (Top)', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'core', 'target_muscles' => ['Deltoids', 'Triceps', 'Traps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Press to full extension and hold. Static shoulder and triceps strength.'],
            ['name' => 'Shoulder Press Machine Isometric Hold (Mid-Contraction)', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'core', 'target_muscles' => ['Deltoids', 'Triceps', 'Core', 'Traps', 'Forearms', 'Stabilizers'], 'description' => 'Hold at mid-point of press. Static shoulder endurance.'],
            ['name' => 'Shoulder Press Machine Pause Reps (Top)', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Press, hold 2-3 seconds at top. Increases time under tension.'],
            ['name' => 'Shoulder Press Machine Slow Tempo (3-1-3)', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => '3 sec press, 1 sec hold, 3 sec release. Time under tension pressing.'],
            ['name' => 'Shoulder Press Machine Eccentric Focus (Slow Negative)', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Press quickly, lower extremely slow (4-5 sec). Eccentric shoulder overload.'],
            ['name' => 'Shoulder Press Machine Explosive Concentric', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Fast-Twitch Fibers', 'Core', 'Traps', 'Upper Chest'], 'description' => 'Explosive press, slow controlled release. Power development for shoulders.'],
            ['name' => 'Shoulder Press Machine Drop Set', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Start heavy, press to failure, reduce weight, continue. Shoulder hypertrophy dropset.'],
            ['name' => 'Shoulder Press Machine Rest-Pause Set', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Press to failure, rest 10 sec, continue. Density training for shoulders.'],
            ['name' => 'Shoulder Press Machine Single-Arm Press', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Core', 'Obliques', 'Traps', 'Upper Chest', 'Stabilizers'], 'description' => 'Press with one arm only. Corrects imbalances and challenges core stability.'],
            ['name' => 'Shoulder Press Machine Single-Arm Pause Reps', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Core', 'Obliques', 'Traps', 'Upper Chest', 'Stabilizers'], 'description' => 'Single-arm press with pause at top. Unilateral time under tension.'],
            ['name' => 'Shoulder Press Machine Single-Arm Isometric Hold', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'core', 'target_muscles' => ['Deltoids', 'Triceps', 'Core', 'Obliques', 'Traps', 'Upper Chest', 'Stabilizers'], 'description' => 'Single-arm press hold. Unilateral shoulder endurance and stability.'],
            ['name' => 'Shoulder Press Machine Partial Reps (Top Half)', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Partial presses in top half. Emphasizes lockout and triceps.'],
            ['name' => 'Shoulder Press Machine Partial Reps (Bottom Half)', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Upper Chest', 'Traps', 'Core', 'Forearms', 'Serratus Anterior'], 'description' => 'Partial presses in bottom half. Emphasizes stretch and delt engagement.'],
            ['name' => 'Shoulder Press Machine 1.5 Reps', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Full press, half release, full press again. Extended time under tension.'],
            ['name' => 'Shoulder Press Machine 21s', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete shoulder development.'],
            ['name' => 'Shoulder Press Machine Pulse Reps (Small Range)', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Traps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Small pulsing movements at top. Builds shoulder pump and endurance.'],
            ['name' => 'Shoulder Press Machine Arnold Press Variation', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids (All Heads)', 'Triceps', 'Upper Chest', 'Core', 'Forearms', 'Biceps'], 'description' => 'Rotate wrists as you press. Combines press with shoulder rotation.'],
            ['name' => 'Shoulder Press Machine Behind-Head Press', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Rear Deltoids', 'Traps', 'Triceps', 'Core', 'Rhomboids'], 'description' => 'Press from behind the head. Emphasizes posterior and medial delts.'],
            ['name' => 'Shoulder Press Machine Front Press (Chest Level)', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Anterior Deltoids', 'Upper Chest', 'Triceps', 'Core', 'Traps', 'Forearms'], 'description' => 'Start with handles at chest level. Press forward and overhead. Anterior delt emphasis.'],
            ['name' => 'Shoulder Press Machine Low Start Press', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Upper Chest', 'Core', 'Serratus Anterior', 'Forearms'], 'description' => 'Start with handles below shoulders. Press overhead from low position. Greater ROM.'],
            ['name' => 'Shoulder Press Machine Incline Press Variation', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest', 'Anterior Deltoids', 'Triceps', 'Core', 'Traps', 'Serratus Anterior'], 'description' => 'Adjust bench to incline. Press at angle. Upper chest and shoulder emphasis.'],
            ['name' => 'Shoulder Press Machine Band Resisted', 'equipment' => 'Shoulder Press Machine Plate-Loaded, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Upper Chest', 'Traps', 'Core', 'Forearms'], 'description' => 'Attach band for variable resistance. Accommodating resistance press.'],
            ['name' => 'Shoulder Press Machine Isometric Hold (Stretch Position)', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'core', 'target_muscles' => ['Deltoids (Stretched)', 'Upper Chest', 'Core', 'Serratus Anterior', 'Forearms'], 'description' => 'Hold at bottom stretch position. Static shoulder stretch and engagement.'],
            ['name' => 'Shoulder Press Machine Towel Grip Press', 'equipment' => 'Shoulder Press Machine Plate-Loaded, Towel', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Forearms', 'Grip Muscles', 'Core', 'Traps', 'Upper Chest'], 'description' => 'Wrap towel around handles. Thicker grip press. Increased forearm and grip demand.'],
            ['name' => 'Shoulder Press Machine Alternating Arm Press', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Triceps', 'Core', 'Obliques', 'Traps', 'Upper Chest', 'Stabilizers'], 'description' => 'Alternate pressing arms one at a time. Unilateral and core engagement.'],
            ['name' => 'Shoulder Press Machine 3-Second Pause at Bottom', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids (Stretched)', 'Upper Chest', 'Core', 'Serratus Anterior', 'Forearms'], 'description' => 'Pause at bottom position for 3 seconds. Emphasizes stretch and explosive start.'],
            ['name' => 'Shoulder Press Machine Squeeze Press', 'equipment' => 'Shoulder Press Machine Plate-Loaded', 'category_slug' => 'strength', 'target_muscles' => ['Deltoids', 'Upper Chest', 'Triceps', 'Core', 'Traps', 'Serratus Anterior'], 'description' => 'Squeeze shoulders at top of press. Peak contraction emphasis.'],
        ];

        $sourceDir = public_path('execises/shoulder-press-machine-plate-loaded');
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
