<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class ReverseHyperextensionMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Reverse Hyperextension Standard', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Erector Spinae', 'Glutes', 'Hamstrings', 'Core', 'Hip Extensors', 'Lats'], 'description' => 'Lie face down on machine, hips on pad, legs hanging. Raise legs behind until parallel. Lower with control. Posterior chain.'],
            ['name' => 'Reverse Hyperextension Single-Leg', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors', 'Stabilizers'], 'description' => 'Raise one leg at a time. Unilateral posterior chain development and corrects imbalances.'],
            ['name' => 'Reverse Hyperextension Isometric Hold (Top)', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'core', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Raise legs to parallel and hold. Static posterior chain contraction.'],
            ['name' => 'Reverse Hyperextension Isometric Hold (Mid-Contraction)', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'core', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Hold at mid-point of raise. Static glute and hamstring strength.'],
            ['name' => 'Reverse Hyperextension Pause Reps (Top)', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Raise, hold 2-3 seconds at top. Increases time under tension.'],
            ['name' => 'Reverse Hyperextension Slow Tempo (3-1-3)', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => '3 sec raise, 1 sec hold, 3 sec lower. Time under tension.'],
            ['name' => 'Reverse Hyperextension Eccentric Focus (Slow Negative)', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Raise quickly, lower extremely slow (4-5 sec). Eccentric overload.'],
            ['name' => 'Reverse Hyperextension Explosive Concentric', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Fast-Twitch Fibers', 'Core', 'Erector Spinae'], 'description' => 'Explosive raise, slow controlled lower. Power development.'],
            ['name' => 'Reverse Hyperextension Drop Set', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Start heavy, raise to failure, reduce weight, continue. Dropset.'],
            ['name' => 'Reverse Hyperextension Rest-Pause Set', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Raise to failure, rest 10 sec, continue. Density training.'],
            ['name' => 'Reverse Hyperextension Partial Reps (Top Half)', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings (Peak)', 'Erector Spinae', 'Core'], 'description' => 'Partial raises in top half. Emphasizes peak contraction.'],
            ['name' => 'Reverse Hyperextension Partial Reps (Bottom Half)', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings (Stretched)', 'Erector Spinae', 'Core'], 'description' => 'Partial raises in bottom half. Emphasizes stretch and engagement.'],
            ['name' => 'Reverse Hyperextension 1.5 Reps', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Full raise, half lower, full raise again. Extended TUT.'],
            ['name' => 'Reverse Hyperextension 21s', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete development.'],
            ['name' => 'Reverse Hyperextension Pulse Reps (Small Range)', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Small pulsing at top. Builds pump and endurance.'],
            ['name' => 'Reverse Hyperextension Toes Pointed', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Calves'], 'description' => 'Point toes during raise. Hamstring and glute emphasis.'],
            ['name' => 'Reverse Hyperextension Toes Flexed', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core'], 'description' => 'Flex toes upward. Isolates hamstrings and glutes more.'],
            ['name' => 'Reverse Hyperextension Band Resisted', 'equipment' => 'Reverse Hyperextension Machine, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Attach band for variable resistance. Accommodating resistance.'],
            ['name' => 'Reverse Hyperextension Heavy Slow Negative', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Use heavy weight, raise with assistance, lower alone. Extreme eccentric.'],
            ['name' => 'Reverse Hyperextension Paused at Bottom (Stretch)', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Pause 2-3 seconds at bottom. Emphasizes stretch and mobility.'],
            ['name' => 'Reverse Hyperextension 3-Second Peak Squeeze', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Raise and squeeze glutes for 3 seconds at top. Maximal contraction.'],
            ['name' => 'Reverse Hyperextension Alternating Legs', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Extensors', 'Stabilizers'], 'description' => 'Alternate raising legs. Unilateral work with stability challenge.'],
            ['name' => 'Reverse Hyperextension Tempo Variation (2-2-4)', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => '2 sec raise, 2 sec hold, 4 sec lower. Extended TUT.'],
            ['name' => 'Reverse Hyperextension Isometric at Parallel', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'core', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Hold at parallel (hips to feet). Static posterior chain strength.'],
            ['name' => 'Reverse Hyperextension With Ankle Weight (No Machine)', 'equipment' => 'Reverse Hyperextension Machine, Ankle Weight', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Use ankle weight on bench. Home-friendly reverse hyperextension.'],
            ['name' => 'Reverse Hyperextension Single-Leg Pause Reps', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Extensors', 'Stabilizers'], 'description' => 'Single-leg with pause at top. Unilateral TUT.'],
            ['name' => 'Reverse Hyperextension Hip Internal Rotation', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Medial Hamstrings', 'Erector Spinae', 'Core', 'Hip Rotators'], 'description' => 'Point toes inward during raise. Emphasizes medial hamstrings.'],
            ['name' => 'Reverse Hyperextension Hip External Rotation', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Lateral Hamstrings', 'Erector Spinae', 'Core', 'Hip Rotators'], 'description' => 'Point toes outward during raise. Emphasizes lateral hamstrings.'],
            ['name' => 'Reverse Hyperextension Wide Foot Placement', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Abductors', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Wide stance. Emphasizes glutes and abductors.'],
            ['name' => 'Reverse Hyperextension Narrow Foot Placement', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Adductors', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Narrow stance. Emphasizes hamstrings and adductors.'],
            ['name' => 'Reverse Hyperextension Isometric Bilateral Hold', 'equipment' => 'Reverse Hyperextension Machine', 'category_slug' => 'core', 'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae', 'Core', 'Hip Extensors'], 'description' => 'Raise both legs and hold at top. Bilateral posterior chain endurance.'],
        ];

        foreach ($exercises as $data) {
            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categories[$data['category_slug']],
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
            ]);
        }
    }
}
