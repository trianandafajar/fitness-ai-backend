<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PecDeckSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Pec Deck Standard Chest Fly', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Pectoralis Major)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Sit with back against pad. Forearms on pads. Squeeze arms together in front. Peak chest contraction.'],
            ['name' => 'Pec Deck High Fly (Upper Chest)', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest (Clavicular Head)', 'Anterior Deltoids', 'Core', 'Serratus Anterior'], 'description' => 'Adjust seat high. Arms above horizontal. Squeeze together. Emphasizes upper pectoralis.'],
            ['name' => 'Pec Deck Low Fly (Lower Chest)', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Lower Chest (Sternocostal Head)', 'Core', 'Serratus Anterior', 'Anterior Deltoids'], 'description' => 'Adjust seat low. Arms below horizontal. Squeeze together. Emphasizes lower pectoralis.'],
            ['name' => 'Pec Deck Neutral Grip Fly', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps', 'Forearms'], 'description' => 'Palms facing forward with forearms on pads. Standard pec deck position.'],
            ['name' => 'Pec Deck Hand Grip Fly (Handles)', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps', 'Forearms'], 'description' => 'Grip handles instead of forearm pads. More wrist and forearm engagement.'],
            ['name' => 'Pec Deck Reverse Fly (Rear Delt)', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Traps', 'Core', 'Rotator Cuff', 'Lats'], 'description' => 'Face machine or reverse position. Pull arms back and apart. Rear delt and upper back emphasis.'],
            ['name' => 'Pec Deck Reverse Fly High Angle', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Upper Traps', 'Rhomboids', 'Core', 'Rotator Cuff'], 'description' => 'Reverse fly at high arm position. Emphasizes upper rear delts and traps.'],
            ['name' => 'Pec Deck Reverse Fly Low Angle', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Lower Traps', 'Rhomboids', 'Core', 'Lats'], 'description' => 'Reverse fly at low arm position. Emphasizes mid-back and lower traps.'],
            ['name' => 'Pec Deck Reverse Fly Neutral Grip', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Core', 'Traps', 'Rotator Cuff', 'Biceps'], 'description' => 'Palms facing each other. Reverse fly. Joint-friendly rear delt work.'],
            ['name' => 'Pec Deck Isometric Hold (Peak Contraction)', 'equipment' => 'Pec Deck', 'category_slug' => 'core', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Squeeze arms together and hold at peak. Static chest contraction.'],
            ['name' => 'Pec Deck Isometric Hold (Stretch Position)', 'equipment' => 'Pec Deck', 'category_slug' => 'core', 'target_muscles' => ['Chest (Stretched)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Hold at full stretch position. Static chest stretch and engagement.'],
            ['name' => 'Pec Deck Pause Reps (Peak Squeeze)', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Squeeze, hold 2-3 seconds at peak. Increases time under tension.'],
            ['name' => 'Pec Deck Slow Tempo (3-1-3)', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => '3 sec squeeze, 1 sec hold, 3 sec release. Time under tension fly.'],
            ['name' => 'Pec Deck Eccentric Focus (Slow Negative)', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Squeeze quickly, release extremely slow (4-5 sec). Eccentric chest overload.'],
            ['name' => 'Pec Deck Explosive Concentric', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Fast-Twitch Fibers', 'Anterior Deltoids', 'Core', 'Serratus Anterior'], 'description' => 'Explosive squeeze, slow controlled release. Power development for chest.'],
            ['name' => 'Pec Deck Drop Set', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Start heavy, squeeze to failure, reduce weight, continue. Chest hypertrophy dropset.'],
            ['name' => 'Pec Deck Rest-Pause Set', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Squeeze to failure, rest 10 sec, continue. Density training for chest.'],
            ['name' => 'Pec Deck Single-Arm Fly', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Core', 'Obliques', 'Anterior Deltoids', 'Serratus Anterior', 'Stabilizers'], 'description' => 'Squeeze with one arm only. Corrects imbalances and challenges core stability.'],
            ['name' => 'Pec Deck Single-Arm Pause Reps', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Core', 'Obliques', 'Anterior Deltoids', 'Serratus Anterior', 'Stabilizers'], 'description' => 'Single-arm squeeze with pause at peak. Unilateral time under tension.'],
            ['name' => 'Pec Deck Single-Arm Reverse Fly', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Core', 'Obliques', 'Rhomboids', 'Traps', 'Rotator Cuff'], 'description' => 'Single-arm reverse fly. Corrects rear delt imbalances.'],
            ['name' => 'Pec Deck Partial Reps (Top Half)', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Peak)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Partial squeeze in top half. Emphasizes peak contraction and inner chest.'],
            ['name' => 'Pec Deck Partial Reps (Bottom Half)', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Stretched)', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Partial squeeze in bottom half. Emphasizes stretch and outer chest.'],
            ['name' => 'Pec Deck 1.5 Reps', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Full squeeze, half release, full squeeze again. Extended time under tension.'],
            ['name' => 'Pec Deck 21s', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete chest development.'],
            ['name' => 'Pec Deck Pulse Reps (Small Range)', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Small pulsing movements at peak contraction. Builds pump and endurance.'],
            ['name' => 'Pec Deck Forearm Grip Variation', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Forearms', 'Grip Muscles', 'Anterior Deltoids', 'Core', 'Biceps'], 'description' => 'Grip pads with hands instead of forearms. Increased forearm and grip engagement.'],
            ['name' => 'Pec Deck Negative Only (Lift-off)', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Use spotter to squeeze, then lower slowly alone. Extreme eccentric overload.'],
            ['name' => 'Pec Deck Isometric Chest Squeeze (Medial)', 'equipment' => 'Pec Deck', 'category_slug' => 'core', 'target_muscles' => ['Inner Chest', 'Core', 'Serratus Anterior', 'Anterior Deltoids', 'Biceps'], 'description' => 'Squeeze arms together as hard as possible without moving. Maximal isometric contraction.'],
            ['name' => 'Pec Deck Crossover Fly (Cross Body)', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Inner Chest', 'Serratus Anterior', 'Core', 'Anterior Deltoids', 'Biceps'], 'description' => 'Cross arms at peak contraction. Emphasizes inner chest and serratus.'],
            ['name' => 'Pec Deck Band Resisted Fly', 'equipment' => 'Pec Deck, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Anterior Deltoids', 'Core', 'Serratus Anterior', 'Biceps'], 'description' => 'Attach band for variable resistance. Accommodating resistance fly.'],
            ['name' => 'Pec Deck Reverse Fly Pulse Reps', 'equipment' => 'Pec Deck', 'category_slug' => 'strength', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Traps', 'Core', 'Rotator Cuff'], 'description' => 'Small pulsing reverse fly movements. Rear delt pump and endurance.'],
            ['name' => 'Pec Deck Towel Grip Fly', 'equipment' => 'Pec Deck, Towel', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Forearms', 'Grip Muscles', 'Anterior Deltoids', 'Core', 'Biceps'], 'description' => 'Wrap towel around handles. Thicker grip fly. Increased forearm and grip demand.'],
        ];

        $sourceDir = public_path('execises/pec-deck');
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
