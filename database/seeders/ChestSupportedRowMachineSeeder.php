<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ChestSupportedRowMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Chest Supported Row Standard Grip', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Chest against pad, neutral grip. Pull handles to chest. Squeeze shoulder blades. Emphasizes mid-back.'],
            ['name' => 'Chest Supported Row Wide Grip', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Rear Deltoids', 'Teres Major', 'Core', 'Traps', 'Biceps'], 'description' => 'Wide grip on handles. Pull to chest. Emphasizes upper back width and rear delts.'],
            ['name' => 'Chest Supported Row Narrow Grip', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Core', 'Rhomboids', 'Forearms', 'Brachialis', 'Traps'], 'description' => 'Narrow grip on handles. Pull to lower chest. Emphasizes lats and biceps.'],
            ['name' => 'Chest Supported Row Neutral Grip', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Palms facing each other. Pull handles to chest. Most common and joint-friendly grip.'],
            ['name' => 'Chest Supported Row Pronated Grip (Overhand)', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Rhomboids', 'Rear Deltoids', 'Traps', 'Lats', 'Biceps', 'Core', 'Forearms'], 'description' => 'Palms facing down. Pull to chest. Emphasizes upper back and rear delts.'],
            ['name' => 'Chest Supported Row Supinated Grip (Underhand)', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Brachialis', 'Rhomboids', 'Core', 'Forearms', 'Traps'], 'description' => 'Palms facing up. Pull to lower chest. Bicep-dominant rowing variation.'],
            ['name' => 'Chest Supported Row High Pull', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Upper Traps', 'Rhomboids', 'Rear Deltoids', 'Core', 'Biceps', 'Levator Scapulae'], 'description' => 'Pull handles toward upper chest/neck. Emphasizes upper traps and rhomboids.'],
            ['name' => 'Chest Supported Row Low Pull', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Teres Major', 'Rhomboids', 'Core', 'Biceps', 'Forearms', 'Traps'], 'description' => 'Pull handles toward lower chest/belly. Emphasizes lats and lower back.'],
            ['name' => 'Chest Supported Row Isometric Hold', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'core', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Pull handles and hold at peak contraction. Static back endurance and strength.'],
            ['name' => 'Chest Supported Row Pause Reps', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Pull and hold 2-3 seconds at peak contraction. Increases time under tension.'],
            ['name' => 'Chest Supported Row Slow Tempo (3-1-3)', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => '3 sec pull, 1 sec hold, 3 sec release. Time under tension rowing.'],
            ['name' => 'Chest Supported Row Eccentric Focus (Slow Negative)', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Pull quickly, lower extremely slow (4-5 sec). Eccentric overload for back hypertrophy.'],
            ['name' => 'Chest Supported Row Explosive Concentric', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Fast-Twitch Fibers', 'Core'], 'description' => 'Explosive pull to chest, slow controlled release. Power development for back.'],
            ['name' => 'Chest Supported Row Drop Set', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Start heavy, pull to failure, reduce weight, continue. Back hypertrophy dropset.'],
            ['name' => 'Chest Supported Row Rest-Pause Set', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Pull to failure, rest 10 sec, continue. Density training for back.'],
            ['name' => 'Chest Supported Row Single-Arm', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Traps', 'Rear Deltoids'], 'description' => 'Pull with one arm only. Corrects imbalances and challenges core stability.'],
            ['name' => 'Chest Supported Row Single-Arm Isometric Hold', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'core', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Traps', 'Forearms'], 'description' => 'Single-arm pull and hold at peak. Unilateral static back endurance.'],
            ['name' => 'Chest Supported Row Single-Arm Pause Reps', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Traps', 'Rear Deltoids'], 'description' => 'Single-arm with pause at peak contraction. Unilateral time under tension.'],
            ['name' => 'Chest Supported Row 1.5 Reps', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Full pull, half release, full pull again. Extended time under tension.'],
            ['name' => 'Chest Supported Row Partial Reps (Top Half)', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Rhomboids', 'Rear Deltoids', 'Traps', 'Biceps', 'Core', 'Lats'], 'description' => 'Partial pulls in top half of ROM. Emphasizes peak contraction and upper back.'],
            ['name' => 'Chest Supported Row Partial Reps (Bottom Half)', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Core', 'Rhomboids', 'Forearms', 'Traps'], 'description' => 'Partial pulls in bottom half of ROM. Emphasizes stretch and lat engagement.'],
            ['name' => 'Chest Supported Row 21s', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete back development.'],
            ['name' => 'Chest Supported Row Pulse Reps (Small Range)', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Small pulsing movements at peak contraction. Builds pump and endurance.'],
            ['name' => 'Chest Supported Row Meadows Row Variation', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Traps', 'Rear Deltoids'], 'description' => 'Row with arm angle similar to Meadows row. Unilateral back emphasis.'],
            ['name' => 'Chest Supported Row Horizontal Handle', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Use horizontal handles for natural grip. Standard chest-supported row.'],
            ['name' => 'Chest Supported Row Vertical Handle (Neutral)', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Traps', 'Rear Deltoids'], 'description' => 'Use vertical neutral handles. More bicep and lat emphasis.'],
            ['name' => 'Chest Supported Row D-Handle Attachment', 'equipment' => 'Chest Supported Row Machine, D-Handles', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Traps', 'Rear Deltoids', 'Forearms'], 'description' => 'Use D-handles for varied grip angles. Customizable rowing angle.'],
            ['name' => 'Chest Supported Row Rope Attachment', 'equipment' => 'Chest Supported Row Machine, Rope', 'category_slug' => 'strength', 'target_muscles' => ['Rhomboids', 'Rear Deltoids', 'Traps', 'Core', 'Biceps', 'Lats', 'Forearms'], 'description' => 'Use rope attachment for flare at top. Emphasizes rhomboids and rear delts.'],
            ['name' => 'Chest Supported Row Close Neutral Grip (V-handle)', 'equipment' => 'Chest Supported Row Machine, V-Handle', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Brachialis', 'Core', 'Rhomboids', 'Forearms', 'Traps'], 'description' => 'Close neutral grip V-handle. Strongest rowing position, bicep and lat focus.'],
            ['name' => 'Chest Supported Row Wide Pronated Grip (Long Bar)', 'equipment' => 'Chest Supported Row Machine, Long Bar', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Rear Deltoids', 'Traps', 'Core', 'Biceps', 'Teres Major'], 'description' => 'Wide overhand grip with long bar. Emphasizes back width and rear delts.'],
            ['name' => 'Chest Supported Row Arnold Row', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Traps', 'Rear Deltoids', 'Forearms'], 'description' => 'Pull and rotate wrists at top. Combines row with external rotation.'],
            ['name' => 'Chest Supported Row Wrist Flexion Row', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Forearms', 'Core', 'Traps', 'Rear Deltoids'], 'description' => 'Flex wrists at peak contraction. Adds forearm and grip emphasis.'],
            ['name' => 'Chest Supported Row Scapular Retraction Only', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Rhomboids', 'Middle Traps', 'Rear Deltoids', 'Core', 'Lats', 'Stabilizers'], 'description' => 'Minimal arm movement. Squeeze shoulder blades only. Pure scapular retraction.'],
            ['name' => 'Chest Supported Row Scapular Protraction', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Serratus Anterior', 'Core', 'Rhomboids', 'Lats', 'Traps', 'Stabilizers'], 'description' => 'Push shoulders forward at full extension. Emphasizes serratus and scapular control.'],
            ['name' => 'Chest Supported Row 1.5 Reps with Isometric Hold', 'equipment' => 'Chest Supported Row Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Full row, hold 2 sec, half release, full row again. Extended TUT.'],
            ['name' => 'Chest Supported Row Plate Loaded Row (Pinch Grip)', 'equipment' => 'Chest Supported Row Machine, Plate', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Lats', 'Rhomboids', 'Biceps', 'Core', 'Traps'], 'description' => 'Pinch weight plates while rowing. Adds grip and forearm challenge.'],
            ['name' => 'Chest Supported Row Towel Grip Row', 'equipment' => 'Chest Supported Row Machine, Towel', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Lats', 'Rhomboids', 'Biceps', 'Core', 'Traps'], 'description' => 'Wrap towel around handles. Thicker grip rowing. Increased forearm and grip demand.'],
            ['name' => 'Chest Supported Row Band Resisted', 'equipment' => 'Chest Supported Row Machine, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Attach band for variable resistance. Accommodating resistance rowing.'],
        ];

        $sourceDir = public_path('execises/chest-supported-row-machine');
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
