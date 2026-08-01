<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class DipStationSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Triceps Dip (Upright)',
                'equipment' => 'Dip Station',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps Brachii', 'Anterior Deltoids', 'Pectoralis Minor'],
                'description' => 'Support yourself on the parallel bars with arms straight, keep your body as upright as possible. Lower by bending elbows straight back until they reach about 90 degrees, then press back up to full arm extension without locking out.',
            ],
            [
                'name' => 'Chest Dip (Leaning Forward)',
                'equipment' => 'Dip Station',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major (Lower Fibers)', 'Triceps Brachii', 'Anterior Deltoids'],
                'description' => 'Grip the bars, lean your torso forward 30-45 degrees, and let your elbows flare outward as you lower until you feel a deep stretch in the chest, then push back up to the start.',
            ],
            [
                'name' => 'Weighted Triceps Dip',
                'equipment' => 'Dip Station',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps Brachii', 'Anterior Deltoids', 'Pectorals'],
                'description' => 'Attach a weight plate to a dip belt, or wear a weighted vest. Perform the standard upright triceps dip with added resistance for progressive overload.',
            ],
            [
                'name' => 'Weighted Chest Dip',
                'equipment' => 'Dip Station',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major (Lower)', 'Triceps Brachii', 'Anterior Deltoids'],
                'description' => 'Using a dip belt or weighted vest, lean forward and perform chest-focused dips with extra resistance to overload the lower pectorals and triceps.',
            ],
            [
                'name' => 'Band-Assisted Dip',
                'equipment' => 'Dip Station',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps Brachii', 'Anterior Deltoids', 'Pectorals'],
                'description' => 'Loop a resistance band under your knees or feet and attach it to the dip bars. The band assists the concentric phase, allowing you to perform full reps if you cannot complete bodyweight dips.',
            ],
            [
                'name' => 'Negative (Eccentric) Dip',
                'equipment' => 'Dip Station',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps Brachii', 'Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Start at the top of the dip and lower yourself as slowly as possible (4-5 seconds) to the bottom. Use your feet to step back up and repeat, focusing purely on the eccentric phase.',
            ],
            [
                'name' => 'Pause Dip (Bottom Hold)',
                'equipment' => 'Dip Station',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps Brachii', 'Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Lower to the deepest point of the dip, hold that stretched position for 1-3 seconds without resting, then press explosively upward. Eliminates the stretch reflex and builds starting strength.',
            ],
            [
                'name' => 'Tempo Dip (3-1-3)',
                'equipment' => 'Dip Station',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Triceps Brachii', 'Pectorals', 'Anterior Deltoids'],
                'description' => 'Take 3 seconds to lower, pause for 1 second at the bottom, then take 3 seconds to push back up. Maximizes time under tension for muscle growth.',
            ],
            [
                'name' => 'Partial Rep Dip (Top Half - Lockout Emphasis)',
                'equipment' => 'Dip Station',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Triceps Brachii (Lateral Head)'],
                'description' => 'Only perform the top half of the dip, moving from a 90-degree elbow bend to full lockout. Keeps continuous tension on the triceps near the end of the range.',
            ],
            [
                'name' => 'Partial Rep Dip (Bottom Half - Stretch Emphasis)',
                'equipment' => 'Dip Station',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major (Lower)', 'Triceps (Long Head)'],
                'description' => 'Lower into the deep stretch and push up only to the midway point. Emphasizes the chest stretch and initial contraction from the bottom.',
            ],
            [
                'name' => '21s Dip',
                'equipment' => 'Dip Station',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Triceps Brachii', 'Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Perform 7 bottom-half reps, 7 top-half reps, then 7 full-range reps consecutively without rest. An intense technique to exhaust the pushing muscles.',
            ],
            [
                'name' => 'Pulse Dip',
                'equipment' => 'Dip Station',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Triceps Brachii', 'Pectorals'],
                'description' => 'At the bottom position of the dip, perform small rapid pulsing movements without fully extending the arms. Creates a deep burn and maintains constant muscle tension.',
            ],
            [
                'name' => 'Isometric Hold Dip (Mid-Range)',
                'equipment' => 'Dip Station',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps Brachii', 'Pectorals', 'Core'],
                'description' => 'Lower yourself until your elbows are at 90 degrees and hold that position statically for 10-30 seconds. Builds endurance and strengthens the sticking point.',
            ],
            [
                'name' => 'Explosive Dip (Speed Reps)',
                'equipment' => 'Dip Station',
                'category_slug' => 'power',
                'target_muscles' => ['Triceps Brachii', 'Anterior Deltoids', 'Pectorals'],
                'description' => 'Using bodyweight or light assistance, lower quickly under control and then press up as fast and explosively as possible. Develops explosive pushing power.',
            ],
            [
                'name' => 'Hanging Knee Raise (Dip Station)',
                'equipment' => 'Dip Station',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques'],
                'description' => 'Support yourself on the dip bars with arms straight. Keeping your legs together, slowly raise your knees toward your chest, curling the pelvis, then lower without swinging.',
            ],
            [
                'name' => 'Straight Leg Raise (Dip Station)',
                'equipment' => 'Dip Station',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Transverse Abdominis'],
                'description' => 'Hold yourself on the bars with straight arms. With legs fully extended, raise them in front of you until parallel to the floor or higher, then lower with control.',
            ],
            [
                'name' => 'L-Sit Hold (Dip Station)',
                'equipment' => 'Dip Station',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques', 'Transverse Abdominis', 'Quadriceps'],
                'description' => 'Press into the bars, and hold your legs straight out in front of you at a 90-degree angle to your body. Keep the position statically for as long as possible, breathing steadily.',
            ],
            [
                'name' => 'Hanging Tuck Hold',
                'equipment' => 'Dip Station',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors'],
                'description' => 'Support yourself with arms extended, pull your knees tightly to your chest and hold the tuck position for time. A regression for building L-sit strength.',
            ],
            [
                'name' => 'Hanging Windshield Wiper (Dip Station)',
                'equipment' => 'Dip Station',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Transverse Abdominis', 'Hip Abductors'],
                'description' => 'Hold the dip bars, raise your legs to an L-sit position, then rotate your legs side to side in a slow, controlled arc, engaging the obliques dynamically.',
            ],
            [
                'name' => 'Toes-to-Bar (Dip Station)',
                'equipment' => 'Dip Station',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Grip', 'Lats'],
                'description' => 'From a straight-arm support, swing your legs up until your toes touch the bars between your hands, then lower with control. A more dynamic and advanced variation.',
            ],
            [
                'name' => 'Single-Leg Tucked Support Hold',
                'equipment' => 'Dip Station',
                'category_slug' => 'stability',
                'target_muscles' => ['Triceps', 'Core', 'Hip Flexors'],
                'description' => 'Hold a dip support with one leg extended straight down and the other knee tucked toward the chest. Alternate legs, challenging core and shoulder stability.',
            ],
        ];

        $sourceDir = public_path('execises/dip-station');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
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
