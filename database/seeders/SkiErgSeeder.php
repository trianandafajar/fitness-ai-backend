<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class SkiErgSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Standard Double-Pole',
                'equipment' => 'Ski Erg',
                'category_slug' => 'cardio',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Deltoids', 'Abdominals', 'Erector Spinae', 'Hip Flexors', 'Hamstrings', 'Glutes'],
                'description' => 'Standing with feet hip-width, hinge slightly forward, pull handles down powerfully while engaging core and extending hips, then return with control.',
            ],
            [
                'name' => 'Alternating Single-Arm Pull',
                'equipment' => 'Ski Erg',
                'category_slug' => 'coordination',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Deltoids', 'Obliques', 'Abdominals', 'Hip Flexors'],
                'description' => 'Pull one handle at a time in a reciprocal pattern, mimicking classic skiing diagonal stride, targeting rotational core and unilateral upper body strength.',
            ],
            [
                'name' => 'Double-Pole with Deep Hinge',
                'equipment' => 'Ski Erg',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Erector Spinae', 'Glutes', 'Hamstrings', 'Abdominals'],
                'description' => 'Exaggerate the forward hinge at the hips, reaching handles high, then forcefully crunch down pulling handles past hips, emphasizing back and posterior chain.',
            ],
            [
                'name' => 'Double-Pole with Squat',
                'equipment' => 'Ski Erg',
                'category_slug' => 'cardio',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Latissimus Dorsi', 'Triceps', 'Core'],
                'description' => 'Incorporate a full squat as you reach up, then drive up from the squat while pulling down, blending lower-body push with upper-body pull.',
            ],
            [
                'name' => 'Seated Double-Pole',
                'equipment' => 'Ski Erg',
                'category_slug' => 'isolation',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Deltoids', 'Abdominals', 'Biceps'],
                'description' => 'Sit on a box or bench facing the machine, feet grounded, isolate upper body pulling without leg drive, focusing purely on lat and arm power.',
            ],
            [
                'name' => 'Staggered Stance Double-Pole',
                'equipment' => 'Ski Erg',
                'category_slug' => 'cardio',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Latissimus Dorsi', 'Triceps', 'Core'],
                'description' => 'Adopt a split stance with one foot forward, maintain stance while poling, increasing glute and hamstring involvement on the forward leg.',
            ],
            [
                'name' => 'Single-Leg Balance Double-Pole',
                'equipment' => 'Ski Erg',
                'category_slug' => 'stability',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Deltoids', 'Core', 'Gluteus Medius', 'Calves'],
                'description' => 'Balance on one leg while double-poling, engaging stabilizers in the standing leg and core to maintain balance throughout the movement.',
            ],
            [
                'name' => 'Reverse Grip Double-Pole',
                'equipment' => 'Ski Erg',
                'category_slug' => 'strength',
                'target_muscles' => ['Biceps', 'Forearms', 'Latissimus Dorsi', 'Rear Deltoids', 'Core'],
                'description' => 'Hold handles with palms facing up, pull down keeping elbows close, emphasizing biceps and underhand pulling muscles.',
            ],
            [
                'name' => 'Wide Grip Double-Pole',
                'equipment' => 'Ski Erg',
                'category_slug' => 'strength',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Trapezius', 'Latissimus Dorsi', 'Triceps'],
                'description' => 'Hold handles at their widest point, pull down and out slightly, targeting upper back and rear shoulders more than standard grip.',
            ],
            [
                'name' => 'Sprint Intervals',
                'equipment' => 'Ski Erg',
                'category_slug' => 'interval',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Deltoids', 'Abdominals', 'Glutes', 'Hamstrings', 'Quadriceps'],
                'description' => 'Short bursts of maximum effort poling (10–30 seconds) alternated with rest, developing anaerobic power and high stroke rate capacity.',
            ],
            [
                'name' => 'Tabata',
                'equipment' => 'Ski Erg',
                'category_slug' => 'interval',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Deltoids', 'Abdominals', 'Obliques', 'Erector Spinae'],
                'description' => '20 seconds all-out double-poling, 10 seconds rest, repeated 8 times, pushing cardiovascular and muscular endurance to the limit.',
            ],
            [
                'name' => 'EMOM Sprints',
                'equipment' => 'Ski Erg',
                'category_slug' => 'interval',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Deltoids', 'Abdominals', 'Glutes', 'Hamstrings'],
                'description' => 'Every minute on the minute, perform a 15-second maximum calorie sprint, using the remaining time for active recovery.',
            ],
            [
                'name' => 'Pyramid Intervals',
                'equipment' => 'Ski Erg',
                'category_slug' => 'interval',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Deltoids', 'Core', 'Hip Flexors'],
                'description' => 'Work intervals increase then decrease (e.g., 30s, 45s, 60s, 45s, 30s) with rest periods, building and sustaining high intensity.',
            ],
            [
                'name' => 'Steady State Endurance',
                'equipment' => 'Ski Erg',
                'category_slug' => 'endurance',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Deltoids', 'Abdominals', 'Erector Spinae', 'Glutes'],
                'description' => 'Continuous poling at a moderate, sustainable pace for 20–40 minutes to build aerobic base and muscular stamina.',
            ],
            [
                'name' => 'Recovery Pole',
                'equipment' => 'Ski Erg',
                'category_slug' => 'recovery',
                'target_muscles' => ['Latissimus Dorsi', 'Deltoids', 'Triceps', 'Core'],
                'description' => 'Very light resistance, slow, easy poling at low stroke rate to promote blood flow, aid active recovery, and loosen the upper body.',
            ],
            [
                'name' => 'Pause Drill',
                'equipment' => 'Ski Erg',
                'category_slug' => 'technique',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Core', 'Erector Spinae'],
                'description' => 'Pause at the fully extended position (arms overhead) or at the finish (hands at hips) to reinforce proper body positioning and core engagement.',
            ],
            [
                'name' => 'Slow Eccentric Pole',
                'equipment' => 'Ski Erg',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Deltoids', 'Abdominals', 'Biceps'],
                'description' => 'Pull down quickly, then resist the return phase over 3–4 seconds, overloading muscles eccentrically and increasing time under tension.',
            ],
            [
                'name' => 'Isometric Hold Pull',
                'equipment' => 'Ski Erg',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Core', 'Forearms'],
                'description' => 'Pull handles down to hip level and hold statically for time (10–30 seconds), building grip and pulling endurance.',
            ],
        ];

        $sourceDir = public_path('excieses/ski-erg');
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
