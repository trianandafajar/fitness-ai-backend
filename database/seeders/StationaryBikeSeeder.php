<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class StationaryBikeSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Steady State Cycling',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Hip Flexors', 'Core'],
                'description' => 'Pedal at a consistent moderate pace with moderate resistance for an extended period to build aerobic endurance and burn calories.',
            ],
            [
                'name' => 'Sprint Intervals',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Alternate short all-out maximal sprints with longer rest periods of easy pedaling to develop explosive power and anaerobic capacity.',
            ],
            [
                'name' => 'Hill Climb (Seated)',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Increase resistance significantly and pedal slowly while seated, simulating a steep uphill climb to build leg strength and muscular endurance.',
            ],
            [
                'name' => 'Standing Climb',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core', 'Upper Body'],
                'description' => 'Rise out of the saddle with high resistance, driving the pedals with body weight for full-body engagement and increased power output.',
            ],
            [
                'name' => 'High Cadence Spin',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hip Flexors', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Pedal at a very high RPM (90-120+) with light resistance to improve neuromuscular coordination, cardiovascular fitness and leg speed.',
            ],
            [
                'name' => 'Low Cadence Strength Ride',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves'],
                'description' => 'Pedal at a slow RPM (40-60) against very heavy resistance to mimic heavy squatting and build raw concentric leg strength.',
            ],
            [
                'name' => 'Reverse Pedaling',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'technique',
                'target_muscles' => ['Hamstrings', 'Hip Flexors', 'Quadriceps', 'Calves'],
                'description' => 'Pedal backward against light resistance to activate the hamstrings and hip flexors differently, improving knee stability and coordination.',
            ],
            [
                'name' => 'Single-Leg Pedaling',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'technique',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Hip Flexors'],
                'description' => 'Clip one foot out and pedal with only one leg to correct muscle imbalances, improve pedal stroke efficiency and strengthen the weaker side.',
            ],
            [
                'name' => 'Tabata Intervals',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'],
                'description' => 'Perform 20 seconds of all-out maximal effort followed by 10 seconds of rest, repeated for 8 rounds, for extreme anaerobic conditioning.',
            ],
            [
                'name' => 'Pyramid Intervals',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Gradually increase then decrease the duration or intensity of intervals (e.g., 30s, 60s, 90s, 60s, 30s) with equal recovery between them.',
            ],
            [
                'name' => 'Endurance Ride',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'endurance',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Maintain a steady, conversational pace for 45-90+ minutes at moderate resistance to maximize fat burning and aerobic base development.',
            ],
            [
                'name' => 'Recovery Ride',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'recovery',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves'],
                'description' => 'Pedal with very light resistance at an easy pace for 15-30 minutes to promote blood flow and facilitate active recovery.',
            ],
            [
                'name' => 'Fartlek Ride',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Unstructured speed play mixing random bursts of sprinting, moderate pedaling, and easy spinning based on feel throughout the session.',
            ],
            [
                'name' => 'Isometric Hover',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core'],
                'description' => 'Hold a standing position just above the saddle with resistance applied for 15-60 seconds to build isometric leg and core endurance.',
            ],
            [
                'name' => 'Tempo Ride',
                'equipment' => 'Stationary Bike',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Hamstrings', 'Glutes', 'Calves', 'Core'],
                'description' => 'Sustain a challenging but sub-maximal effort just below threshold for 20-40 minutes to improve lactate clearance and time trial performance.',
            ],
        ];

        $sourceDir = public_path('execises/stationary-bike');
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
