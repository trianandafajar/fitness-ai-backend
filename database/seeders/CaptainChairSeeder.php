<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CaptainChairSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Captain\'s Chair Hanging Knee Raise',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas', 'Rectus Abdominis'],
                'description' => 'Support on pads, arms on handles. Hang with legs straight. Raise knees to chest. Lower with control.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging Leg Raise (Straight Leg)',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps', 'Iliopsoas', 'Rectus Abdominis'],
                'description' => 'Straight leg raise to 90° or higher. Advanced lower ab and hip flexor strength.',
            ],
            [
                'name' => 'Captain\'s Chair Toes-to-Bar (Toes-to-Chest)',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Lats', 'Obliques', 'Iliopsoas'],
                'description' => 'Raise straight legs to touch toes to chest or bar. Maximal core contraction.',
            ],
            [
                'name' => 'Captain\'s Chair Oblique Knee Raise (Twisting)',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Lower Abs', 'Iliopsoas'],
                'description' => 'Raise knees to one side. Twist torso. Oblique and rotational core emphasis.',
            ],
            [
                'name' => 'Captain\'s Chair Alternating Oblique Knee Raise',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Lower Abs', 'Iliopsoas'],
                'description' => 'Alternate raising knees to left and right sides. Dynamic oblique work.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging L-Sit Hold',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'stability',
                'target_muscles' => ['Core (Rectus Abdominis, Hip Flexors)', 'Lats', 'Shoulders', 'Quads'],
                'description' => 'Hold legs straight out in L-position. Static core and hip flexor endurance.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging V-Sit Hold',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'stability',
                'target_muscles' => ['Core (Entire)', 'Hip Flexors', 'Lats', 'Shoulders', 'Hamstrings'],
                'description' => 'Hold legs at 45° V-position. Advanced isometric core strength.',
            ],
            [
                'name' => 'Captain\'s Chair Knee Raise with Hip Lift',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas', 'Rectus Abdominis'],
                'description' => 'Raise knees to chest and lift hips off support. Advanced lower ab.',
            ],
            [
                'name' => 'Captain\'s Chair Straight Leg Raise with Hip Lift',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps', 'Iliopsoas'],
                'description' => 'Straight leg raise with hip lift. Full core and hip flexor engagement.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging Leg Raise (90° Hold)',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'stability',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps', 'Iliopsoas'],
                'description' => 'Raise legs to 90° and hold. Static lower ab endurance.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging Knee Raise (Pulse)',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas', 'Rectus Abdominis'],
                'description' => 'Small pulsing at peak knee raise. Builds pump and endurance.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging Leg Raise (Eccentric Focus)',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps', 'Iliopsoas'],
                'description' => 'Raise quickly, lower extremely slow (4-5 sec). Eccentric core overload.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging Knee Raise (Slow Tempo)',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas', 'Rectus Abdominis'],
                'description' => '3 sec raise, 1 sec hold, 3 sec lower. Time under tension.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging Leg Raise (Weighted)',
                'equipment' => 'Captain\'s Chair, Ankle Weights',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps', 'Iliopsoas'],
                'description' => 'Wear ankle weights during leg raises. Added lower ab resistance.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging Knee Raise (Weighted)',
                'equipment' => 'Captain\'s Chair, Ankle Weights',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas', 'Rectus Abdominis'],
                'description' => 'Ankle weights during knee raises. Increased lower ab resistance.',
            ],
            [
                'name' => 'Captain\'s Chair Windshield Wiper',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Lats', 'Quadriceps'],
                'description' => 'Hang with legs at 90°. Rotate legs side to side. Advanced oblique core.',
            ],
            [
                'name' => 'Captain\'s Chair Windshield Wiper (Straight Legs)',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Lats', 'Hamstrings'],
                'description' => 'Straight leg windshield wipers. Extreme oblique and core strength.',
            ],
            [
                'name' => 'Captain\'s Chair Bent Knee Windshield Wiper',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Lats', 'Quadriceps'],
                'description' => 'Knees bent at 90°. Rotate side to side. Modified windshield wiper.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging Scissor Kick',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps', 'Adductors'],
                'description' => 'Hang with legs extended. Alternating scissor kicks. Dynamic lower core.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging Flutter Kick',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps', 'Iliopsoas'],
                'description' => 'Small alternating kicks. Lower ab and hip flexor endurance.',
            ],
            [
                'name' => 'Captain\'s Chair Isometric Leg Hold (Mid-Point)',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'stability',
                'target_muscles' => ['Core', 'Hip Flexors', 'Lower Abs', 'Quadriceps', 'Iliopsoas'],
                'description' => 'Hold legs at 45° mid-position. Static core and hip strength.',
            ],
            [
                'name' => 'Captain\'s Chair Isometric Knee Hold (Mid-Point)',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'stability',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas', 'Rectus Abdominis'],
                'description' => 'Hold knees at mid-raise position. Static lower ab endurance.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging Pike (Jackknife)',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Core', 'Hip Flexors', 'Shoulders', 'Hamstrings', 'Rectus Abdominis'],
                'description' => 'Lift legs to pike position. Advanced core and hip flexor strength.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging Straddle Raise',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Adductors', 'Core', 'Quadriceps'],
                'description' => 'Raise legs in straddle position. Inner thigh and lower ab.',
            ],
            [
                'name' => 'Captain\'s Chair Single-Leg Knee Raise',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas', 'Stabilizers'],
                'description' => 'Raise one knee at a time. Unilateral lower ab and hip flexor.',
            ],
            [
                'name' => 'Captain\'s Chair Single-Leg Straight Raise',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps', 'Stabilizers'],
                'description' => 'Straight leg raise one leg at a time. Unilateral core and hip.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging L-Sit Hold (Weighted)',
                'equipment' => 'Captain\'s Chair, Ankle Weights',
                'category_slug' => 'stability',
                'target_muscles' => ['Core', 'Hip Flexors', 'Lats', 'Shoulders', 'Quads'],
                'description' => 'Ankle weights during L-sit. Increased isometric core resistance.',
            ],
            [
                'name' => 'Captain\'s Chair Toes-to-Bar (Weighted)',
                'equipment' => 'Captain\'s Chair, Ankle Weights',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Lats', 'Obliques'],
                'description' => 'Ankle weights during toes-to-bar. Advanced weighted core.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging Tuck Hold',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'stability',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Iliopsoas', 'Rectus Abdominis'],
                'description' => 'Tuck knees to chest and hold. Static lower ab endurance.',
            ],
            [
                'name' => 'Captain\'s Chair Alternating Straight Leg Raises',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Quadriceps', 'Stabilizers'],
                'description' => 'Alternate raising straight legs. Dynamic unilateral core.',
            ],
            [
                'name' => 'Captain\'s Chair Hanging Leg Raise (Rotational)',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'strength',
                'target_muscles' => ['Obliques', 'Lower Abs', 'Hip Flexors', 'Core', 'Lats'],
                'description' => 'Raise legs with slight rotation. Rotational and lower ab.',
            ],
            [
                'name' => 'Captain\'s Chair Isometric Dips (Support Hold)',
                'equipment' => 'Captain\'s Chair',
                'category_slug' => 'stability',
                'target_muscles' => ['Triceps', 'Chest', 'Core', 'Shoulders', 'Stabilizers'],
                'description' => 'Hold dip support position on chair. Static upper body endurance.',
            ],
        ];

        $sourceDir = public_path('execises/captain-chair');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $imagePath = Storage::disk('public')->putFile('execises', new File($sourceFile));
                $data['image'] = $imagePath;
            }

            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;

            Exercise::create($data);
        }
    }
}
