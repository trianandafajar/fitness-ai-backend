<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AbCoasterMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Ab Coaster (Straight Crunch)',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques'],
                'description' => 'Kneel on the padded carriage with shins against the pads, grip the handles. Drive your knees upward and forward toward your chest in a smooth arc, squeezing the abs at the top. Return with control without letting the weight stack rest.',
            ],
            [
                'name' => 'Oblique Ab Coaster (Side-to-Side Crunch)',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Transverse Abdominis'],
                'description' => 'As you slide upward, twist your knees to one side to target the obliques. Alternate sides each rep, or perform a full set to one side before switching.',
            ],
            [
                'name' => 'Knees-to-Elbows Ab Coaster',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Obliques', 'Hip Flexors'],
                'description' => 'While holding the handles, aim to bring your knees as high as possible, attempting to touch the elbows by contracting the entire abdominal wall. Return slowly.',
            ],
            [
                'name' => 'Single-Leg Ab Coaster',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'stability',
                'target_muscles' => ['Rectus Abdominis', 'Obliques', 'Hip Flexors (unilateral)', 'Core'],
                'description' => 'Place only one leg on the knee pad, keeping the other leg bent and hovering. Perform the crunch motion, which challenges core stability and isolates one side of the abdominals.',
            ],
            [
                'name' => 'Weighted Ab Coaster (Plate on Lap)',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Rectus Abdominis', 'Obliques', 'Transverse Abdominis'],
                'description' => 'Hold a weight plate across your lap or behind your head while performing the standard ab coaster motion. Increases resistance for abdominal strength and hypertrophy.',
            ],
            [
                'name' => 'Pause Ab Coaster',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'At the peak of the crunch (knees closest to chest), pause for 1-2 seconds and forcefully contract the abs. Then lower with control.',
            ],
            [
                'name' => 'Eccentric-Emphasis Ab Coaster',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'Drive the carriage up quickly (concentric), then take 3-5 seconds to slowly resist the weight as you lower back to the start. Overloads the negative phase.',
            ],
            [
                'name' => 'Tempo Ab Coaster (3-1-3)',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rectus Abdominis', 'Obliques', 'Hip Flexors'],
                'description' => 'Take 3 seconds to slide upward, squeeze for 1 second at the top, and 3 seconds to lower. Maximizes time under tension.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Ab Coaster',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rectus Abdominis (peak contraction zone)'],
                'description' => 'Only perform the final portion of the movement, from the midpoint to full knee raise. Keeps constant tension on the abs.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Ab Coaster',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rectus Abdominis (stretch emphasis)', 'Hip Flexors'],
                'description' => 'Move from the extended start position to the midpoint only, focusing on the initial abdominal contraction and lower core engagement.',
            ],
            [
                'name' => '21s Ab Coaster',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'Perform 7 bottom-half reps, 7 top-half reps, then 7 full-range reps without rest. An intense metabolic stress technique for the entire core.',
            ],
            [
                'name' => 'Pulse Ab Coaster',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'At the top contracted position, perform small, rapid pulses without lowering the carriage. Maintains continuous tension and creates a deep burn.',
            ],
            [
                'name' => 'Isometric Hold Ab Coaster (Mid-Range)',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Rectus Abdominis', 'Transverse Abdominis', 'Core'],
                'description' => 'Slide to a mid-point where the abs are fully engaged and hold the position for 10-30 seconds. Builds static core endurance.',
            ],
            [
                'name' => 'Alternating Knee Raise Ab Coaster',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Hip Flexors'],
                'description' => 'Lift one knee slightly higher while slightly dropping the other in a rhythmic, alternating pattern, simulating a climbing motion. Targets the obliques dynamically.',
            ],
            [
                'name' => 'High-Rep Ab Coaster (Endurance)',
                'equipment' => 'Ab Coaster Machine',
                'category_slug' => 'endurance',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques'],
                'description' => 'Use a light resistance and perform 20-50+ continuous reps, maintaining a steady pace to build abdominal endurance and stamina.',
            ],
        ];

        $sourceDir = public_path('exercises/ab-coaster-machine');
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