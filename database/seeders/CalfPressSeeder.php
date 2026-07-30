<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CalfPressSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Calf Press Standard (Seated)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Sit on machine with knees bent 90°. Place toes on platform, heels hanging. Press with toes, raise heels. Lower with control.'],
            ['name' => 'Calf Press Single-Leg (Seated)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press with one leg only. Unilateral calf development and corrects imbalances.'],
            ['name' => 'Calf Press Standard (Standing)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Stand on machine with shoulders under pads. Press with toes, raise heels. Emphasizes gastrocnemius more than seated.'],
            ['name' => 'Calf Press Single-Leg (Standing)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Standing calf press with one leg. Unilateral gastrocnemius development.'],
            ['name' => 'Calf Press Isometric Hold (Top)', 'equipment' => 'Calf Press', 'category_slug' => 'core', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press to full extension (toes raised) and hold. Static calf contraction.'],
            ['name' => 'Calf Press Isometric Hold (Mid-Contraction)', 'equipment' => 'Calf Press', 'category_slug' => 'core', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Hold at mid-point of press. Static calf strength and endurance.'],
            ['name' => 'Calf Press Pause Reps (Top)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press, hold 2-3 seconds at top. Increases time under tension.'],
            ['name' => 'Calf Press Slow Tempo (3-1-3)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => '3 sec press, 1 sec hold, 3 sec lower. Time under tension calf work.'],
            ['name' => 'Calf Press Eccentric Focus (Slow Negative)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press quickly, lower extremely slow (4-5 sec). Eccentric calf overload.'],
            ['name' => 'Calf Press Explosive Concentric', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Fast-Twitch Fibers', 'Calves', 'Core'], 'description' => 'Explosive press, slow controlled lower. Power development for calves.'],
            ['name' => 'Calf Press Drop Set', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Start heavy, press to failure, reduce weight, continue. Calf hypertrophy dropset.'],
            ['name' => 'Calf Press Rest-Pause Set', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press to failure, rest 10 sec, continue. Density training for calves.'],
            ['name' => 'Calf Press Partial Reps (Top Half)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Partial presses in top half. Emphasizes peak contraction.'],
            ['name' => 'Calf Press Partial Reps (Bottom Half)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Partial presses in bottom half. Emphasizes stretch and lengthening.'],
            ['name' => 'Calf Press 1.5 Reps', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Full press, half lower, full press again. Extended time under tension.'],
            ['name' => 'Calf Press 21s', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete calf development.'],
            ['name' => 'Calf Press Pulse Reps (Small Range)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Small pulsing movements at top. Builds calf pump and endurance.'],
            ['name' => 'Calf Press Toes In (Internal Rotation)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius (Lateral Head)', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Point toes inward. Emphasizes lateral gastrocnemius head.'],
            ['name' => 'Calf Press Toes Out (External Rotation)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius (Medial Head)', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Point toes outward. Emphasizes medial gastrocnemius head.'],
            ['name' => 'Calf Press Narrow Foot Placement', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius (Lateral)', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Narrow stance on platform. Emphasizes outer calves.'],
            ['name' => 'Calf Press Wide Foot Placement', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius (Medial)', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Wide stance on platform. Emphasizes inner calves.'],
            ['name' => 'Calf Press Single-Leg Pause Reps', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Single-leg with pause at top. Unilateral time under tension.'],
            ['name' => 'Calf Press Band Resisted', 'equipment' => 'Calf Press, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Attach band for variable resistance. Accommodating resistance calf press.'],
            ['name' => 'Calf Press Heavy Slow Negative', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Use heavy weight, press quickly, lower alone. Extreme eccentric calf overload.'],
            ['name' => 'Calf Press Paused at Bottom (Stretch)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Pause 2-3 seconds at bottom. Emphasizes calf stretch and mobility.'],
            ['name' => 'Calf Press 3-Second Peak Squeeze', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press and squeeze calves for 3 seconds at top. Maximal peak contraction.'],
            ['name' => 'Calf Press Isometric Bilateral Hold', 'equipment' => 'Calf Press', 'category_slug' => 'core', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Press both legs and hold at top. Bilateral calf endurance.'],
            ['name' => 'Calf Press Alternating Legs', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Alternate pressing legs one at a time. Unilateral work with balance challenge.'],
            ['name' => 'Calf Press Tempo Variation (2-2-4)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => '2 sec press, 2 sec hold, 4 sec lower. Extended time under tension.'],
            ['name' => 'Calf Press Isometric at Bottom (Stretch)', 'equipment' => 'Calf Press', 'category_slug' => 'core', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Hold at bottom stretch position. Static calf lengthening.'],
            ['name' => 'Calf Press Deep Stretch (Full ROM)', 'equipment' => 'Calf Press', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Lower as deep as possible. Maximal calf stretch and range of motion.'],
            ['name' => 'Calf Press With Ankle Weight (No Machine)', 'equipment' => 'Calf Press, Ankle Weight', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Use ankle weight instead of machine. Home-friendly calf press.'],
        ];

        $sourceDir = public_path('execises/calf-press');
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
