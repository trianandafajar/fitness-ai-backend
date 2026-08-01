<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class GluteHamDeveloperSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            [
                'name' => 'Glute-Ham Raise (GHR)',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings (Biceps Femoris, Semitendinosus, Semimembranosus)', 'Erector Spinae', 'Core'],
                'description' => 'Secure ankles between the rollers with knees just behind the pad. Keeping the body straight from knees to shoulders, lower the torso by extending the knees, then forcefully contract the hamstrings and glutes to pull the body back to the upright position.',
            ],
            [
                'name' => 'Eccentric Glute-Ham Raise (Nordic Curl Emphasis)',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'strength',
                'target_muscles' => ['Hamstrings', 'Gluteus Maximus', 'Erector Spinae'],
                'description' => 'Start in the top position. Lower yourself as slowly as possible (4-5 seconds), resisting gravity by squeezing the hamstrings. Use your hands to push off the pad at the bottom and return to the start, emphasizing the eccentric phase only.',
            ],
            [
                'name' => 'Band-Assisted Glute-Ham Raise',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'Attach a resistance band from the top of the GHD to your chest or under your arms. The band assists the concentric phase, allowing you to complete full range of motion reps if you lack strength for bodyweight GHRs.',
            ],
            [
                'name' => 'Weighted Glute-Ham Raise',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Erector Spinae', 'Core'],
                'description' => 'Hold a weight plate or dumbbell against your chest while performing the standard GHR. Increases resistance to build posterior chain strength and hypertrophy.',
            ],
            [
                'name' => 'Pause Glute-Ham Raise',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'At the top of the movement (body fully upright), pause for 1-2 seconds and squeeze the glutes and hamstrings hard before lowering. Eliminates momentum and intensifies peak contraction.',
            ],
            [
                'name' => 'Tempo Glute-Ham Raise (3-1-3)',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'Take 3 seconds to lower, 1-second pause at the bottom (or top), and 3 seconds to rise. Maximizes time under tension for posterior chain development.',
            ],
            [
                'name' => 'Single-Leg Glute-Ham Raise',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'stability',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'Perform the GHR with only one leg hooked under the pad, the other held straight or bent behind. Dramatically increases the demand on the working leg and core stability.',
            ],
            [
                'name' => 'Isometric Hold Glute-Ham Raise (Top)',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'strength',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Erector Spinae', 'Core'],
                'description' => 'Hold the fully extended upright position for 10-30 seconds. Builds static posterior chain endurance and stability.',
            ],
            [
                'name' => 'Partial Reps (Bottom Half) Glute-Ham Raise',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Hamstrings', 'Gluteus Maximus'],
                'description' => 'Only raise the torso from the fully lowered position to the midpoint, then lower again. Focuses on the initial hamstring contraction and eccentric stretch.',
            ],
            [
                'name' => 'Partial Reps (Top Half) Glute-Ham Raise',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings'],
                'description' => 'Start from the midpoint and rise to the full upright position. Emphasizes the final hip extension and glute contraction.',
            ],
            [
                'name' => 'GHD Back Extension (Horizontal)',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'Lie face down with hips on the pad, feet securely hooked, and torso hanging freely. Cross arms over the chest and lift the upper body until it is aligned with the legs, squeezing the lower back and glutes. Do not hyperextend.',
            ],
            [
                'name' => 'Weighted GHD Back Extension',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'Perform the horizontal back extension while holding a weight plate or dumbbell against the chest. Progressively overloads the spinal erectors and glutes.',
            ],
            [
                'name' => 'Pause GHD Back Extension',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Erector Spinae', 'Gluteus Maximus'],
                'description' => 'At the top of the extension, hold the position for 1-2 seconds and forcefully contract the back muscles before lowering. Removes momentum.',
            ],
            [
                'name' => 'Eccentric-Emphasis GHD Back Extension',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'strength',
                'target_muscles' => ['Erector Spinae', 'Gluteus Maximus', 'Hamstrings'],
                'description' => 'Raise the torso quickly, then lower it very slowly (3-5 seconds). Overloads the eccentric phase, promoting strength and muscle growth.',
            ],
            [
                'name' => 'Twisting GHD Back Extension',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'core',
                'target_muscles' => ['Erector Spinae', 'Obliques', 'Gluteus Maximus'],
                'description' => 'At the top of each back extension, rotate the upper body to one side, pause, return to center, and lower. Alternates the twist each rep to engage obliques.',
            ],
            [
                'name' => 'GHD Hip Extension (Glute-Focused)',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'isolation',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Erector Spinae'],
                'description' => 'Place the hips just off the pad, keeping the legs straight but not locked. From a hinged position, drive the hips forward and squeeze the glutes forcefully to raise the legs until the body forms a straight line. Avoid using the lower back excessively.',
            ],
            [
                'name' => 'Single-Leg GHD Hip Extension',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'stability',
                'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core'],
                'description' => 'Perform the hip extension with one leg held off the machine, focusing all tension through the working glute. Enhances unilateral strength and pelvic stability.',
            ],
            [
                'name' => 'GHD Sit-Up (Full Range)',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques', 'Transverse Abdominis'],
                'description' => 'Sit facing away from the footplate with ankles secured, body hanging back. With arms extended, lower yourself until your back is parallel to the floor or slightly beyond, then forcefully contract the abs to bring the torso all the way up, reaching toward the toes.',
            ],
            [
                'name' => 'Weighted GHD Sit-Up',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'core',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques'],
                'description' => 'Hold a weight plate or medicine ball against the chest or overhead while performing the GHD sit-up. Adds resistance for core strength and hypertrophy.',
            ],
            [
                'name' => 'Pause GHD Sit-Up',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'hypertrophy',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors'],
                'description' => 'At the top of the sit-up, pause and squeeze the abs for 1-2 seconds. Then lower with control, maximizing time under tension.',
            ],
            [
                'name' => 'Eccentric-Emphasis GHD Sit-Up',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'strength',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors'],
                'description' => 'Sit up quickly, then take 3-5 seconds to lower your torso back. Intensifies the eccentric load on the abdominals.',
            ],
            [
                'name' => 'GHD Side Sit-Up (Oblique Crunch)',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Transverse Abdominis'],
                'description' => 'Lie sideways with the hips against the pad, ankles secured. Lower the torso toward the floor and then perform a side crunch, bringing the upper body up and across. Targets one side of the obliques at a time.',
            ],
            [
                'name' => 'Isometric Hold GHD Sit-Up (Bottom)',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'strength',
                'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core'],
                'description' => 'Lower yourself until your back is parallel to the floor and hold that static position for 10-30 seconds. Builds core endurance and stability.',
            ],
            [
                'name' => 'GHD Russian Twist',
                'equipment' => 'Glute-Ham Developer',
                'category_slug' => 'core',
                'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Transverse Abdominis'],
                'description' => 'Sit on the GHD facing up, with the torso at about 45 degrees, holding a weight or plate. Rotate the torso from side to side while keeping the hips stationary. The GHD angle increases the difficulty.',
            ],
        ];

        $sourceDir = public_path('execises/glute-ham-developer');
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
