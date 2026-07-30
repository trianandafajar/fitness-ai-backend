<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FlyMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Fly Machine Standard Chest Fly', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Pectoralis Major)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Sit with back against pad. Grasp handles at arm\'s length. Bring handles together in front of chest. Squeeze pecs at peak.'],
            ['name' => 'Fly Machine High Fly (Upper Chest)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest (Clavicular Head)', 'Anterior Deltoids', 'Core', 'Serratus Anterior'], 'description' => 'Set handles at high position. Bring together at upper chest height. Emphasizes upper pectoralis.'],
            ['name' => 'Fly Machine Low Fly (Lower Chest)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lower Chest (Sternocostal Head)', 'Triceps (Long Head)', 'Core', 'Anterior Deltoids'], 'description' => 'Set handles at low position. Bring together at lower chest/belly height. Emphasizes lower pectoralis.'],
            ['name' => 'Fly Machine Middle Fly (Mid Chest)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Full)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Set handles at mid position. Bring together at mid chest. Overall chest development.'],
            ['name' => 'Fly Machine Neutral Grip Fly', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Biceps', 'Serratus Anterior', 'Forearms'], 'description' => 'Palms facing each other. Fly movement. Joint-friendly chest isolation.'],
            ['name' => 'Fly Machine Pronated Grip (Overhand)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Traps'], 'description' => 'Palms facing down. Fly movement. Upper chest and shoulder emphasis.'],
            ['name' => 'Fly Machine Supinated Grip (Underhand)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Lower Chest', 'Biceps', 'Core', 'Anterior Deltoids', 'Serratus Anterior'], 'description' => 'Palms facing up. Fly movement. Lower chest and bicep emphasis.'],
            ['name' => 'Fly Machine Isometric Hold (Peak Contraction)', 'equipment' => 'Fly Machine', 'category_slug' => 'core', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Bring handles together and hold at peak. Static chest contraction and squeeze.'],
            ['name' => 'Fly Machine Isometric Hold (Stretch Position)', 'equipment' => 'Fly Machine', 'category_slug' => 'core', 'target_muscles' => ['Chest (Stretched)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Hold at full stretch position. Static chest stretch and engagement.'],
            ['name' => 'Fly Machine Pause Reps (Peak Squeeze)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Fly, hold 2-3 seconds at peak squeeze. Increases time under tension.'],
            ['name' => 'Fly Machine Slow Tempo (3-1-3)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => '3 sec fly, 1 sec hold, 3 sec release. Time under tension fly.'],
            ['name' => 'Fly Machine Eccentric Focus (Slow Negative)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Fly quickly, release extremely slow (4-5 sec). Eccentric overload for chest.'],
            ['name' => 'Fly Machine Explosive Concentric', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Fast-Twitch Fibers', 'Anterior Deltoids', 'Core', 'Serratus Anterior'], 'description' => 'Explosive fly movement, slow controlled release. Power development for chest.'],
            ['name' => 'Fly Machine Drop Set', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Start heavy, fly to failure, reduce weight, continue. Chest hypertrophy dropset.'],
            ['name' => 'Fly Machine Rest-Pause Set', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Fly to failure, rest 10 sec, continue. Density training for chest.'],
            ['name' => 'Fly Machine Single-Arm Fly', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Core', 'Obliques', 'Anterior Deltoids', 'Serratus Anterior', 'Stabilizers'], 'description' => 'Fly with one arm only. Corrects imbalances and challenges core stability.'],
            ['name' => 'Fly Machine Single-Arm Pause Reps', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Core', 'Obliques', 'Anterior Deltoids', 'Serratus Anterior', 'Stabilizers'], 'description' => 'Single-arm fly with pause at peak contraction. Unilateral time under tension.'],
            ['name' => 'Fly Machine Single-Arm Isometric Hold', 'equipment' => 'Fly Machine', 'category_slug' => 'core', 'target_muscles' => ['Chest', 'Core', 'Obliques', 'Anterior Deltoids', 'Serratus Anterior', 'Stabilizers'], 'description' => 'Single-arm fly hold. Unilateral chest endurance and stability.'],
            ['name' => 'Fly Machine Partial Reps (Top Half)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Peak)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Partial fly in top half. Emphasizes peak contraction and inner chest.'],
            ['name' => 'Fly Machine Partial Reps (Bottom Half)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Stretched)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Partial fly in bottom half. Emphasizes stretch and outer chest.'],
            ['name' => 'Fly Machine 1.5 Reps', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Full fly, half release, full fly again. Extended time under tension.'],
            ['name' => 'Fly Machine 21s', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete chest development.'],
            ['name' => 'Fly Machine Pulse Reps (Small Range)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Small pulsing movements at peak contraction. Builds pump and endurance.'],
            ['name' => 'Fly Machine Reverse Fly (Rear Delt)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Traps', 'Core', 'Rotator Cuff', 'Lats'], 'description' => 'Face machine or reverse grip. Pull handles back and apart. Rear delt and upper back emphasis.'],
            ['name' => 'Fly Machine Reverse Fly High Angle', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Upper Traps', 'Rhomboids', 'Core', 'Rotator Cuff'], 'description' => 'Reverse fly at high handle position. Emphasizes upper rear delts and traps.'],
            ['name' => 'Fly Machine Reverse Fly Low Angle', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Lower Traps', 'Rhomboids', 'Core', 'Lats'], 'description' => 'Reverse fly at low handle position. Emphasizes mid-back and lower traps.'],
            ['name' => 'Fly Machine Reverse Fly Neutral Grip', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Core', 'Traps', 'Rotator Cuff', 'Biceps'], 'description' => 'Palms facing each other. Reverse fly. Joint-friendly rear delt work.'],
            ['name' => 'Fly Machine Crossover Fly (Arms Crossed)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Inner Chest', 'Serratus Anterior', 'Core', 'Anterior Deltoids', 'Biceps'], 'description' => 'Cross arms at peak contraction. Emphasizes inner chest and serratus.'],
            ['name' => 'Fly Machine Upper Chest Crossover', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest (Inner)', 'Anterior Deltoids', 'Core', 'Serratus Anterior'], 'description' => 'High handle crossover fly. Emphasizes inner upper chest.'],
            ['name' => 'Fly Machine Seated Cable Crossover (Both Arms)', 'equipment' => 'Fly Machine', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Full)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Cable crossover variation on fly machine. Constant tension fly.'],
            ['name' => 'Fly Machine Band Resisted Fly', 'equipment' => 'Fly Machine, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Attach band for variable resistance. Accommodating resistance fly.'],
            ['name' => 'Fly Machine Isometric Chest Squeeze (Medial)', 'equipment' => 'Fly Machine', 'category_slug' => 'core', 'target_muscles' => ['Inner Chest', 'Core', 'Serratus Anterior', 'Anterior Deltoids', 'Biceps'], 'description' => 'Squeeze handles together as hard as possible without moving. Maximal isometric chest contraction.'],
            ['name' => 'Fly Machine Towel Grip Fly', 'equipment' => 'Fly Machine, Towel', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Forearms', 'Grip Muscles', 'Anterior Deltoids', 'Core', 'Biceps'], 'description' => 'Wrap towel around handles. Thicker grip fly. Increased forearm and grip demand.'],
        ];

        $sourceDir = public_path('execises/fly-machine');
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
