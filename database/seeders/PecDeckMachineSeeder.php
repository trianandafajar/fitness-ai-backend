<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PecDeckMachineSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            [
                'name' => 'Standard Pec Deck Fly (Chest)',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Sit with back flat, forearms resting on pads, elbows bent 90°. Squeeze elbows together in an arc, contracting the chest, then slowly return to the start with a stretch.',
            ],
            [
                'name' => 'Standard Reverse Pec Deck Fly (Rear Delt)',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rear Deltoids', 'Infraspinatus', 'Teres Minor', 'Rhomboids', 'Middle Trapezius'],
                'description' => 'Face the machine, grip handles with arms straight or slightly bent. Open arms out to the sides, squeezing shoulder blades together, then return with control.',
            ],
            [
                'name' => 'Single-Arm Pec Deck Fly (Chest)',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major (unilateral)', 'Anterior Deltoids', 'Core'],
                'description' => 'Perform the chest fly with one arm while the other stays stationary. Corrects imbalances and engages obliques for anti-rotation.',
            ],
            [
                'name' => 'Single-Arm Reverse Pec Deck Fly (Rear Delt)',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rear Deltoids (unilateral)', 'Rhomboids', 'Core'],
                'description' => 'Execute the rear delt fly one arm at a time. Isolates each posterior shoulder for balanced development.',
            ],
            [
                'name' => 'Alternating Pec Deck Fly (Chest)',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Core'],
                'description' => 'Squeeze elbows together one arm after the other in a alternating rhythm. Increases time under tension per side.',
            ],
            [
                'name' => 'Pec Deck Fly with Pause (Chest)',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Bring pads together and hold peak contraction for 1–2 seconds before the eccentric. Intensifies mind-muscle connection.',
            ],
            [
                'name' => 'Reverse Pec Deck Fly with Pause (Rear Delt)',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Traps'],
                'description' => 'At the fully retracted position, pause and squeeze shoulder blades for 1–2 seconds before returning.',
            ],
            [
                'name' => 'Eccentric-Emphasis Pec Deck Fly (Chest)',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Use a fast concentric, then resist the return over 3–5 seconds to overload the negative phase.',
            ],
            [
                'name' => 'Eccentric-Emphasis Reverse Pec Deck Fly (Rear Delt)',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Infraspinatus'],
                'description' => 'Pull back quickly, then control the forward movement slowly (3–5 sec). Maximizes eccentric posterior shoulder loading.',
            ],
            [
                'name' => 'Tempo Pec Deck Fly (3-1-3)',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids'],
                'description' => '3 seconds concentric, 1-second squeeze, 3 seconds eccentric. Maximizes time under tension for chest growth.',
            ],
            [
                'name' => 'Tempo Reverse Pec Deck Fly (3-1-3)',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Traps'],
                'description' => '3 seconds to pull back, hold for 1 second, 3 seconds to return. Enhances rear delt endurance and size.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Pec Deck Fly',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major (inner fibers)'],
                'description' => 'Move only from the mid-point to full pad contact, maintaining constant tension on the inner chest.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Pec Deck Fly',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major (stretch emphasis)'],
                'description' => 'Work from the stretched position to the mid-point, focusing on the deep chest stretch and initial contraction.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Reverse Pec Deck Fly',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids'],
                'description' => 'Only perform the final portion of the pull, squeezing the shoulder blades together. Targets peak contraction.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Reverse Pec Deck Fly',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rear Deltoids', 'Infraspinatus'],
                'description' => 'Start from the front and pull to the midpoint, emphasizing the rear delt stretch and initial activation.',
            ],
            [
                'name' => '21s Pec Deck Fly',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major'],
                'description' => '7 bottom-half reps, 7 top-half reps, then 7 full-range reps without rest. An intense metabolic stress technique for the chest.',
            ],
            [
                'name' => '21s Reverse Pec Deck Fly',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids'],
                'description' => '7 bottom-half, 7 top-half, 7 full reps sequentially with no break. Fully exhausts the posterior shoulder.',
            ],
            [
                'name' => 'Pulse Pec Deck Fly',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Pectoralis Major'],
                'description' => 'At the contracted position, perform small pulsing movements without letting the pads separate. Maintains continuous tension.',
            ],
            [
                'name' => 'Pulse Reverse Pec Deck Fly',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids'],
                'description' => 'Pulse in the fully retracted position, moving only a few inches, to burn out the rear delts.',
            ],
            [
                'name' => 'Isometric Hold Pec Deck Fly (Chest)',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids'],
                'description' => 'Bring pads together and hold the peak contraction for 10–30 seconds. Builds static strength and endurance.',
            ],
            [
                'name' => 'Isometric Hold Reverse Pec Deck Fly (Rear Delt)',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'strength',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Traps'],
                'description' => 'Hold the fully retracted position for time, engaging the entire upper back and rear shoulders.',
            ],
            [
                'name' => 'Pronated Grip Reverse Pec Deck Fly',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Middle Traps'],
                'description' => 'Grasp handles with palms facing down (pronated). Emphasizes the rhomboids and middle traps alongside rear delts.',
            ],
            [
                'name' => 'Neutral Grip Reverse Pec Deck Fly',
                'equipment' => 'Pec Deck / Butterfly Machine',
                'category_slug' => 'isolation',
                'target_muscles' => ['Rear Deltoids', 'Infraspinatus', 'Teres Minor'],
                'description' => 'Grip handles with palms facing each other (if design allows). Places the shoulder in external rotation, targeting the rotator cuff muscles more.',
            ],
        ];

        $sourceDir = public_path('exercises/pec_deck_machine');
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