<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class LegPressHorizontal45DegreeSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Leg Press Standard Feet Placement (Shoulder Width)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Place feet shoulder-width on platform. Lower until knees near chest. Press through entire foot. Overall leg development.'],
            ['name' => 'Leg Press High Feet Placement', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Adductors', 'Core', 'Quadriceps', 'Calves'], 'description' => 'Place feet high on platform. Emphasizes glutes and hamstrings. Reduces knee travel.'],
            ['name' => 'Leg Press Low Feet Placement', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Calves', 'Core', 'Glutes', 'Hamstrings', 'Stabilizers'], 'description' => 'Place feet low on platform. Emphasizes quadriceps. Increases knee travel.'],
            ['name' => 'Leg Press Wide Feet Placement', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Core', 'Calves'], 'description' => 'Wide stance on platform. Emphasizes inner thighs and glutes.'],
            ['name' => 'Leg Press Narrow Feet Placement', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps (Vastus Lateralis)', 'Calves', 'Core', 'Hamstrings', 'Glutes'], 'description' => 'Narrow stance on platform. Emphasizes outer quads and rectus femoris.'],
            ['name' => 'Leg Press Single-Leg Press', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Press with one leg only. Corrects imbalances and challenges core stability.'],
            ['name' => 'Leg Press Single-Leg High Foot Placement', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Calves', 'Quadriceps', 'Stabilizers'], 'description' => 'Single leg with high foot placement. Unilateral glute and hamstring emphasis.'],
            ['name' => 'Leg Press Single-Leg Low Foot Placement', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Core', 'Calves', 'Glutes', 'Hamstrings', 'Stabilizers'], 'description' => 'Single leg with low foot placement. Unilateral quad emphasis.'],
            ['name' => 'Leg Press Calf Raise (Full Extension)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Place toes on platform, heels hanging. Press with toes only. Calf isolation.'],
            ['name' => 'Leg Press Single-Leg Calf Raise', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Single-leg calf press. Unilateral calf development.'],
            ['name' => 'Leg Press Isometric Hold (Mid-Contraction)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'core', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Hold at mid-press position. Static leg strength and endurance.'],
            ['name' => 'Leg Press Isometric Hold (Top Position)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'core', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Calves', 'Stabilizers', 'Hamstrings'], 'description' => 'Hold at full extension. Static lockout strength.'],
            ['name' => 'Leg Press Pause Reps (Bottom)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Lower, pause 2-3 seconds at bottom, press. Eliminates stretch reflex.'],
            ['name' => 'Leg Press Slow Tempo (3-1-3)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => '3 sec lower, 1 sec hold, 3 sec press. Time under tension leg press.'],
            ['name' => 'Leg Press Eccentric Focus (Slow Negative)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Press quickly, lower extremely slow (4-5 sec). Eccentric leg overload.'],
            ['name' => 'Leg Press Explosive Concentric', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Fast-Twitch Fibers', 'Core', 'Calves', 'Hamstrings'], 'description' => 'Explosive press, slow controlled lower. Power development for legs.'],
            ['name' => 'Leg Press Drop Set', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Start heavy, press to failure, reduce weight, continue. Leg hypertrophy dropset.'],
            ['name' => 'Leg Press Rest-Pause Set', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Press to failure, rest 10 sec, continue. Density training for legs.'],
            ['name' => 'Leg Press Partial Reps (Top Half)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Partial presses in top half. Emphasizes lockout and quads.'],
            ['name' => 'Leg Press Partial Reps (Bottom Half)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Partial presses in bottom half. Emphasizes stretch and glutes.'],
            ['name' => 'Leg Press 1.5 Reps', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Full press, half lower, full press again. Extended time under tension.'],
            ['name' => 'Leg Press 21s', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => '7 bottom half, 7 top half, 7 full reps. Complete leg development.'],
            ['name' => 'Leg Press Pulse Reps (Small Range)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Calves', 'Stabilizers', 'Hamstrings'], 'description' => 'Small pulsing movements at top or bottom. Builds pump and endurance.'],
            ['name' => 'Leg Press Toes-In (Internal Rotation)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps (Vastus Lateralis)', 'Glutes', 'Core', 'Calves', 'Hamstrings'], 'description' => 'Point toes inward. Emphasizes outer quads and lateral glutes.'],
            ['name' => 'Leg Press Toes-Out (External Rotation)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps (Vastus Medialis)', 'Glutes', 'Adductors', 'Core', 'Hamstrings'], 'description' => 'Point toes outward. Emphasizes inner quads and glutes.'],
            ['name' => 'Leg Press High Volume (20+ Reps)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Moderate weight, 20+ reps. Muscular endurance and leg conditioning.'],
            ['name' => 'Leg Press Band Resisted', 'equipment' => 'Leg Press Horizontal / 45-Degree, Resistance Band', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Attach band for variable resistance. Accommodating resistance leg press.'],
            ['name' => 'Leg Press Deep Stretch (Full ROM)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Lower as deep as possible (knees to chest). Maximal range of motion.'],
            ['name' => 'Leg Press Partial ROM (Knee Health)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Limited ROM to reduce knee stress. Safer for knee rehabilitation.'],
            ['name' => 'Leg Press Feet Together (Narrow Stance)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps (Vastus Medialis)', 'Core', 'Calves', 'Hamstrings', 'Glutes'], 'description' => 'Feet touching on platform. Emphasizes teardrop (VMO) muscle.'],
            ['name' => 'Leg Press Feet Extra Wide (Sumo Stance)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Adductors', 'Hamstrings', 'Quadriceps', 'Core', 'Calves'], 'description' => 'Extra wide stance on platform. Emphasizes adductors and glutes.'],
            ['name' => 'Leg Press Isometric Leg Drive (Against Stops)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'core', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Press against locked safety stops. Maximal isometric leg drive.'],
            ['name' => 'Leg Press Alternating Leg Press', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Obliques', 'Hamstrings', 'Calves', 'Stabilizers'], 'description' => 'Alternate pressing legs one at a time. Unilateral and core engagement.'],
            ['name' => 'Leg Press Tempo Variation (2-2-4)', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => '2 sec lower, 2 sec hold, 4 sec press. Extended time under tension.'],
            ['name' => 'Leg Press Heel Only Press', 'equipment' => 'Leg Press Horizontal / 45-Degree', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Quadriceps', 'Calves', 'Stabilizers'], 'description' => 'Press only with heels (toes off platform). Glute and hamstring emphasis.'],
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
