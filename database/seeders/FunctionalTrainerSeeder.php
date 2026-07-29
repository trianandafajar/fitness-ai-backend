<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class FunctionalTrainerSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Functional Trainer Chest Press (Neutral Grip)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'],
                'description' => 'Set the pulleys to chest height, stand facing away from the machine, hold a handle in each hand, and press forward to full arm extension, squeezing the chest at lockout.',
            ],
            [
                'name' => 'Functional Trainer Chest Press (Alternating)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps', 'Core'],
                'description' => 'Same setup as chest press but press one arm at a time in a seesaw motion. Challenges core stability and corrects imbalances.',
            ],
            [
                'name' => 'Functional Trainer Chest Fly (High-to-Low)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major (Lower and Middle Fibers)', 'Anterior Deltoids'],
                'description' => 'Set pulleys high, stand in the center, step forward, and bring handles down and together in a hugging arc, squeezing the chest at the bottom.',
            ],
            [
                'name' => 'Functional Trainer Chest Fly (Mid-Level)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major (Middle Fibers)', 'Anterior Deltoids'],
                'description' => 'Set pulleys at shoulder height. Press handles together in a fly motion, keeping a slight bend in the elbows, focusing on mid-chest contraction.',
            ],
            [
                'name' => 'Functional Trainer Chest Fly (Low-to-High)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major (Upper Clavicular Head)', 'Anterior Deltoids'],
                'description' => 'Set pulleys low, pull handles upward and together in an arc, finishing at upper chest height to emphasize the upper chest.',
            ],
            [
                'name' => 'Single-Arm Functional Trainer Chest Fly',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Core'],
                'description' => 'Perform the fly with one arm at a time, keeping the other handle stationary. Challenges obliques to resist rotation.',
            ],
            [
                'name' => 'Functional Trainer Seated Row (V-Grip)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Middle Traps', 'Biceps'],
                'description' => 'Attach a V-bar to the low pulleys, sit on the floor facing the machine, and row the handle to the lower abdomen, squeezing shoulder blades.',
            ],
            [
                'name' => 'Functional Trainer Seated Row (Single-Arm)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps', 'Core'],
                'description' => 'Using a single handle, row one arm at a time while bracing against the machine with the opposite hand. Corrects imbalances.',
            ],
            [
                'name' => 'Functional Trainer Bent-Over Row',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps', 'Erector Spinae'],
                'description' => 'Hinge at the hips, hold handles from low pulleys with a neutral grip, and pull to the sides of the torso, keeping the back flat.',
            ],
            [
                'name' => 'Functional Trainer Lat Pulldown (Wide Grip)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps'],
                'description' => 'Attach a wide bar to the high pulleys, kneel or sit on a bench, and pull the bar to the upper chest, squeezing lats.',
            ],
            [
                'name' => 'Functional Trainer Lat Pulldown (Neutral Grip)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Latissimus Dorsi', 'Biceps', 'Brachialis'],
                'description' => 'Use a parallel grip handle on the high pulley, pull to the chest, keeping elbows close to the body.',
            ],
            [
                'name' => 'Functional Trainer Straight-Arm Pulldown',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Latissimus Dorsi', 'Triceps Long Head'],
                'description' => 'Face the machine with arms straight, pull the handles down in an arc from overhead to the thighs, squeezing the lats.',
            ],
            [
                'name' => 'Functional Trainer Face Pull (External Rotation)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'External Rotators'],
                'description' => 'Set pulleys to upper-chest height, hold ropes with thumbs backward, pull toward the face, separating hands and externally rotating the shoulders.',
            ],
            [
                'name' => 'Functional Trainer Reverse Fly (Rear Delt)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Traps'],
                'description' => 'Cross the handles (left in right hand, right in left), hinge forward, and pull arms out to the sides in a wide arc, squeezing shoulder blades.',
            ],
            [
                'name' => 'Functional Trainer Shoulder Press (Standing)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps'],
                'description' => 'Set pulleys to shoulder height, stand between them, and press the handles directly overhead to full extension.',
            ],
            [
                'name' => 'Functional Trainer Shoulder Press (Seated)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps'],
                'description' => 'Place a bench in the center, sit with back support, and press upward from shoulder height using handles from low or mid pulleys.',
            ],
            [
                'name' => 'Functional Trainer Single-Arm Shoulder Press',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'stability',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Triceps', 'Core'],
                'description' => 'Press one arm overhead while keeping the other handle at shoulder height. Increases core demand and unilateral strength.',
            ],
            [
                'name' => 'Functional Trainer Lateral Raise (Behind Back)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Medial Deltoids', 'Supraspinatus'],
                'description' => 'Stand sideways to the machine, grab the handle behind your body, and raise your arm out to the side. Allows a deeper stretch.',
            ],
            [
                'name' => 'Functional Trainer Front Raise (Rope or Single Handle)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Anterior Deltoids'],
                'description' => 'Face away from a low pulley, handle in hand, raise arm straight forward to shoulder height. Use both arms for symmetry.',
            ],
            [
                'name' => 'Functional Trainer Upright Row (Cable Bar)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Medial Deltoids', 'Upper Traps', 'Biceps'],
                'description' => 'Attach a straight bar to low pulleys, hold with narrow overhand grip, pull the bar up the body to chin height, leading with elbows.',
            ],
            [
                'name' => 'Functional Trainer Triceps Pushdown (Rope)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps (All Heads)'],
                'description' => 'Attach a rope to a high pulley, elbows pinned to sides, push down and flare the rope at the bottom, then return with control.',
            ],
            [
                'name' => 'Functional Trainer Triceps Pushdown (Straight Bar)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps (Lateral Head)'],
                'description' => 'Use a straight bar on the high pulley, hands overhand, press down keeping elbows stationary.',
            ],
            [
                'name' => 'Functional Trainer Overhead Triceps Extension (Rope)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Triceps (Long Head)'],
                'description' => 'Face away from high pulley, rope or bar behind the head, extend arms overhead, focusing on the long head stretch.',
            ],
            [
                'name' => 'Functional Trainer Biceps Curl (Straight Bar)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps', 'Brachialis'],
                'description' => 'Attach a straight bar to low pulleys, grip underhand, curl the bar to the shoulders, keeping elbows fixed at sides.',
            ],
            [
                'name' => 'Functional Trainer Biceps Curl (Rope Hammer)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps', 'Brachialis', 'Brachioradialis'],
                'description' => 'Use a rope on low pulleys, neutral grip, curl while maintaining palms facing each other, engaging the brachialis.',
            ],
            [
                'name' => 'Functional Trainer Biceps Curl (Single-Arm High Cable)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Biceps'],
                'description' => 'Set pulleys high, stand in the center, grab a handle with a supinated grip, curl the hand toward the head. Provides constant tension at peak.',
            ],
            [
                'name' => 'Functional Trainer Hip Abduction',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus'],
                'description' => 'Attach ankle strap to low pulley, stand sideways to the machine, lift the outer leg away against resistance.',
            ],
            [
                'name' => 'Functional Trainer Hip Adduction',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Adductors'],
                'description' => 'With ankle strap on near-leg low pulley, stand sideways and cross the leg in front of the body toward the midline.',
            ],
            [
                'name' => 'Functional Trainer Glute Kickback',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings'],
                'description' => 'Face the machine, ankle strap on low pulley, push the leg straight back with a slight knee bend, squeezing the glute.',
            ],
            [
                'name' => 'Functional Trainer Cable Pull-Through',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'strength',
                'target_muscles' => ['Glutes', 'Hamstrings', 'Erector Spinae'],
                'description' => 'Face away from a low pulley with a rope between legs, hinge at the hips, then drive hips forward to standing, keeping arms straight.',
            ],
            [
                'name' => 'Functional Trainer Woodchop (High-to-Low)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Transverse Abdominis', 'Rectus Abdominis'],
                'description' => 'Set pulley high, stand sideways, grasp handle with both hands, chop diagonally down across the body while rotating the torso.',
            ],
            [
                'name' => 'Functional Trainer Woodchop (Low-to-High)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Transverse Abdominis', 'Rectus Abdominis'],
                'description' => 'Set pulley low, stand sideways, pull the handle upward diagonally across the body, rotating through the core.',
            ],
            [
                'name' => 'Functional Trainer Pallof Press (Anti-Rotation)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'core',
                'target_muscles' => ['Transverse Abdominis', 'Obliques', 'Rectus Abdominis'],
                'description' => 'Set pulley at chest height, stand sideways, hold the handle at your sternum, press it straight out resisting the rotational pull, then return.',
            ],
            [
                'name' => 'Functional Trainer Cable Crunch (Kneeling)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Obliques'],
                'description' => 'Kneel in front of a high pulley holding a rope, curl the torso downward, bringing the elbows toward the knees while contracting the abs.',
            ],
            [
                'name' => 'Functional Trainer Torso Rotation',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Transverse Abdominis'],
                'description' => 'Stand sideways to the machine at mid-chest height, hold the handle with arms extended, rotate the torso away, keeping hips stable.',
            ],
            [
                'name' => 'Functional Trainer Lateral Lunge with Row',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'functional',
                'target_muscles' => ['Quadriceps', 'Glutes', 'Latissimus Dorsi', 'Biceps', 'Core'],
                'description' => 'Set one pulley low, hold the handle with the opposite hand, step into a lateral lunge while simultaneously pulling the handle to your side. Combines lower and upper body.',
            ],
            [
                'name' => 'Functional Trainer Split Stance Chop',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'functional',
                'target_muscles' => ['Glutes', 'Quadriceps', 'Obliques', 'Shoulders'],
                'description' => 'Take a split stance, hold a single handle from a high pulley, and perform a chopping motion down and across the body while lunging slightly, integrating full body.',
            ],
            [
                'name' => 'Functional Trainer Single-Leg Romanian Deadlift (with Cable)',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'stability',
                'target_muscles' => ['Hamstrings', 'Glutes', 'Core'],
                'description' => 'Hold a handle from a low pulley in one hand, stand on the opposite leg, hinge forward while extending the free leg behind, then return to standing.',
            ],
            [
                'name' => 'Functional Trainer Rotational Shoulder Press',
                'equipment' => 'Functional Trainer',
                'category_slug' => 'functional',
                'target_muscles' => ['Anterior Deltoids', 'Medial Deltoids', 'Obliques', 'Core'],
                'description' => 'Set one pulley at shoulder height, stand sideways, press the handle overhead while rotating the torso toward the working side, engaging the core dynamically.',
            ],
        ];

        foreach ($exercises as $data) {
            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;

            Exercise::create($data);
        }
    }
}
