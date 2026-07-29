<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class MultiPressConvergingChestPressSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Multi-Press Standard Grip Chest Press', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Pectoralis Major)', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Sit with back against pad. Press handles forward and inward. Converging path mimics dumbbell press.'],
            ['name' => 'Multi-Press Wide Grip Chest Press', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Outer Pectoralis)', 'Triceps', 'Anterior Deltoids', 'Core', 'Serratus Anterior'], 'description' => 'Wide grip on handles. Press forward and inward. Emphasizes outer chest and stretch.'],
            ['name' => 'Multi-Press Narrow Grip Chest Press', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Inner)', 'Triceps', 'Anterior Deltoids', 'Core', 'Forearms'], 'description' => 'Narrow grip on handles. Press forward. Emphasizes triceps and inner chest.'],
            ['name' => 'Multi-Press Neutral Grip Press', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Biceps', 'Forearms'], 'description' => 'Palms facing each other. Press forward. Joint-friendly shoulder press.'],
            ['name' => 'Multi-Press Pronated Grip (Overhand)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest', 'Anterior Deltoids', 'Triceps', 'Core', 'Serratus Anterior'], 'description' => 'Palms facing down. Press forward. Upper chest and shoulder emphasis.'],
            ['name' => 'Multi-Press Supinated Grip (Underhand)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Lower Chest', 'Triceps', 'Biceps', 'Core', 'Anterior Deltoids'], 'description' => 'Palms facing up. Press forward. Lower chest and bicep emphasis.'],
            ['name' => 'Multi-Press Incline Press (High Angle)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Upper Chest', 'Anterior Deltoids', 'Triceps', 'Core', 'Serratus Anterior'], 'description' => 'Adjust seat/back to incline angle. Press upward and inward. Upper chest emphasis.'],
            ['name' => 'Multi-Press Decline Press (Low Angle)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Lower Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Sternocostal Head'], 'description' => 'Adjust seat/back to decline angle. Press downward. Lower chest emphasis.'],
            ['name' => 'Multi-Press Flat Press (Neutral Angle)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Full)', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Seat/back at flat angle. Press forward. Overall chest development.'],
            ['name' => 'Multi-Press Isometric Hold (Full Extension)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'core', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Press to full extension and hold. Static chest contraction and lockout strength.'],
            ['name' => 'Multi-Press Isometric Hold (Mid-Contraction)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'core', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Hold at mid-point of press. Static chest and triceps endurance.'],
            ['name' => 'Multi-Press Pause Reps (Peak Contraction)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Press, hold 2-3 seconds at full extension. Increases time under tension.'],
            ['name' => 'Multi-Press Slow Tempo (3-1-3)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => '3 sec press, 1 sec hold, 3 sec release. Time under tension pressing.'],
            ['name' => 'Multi-Press Eccentric Focus (Slow Negative)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Press quickly, release extremely slow (4-5 sec). Eccentric overload for chest.'],
            ['name' => 'Multi-Press Explosive Concentric', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Fast-Twitch Fibers', 'Core', 'Anterior Deltoids'], 'description' => 'Explosive press, slow controlled release. Power development for pressing.'],
            ['name' => 'Multi-Press Drop Set', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Start heavy, press to failure, reduce weight, continue. Chest hypertrophy dropset.'],
            ['name' => 'Multi-Press Rest-Pause Set', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Press to failure, rest 10 sec, continue. Density training for chest.'],
            ['name' => 'Multi-Press Single-Arm Press', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Obliques', 'Anterior Deltoids', 'Stabilizers'], 'description' => 'Press with one arm only. Corrects imbalances and challenges core stability.'],
            ['name' => 'Multi-Press Single-Arm Isometric Hold', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'core', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Obliques', 'Anterior Deltoids', 'Stabilizers'], 'description' => 'Single-arm press hold. Unilateral chest endurance and stability.'],
            ['name' => 'Multi-Press Single-Arm Pause Reps', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Obliques', 'Anterior Deltoids', 'Stabilizers'], 'description' => 'Single-arm with pause at peak contraction. Unilateral time under tension.'],
            ['name' => 'Multi-Press 1.5 Reps', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Full press, half release, full press again. Extended time under tension.'],
            ['name' => 'Multi-Press Partial Reps (Top Half)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Partial presses in top half. Emphasizes lockout and triceps.'],
            ['name' => 'Multi-Press Partial Reps (Bottom Half)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Stretched)', 'Anterior Deltoids', 'Core', 'Serratus Anterior'], 'description' => 'Partial presses in bottom half. Emphasizes stretch and chest engagement.'],
            ['name' => 'Multi-Press 21s', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete chest development.'],
            ['name' => 'Multi-Press Pulse Reps (Small Range)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Small pulsing movements at peak contraction. Builds pump and endurance.'],
            ['name' => 'Multi-Press Arnold Press Variation (Rotational)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Shoulders', 'Triceps', 'Core', 'Serratus Anterior', 'Forearms'], 'description' => 'Rotate wrists inward as you press. Combines chest press with shoulder rotation.'],
            ['name' => 'Multi-Press Squeeze Press (Inner Chest Focus)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Inner Pectoralis)', 'Triceps', 'Core', 'Anterior Deltoids'], 'description' => 'Focus on squeezing chest together at top. Inner chest emphasis.'],
            ['name' => 'Multi-Press Stretch Press (Deep ROM)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Full Stretch)', 'Anterior Deltoids', 'Core', 'Serratus Anterior'], 'description' => 'Allow deep stretch at bottom before pressing. Maximal chest stretch and ROM.'],
            ['name' => 'Multi-Press Band Resisted', 'equipment' => 'Multi-Press / Converging Chest Press, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Attach band for variable resistance. Accommodating resistance pressing.'],
            ['name' => 'Multi-Press Alternating Arms Press', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Obliques', 'Anterior Deltoids', 'Stabilizers'], 'description' => 'Alternate pressing arms one at a time. Unilateral and core engagement.'],
            ['name' => 'Multi-Press Time Under Tension Set (30 sec reps)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Anterior Deltoids', 'Core', 'Stabilizers'], 'description' => 'Extremely slow reps (30 sec each). Maximal time under tension.'],
            ['name' => 'Multi-Press Isometric Contraction Squeeze (Top)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'core', 'target_muscles' => ['Chest (Peak)', 'Triceps', 'Core', 'Forearms', 'Stabilizers'], 'description' => 'Press and squeeze chest as hard as possible at top. Maximal contraction.'],
            ['name' => 'Multi-Press Crossover Press (Hands Cross)', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Inner)', 'Serratus Anterior', 'Core', 'Triceps', 'Anterior Deltoids'], 'description' => 'Cross arms as you press. Emphasizes inner chest and serratus.'],
            ['name' => 'Multi-Press Floor Press Variation', 'equipment' => 'Multi-Press / Converging Chest Press', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Core', 'Anterior Deltoids', 'Stabilizers'], 'description' => 'Set handles low and press with limited ROM. Triceps and lockout emphasis.'],
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
