<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class RotaryCalfMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Rotary Calf Machine Standard (Seated)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Sit on machine, knees bent 90°, toes on platform, heels hanging. Press with toes, raise heels. Lower with control.'],
            ['name' => 'Rotary Calf Machine Single-Leg', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press with one leg only. Unilateral calf development and corrects imbalances.'],
            ['name' => 'Rotary Calf Machine Isometric Hold (Top)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'core', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press to full extension and hold. Static calf contraction.'],
            ['name' => 'Rotary Calf Machine Isometric Hold (Mid-Contraction)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'core', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Hold at mid-point of press. Static calf strength and endurance.'],
            ['name' => 'Rotary Calf Machine Pause Reps (Top)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press, hold 2-3 seconds at top. Increases time under tension.'],
            ['name' => 'Rotary Calf Machine Slow Tempo (3-1-3)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => '3 sec press, 1 sec hold, 3 sec lower. Time under tension calf work.'],
            ['name' => 'Rotary Calf Machine Eccentric Focus (Slow Negative)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press quickly, lower extremely slow (4-5 sec). Eccentric calf overload.'],
            ['name' => 'Rotary Calf Machine Explosive Concentric', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Fast-Twitch Fibers', 'Calves', 'Core'], 'description' => 'Explosive press, slow controlled lower. Power development for calves.'],
            ['name' => 'Rotary Calf Machine Drop Set', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Start heavy, press to failure, reduce weight, continue. Calf hypertrophy dropset.'],
            ['name' => 'Rotary Calf Machine Rest-Pause Set', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press to failure, rest 10 sec, continue. Density training for calves.'],
            ['name' => 'Rotary Calf Machine Partial Reps (Top Half)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Partial presses in top half. Emphasizes peak contraction.'],
            ['name' => 'Rotary Calf Machine Partial Reps (Bottom Half)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Partial presses in bottom half. Emphasizes stretch and lengthening.'],
            ['name' => 'Rotary Calf Machine 1.5 Reps', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Full press, half lower, full press again. Extended time under tension.'],
            ['name' => 'Rotary Calf Machine 21s', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete calf development.'],
            ['name' => 'Rotary Calf Machine Pulse Reps (Small Range)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Small pulsing movements at top. Builds calf pump and endurance.'],
            ['name' => 'Rotary Calf Machine Toes In (Internal Rotation)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius (Lateral Head)', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Point toes inward. Emphasizes lateral gastrocnemius head.'],
            ['name' => 'Rotary Calf Machine Toes Out (External Rotation)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius (Medial Head)', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Point toes outward. Emphasizes medial gastrocnemius head.'],
            ['name' => 'Rotary Calf Machine Narrow Foot Placement', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius (Lateral)', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Narrow stance on platform. Emphasizes outer calves.'],
            ['name' => 'Rotary Calf Machine Wide Foot Placement', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius (Medial)', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Wide stance on platform. Emphasizes inner calves.'],
            ['name' => 'Rotary Calf Machine Single-Leg Pause Reps', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Single-leg with pause at top. Unilateral time under tension.'],
            ['name' => 'Rotary Calf Machine Band Resisted', 'equipment' => 'Rotary Calf Machine, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Attach band for variable resistance. Accommodating resistance calf press.'],
            ['name' => 'Rotary Calf Machine Heavy Slow Negative', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Use heavy weight, press quickly, lower alone. Extreme eccentric calf overload.'],
            ['name' => 'Rotary Calf Machine Paused at Bottom (Stretch)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Pause 2-3 seconds at bottom. Emphasizes calf stretch and mobility.'],
            ['name' => 'Rotary Calf Machine 3-Second Peak Squeeze', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press and squeeze calves for 3 seconds at top. Maximal peak contraction.'],
            ['name' => 'Rotary Calf Machine Alternating Legs', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Alternate pressing legs one at a time. Unilateral work with balance challenge.'],
            ['name' => 'Rotary Calf Machine Tempo Variation (2-2-4)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => '2 sec press, 2 sec hold, 4 sec lower. Extended time under tension.'],
            ['name' => 'Rotary Calf Machine Isometric at Bottom (Stretch)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'core', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Hold at bottom stretch position. Static calf lengthening.'],
            ['name' => 'Rotary Calf Machine Deep Stretch (Full ROM)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Lower as deep as possible. Maximal calf stretch and range of motion.'],
            ['name' => 'Rotary Calf Machine With Bodyweight (No Plate)', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Use bodyweight only. Lighter calf training or warm-up.'],
            ['name' => 'Rotary Calf Machine Isometric Bilateral Hold', 'equipment' => 'Rotary Calf Machine', 'category_slug' => 'core', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press both legs and hold at top. Bilateral calf endurance.'],
        ];

        $sourceDir = public_path('execises/rotary-calf-machine');
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
