<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class HipThrustMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Hip Thrust',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'Sit on the floor or platform with upper back against the padded support, position the belt or pad across your hips, drive through your heels to extend your hips upward until your body forms a straight line from shoulders to knees. Squeeze glutes at the top, then lower with control.',
            ],
            [
                'name' => 'Single-Leg Hip Thrust',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'stability',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'Position one foot on the platform and keep the other leg elevated or bent. Drive through the working heel to raise hips while maintaining a level pelvis. Isolates each glute and challenges hip stability.',
            ],
            [
                'name' => 'Pause Hip Thrust',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings'],
                'description' => 'At the top of the movement, hold the full hip extension for 1-3 seconds while forcefully squeezing the glutes before lowering. Eliminates momentum and increases time under tension.',
            ],
            [
                'name' => 'Eccentric-Emphasis Hip Thrust',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings'],
                'description' => 'Drive the weight up explosively, then lower the hips very slowly over 3-5 seconds to overload the eccentric (lowering) phase. Promotes muscle damage and strength gains.',
            ],
            [
                'name' => 'Tempo Hip Thrust (3-1-3)',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'Take 3 seconds to thrust up, hold the peak contraction for 1 second, and take 3 seconds to lower. Maximizes time under tension for muscle growth.',
            ],
            [
                'name' => 'Isometric Hold Hip Thrust',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'Thrust to the top position and hold it statically for 10-30 seconds, squeezing the glutes throughout. Builds static endurance and mind-muscle connection.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Hip Thrust',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Maximus'],
                'description' => 'Only perform the upper half of the range, from mid-point to full hip extension. Maintains constant tension on the glutes and intensifies the squeeze.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Hip Thrust',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings'],
                'description' => 'Move from the starting position (hips down) to the mid-point only, focusing on the initial glute contraction and stretch.',
            ],
            [
                'name' => '21s Hip Thrust',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings'],
                'description' => 'Perform 7 bottom-half reps, 7 top-half reps, and 7 full-range reps without rest. An intense technique to fully exhaust the glutes.',
            ],
            [
                'name' => 'Pulse Hip Thrust',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Maximus'],
                'description' => 'At the fully extended position, perform small, rapid pulses without letting the hips drop. Creates continuous tension and metabolic stress.',
            ],
            [
                'name' => 'Explosive Hip Thrust',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'power',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings'],
                'description' => 'Use a moderate weight, thrust the hips up as quickly and powerfully as possible, then return under control. Develops explosive hip extension power.',
            ],
            [
                'name' => 'Wide Stance Hip Thrust',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Adductors', 'Hamstrings'],
                'description' => 'Position feet wider than shoulder-width with toes slightly turned out. Thrust up; the wider stance engages the inner thighs (adductors) more along with the glutes.',
            ],
            [
                'name' => 'Narrow Stance Hip Thrust',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings'],
                'description' => 'Place feet close together on the platform. Reduces adductor involvement and can shift slightly more emphasis to the hamstrings alongside the glutes.',
            ],
            [
                'name' => 'Feet-Elevated Hip Thrust',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings'],
                'description' => 'If the machine design allows, elevate the feet on a small box or platform. Increases the range of motion, deepening the stretch on the glutes and hamstrings.',
            ],
            [
                'name' => 'Shoulder-Elevated Hip Thrust (Higher Angle)',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'Adjust the back pad to a higher incline. This alters the angle of the trunk and can change the emphasis on the glutes, often allowing a deeper finish.',
            ],
            [
                'name' => 'High-Rep Hip Thrust (Endurance)',
                'equipment' => 'Hip Thrust Machine',
                'category_slug' => 'endurance',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'Use a lighter load and perform 20-50+ reps to failure. Focuses on muscular endurance and metabolic stress for glute development.',
            ],
        ];

        $sourceDir = public_path('execises/hip-thrust-machine');
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
