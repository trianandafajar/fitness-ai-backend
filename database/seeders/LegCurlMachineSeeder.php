<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class LegCurlMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Lying Leg Curl',
                'equipment' => 'Leg Curl Machine (Lying)',
                'category_slug' => 'isolation',
                'target_muscles' => ['Hamstrings (Biceps Femoris, Semitendinosus, Semimembranosus)', 'Gastrocnemius'],
                'description' => 'Lie face down, hook ankles under the pad, curl legs toward glutes, squeeze at the top, then lower with control.',
            ],
            [
                'name' => 'Standard Seated Leg Curl',
                'equipment' => 'Leg Curl Machine (Seated)',
                'category_slug' => 'isolation',
                'target_muscles' => ['Hamstrings (Biceps Femoris, Semitendinosus, Semimembranosus)', 'Gastrocnemius'],
                'description' => 'Sit with back against pad, place lower legs on top of the roller pad, secure thigh pad, curl legs downward, then return slowly.',
            ],
            [
                'name' => 'Single-Leg Lying Leg Curl',
                'equipment' => 'Leg Curl Machine (Lying)',
                'category_slug' => 'isolation',
                'target_muscles' => ['Hamstrings', 'Gastrocnemius'],
                'description' => 'Perform the lying leg curl with one leg at a time to correct imbalances and increase hamstring isolation.',
            ],
            [
                'name' => 'Single-Leg Seated Leg Curl',
                'equipment' => 'Leg Curl Machine (Seated)',
                'category_slug' => 'isolation',
                'target_muscles' => ['Hamstrings', 'Gastrocnemius'],
                'description' => 'Curl one leg at a time while seated, keeping tension on the working hamstring throughout the range.',
            ],
            [
                'name' => 'Toes Pointed (Plantarflexed) Lying Leg Curl',
                'equipment' => 'Leg Curl Machine (Lying)',
                'category_slug' => 'isolation',
                'target_muscles' => ['Hamstrings (Biceps Femoris emphasis)'],
                'description' => 'Point the toes away during the curl to reduce calf involvement and focus purely on the hamstrings.',
            ],
            [
                'name' => 'Toes Pulled Up (Dorsiflexed) Lying Leg Curl',
                'equipment' => 'Leg Curl Machine (Lying)',
                'category_slug' => 'isolation',
                'target_muscles' => ['Hamstrings', 'Gastrocnemius'],
                'description' => 'Flex the ankles (toes toward shins) to engage the gastrocnemius alongside the hamstrings for a fuller leg curl.',
            ],
            [
                'name' => 'Toes Pointed (Plantarflexed) Seated Leg Curl',
                'equipment' => 'Leg Curl Machine (Seated)',
                'category_slug' => 'isolation',
                'target_muscles' => ['Hamstrings (Biceps Femoris emphasis)'],
                'description' => 'Point the toes away while seated to minimize calf contribution and isolate the hamstrings more directly.',
            ],
            [
                'name' => 'Toes Pulled Up (Dorsiflexed) Seated Leg Curl',
                'equipment' => 'Leg Curl Machine (Seated)',
                'category_slug' => 'isolation',
                'target_muscles' => ['Hamstrings', 'Gastrocnemius'],
                'description' => 'Flex the ankles to incorporate the calf muscle into the movement, increasing overall posterior chain engagement.',
            ],
            [
                'name' => 'Eccentric-Emphasis Lying Leg Curl',
                'equipment' => 'Leg Curl Machine (Lying)',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings'],
                'description' => 'Curl the weight up with both legs, then lower very slowly (3-5 seconds) with one leg to overload the eccentric phase.',
            ],
            [
                'name' => 'Eccentric-Emphasis Seated Leg Curl',
                'equipment' => 'Leg Curl Machine (Seated)',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings'],
                'description' => 'Use a two-leg concentric curl and a slow, single-leg eccentric descent to maximize hamstring eccentric loading.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Lying Leg Curl',
                'equipment' => 'Leg Curl Machine (Lying)',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings'],
                'description' => 'Perform the movement only in the upper half, from near full contraction to about midway, to keep constant tension on the hamstrings.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Lying Leg Curl',
                'equipment' => 'Leg Curl Machine (Lying)',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings'],
                'description' => 'Work only the bottom half of the range, from extended to mid-point, emphasizing the stretch and early contraction.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Seated Leg Curl',
                'equipment' => 'Leg Curl Machine (Seated)',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings'],
                'description' => 'Move from the mid-point to full contraction, maintaining tension and emphasizing the squeeze at the fully curled position.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Seated Leg Curl',
                'equipment' => 'Leg Curl Machine (Seated)',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings'],
                'description' => 'Work only from the extended start position to halfway, focusing on the initial pull and hamstring stretch.',
            ],
            [
                'name' => 'Isometric Hold Lying Leg Curl',
                'equipment' => 'Leg Curl Machine (Lying)',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Core'],
                'description' => 'Curl to a specific angle (e.g., 90°) and hold for 10-30 seconds to build static strength and mind-muscle connection.',
            ],
            [
                'name' => 'Isometric Hold Seated Leg Curl',
                'equipment' => 'Leg Curl Machine (Seated)',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Core'],
                'description' => 'Hold the fully contracted or mid-range position for time to enhance hamstring endurance and tension control.',
            ],
            [
                'name' => 'Tempo Lying Leg Curl (3-1-3)',
                'equipment' => 'Leg Curl Machine (Lying)',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings'],
                'description' => 'Take 3 seconds to curl up, 1-second squeeze, 3 seconds to lower. Maximizes time under tension for muscle growth.',
            ],
            [
                'name' => 'Tempo Seated Leg Curl (3-1-3)',
                'equipment' => 'Leg Curl Machine (Seated)',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings'],
                'description' => 'Controlled 3-second concentric, 1-second peak hold, and 3-second eccentric for deep hamstring stimulation.',
            ],
            [
                'name' => '21s Leg Curl (Lying)',
                'equipment' => 'Leg Curl Machine (Lying)',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings'],
                'description' => '7 bottom-half partials, 7 top-half partials, then 7 full range reps without rest for an intense hamstring pump.',
            ],
            [
                'name' => '21s Leg Curl (Seated)',
                'equipment' => 'Leg Curl Machine (Seated)',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings'],
                'description' => 'Combine 7 bottom-half, 7 top-half, and 7 full reps in sequence with no rest to fully exhaust the hamstrings.',
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
