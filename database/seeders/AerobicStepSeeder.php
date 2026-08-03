<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AerobicStepSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Basic Step-Up', 'equipment' => 'Aerobic Step', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'], 'description' => 'Step up onto the platform with one foot, then the other, and step back down in the same sequence. Maintain an upright posture and a steady rhythm.'],
            ['name' => 'Alternating Step-Up', 'equipment' => 'Aerobic Step', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Step up with one foot, bring the opposite knee up toward the chest, then step down and alternate legs. Adds a dynamic hip flexor and balance component.'],
            ['name' => 'Lateral Step-Up', 'equipment' => 'Aerobic Step', 'category_slug' => 'cardio', 'target_muscles' => ['Gluteus Medius', 'Adductors', 'Quadriceps', 'Glutes', 'Core'], 'description' => 'Stand sideways to the step. Step onto it with the near leg, bring the other foot up, then step down on the opposite side. Focuses on lateral hip stability.'],
            ['name' => 'Crossover Step-Up (Grapevine)', 'equipment' => 'Aerobic Step', 'category_slug' => 'coordination', 'target_muscles' => ['Gluteus Medius', 'Adductors', 'Quadriceps', 'Core'], 'description' => 'Stand sideways, cross the outside leg over to step onto the platform, then bring the other foot up. Step down and repeat in a grapevine pattern.'],
            ['name' => 'Tap Up (Corner-to-Corner)', 'equipment' => 'Aerobic Step', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Calves', 'Core'], 'description' => 'Face the corner of the step. Tap one foot on top, switch feet quickly, alternating taps. Fast-paced, low-impact cardio.'],
            ['name' => 'Repeater Knee Drive (Triple Knee)', 'equipment' => 'Aerobic Step', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hip Flexors', 'Core'], 'description' => 'Step up with one foot and drive the opposite knee up three times before stepping back down. Focuses on hip flexor strength and single-leg stability.'],
            ['name' => 'Lunge on Step (Off the Back)', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Stand on top of the step, step one foot backward off it into a lunge, lowering the rear knee. Drive back up onto the step. Unilateral leg strength.'],
            ['name' => 'Forward Lunge on Step', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Stand facing away from the step, place one foot behind you on the step. Lower into a lunge, keeping the front knee over the ankle. Return to standing.'],
            ['name' => 'Lateral Lunge on Step', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Place one foot on the step, the other on the floor wide. Lunge toward the foot on the floor by bending that knee, keeping the step leg straight. Targets inner thighs.'],
            ['name' => 'Bulgarian Split Squat (Back Foot on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Place the rear foot on the step behind you, front foot forward. Squat down until the front thigh is parallel, then drive up. Excellent unilateral leg builder.'],
            ['name' => 'Step Squat Jump (Power Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'], 'description' => 'Stand facing the step, squat slightly, then jump up onto the step with both feet, landing softly. Step down and repeat. Builds explosive lower body power.'],
            ['name' => 'Box Jump (onto Aerobic Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'], 'description' => 'Jump from the floor onto the step with both feet, absorbing the landing with soft knees. Can stack risers to increase height.'],
            ['name' => 'Depth Jump (off Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Calves', 'Core'], 'description' => 'Step off the platform, land on the floor, and immediately explode into a vertical jump or onto another step. Reactive plyometric training.'],
            ['name' => 'Decline Push-Up (Feet on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Upper Pectorals', 'Anterior Deltoids', 'Triceps', 'Core'], 'description' => 'Place feet on the step, hands on the floor wider than shoulders. Perform push-ups, lowering the chest to the floor. The decline targets the upper chest.'],
            ['name' => 'Incline Push-Up (Hands on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Lower Pectorals', 'Anterior Deltoids', 'Triceps', 'Core'], 'description' => 'Place hands on the step, feet on the floor. Perform push-ups at an incline. Easier than standard push-ups, targets the lower chest.'],
            ['name' => 'Triceps Dip (on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Anterior Deltoids', 'Pectorals'], 'description' => 'Sit on the edge of the step, hands next to hips. Slide off and lower the body by bending the elbows to 90°, then press back up. Can add a second step for feet elevation.'],
            ['name' => 'Hip Thrust (Shoulders on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core'], 'description' => 'Sit on the floor with upper back resting against the step edge. Place weight across the hips, drive through the heels to extend the hips upward.'],
            ['name' => 'Glute Bridge (Feet on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core'], 'description' => 'Lie on the back, place the feet flat on top of the step. Drive through the heels to lift the hips, increasing the range of motion.'],
            ['name' => 'Single-Leg Glute Bridge (Feet on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings (unilateral)', 'Core'], 'description' => 'Perform a glute bridge with one foot on the step, the other leg extended straight. Unilateral hip extension and core stability.'],
            ['name' => 'Elevated Plank (Forearms on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'core', 'target_muscles' => ['Transverse Abdominis', 'Rectus Abdominis', 'Obliques', 'Shoulders'], 'description' => 'Place forearms on the step, extend legs straight back into a plank. Hold, keeping the body in a straight line.'],
            ['name' => 'Decline Plank (Feet on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'core', 'target_muscles' => ['Upper Rectus Abdominis', 'Transverse Abdominis', 'Obliques', 'Shoulders'], 'description' => 'Place feet on the step and hands on the floor in a plank. The decline angle intensifies upper ab activation.'],
            ['name' => 'Mountain Climbers (Hands on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Hip Flexors', 'Core', 'Shoulders'], 'description' => 'Place hands on the step in a plank position. Drive knees alternately toward the chest as fast as possible.'],
            ['name' => 'Step Sprints (Foot Taps)', 'equipment' => 'Aerobic Step', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Hip Flexors', 'Calves', 'Core'], 'description' => 'Quickly alternate tapping the top of the step with each foot, as if sprinting in place. Low impact, high-intensity cardio.'],
            ['name' => 'Lateral Shuffle Taps', 'equipment' => 'Aerobic Step', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Glutes', 'Adductors', 'Abductors', 'Calves', 'Core'], 'description' => 'Stand beside the step, tap one foot on top, shuffle to the other side and tap with the other foot. Continuous lateral movement.'],
            ['name' => 'Calf Raise (Standing on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'isolation', 'target_muscles' => ['Gastrocnemius', 'Soleus'], 'description' => 'Stand with the balls of the feet on the edge of the step, heels hanging off. Raise the heels as high as possible, then lower for a deep stretch.'],
            ['name' => 'Single-Leg Calf Raise (on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'isolation', 'target_muscles' => ['Gastrocnemius', 'Soleus (unilateral)'], 'description' => 'Perform the calf raise on one leg, holding onto a wall for balance. Increases load on each calf independently.'],
            ['name' => 'Step-Up with Biceps Curl', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Biceps', 'Core'], 'description' => 'Hold dumbbells, step onto the platform while performing a biceps curl simultaneously. Combines lower and upper body.'],
            ['name' => 'Step-Up with Shoulder Press', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Shoulders', 'Triceps', 'Core'], 'description' => 'Hold dumbbells at shoulders, step up and press the dumbbells overhead at the top. Full-body compound exercise.'],
            ['name' => 'Step-Up with Lateral Raise', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Medial Deltoids', 'Core'], 'description' => 'Hold dumbbells at sides, step up and simultaneously raise the arms to the side. Challenges coordination and balance.'],
            ['name' => 'Hamstring Curl on Step (Slider)', 'equipment' => 'Aerobic Step', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core'], 'description' => 'Lie on the back, heels on the step. Lift hips and curl the step toward you by bending the knees (if step slides), or use it for an elevated bridge curl.'],
            ['name' => 'Kneeling Push-Up to Plank (on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'core', 'target_muscles' => ['Pectorals', 'Triceps', 'Core', 'Shoulders'], 'description' => 'Start in a kneeling plank with hands on the step. Perform a push-up, then transition to a full plank by extending the legs back.'],
            ['name' => 'Toe Taps Around the Step', 'equipment' => 'Aerobic Step', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Hip Flexors', 'Calves', 'Core'], 'description' => 'Facing the step, quickly tap the toes on top, alternating feet, moving around the step in a circle. Increases agility and heart rate.'],
            ['name' => 'Overhead Squat (Standing on Step)', 'equipment' => 'Aerobic Step', 'category_slug' => 'mobility', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Shoulders', 'Core'], 'description' => 'Stand on the step, hold a light bar or band overhead, and squat down while maintaining an upright torso and stable overhead position.'],
        ];

        $sourceDir = public_path('execises/aerobic-step');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $data['image'] = Storage::disk('public')->putFile('exercises', new File($sourceFile));
            }

            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categories[$data['category_slug']],
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
                'image' => $data['image'] ?? null,
            ]);
        }
    }
}
