<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class TBarRowPlatformSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'T-Bar Row Platform Standard Grip', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Straddle platform, chest on pad, neutral grip. Row bar to chest. Classic T-bar row.'],
            ['name' => 'T-Bar Row Platform Wide Grip', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Rear Deltoids', 'Teres Major', 'Core', 'Traps', 'Biceps'], 'description' => 'Wide grip on bar. Row to chest. Emphasizes back width and upper lats.'],
            ['name' => 'T-Bar Row Platform Narrow Grip', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Rhomboids', 'Core', 'Forearms', 'Brachialis', 'Traps'], 'description' => 'Narrow grip on bar. Row to lower chest. Emphasizes lats and biceps.'],
            ['name' => 'T-Bar Row Platform Neutral Grip (V-Handle)', 'equipment' => 'T-Bar Row Platform, V-Handle', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Traps', 'Rear Deltoids', 'Forearms'], 'description' => 'Use V-handle attachment. Neutral grip rowing. Strongest and most comfortable position.'],
            ['name' => 'T-Bar Row Platform Pronated Grip (Overhand)', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Rhomboids', 'Rear Deltoids', 'Lats', 'Traps', 'Core', 'Biceps', 'Forearms'], 'description' => 'Palms facing down. Row to chest. Upper back and rear delt emphasis.'],
            ['name' => 'T-Bar Row Platform Supinated Grip (Underhand)', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Brachialis', 'Rhomboids', 'Core', 'Forearms', 'Traps'], 'description' => 'Palms facing up. Row to lower chest. Bicep-dominant row variation.'],
            ['name' => 'T-Bar Row Platform High Row', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Upper Traps', 'Rhomboids', 'Rear Deltoids', 'Core', 'Biceps', 'Levator Scapulae'], 'description' => 'Row bar toward upper chest/neck. Emphasizes upper traps and rhomboids.'],
            ['name' => 'T-Bar Row Platform Low Row', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Teres Major', 'Rhomboids', 'Core', 'Biceps', 'Forearms', 'Traps'], 'description' => 'Row bar toward lower chest/belly. Emphasizes lats and mid-back.'],
            ['name' => 'T-Bar Row Platform Isometric Hold', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'core', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Row and hold at peak contraction. Static back strength and endurance.'],
            ['name' => 'T-Bar Row Platform Pause Reps', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Row and hold 2-3 seconds at peak. Increases time under tension.'],
            ['name' => 'T-Bar Row Platform Slow Tempo (3-1-3)', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => '3 sec pull, 1 sec hold, 3 sec lower. Time under tension rowing.'],
            ['name' => 'T-Bar Row Platform Eccentric Focus (Slow Negative)', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Pull quickly, lower extremely slow (4-5 sec). Eccentric back hypertrophy.'],
            ['name' => 'T-Bar Row Platform Explosive Concentric', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Fast-Twitch Fibers', 'Core'], 'description' => 'Explosive pull, slow controlled release. Power development for back.'],
            ['name' => 'T-Bar Row Platform Drop Set', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Start heavy, row to failure, reduce weight, continue. Hypertrophy dropset.'],
            ['name' => 'T-Bar Row Platform Rest-Pause Set', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Row to failure, rest 10 sec, continue. Density training for back.'],
            ['name' => 'T-Bar Row Platform Single-Arm Row', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Traps', 'Rear Deltoids'], 'description' => 'Grip bar with one arm. Corrects imbalances and challenges core stability.'],
            ['name' => 'T-Bar Row Platform Single-Arm Isometric Hold', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'core', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Obliques', 'Traps', 'Forearms'], 'description' => 'Single-arm row with static hold. Unilateral back endurance.'],
            ['name' => 'T-Bar Row Platform 1.5 Reps', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Full pull, half release, full pull again. Extended time under tension.'],
            ['name' => 'T-Bar Row Platform Partial Reps (Top Half)', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Rhomboids', 'Rear Deltoids', 'Traps', 'Biceps', 'Core', 'Lats'], 'description' => 'Partial pulls in top half of ROM. Emphasizes peak contraction.'],
            ['name' => 'T-Bar Row Platform Partial Reps (Bottom Half)', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Biceps', 'Core', 'Rhomboids', 'Forearms', 'Traps'], 'description' => 'Partial pulls in bottom half of ROM. Emphasizes stretch and lats.'],
            ['name' => 'T-Bar Row Platform 21s', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete back development.'],
            ['name' => 'T-Bar Row Platform Pulse Reps (Small Range)', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Small pulsing movements at peak contraction. Builds pump and endurance.'],
            ['name' => 'T-Bar Row Platform Chest Supported Lean', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Traps', 'Rear Deltoids', 'Erector Spinae'], 'description' => 'Lean chest against pad. Perform rows with back supported. Isolates lats and rhomboids.'],
            ['name' => 'T-Bar Row Platform Bent-Over Style (No Pad)', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Hamstrings', 'Core', 'Traps', 'Rear Deltoids'], 'description' => 'No chest pad. Bent-over T-bar row. Engages posterior chain more.'],
            ['name' => 'T-Bar Row Platform Feet Elevated Row', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Glutes', 'Hamstrings', 'Traps'], 'description' => 'Feet elevated on platform. Increased core stability demand during row.'],
            ['name' => 'T-Bar Row Platform D-Handle Attachment', 'equipment' => 'T-Bar Row Platform, D-Handles', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core', 'Traps', 'Rear Deltoids', 'Forearms'], 'description' => 'Use D-handles for varied grip angles. Customizable rowing angles.'],
            ['name' => 'T-Bar Row Platform Rope Attachment', 'equipment' => 'T-Bar Row Platform, Rope', 'category_slug' => 'strength', 'target_muscles' => ['Rhomboids', 'Rear Deltoids', 'Traps', 'Core', 'Biceps', 'Lats', 'Forearms'], 'description' => 'Use rope attachment for flare at top. Emphasizes rhomboids and rear delts.'],
            ['name' => 'T-Bar Row Platform Wide Pronated Bar', 'equipment' => 'T-Bar Row Platform, Wide Bar', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Rear Deltoids', 'Traps', 'Core', 'Biceps', 'Teres Major'], 'description' => 'Wide overhand grip row. Emphasizes back width and rear delts.'],
            ['name' => 'T-Bar Row Platform Scapular Retraction Only', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Rhomboids', 'Middle Traps', 'Rear Deltoids', 'Core', 'Lats', 'Stabilizers'], 'description' => 'Minimal arm movement. Squeeze shoulder blades only. Pure scapular work.'],
            ['name' => 'T-Bar Row Platform Plate Pinch Row', 'equipment' => 'T-Bar Row Platform, Weight Plate', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Lats', 'Rhomboids', 'Biceps', 'Core', 'Traps'], 'description' => 'Pinch weight plates while rowing. Adds grip and forearm challenge.'],
            ['name' => 'T-Bar Row Platform Towel Grip Row', 'equipment' => 'T-Bar Row Platform, Towel', 'category_slug' => 'strength', 'target_muscles' => ['Forearms', 'Grip Muscles', 'Lats', 'Rhomboids', 'Biceps', 'Core', 'Traps'], 'description' => 'Wrap towel around handles. Thicker grip rowing. Increased forearm and grip demand.'],
            ['name' => 'T-Bar Row Platform Isometric Scapular Squeeze', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'core', 'target_muscles' => ['Rhomboids', 'Middle Traps', 'Rear Deltoids', 'Core', 'Lats', 'Stabilizers'], 'description' => 'Hold row position and squeeze shoulder blades statically. Postural strength.'],
            ['name' => 'T-Bar Row Platform Dynamic Stretch Row', 'equipment' => 'T-Bar Row Platform', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Core', 'Biceps', 'Traps', 'Shoulders', 'Forearms'], 'description' => 'Full stretch at bottom, explosive pull. Full range rowing.'],
            ['name' => 'T-Bar Row Platform Band Resisted', 'equipment' => 'T-Bar Row Platform, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core', 'Traps', 'Forearms'], 'description' => 'Attach band for variable resistance. Accommodating resistance rowing.'],
        ];

        $sourceDir = public_path('execises/t-bar-row-platform');
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
