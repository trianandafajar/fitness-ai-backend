<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class SpinBikeSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Seated Flat',
                'equipment' => 'Spin Bike',
                'category_slug' => 'endurance',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Seated steady-state pedaling at moderate cadence and light resistance to build aerobic base and improve cardiovascular endurance.',
            ],
            [
                'name' => 'Standing Flat',
                'equipment' => 'Spin Bike',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core', 'Shoulders'],
                'description' => 'Standing upright with a slight forward lean, pedaling at a moderate pace with light resistance to engage the core and increase overall energy expenditure.',
            ],
            [
                'name' => 'Seated Climb',
                'equipment' => 'Spin Bike',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Heavy resistance, slow cadence pedaling while seated to simulate climbing a hill, building muscular strength and power in the lower body.',
            ],
            [
                'name' => 'Standing Climb',
                'equipment' => 'Spin Bike',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Quadriceps', 'Hamstrings', 'Calves', 'Core', 'Upper Back'],
                'description' => 'Out of the saddle with heavy resistance and slow cadence, body positioned forward over the handlebars to maximize glute and quad recruitment on a steep hill.',
            ],
            [
                'name' => 'Hill Jumps',
                'equipment' => 'Spin Bike',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Transitioning between seated and standing positions every 4–8 counts at moderate-heavy resistance to simulate surging on a hill.',
            ],
            [
                'name' => 'Sprint (Seated)',
                'equipment' => 'Spin Bike',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Maximum-effort pedaling at very high cadence with light-to-moderate resistance for short bursts to develop speed and explosive power.',
            ],
            [
                'name' => 'Sprint (Standing)',
                'equipment' => 'Spin Bike',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core', 'Shoulders'],
                'description' => 'Out of the saddle, driving the pedals at maximum speed with moderate resistance, engaging the whole body for an all-out anaerobic burst.',
            ],
            [
                'name' => 'Tabata Intervals',
                'equipment' => 'Spin Bike',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Alternating 20 seconds of all-out work with 10 seconds of rest for multiple rounds to push VO2 max and anaerobic capacity.',
            ],
            [
                'name' => 'EMOM Sprints',
                'equipment' => 'Spin Bike',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Every minute on the minute, perform a short sprint (e.g., 15–20 seconds) at max effort, using the remainder of the minute for active recovery.',
            ],
            [
                'name' => 'Pyramid Intervals',
                'equipment' => 'Spin Bike',
                'category_slug' => 'interval',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Gradually increasing then decreasing work interval durations (e.g., 30s, 45s, 60s, 45s, 30s) with rest periods, building and sustaining intensity.',
            ],
            [
                'name' => 'Endurance Ride',
                'equipment' => 'Spin Bike',
                'category_slug' => 'endurance',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Long, continuous ride at a steady, moderate intensity lasting 30–90 minutes to improve fat oxidation and aerobic efficiency.',
            ],
            [
                'name' => 'Recovery Ride',
                'equipment' => 'Spin Bike',
                'category_slug' => 'recovery',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves'],
                'description' => 'Very light resistance, high cadence pedaling with minimal effort to flush out metabolic waste, promote blood flow, and aid active recovery.',
            ],
            [
                'name' => 'Isolated Leg Drill (Single Leg)',
                'equipment' => 'Spin Bike',
                'category_slug' => 'technique',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Hip Flexors', 'Calves'],
                'description' => 'Pedaling with one leg clipped out while the other leg drives the full circle, smoothing out dead spots and improving pedaling efficiency.',
            ],
            [
                'name' => 'Cadence Builds',
                'equipment' => 'Spin Bike',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Gradually increasing cadence (RPM) over a fixed time while maintaining light resistance to improve neuromuscular coordination and leg speed.',
            ],
            [
                'name' => 'Resistance Builds',
                'equipment' => 'Spin Bike',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Progressively adding resistance every 15–30 seconds while keeping cadence steady, forcing muscles to adapt to increasing load.',
            ],
            [
                'name' => 'Backward Pedaling',
                'equipment' => 'Spin Bike',
                'category_slug' => 'coordination',
                'target_muscles' => ['Hamstrings', 'Calves', 'Quadriceps', 'Hip Flexors', 'Core'],
                'description' => 'Pedaling in reverse with light resistance to challenge coordination, target the hamstrings differently, and improve knee joint mobility.',
            ],
            [
                'name' => 'Jumps (Tap Backs)',
                'equipment' => 'Spin Bike',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Quick, rhythmic transitions from seated to standing, tapping the hips back over the saddle with each rise, performed at moderate cadence and resistance.',
            ],
            [
                'name' => '4-Minute Power Intervals',
                'equipment' => 'Spin Bike',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Sustained high-intensity effort at 85–90% of maximum for 4 minutes, followed by full recovery, targeting lactate threshold and time-trial performance.',
            ],
            [
                'name' => 'Spin Bike Sprints with Upper Body Push',
                'equipment' => 'Spin Bike',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Shoulders', 'Triceps'],
                'description' => 'Sprinting seated while periodically performing a controlled push-up-like motion on the handlebars to integrate upper body engagement.',
            ],
        ];

        $sourceDir = public_path('execises/spin-bike');
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
