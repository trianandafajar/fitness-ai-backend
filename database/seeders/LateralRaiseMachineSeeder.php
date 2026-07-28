<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class LateralRaiseMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Seated Lateral Raise (Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'shoulders',
                'target_muscles' => ['Lateral Deltoid', 'Anterior Deltoid', 'Supraspinatus'],
                'description' => 'Seated on the lateral raise machine with arms positioned against the padded arms, raise the arms laterally to shoulder height to isolate the lateral deltoids. The machine provides a fixed path and constant tension throughout the movement.',
            ],
            [
                'name' => 'Standing Lateral Raise (Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'shoulders',
                'target_muscles' => ['Lateral Deltoid', 'Anterior Deltoid', 'Trapezius (Upper)'],
                'description' => 'Standing beside the machine with one arm against the padded arm, perform unilateral lateral raises. Allows for greater range of motion and helps identify/fix strength imbalances between sides.',
            ],
            [
                'name' => 'Seated Single-Arm Lateral Raise (Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'shoulders',
                'target_muscles' => ['Lateral Deltoid', 'Anterior Deltoid', 'Supraspinatus'],
                'description' => 'Seated and performing one arm at a time for maximum isolation and mind-muscle connection with the lateral deltoid. Useful for addressing asymmetries.',
            ],
            [
                'name' => 'Seated Lateral Raise with Pause (Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Lateral Deltoid', 'Anterior Deltoid', 'Supraspinatus'],
                'description' => 'Perform the lateral raise and hold the top position for 2-3 seconds before lowering. Increases time under tension and metabolic stress for hypertrophy.',
            ],
            [
                'name' => 'Partial Lateral Raise (Top Half, Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Lateral Deltoid', 'Supraspinatus'],
                'description' => 'Perform only the top half of the range of motion (from 45 degrees to full abduction). Maintains constant tension on the lateral deltoid at its strongest mechanical advantage.',
            ],
            [
                'name' => 'Partial Lateral Raise (Bottom Half, Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Lateral Deltoid', 'Supraspinatus'],
                'description' => 'Perform only the bottom half of the range (from starting position to 45 degrees). Targets the supraspinatus and initial lateral deltoid recruitment phase.',
            ],
            [
                'name' => 'Seated Lateral Raise with Drop Set (Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Lateral Deltoid', 'Anterior Deltoid', 'Supraspinatus'],
                'description' => 'Perform a set to near failure, immediately reduce weight by 20-30%, and continue for additional reps. Extends the set for greater metabolic stress and hypertrophy.',
            ],
            [
                'name' => 'Seated Lateral Raise with Slow Eccentric (Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Lateral Deltoid', 'Anterior Deltoid', 'Supraspinatus'],
                'description' => 'Raise explosively, then lower the weight over 3-4 seconds. Emphasizes the eccentric phase for greater muscle damage and growth stimulus.',
            ],
            [
                'name' => 'Seated Lateral Raise (Neutral Grip, Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'shoulders',
                'target_muscles' => ['Lateral Deltoid', 'Anterior Deltoid', 'Supraspinatus'],
                'description' => 'Using the neutral grip handles (palms facing each other) on the machine. Can reduce shoulder impingement risk for those with sensitive shoulders while still targeting lateral delts.',
            ],
            [
                'name' => 'Seated Lateral Raise (Pronated Grip, Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'shoulders',
                'target_muscles' => ['Lateral Deltoid', 'Posterior Deltoid', 'Supraspinatus'],
                'description' => 'Using pronated grip (palms down) if the machine allows. Shifts slight emphasis toward posterior deltoid involvement while maintaining lateral delt focus.',
            ],
            [
                'name' => 'Seated Alternating Lateral Raise (Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'shoulders',
                'target_muscles' => ['Lateral Deltoid', 'Anterior Deltoid', 'Supraspinatus', 'Core (Anti-rotation)'],
                'description' => 'Alternate arms with each rep while seated. Adds core anti-rotation demand and allows brief rest for each arm between reps, enabling slightly heavier loads.',
            ],
            [
                'name' => 'Seated Lateral Raise 1.5 Reps (Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Lateral Deltoid', 'Anterior Deltoid', 'Supraspinatus'],
                'description' => 'Full rep + half rep from bottom = 1 rep. Increases time under tension in the stretched position where the lateral deltoid is most mechanically disadvantaged.',
            ],
            [
                'name' => 'Seated Lateral Raise Isometric Hold (Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Lateral Deltoid', 'Supraspinatus'],
                'description' => 'Raise arms to shoulder height and hold for 20-40 seconds. Builds isometric strength and endurance in the lateral deltoid and supraspinatus.',
            ],
            [
                'name' => 'Seated Lateral Raise with Band Resistance (Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Lateral Deltoid', 'Anterior Deltoid', 'Supraspinatus'],
                'description' => 'Attach a resistance band to the machine arm for accommodating resistance. Increases tension at the top where the machine alone provides less resistance.',
            ],
            [
                'name' => 'Seated Lateral Raise (Peak Contraction Focus, Machine)',
                'equipment' => 'Lateral Raise Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Lateral Deltoid', 'Anterior Deltoid'],
                'description' => 'Focus entirely on squeezing the lateral deltoid at the top of each rep for 1-2 seconds. Maximizes mind-muscle connection and peak contraction quality over load.',
            ],
        ];

        $sourceDir = public_path('exercises/lateral_raise_machine');
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