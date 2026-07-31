<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class GluteKickbackMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Glute Kickback',
                'equipment' => 'Glute Kickback Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Maximus', 'Gluteus Medius', 'Hamstrings', 'Core'],
                'description' => 'Drive the working leg straight back against the padded support, squeeze the glute at full extension, then return under control without letting the weight stack rest.',
            ],
            [
                'name' => 'Bent-Knee Kickback',
                'equipment' => 'Glute Kickback Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Maximus', 'Gluteus Medius'],
                'description' => 'Maintain a 90-degree bend in the working knee throughout, pushing the heel upward to minimize hamstring involvement and isolate the glutes.',
            ],
            [
                'name' => 'Straight-Leg Kickback',
                'equipment' => 'Glute Kickback Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Gluteus Medius'],
                'description' => 'Keep the working leg straight or only slightly bent, pressing through the whole leg to engage the hamstrings along with the glutes.',
            ],
            [
                'name' => 'Toes-Out Kickback (External Rotation)',
                'equipment' => 'Glute Kickback Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Maximus', 'Gluteus Medius (posterior fibers)'],
                'description' => 'Turn the toes outward slightly during the push to bias the upper, outer glute and enhance hip external rotation.',
            ],
            [
                'name' => 'Toes-In Kickback (Internal Rotation)',
                'equipment' => 'Glute Kickback Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Maximus (lower fibers)'],
                'description' => 'Point the toes slightly inward as you extend to shift emphasis toward the lower glute fibers.',
            ],
            [
                'name' => 'Pulse Kickback',
                'equipment' => 'Glute Kickback Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Maximus', 'Gluteus Medius'],
                'description' => 'At the top of the movement, perform small, rapid pulses without lowering fully to increase time under tension and metabolic stress.',
            ],
            [
                'name' => 'Isometric Hold Kickback',
                'equipment' => 'Glute Kickback Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Gluteus Medius', 'Core'],
                'description' => 'Extend the leg to full contraction and hold the position statically for 10-30 seconds to build muscular endurance and mind-muscle connection.',
            ],
            [
                'name' => 'Eccentric-Emphasis Kickback',
                'equipment' => 'Glute Kickback Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings'],
                'description' => 'Use a quick, explosive push to the top, then lower the weight very slowly (3-5 seconds) to overload the eccentric phase.',
            ],
            [
                'name' => 'Single-Leg Alternating Kickback',
                'equipment' => 'Glute Kickback Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Maximus', 'Gluteus Medius', 'Core'],
                'description' => 'Complete all reps on one leg before switching to correct imbalances and maximize unilateral glute activation.',
            ],
            [
                'name' => 'Tempo Kickback (3-1-3)',
                'equipment' => 'Glute Kickback Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Maximus', 'Gluteus Medius'],
                'description' => 'Take 3 seconds to push back, 1-second squeeze at the top, and 3 seconds to lower, emphasizing control and time under tension.',
            ],
            [
                'name' => 'Partial Reps (Top Half)',
                'equipment' => 'Glute Kickback Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Maximus'],
                'description' => 'Only perform the upper half of the range of motion, moving from mid-point to full lockout to maintain continuous tension.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half)',
                'equipment' => 'Glute Kickback Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Maximus'],
                'description' => 'Work only the bottom half of the movement, extending from the start position to roughly halfway, without reaching full lockout.',
            ],
        ];

        $sourceDir = public_path('execises/glute-kickback-machine');
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
            $data['category_id'] = $categoryId;

            Exercise::create($data);
        }
    }
}
    