<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class NordicHamstringBenchSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Nordic Hamstring Curl',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings (Biceps Femoris, Semitendinosus, Semimembranosus)', 'Gluteus Maximus', 'Erector Spinae', 'Core'],
                'description' => 'Secure your ankles under the pads, knees on the cushioned board. Keeping hips extended and body straight, slowly lower your torso toward the floor by controlling knee extension. At the bottom, push explosively with the hands or use a concentric assist to return to the start.',
            ],
            [
                'name' => 'Eccentric-Only Nordic Curl',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Gluteus Maximus', 'Core'],
                'description' => 'Start in the upright kneeling position. Slowly lower yourself forward over 3-5 seconds, resisting gravity entirely with your hamstrings. Use your hands to push off the floor at the bottom and reset to the top without performing the concentric phase.',
            ],
            [
                'name' => 'Band-Assisted Nordic Curl',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Gluteus Maximus', 'Core'],
                'description' => 'Anchor a resistance band overhead or to a pull-up bar and loop it around your chest or under your arms. The band assists you during the concentric (upward) phase, allowing for full-range reps when bodyweight alone is too challenging.',
            ],
            [
                'name' => 'Band-Resisted Nordic Curl',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Gluteus Maximus'],
                'description' => 'Secure a resistance band to a low anchor point behind you and loop it over the back of your neck or shoulders. The band increases resistance as you lower, overloading the eccentric phase, and adds resistance to the concentric return.',
            ],
            [
                'name' => 'Weighted Nordic Curl (Plate on Back)',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Gluteus Maximus', 'Erector Spinae', 'Core'],
                'description' => 'Place a weight plate on your upper back or hold a dumbbell against your chest. Perform the Nordic curl movement with added resistance. Have a partner help position the plate if needed.',
            ],
            [
                'name' => 'Single-Leg Nordic Curl (Assisted)',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'stability',
                'target_muscles' => ['Hamstrings', 'Gluteus Maximus', 'Core'],
                'description' => 'Secure only one ankle under the pad, the other leg bent and held behind you. Lower your body with control using one leg, using band assistance or a light touch from the hands as needed. Return to the start. Maximizes unilateral hamstring strength and knee stability.',
            ],
            [
                'name' => 'Pause Nordic Curl',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings', 'Gluteus Maximus', 'Core'],
                'description' => 'At the lowest point you can control without falling, pause for 1-2 seconds and maintain hamstring tension. Then either press back up or descend further under control. Eliminates momentum and increases time under tension.',
            ],
            [
                'name' => 'Tempo Nordic Curl (3-1-X)',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings', 'Gluteus Maximus', 'Core'],
                'description' => 'Take 3 seconds to lower, pause for 1 second at the deepest point, and explosively return to the top (X). This maximises eccentric load and time under tension for hamstring hypertrophy.',
            ],
            [
                'name' => 'Isometric Hold Nordic Curl (Mid-Range)',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Gluteus Maximus', 'Core'],
                'description' => 'Lower yourself to a specific angle (e.g., 45) where the hamstrings are fully loaded, and hold the position for 10-30 seconds. Builds tendon strength and static endurance around the knee.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Nordic Curl',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings'],
                'description' => 'Start from the bottom position (or just above it) and rise only to the midpoint, then lower again. Keeps tension on the hamstrings in their most lengthened range.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Nordic Curl',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings'],
                'description' => 'Start from the midpoint and complete the curl to the upright kneeling position. Focuses on the final knee flexion contraction.',
            ],
            [
                'name' => '21s Nordic Curl',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings', 'Gluteus Maximus'],
                'description' => 'Perform 7 bottom-half partials, 7 top-half partials, and 7 full-range reps back to back without rest. A high-intensity technique to fully exhaust the hamstrings.',
            ],
            [
                'name' => 'Pulse Nordic Curl (Bottom End)',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings'],
                'description' => 'At the deepest controlled point, perform small up-and-down pulsing movements (1-2 inches) without letting the knees touch the ground. Creates a deep burn and constant tension.',
            ],
            [
                'name' => 'Explosive Nordic Curl (Concentric Focus with Band)',
                'equipment' => 'Nordic Hamstring Bench',
                'category_slug' => 'power',
                'target_muscles' => ['Hamstrings', 'Gluteus Maximus'],
                'description' => 'Using a band-assisted set-up or by pushing explosively off the floor, drive back to the starting upright position as fast as possible. The eccentric phase remains controlled. Develops rate of force production in the posterior chain.',
            ],
        ];

        foreach ($exercises as $data) {
            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;

            Exercise::create($data);
        }
    }
}
