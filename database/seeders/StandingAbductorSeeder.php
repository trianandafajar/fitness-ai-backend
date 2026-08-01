<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class StandingAbductorSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Standing Abductor Standard (Side Leg Raise)', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'Tensor Fasciae Latae', 'Core', 'Hip Abductors'], 'description' => 'Stand on machine, pad against outer thigh. Lift leg outward to side. Squeeze glute medius at peak. Lower with control.'],
            ['name' => 'Standing Abductor Single-Leg', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors', 'Stabilizers'], 'description' => 'Work one leg at a time. Unilateral hip abductor development and corrects imbalances.'],
            ['name' => 'Standing Abductor Isometric Hold (Peak Contraction)', 'equipment' => 'Standing Abductor', 'category_slug' => 'core', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Lift leg to side and hold at peak. Static glute medius contraction.'],
            ['name' => 'Standing Abductor Isometric Hold (Mid-Contraction)', 'equipment' => 'Standing Abductor', 'category_slug' => 'core', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Hold at mid-point of abduction. Static hip abductor strength.'],
            ['name' => 'Standing Abductor Pause Reps (Peak)', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Lift, hold 2-3 seconds at peak. Increases time under tension.'],
            ['name' => 'Standing Abductor Slow Tempo (3-1-3)', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => '3 sec lift, 1 sec hold, 3 sec lower. Time under tension.'],
            ['name' => 'Standing Abductor Eccentric Focus (Slow Negative)', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Lift quickly, lower extremely slow (4-5 sec). Eccentric overload.'],
            ['name' => 'Standing Abductor Explosive Concentric', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'Fast-Twitch Fibers', 'Core', 'Hip Abductors'], 'description' => 'Explosive lift, slow controlled lower. Power development.'],
            ['name' => 'Standing Abductor Drop Set', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Start heavy, lift to failure, reduce weight, continue. Dropset.'],
            ['name' => 'Standing Abductor Rest-Pause Set', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Lift to failure, rest 10 sec, continue. Density training.'],
            ['name' => 'Standing Abductor Partial Reps (Top Half)', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Partial lifts in top half. Emphasizes peak contraction.'],
            ['name' => 'Standing Abductor Partial Reps (Bottom Half)', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Partial lifts in bottom half. Emphasizes stretch and engagement.'],
            ['name' => 'Standing Abductor 1.5 Reps', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Full lift, half lower, full lift again. Extended TUT.'],
            ['name' => 'Standing Abductor 21s', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete development.'],
            ['name' => 'Standing Abductor Pulse Reps (Small Range)', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Small pulsing at peak. Builds pump and endurance.'],
            ['name' => 'Standing Abductor Toes In (Internal Rotation)', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius (Anterior)', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Point toes inward during lift. Emphasizes anterior glute medius.'],
            ['name' => 'Standing Abductor Toes Out (External Rotation)', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius (Posterior)', 'Gluteus Minimus', 'Core', 'Hip Abductors'], 'description' => 'Point toes outward during lift. Emphasizes posterior glute medius.'],
            ['name' => 'Standing Abductor Band Resisted', 'equipment' => 'Standing Abductor, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Attach band for variable resistance. Accommodating resistance.'],
            ['name' => 'Standing Abductor Heavy Slow Negative', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Use heavy weight, lift with assistance, lower alone. Extreme eccentric.'],
            ['name' => 'Standing Abductor Paused at Bottom (Stretch)', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Pause 2-3 seconds at bottom. Emphasizes stretch and mobility.'],
            ['name' => 'Standing Abductor 3-Second Peak Squeeze', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Lift and squeeze glute medius for 3 seconds at top. Maximal contraction.'],
            ['name' => 'Standing Abductor Alternating Legs', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'Core', 'Hip Abductors', 'Stabilizers'], 'description' => 'Alternate lifting legs. Unilateral work with balance challenge.'],
            ['name' => 'Standing Abductor Tempo Variation (2-2-4)', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => '2 sec lift, 2 sec hold, 4 sec lower. Extended TUT.'],
            ['name' => 'Standing Abductor Isometric at 45 Degrees', 'equipment' => 'Standing Abductor', 'category_slug' => 'core', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Hold at 45° abduction. Static hip abductor strength.'],
            ['name' => 'Standing Abductor With Ankle Weight (No Machine)', 'equipment' => 'Standing Abductor, Ankle Weight', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors', 'Stabilizers'], 'description' => 'Use ankle weight instead of machine. Home-friendly abduction.'],
            ['name' => 'Standing Abductor Isometric Bilateral Hold', 'equipment' => 'Standing Abductor', 'category_slug' => 'core', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Lift both legs and hold at peak. Bilateral abductor endurance.'],
            ['name' => 'Standing Abductor Single-Arm Support', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'Core', 'Obliques', 'Hip Abductors'], 'description' => 'Support with one arm. Increases core and stability demand.'],
            ['name' => 'Standing Abductor No Support (Balance)', 'equipment' => 'Standing Abductor', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'Core', 'Hip Abductors', 'Stabilizers'], 'description' => 'Lift with no hand support. Extreme balance and core challenge.'],
            ['name' => 'Standing Abductor Pulse Reps with Weighted Vest', 'equipment' => 'Standing Abductor, Weighted Vest', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Wear weighted vest during abduction. Increased load.'],
            ['name' => 'Standing Abductor Isometric Hold at Peak (Bodyweight)', 'equipment' => 'Standing Abductor', 'category_slug' => 'core', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'TFL', 'Core', 'Hip Abductors'], 'description' => 'Bodyweight only. Hold peak position for time. Endurance.'],
        ];

        foreach ($execises as $data) {
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
