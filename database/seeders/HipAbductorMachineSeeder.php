<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class HipAbductorMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Standard Seated Hip Abduction',
                'equipment' => 'Hip Abductor Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'Tensor Fasciae Latae', 'Gluteus Maximus (upper fibers)'],
                'description' => 'Sit with back against pad, place outer thighs against the pads, press legs outward as far as possible, squeeze glutes, then return with control.',
            ],
            [
                'name' => 'Leaning Forward Hip Abduction',
                'equipment' => 'Hip Abductor Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Medius (posterior fibers)', 'Gluteus Maximus (upper)', 'Piriformis'],
                'description' => 'Lean your torso forward about 45 degrees while seated. Press outward to emphasize the posterior glute medius and deeper hip rotators.',
            ],
            [
                'name' => 'Leaning Back Hip Abduction',
                'equipment' => 'Hip Abductor Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Tensor Fasciae Latae', 'Gluteus Medius (anterior fibers)'],
                'description' => 'Lean slightly backward while keeping the back against the pad. This shifts activation to the front of the hip and the TFL.',
            ],
            [
                'name' => 'Single-Leg Hip Abduction',
                'equipment' => 'Hip Abductor Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'Tensor Fasciae Latae'],
                'description' => 'Press outward with one leg at a time, keeping the other leg stationary. Corrects imbalances and isolates each glute medius independently.',
            ],
            [
                'name' => 'Pulse Hip Abduction',
                'equipment' => 'Hip Abductor Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus'],
                'description' => 'Press legs fully outward, then perform small, rapid pulses at the peak contraction without returning to the start, increasing metabolic stress.',
            ],
            [
                'name' => 'Isometric Hold Hip Abduction',
                'equipment' => 'Hip Abductor Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'Core'],
                'description' => 'Press legs to the fully abducted position and hold for 10-30 seconds, engaging the glutes and stabilizers.',
            ],
            [
                'name' => 'Eccentric-Emphasis Hip Abduction',
                'equipment' => 'Hip Abductor Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus'],
                'description' => 'Press outward quickly, then take 3-5 seconds to slowly return to the starting position, overloading the negative phase.',
            ],
            [
                'name' => 'Tempo Hip Abduction (3-1-3)',
                'equipment' => 'Hip Abductor Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'Tensor Fasciae Latae'],
                'description' => 'Take 3 seconds to press out, hold for 1 second, then 3 seconds to return. Increases time under tension and control.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Hip Abduction',
                'equipment' => 'Hip Abductor Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus'],
                'description' => 'Only work from the mid-point of the range to the fully abducted position, keeping constant tension on the outer glutes.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Hip Abduction',
                'equipment' => 'Hip Abductor Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus'],
                'description' => 'Move from the start position to the mid-point only, emphasizing the initial activation and stretch of the glute medius.',
            ],
            [
                'name' => '21s Hip Abduction',
                'equipment' => 'Hip Abductor Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus'],
                'description' => 'Perform 7 bottom-half reps, 7 top-half reps, and 7 full-range reps back-to-back with no rest for an intense hip pump.',
            ],
        ];

        $sourceDir = public_path('execises/hip-abductor-machine');
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
