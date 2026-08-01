<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ArcTrainerSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Forward Stride (Lower Body Only)',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Basic forward striding with hands resting on stationary handles, driving the pedals through a smooth arc to elevate heart rate and build lower-body endurance.',
            ],
            [
                'name' => 'Total Body Forward Stride',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core', 'Shoulders', 'Triceps', 'Latissimus Dorsi'],
                'description' => 'Using moving handlebars to engage the upper body in a push-pull motion with each stride, increasing caloric burn and full-body coordination.',
            ],
            [
                'name' => 'Reverse Stride (Backward)',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Calves', 'Quadriceps', 'Core'],
                'description' => 'Striding backward with a low to moderate incline to shift emphasis to the glutes and hamstrings while improving knee stability and balance.',
            ],
            [
                'name' => 'Total Body Reverse Stride',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Calves', 'Core', 'Shoulders', 'Biceps', 'Upper Back'],
                'description' => 'Backward striding combined with the arm levers for a full-body reverse motion that challenges coordination and posterior chain endurance.',
            ],
            [
                'name' => 'Low Incline Forward Stride',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core'],
                'description' => 'Setting the ramp to a low position (around 0-10) to mimic a flat or slight uphill, targeting the quads more heavily with higher resistance and slower cadence.',
            ],
            [
                'name' => 'Medium Incline Forward Stride',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'endurance',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Calves', 'Core'],
                'description' => 'Setting the ramp to a mid-range incline (10-20) to balance glute and hamstring engagement with quad work, ideal for steady-state endurance training.',
            ],
            [
                'name' => 'High Incline Forward Stride',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Maximizing the ramp angle (20-30+) to heavily target the glutes and hamstrings, performed with heavier resistance and slower strides for strength building.',
            ],
            [
                'name' => 'Hill Climb Intervals',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Alternating between high-incline high-resistance intervals and low-incline active recovery periods to simulate repeated hill climbs and build power.',
            ],
            [
                'name' => 'Sprint Intervals',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Short bursts of maximum stride rate at low resistance followed by longer recovery periods to develop speed and anaerobic capacity.',
            ],
            [
                'name' => 'Power Intervals (High Resistance, Low RPM)',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Performing intervals with heavy resistance and a deliberate, forceful stride at a slow cadence to build muscular power and strength-endurance.',
            ],
            [
                'name' => 'Single-Leg Forward Stride',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'technique',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Pedaling with one leg while the other rests stationary, focusing on unilateral strength, correcting imbalances, and improving the pedaling arc.',
            ],
            [
                'name' => 'Single-Leg Reverse Stride',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'technique',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Backward striding with one leg only, isolating the posterior chain unilaterally to enhance glute activation and knee stability.',
            ],
            [
                'name' => 'Steady State Endurance Ride',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'endurance',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Long-duration session at a consistent moderate intensity to build aerobic capacity, fat metabolism, and mental stamina.',
            ],
            [
                'name' => 'Recovery Glide',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'recovery',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core'],
                'description' => 'Very low resistance, high-cadence striding with minimal effort to promote blood flow, reduce soreness, and facilitate active recovery.',
            ],
            [
                'name' => 'Isometric Hold at Bottom Position',
                'equipment' => 'Arc Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core'],
                'description' => 'Pausing for 3-5 seconds at the lowest point of the stride (knee and hip flexed) while keeping resistance engaged, increasing time under tension and isometric strength.',
            ],
        ];

        $sourceDir = public_path('execises/arc-trainer');
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
