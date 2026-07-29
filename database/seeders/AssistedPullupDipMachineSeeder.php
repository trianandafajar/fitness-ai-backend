<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class AssistedPullupDipMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Assisted Pull-up (Standard Overhand Wide Grip)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Middle Traps', 'Biceps', 'Rear Deltoids', 'Core'],
                'description' => 'Kneel or stand on the assistance pad, grip the bar wider than shoulder-width with palms facing forward. Pull yourself up until chin clears the bar, squeeze lats at the top, then lower with control.',
            ],
            [
                'name' => 'Assisted Chin-up (Underhand Shoulder-Width Grip)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Brachialis', 'Rhomboids', 'Core'],
                'description' => 'Grasp the bar with an underhand (supinated) grip, hands shoulder-width apart. Pull up until chin is over the bar, emphasizing bicep contraction, then lower slowly.',
            ],
            [
                'name' => 'Assisted Neutral Grip Pull-up (Parallel Palms)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Brachialis', 'Middle Traps', 'Core'],
                'description' => 'Use parallel handles (palms facing each other) if available. Pull up until chin clears the handles, keeping elbows forward. Easier on the wrists and shoulders.',
            ],
            [
                'name' => 'Assisted Wide Grip Pull-up',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Rear Deltoids', 'Biceps'],
                'description' => 'Take a wider than standard overhand grip. Pull up, allowing the elbows to flare out, emphasizing the outer lats and upper back width.',
            ],
            [
                'name' => 'Assisted Close Grip Pull-up (V-Bar or Narrow Overhand)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Brachialis', 'Middle Back'],
                'description' => 'Use a close V-bar handle or narrow overhand grip. Pull to the lower chest, keeping elbows close to the body to target the lower lats and biceps heavily.',
            ],
            [
                'name' => 'Assisted Mixed Grip Pull-up (One Over, One Under)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Brachioradialis', 'Core'],
                'description' => 'One hand overhand, one hand underhand. Pull up evenly; the underhand side will bias the bicep while the overhand side targets the lats. Alternate sets to balance.',
            ],
            [
                'name' => 'Assisted Commando Pull-up (Side-to-Side)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Obliques', 'Core'],
                'description' => 'Stand sideways under a straight bar, hands gripping the bar in front and behind your head. Pull up so your head moves to one side of the bar, alternating sides each rep.',
            ],
            [
                'name' => 'Assisted Tricep Dip (Upright)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Anterior Deltoids', 'Pectoralis Minor'],
                'description' => 'Kneel on the pad, grip the dip bars, keep body as upright as possible. Lower by bending elbows straight back until a deep stretch, then press up to lockout.',
            ],
            [
                'name' => 'Assisted Chest Dip (Leaning Forward)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major (Lower)', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Kneel on the pad, lean the torso forward about 30-45 degrees. Lower with elbows flaring slightly outward, feeling the stretch in the chest, then push up.',
            ],
            [
                'name' => 'Assisted Hanging Knee Raise',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques', 'Grip'],
                'description' => 'Place knees or feet on the assistance pad, hang from the pull-up bar, and curl the knees up toward the chest, engaging the lower abs. Lower with control.',
            ],
            [
                'name' => 'Assisted Hanging Leg Raise (Straight Leg)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Transverse Abdominis', 'Grip'],
                'description' => 'Support yourself on the pad, keep legs straight, and raise them until they are parallel to the floor or higher, then lower slowly without swinging.',
            ],
            [
                'name' => 'Negative Pull-up (Assisted Eccentric Overload)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Rhomboids'],
                'description' => 'Set the assistance weight heavier to help with the concentric, or step up to the top position. Take 4-5 seconds to lower yourself with minimal assistance, overloading the eccentric phase.',
            ],
            [
                'name' => 'Pause Pull-up',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Rhomboids'],
                'description' => 'Pull up until chin clears the bar, hold the top position for 1-2 seconds squeezing the back, then lower. Removes momentum and increases time under tension.',
            ],
            [
                'name' => 'Tempo Pull-up (3-1-3)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Core'],
                'description' => 'Take 3 seconds to pull up, hold at the top for 1 second, then take 3 seconds to lower. Maximizes muscular tension and control.',
            ],
            [
                'name' => 'Partial Rep Pull-up (Top Half)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps'],
                'description' => 'Only perform the upper portion of the pull-up, from the eyes level to chin over the bar. Maintains constant tension on the lats.',
            ],
            [
                'name' => 'Partial Rep Pull-up (Bottom Half)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Latissimus Dorsi'],
                'description' => 'Move from a dead hang to about midway (chin to bar level halfway). Emphasizes the initial pull and lat stretch.',
            ],
            [
                'name' => 'Negative Dip (Assisted Eccentric Overload)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Pectorals', 'Anterior Deltoids'],
                'description' => 'Use heavier assistance to get to the top, then lower over 4-5 seconds with reduced assistance, focusing on the eccentric tricep and chest loading.',
            ],
            [
                'name' => 'Pause Dip',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Triceps', 'Lower Pectorals'],
                'description' => 'Lower to a deep dip position, pause for 1-2 seconds, then explode up. Eliminates momentum and strengthens the bottom position.',
            ],
            [
                'name' => 'Tempo Dip (3-1-3)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Triceps', 'Anterior Deltoids', 'Pectorals'],
                'description' => '3 seconds to lower, 1-second pause at the bottom, 3 seconds to push up. Increases time under tension for arm and chest growth.',
            ],
            [
                'name' => 'Partial Rep Dip (Top Half - Lockout Emphasis)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Triceps (lateral head)'],
                'description' => 'Only press through the top half of the dip, from midway to full lockout. Keeps continuous tension on the triceps.',
            ],
            [
                'name' => 'Partial Rep Dip (Bottom Half - Stretch Emphasis)',
                'equipment' => 'Assisted Pull-up/Dip Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectorals', 'Triceps (long head)'],
                'description' => 'Lower into the full stretch and push up only halfway, emphasizing the chest stretch and initial contraction.',
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
