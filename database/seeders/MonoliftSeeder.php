<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

class MonoliftSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Barbell Back Squat (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Erector Spinae', 'Core'],
                'description' => 'Set the monolift hooks to just below your standing shoulder height. Step under the bar, unrack by standing up straight, the hooks swing away. No walkout needed, preserving energy and positioning for a heavy squat.',
            ],
            [
                'name' => 'Front Squat (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Upper Back'],
                'description' => 'Rest the barbell on front delts, unrack from monolift hooks that swing clear automatically. Eliminates the walkout, allowing absolute focus on an upright torso and depth under maximal loads.',
            ],
            [
                'name' => 'Box Squat (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Adductors', 'Erector Spinae'],
                'description' => 'Position a box behind you, unrack directly above it using the monolift. No walkback means perfect alignment every rep, ideal for heavy accommodating resistance with bands or chains.',
            ],
            [
                'name' => 'Safety Bar Squat (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Upper Back', 'Core'],
                'description' => 'Use a Safety Squat Bar (SSB) in the monolift. Unrack vertically without a walkout, reducing spinal loading and allowing safer, heavier attempts with the cambered bar.',
            ],
            [
                'name' => 'Cambered Bar Squat (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'strength',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Erector Spinae', 'Core'],
                'description' => 'With a cambered bar in the monolift, unrack and squat. The suspended weight and no walkout combine to challenge stability and eliminate setup energy leaks.',
            ],
            [
                'name' => 'Band-Resisted Squat (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Attach bands to the monolift base and barbell, unrack vertically. No walkout prevents band tension from pulling you forward, ensuring a stable, accelerating squat.',
            ],
            [
                'name' => 'Chain-Resisted Squat (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'power',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'],
                'description' => 'Drape chains over the barbell sleeves, unrack from the monolift. The hooks swing clear so you can immediately start the descent, maintaining chain rhythm and overload at lockout.',
            ],
            [
                'name' => 'Flat Barbell Bench Press (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Lie on a flat bench set exactly under the monolift hooks, unrack by pressing the bar straight up, the hooks retract. Maintains perfect scapular position and eliminates the awkward hand-off.',
            ],
            [
                'name' => 'Incline Barbell Bench Press (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'strength',
                'target_muscles' => ['Upper Pectoralis', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Place an incline bench under the monolift, unrack with a vertical press. The hooks swing away, preserving your retracted shoulders and allowing a tight arch from rep one.',
            ],
            [
                'name' => 'Close-Grip Bench Press (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Inner Pectoralis', 'Anterior Deltoids'],
                'description' => 'Set a shoulder-width grip, unrack straight up. The monolift prevents losing tightness when taking the bar out, crucial for maximizing tricep overload without shoulder rotation.',
            ],
            [
                'name' => 'Reverse-Band Bench Press (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'power',
                'target_muscles' => ['Pectoralis Major', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Loop bands from the top of the monolift to the barbell, reducing weight at the chest and overload at lockout. The monolift allows a clean unrack without wrestling the bands.',
            ],
            [
                'name' => 'Chain Bench Press (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'power',
                'target_muscles' => ['Pectoralis Major', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Suspend chains from the barbell, unrack directly. The hooks retract so the chains don\'t swing or pinch, ensuring stable descending resistance.',
            ],
            [
                'name' => 'Board Press (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Place boards on the chest, unrack straight up from the monolift. No hand-off disturbance means you can immediately press through the sticking point with perfect tricep leverage.',
            ],
            [
                'name' => 'Dead Bench Press (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'power',
                'target_muscles' => ['Pectoralis Major', 'Triceps', 'Anterior Deltoids'],
                'description' => 'Start with the barbell resting on the chest or pins, press from a dead stop. Monolift hooks hold the initial weight, then retract, allowing a self-start without a liftoff.',
            ],
            [
                'name' => 'Standing Barbell Overhead Press (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Core'],
                'description' => 'Set the monolift at shoulder height, unrack the barbell vertically, the hooks swing clear. No walkout for strict pressing means less core energy wasted and a safer failure path.',
            ],
            [
                'name' => 'Push Press (Monolift)',
                'equipment' => 'Monolift',
                'category_slug' => 'power',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Quadriceps', 'Core'],
                'description' => 'Unrack from shoulder height, dip and drive explosively. The monolift eliminates the walkout, letting you direct maximum leg power straight into the bar.',
            ],
            [
                'name' => 'Pin Press (Monolift Overload)',
                'equipment' => 'Monolift',
                'category_slug' => 'strength',
                'target_muscles' => ['Triceps', 'Anterior Deltoids'],
                'description' => 'Set the monolift hooks just above head height, press the bar from a dead stop at the sticking point. The hooks retract allowing a full lockout without a liftoff.',
            ],
        ];
        $sourceDir = public_path('execises/monolift');
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
