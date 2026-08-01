<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

class CableCrossoverMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'High Cable Crossover (Chest)',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major (Lower and Middle Fibers)', 'Anterior Deltoids'],
                'description' => 'Set pulleys high, stand between them, step forward into a split stance, and with a slight forward lean, bring the handles down and together in a hugging arc. Squeeze the chest at the bottom, then return with control.',
            ],
            [
                'name' => 'Mid Cable Crossover (Chest)',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major (Middle Fibers)', 'Anterior Deltoids'],
                'description' => 'Set pulleys at shoulder height. Stand centrally, press the handles straight forward together in a fly motion, squeezing the mid-chest at full extension.',
            ],
            [
                'name' => 'Low Cable Crossover (Upper Chest)',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major (Upper Clavicular Head)', 'Anterior Deltoids'],
                'description' => 'Set pulleys low. Stand between them, and with palms facing forward/upward, pull the handles upward and together in an arc finishing at upper chest level to emphasize the upper pecs.',
            ],
            [
                'name' => 'Single-Arm High Cable Fly',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Core'],
                'description' => 'Using one high pulley, step out to the side, and with a slightly bent elbow, bring the handle across your body in a fly motion. Improves chest asymmetry and engages the obliques.',
            ],
            [
                'name' => 'Single-Arm Low Cable Fly',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major (Upper)', 'Anterior Deltoids', 'Core'],
                'description' => 'Using one low pulley, bring the handle upward and across the body to target the upper chest on one side while the core resists rotation.',
            ],
            [
                'name' => 'Cable Rear Delt Fly (Reverse Fly)',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Trapezius', 'Infraspinatus'],
                'description' => 'Set pulleys high, cross the cables in front of you (right handle in left hand, left handle in right hand), pull the handles outward and backward in a wide arc, squeezing shoulder blades.',
            ],
            [
                'name' => 'Cable Lateral Raise',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Medial Deltoids', 'Supraspinatus'],
                'description' => 'Stand sideways next to a low pulley, grab the handle with the far hand, and raise the arm out to the side to shoulder height. Can be done behind the back for greater range of motion.',
            ],
            [
                'name' => 'Cable Front Raise',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Anterior Deltoids', 'Pectoralis Minor'],
                'description' => 'Face away from a low pulley, handle in one hand, and raise the arm straight forward to shoulder height. Can use both hands with a straight bar attached.',
            ],
            [
                'name' => 'Cable Upright Row',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Medial Deltoids', 'Upper Trapezius', 'Biceps'],
                'description' => 'Attach a straight bar to a low pulley, grasp it with a narrow overhand grip, and pull the bar up along the body to chin height, leading with the elbows.',
            ],
            [
                'name' => 'Cable Triceps Pushdown (Straight Bar)',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps (Lateral Head)', 'Triceps (Medial Head)'],
                'description' => 'Attach a straight bar to a high pulley, grasp overhand, keep elbows pinned to sides, and press the bar down to full arm extension, then return with control.',
            ],
            [
                'name' => 'Cable Triceps Pushdown (Rope)',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps (All Heads)', 'Forearms'],
                'description' => 'Attach a rope to a high pulley, grasp ends, keep elbows stationary, and push down while flaring the rope at the bottom for a strong peak contraction.',
            ],
            [
                'name' => 'Overhead Cable Triceps Extension',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps (Long Head)', 'Triceps (All Heads)'],
                'description' => 'Face away from a high pulley with a rope or bar, arms bent behind head, then extend arms overhead. Hits the long head of the triceps deeply.',
            ],
            [
                'name' => 'Cable Biceps Curl (Straight Bar)',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps', 'Brachialis'],
                'description' => 'Attach a straight bar to a low pulley, grasp with an underhand grip, keep elbows fixed, and curl the bar up to the shoulders.',
            ],
            [
                'name' => 'Cable Biceps Curl (Rope Hammer Curl)',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps', 'Brachialis', 'Brachioradialis'],
                'description' => 'Use a rope on a low pulley, palms facing each other (neutral grip), curl up squeezing the biceps while maintaining a neutral wrist position.',
            ],
            [
                'name' => 'High Cable Single-Arm Biceps Curl',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps', 'Brachialis'],
                'description' => 'Stand between the pulleys set high, grab one handle with a supinated grip, and curl the hand toward your head, providing constant tension at peak contraction.',
            ],
            [
                'name' => 'Cable Face Pull',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'External Rotators (Infraspinatus, Teres Minor)'],
                'description' => 'Set a pulley to upper-chest height, attach a rope, grasp it with thumbs backward, and pull the rope toward the face, separating the hands and externally rotating the shoulders.',
            ],
            [
                'name' => 'Cable Woodchop (High-to-Low)',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Transverse Abdominis', 'Rectus Abdominis'],
                'description' => 'Set a pulley high, stand sideways, grasp the handle with both hands, and chop diagonally downward across the body while rotating the torso and pivoting the back foot.',
            ],
            [
                'name' => 'Cable Woodchop (Low-to-High)',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Transverse Abdominis', 'Rectus Abdominis'],
                'description' => 'Set a pulley low, stand sideways, grasp the handle, and pull upward diagonally across the body, rotating through the core.',
            ],
            [
                'name' => 'Pallof Press',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Transverse Abdominis', 'Obliques', 'Rectus Abdominis', 'Glutes'],
                'description' => 'Set the pulley at chest height, stand sideways, hold the handle with both hands at your sternum, press it straight out, resisting the rotational pull, then return.',
            ],
            [
                'name' => 'Cable Hip Abduction',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus'],
                'description' => 'Attach an ankle strap to the low pulley, stand sideways, and lift the outer leg away from the body against resistance.',
            ],
            [
                'name' => 'Cable Hip Adduction',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Adductors (Inner Thigh)'],
                'description' => 'With an ankle strap on the near-leg low pulley, stand sideways and cross the leg in front of the body, pulling toward the midline.',
            ],
            [
                'name' => 'Cable Glute Kickback',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings'],
                'description' => 'Face the machine, attach an ankle strap to a low pulley, and while keeping the knee slightly bent, push the leg straight back, squeezing the glute.',
            ],
            [
                'name' => 'Cable Straight-Arm Pulldown',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps Long Head'],
                'description' => 'Attach a straight bar to the high pulley, face the machine, keep arms nearly straight, and pull the bar down in an arc to the thighs, squeezing the lats.',
            ],
            [
                'name' => 'Cable Pull-Through',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae'],
                'description' => 'Face away from a low pulley with a rope between the legs, hinge at the hips to push the hips back, then drive the hips forward explosively to standing, keeping arms straight.',
            ],
            [
                'name' => 'Cable Crunch',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'Kneel in front of a high pulley holding a rope, and curl the torso down by contracting the abs, bringing the elbows toward the knees.',
            ],
            [
                'name' => 'Cable Torso Twist',
                'equipment' => 'Cable Crossover Machine',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Transverse Abdominis'],
                'description' => 'Stand sideways to the machine at mid-chest height, hold the handle with arms extended, and rotate the torso away, keeping the hips stationary.',
            ],
        ];

        $sourceDir = public_path('execises/cable-crossover-machine');
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
