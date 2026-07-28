<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class CalfRaiseMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Standing Calf Raise',
                'equipment' => 'Standing Calf Raise Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'Place shoulders under pads, balls of feet on platform. Raise heels as high as possible, squeeze calves, then lower heels below platform for a full stretch.',
            ],
            [
                'name' => 'Standard Seated Calf Raise',
                'equipment' => 'Seated Calf Raise Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Soleus', 'Gastrocnemius'],
                'description' => 'Sit with thighs under pads, balls of feet on platform. Raise heels up, squeeze, and lower for a stretch. Bent knee targets soleus more.',
            ],
            [
                'name' => 'Single-Leg Standing Calf Raise',
                'equipment' => 'Standing Calf Raise Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'Use one leg at a time, keeping the other foot off the platform. Corrects imbalances and focuses load on each calf independently.',
            ],
            [
                'name' => 'Single-Leg Seated Calf Raise',
                'equipment' => 'Seated Calf Raise Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Soleus', 'Gastrocnemius'],
                'description' => 'Perform seated calf raises one leg at a time to isolate each soleus and gastrocnemius.',
            ],
            [
                'name' => 'Toes-Out Standing Calf Raise',
                'equipment' => 'Standing Calf Raise Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gastrocnemius (medial head emphasis)', 'Soleus'],
                'description' => 'Turn toes outward slightly; emphasizes inner calf and medial gastrocnemius.',
            ],
            [
                'name' => 'Toes-In Standing Calf Raise',
                'equipment' => 'Standing Calf Raise Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gastrocnemius (lateral head emphasis)', 'Soleus'],
                'description' => 'Turn toes inward slightly; biases outer calf and lateral gastrocnemius.',
            ],
            [
                'name' => 'Toes-Out Seated Calf Raise',
                'equipment' => 'Seated Calf Raise Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Soleus (medial emphasis)', 'Gastrocnemius'],
                'description' => 'Rotate toes outward while seated to shift focus to the inner soleus.',
            ],
            [
                'name' => 'Toes-In Seated Calf Raise',
                'equipment' => 'Seated Calf Raise Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Soleus (lateral emphasis)', 'Gastrocnemius'],
                'description' => 'Rotate toes inward while seated to target outer soleus fibers.',
            ],
            [
                'name' => 'Pause Standing Calf Raise',
                'equipment' => 'Standing Calf Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'Raise heels, hold peak contraction for 1-2 seconds, then lower. Increases time under tension and muscle recruitment.',
            ],
            [
                'name' => 'Pause Seated Calf Raise',
                'equipment' => 'Seated Calf Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Soleus', 'Gastrocnemius'],
                'description' => 'Squeeze at the top of the movement for 1-2 seconds before lowering, intensifying the contraction.',
            ],
            [
                'name' => 'Tempo Standing Calf Raise (3-1-3)',
                'equipment' => 'Standing Calf Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => '3 seconds up, 1-second squeeze, 3 seconds down. Emphasizes control and time under tension.',
            ],
            [
                'name' => 'Tempo Seated Calf Raise (3-1-3)',
                'equipment' => 'Seated Calf Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Soleus', 'Gastrocnemius'],
                'description' => 'Slow 3-second concentric, peak hold, 3-second eccentric. Deeply fatigues the calves.',
            ],
            [
                'name' => 'Eccentric-Emphasis Standing Calf Raise',
                'equipment' => 'Standing Calf Raise Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'Raise with both feet, then lower very slowly (4-5 seconds) on one foot. Overloads the negative phase.',
            ],
            [
                'name' => 'Eccentric-Emphasis Seated Calf Raise',
                'equipment' => 'Seated Calf Raise Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Soleus', 'Gastrocnemius'],
                'description' => 'Concentric with both legs, slow single-leg eccentric to maximize eccentric loading.',
            ],
            [
                'name' => 'Isometric Hold Standing Calf Raise',
                'equipment' => 'Standing Calf Raise Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'Hold the top contracted position for 10-30 seconds to build endurance and mind-muscle connection.',
            ],
            [
                'name' => 'Isometric Hold Seated Calf Raise',
                'equipment' => 'Seated Calf Raise Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Soleus', 'Gastrocnemius'],
                'description' => 'Sustain the peak contraction in the seated position for a set time to increase muscular stamina.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Standing Calf Raise',
                'equipment' => 'Standing Calf Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'Perform reps only in the upper portion from mid-point to full contraction, keeping constant tension.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Standing Calf Raise',
                'equipment' => 'Standing Calf Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'Work from the stretched bottom position to the mid-point, emphasizing the stretch reflex.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Seated Calf Raise',
                'equipment' => 'Seated Calf Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Soleus', 'Gastrocnemius'],
                'description' => 'Move only in the top half range to maintain tension on the soleus.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Seated Calf Raise',
                'equipment' => 'Seated Calf Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Soleus', 'Gastrocnemius'],
                'description' => 'Work the bottom half from full stretch to halfway, focusing on the initial contraction.',
            ],
            [
                'name' => '21s Standing Calf Raise',
                'equipment' => 'Standing Calf Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => '7 bottom-half reps, 7 top-half reps, then 7 full-range reps without rest. Intense calf pump.',
            ],
            [
                'name' => '21s Seated Calf Raise',
                'equipment' => 'Seated Calf Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Soleus', 'Gastrocnemius'],
                'description' => 'Combine 7 bottom-half, 7 top-half, and 7 full reps sequentially with no rest to fully exhaust the calves.',
            ],
            [
                'name' => 'Explosive Standing Calf Raise',
                'equipment' => 'Standing Calf Raise Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Gastrocnemius', 'Soleus'],
                'description' => 'Lower under control, then explode upward as fast as possible. Develops reactive strength and power.',
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
