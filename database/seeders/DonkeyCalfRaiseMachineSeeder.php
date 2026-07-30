<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class DonkeyCalfRaiseMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Donkey Calf Raise Standard', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Hip Extensors', 'Stabilizers'], 'description' => 'Position hips under pad, toes on platform, heels hanging. Lower heels, press up on toes. Full calf extension.'],
            ['name' => 'Donkey Calf Raise Single-Leg', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Perform calf raise with one leg only. Unilateral calf development and corrects imbalances.'],
            ['name' => 'Donkey Calf Raise Isometric Hold (Top)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'core', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press to full extension and hold. Static calf contraction.'],
            ['name' => 'Donkey Calf Raise Isometric Hold (Mid-Contraction)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'core', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Hold at mid-point of raise. Static calf strength and endurance.'],
            ['name' => 'Donkey Calf Raise Pause Reps (Top)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Raise, hold 2-3 seconds at top. Increases time under tension.'],
            ['name' => 'Donkey Calf Raise Slow Tempo (3-1-3)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => '3 sec raise, 1 sec hold, 3 sec lower. Time under tension calf work.'],
            ['name' => 'Donkey Calf Raise Eccentric Focus (Slow Negative)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Raise quickly, lower extremely slow (4-5 sec). Eccentric calf overload.'],
            ['name' => 'Donkey Calf Raise Explosive Concentric', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Fast-Twitch Fibers', 'Calves', 'Core'], 'description' => 'Explosive raise, slow controlled lower. Power development for calves.'],
            ['name' => 'Donkey Calf Raise Drop Set', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Start heavy, raise to failure, reduce weight, continue. Calf hypertrophy dropset.'],
            ['name' => 'Donkey Calf Raise Rest-Pause Set', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Raise to failure, rest 10 sec, continue. Density training for calves.'],
            ['name' => 'Donkey Calf Raise Partial Reps (Top Half)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Partial raises in top half. Emphasizes peak contraction.'],
            ['name' => 'Donkey Calf Raise Partial Reps (Bottom Half)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Partial raises in bottom half. Emphasizes stretch and lengthening.'],
            ['name' => 'Donkey Calf Raise 1.5 Reps', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Full raise, half lower, full raise again. Extended time under tension.'],
            ['name' => 'Donkey Calf Raise 21s', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete calf development.'],
            ['name' => 'Donkey Calf Raise Pulse Reps (Small Range)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Small pulsing movements at top. Builds calf pump and endurance.'],
            ['name' => 'Donkey Calf Raise Toes In (Internal Rotation)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius (Lateral Head)', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Point toes inward. Emphasizes lateral gastrocnemius head.'],
            ['name' => 'Donkey Calf Raise Toes Out (External Rotation)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius (Medial Head)', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Point toes outward. Emphasizes medial gastrocnemius head.'],
            ['name' => 'Donkey Calf Raise Narrow Foot Placement', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius (Lateral)', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Narrow stance on platform. Emphasizes outer calves.'],
            ['name' => 'Donkey Calf Raise Wide Foot Placement', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius (Medial)', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Wide stance on platform. Emphasizes inner calves.'],
            ['name' => 'Donkey Calf Raise Single-Leg Pause Reps', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Single-leg with pause at top. Unilateral time under tension.'],
            ['name' => 'Donkey Calf Raise Band Resisted', 'equipment' => 'Donkey Calf Raise Machine, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Attach band for variable resistance. Accommodating resistance calf raise.'],
            ['name' => 'Donkey Calf Raise Heavy Slow Negative', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Use heavy weight, raise with assistance, lower alone. Extreme eccentric calf overload.'],
            ['name' => 'Donkey Calf Raise Paused at Bottom (Stretch)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Pause 2-3 seconds at bottom. Emphasizes calf stretch and mobility.'],
            ['name' => 'Donkey Calf Raise 3-Second Peak Squeeze', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Raise and squeeze calves for 3 seconds at top. Maximal peak contraction.'],
            ['name' => 'Donkey Calf Raise Alternating Legs', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Alternate raising legs one at a time. Unilateral work with balance challenge.'],
            ['name' => 'Donkey Calf Raise Tempo Variation (2-2-4)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => '2 sec raise, 2 sec hold, 4 sec lower. Extended time under tension.'],
            ['name' => 'Donkey Calf Raise Isometric at Bottom (Stretch)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'core', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Hold at bottom stretch position. Static calf lengthening.'],
            ['name' => 'Donkey Calf Raise Deep Stretch (Full ROM)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Lower as deep as possible. Maximal calf stretch and range of motion.'],
            ['name' => 'Donkey Calf Raise With Bodyweight (No Machine)', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Use bodyweight only on machine. Lighter calf training or warm-up.'],
            ['name' => 'Donkey Calf Raise Isometric Bilateral Hold', 'equipment' => 'Donkey Calf Raise Machine', 'category_slug' => 'core', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Raise both legs and hold at top. Bilateral calf endurance.'],
        ];

        $sourceDir = public_path('execises/donkey-calf-raise-machine');
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
