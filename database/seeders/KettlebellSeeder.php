<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class KettlebellSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Kettlebell Swing', 'equipment' => 'Kettlebell', 'category_slug' => 'power', 'target_muscles' => ['Glutes', 'Hamstrings', 'Lower Back', 'Core', 'Shoulders'], 'description' => 'Hinge at the hips, swing the kettlebell between your legs, then explosively drive your hips forward to swing it to chest height. Keep your arms straight and core tight.'],
            ['name' => 'Single-Arm Kettlebell Swing', 'equipment' => 'Kettlebell', 'category_slug' => 'power', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Obliques'], 'description' => 'Perform a standard kettlebell swing using one arm. The free arm stays out for balance. Resisting rotation heavily engages the obliques.'],
            ['name' => 'American Kettlebell Swing', 'equipment' => 'Kettlebell', 'category_slug' => 'power', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Shoulders', 'Upper Back'], 'description' => 'Swing the kettlebell all the way overhead, fully extending the arms. Requires greater hip drive and shoulder mobility than the Russian swing.'],
            ['name' => 'Double Kettlebell Swing', 'equipment' => 'Kettlebell', 'category_slug' => 'power', 'target_muscles' => ['Glutes', 'Hamstrings', 'Lower Back', 'Core', 'Grip'], 'description' => 'Perform a swing holding a kettlebell in each hand. Demands more posterior chain power and a strong grip.'],
            ['name' => 'Kettlebell Clean', 'equipment' => 'Kettlebell', 'category_slug' => 'power', 'target_muscles' => ['Glutes', 'Hamstrings', 'Shoulders', 'Core', 'Forearms'], 'description' => 'Swing the kettlebell up and catch it in the rack position at your shoulder, keeping the elbow tight to your body. Use a hip snap, not arm pull.'],
            ['name' => 'Single-Arm Kettlebell Clean', 'equipment' => 'Kettlebell', 'category_slug' => 'power', 'target_muscles' => ['Glutes', 'Hamstrings', 'Shoulders', 'Obliques', 'Forearms'], 'description' => 'Clean one kettlebell to the rack position. The free arm swings naturally. Excellent for unilateral power and core stability.'],
            ['name' => 'Double Kettlebell Clean', 'equipment' => 'Kettlebell', 'category_slug' => 'power', 'target_muscles' => ['Glutes', 'Hamstrings', 'Shoulders', 'Core', 'Forearms'], 'description' => 'Clean two kettlebells simultaneously. Requires coordinated hip drive and control to catch both bells in the rack position.'],
            ['name' => 'Kettlebell Snatch', 'equipment' => 'Kettlebell', 'category_slug' => 'power', 'target_muscles' => ['Glutes', 'Hamstrings', 'Shoulders', 'Back', 'Core', 'Grip'], 'description' => 'Swing the kettlebell between your legs and accelerate it overhead in one smooth motion, locking out the arm. Punch through at the top.'],
            ['name' => 'Single-Arm Kettlebell Snatch', 'equipment' => 'Kettlebell', 'category_slug' => 'power', 'target_muscles' => ['Glutes', 'Hamstrings', 'Shoulders', 'Core', 'Forearms'], 'description' => 'Perform a snatch with one arm. Demands tremendous hip power, shoulder stability, and grip endurance.'],
            ['name' => 'Half-Kneeling Kettlebell Snatch', 'equipment' => 'Kettlebell', 'category_slug' => 'power', 'target_muscles' => ['Glutes', 'Hamstrings', 'Shoulders', 'Core'], 'description' => 'Start in a half-kneeling position, perform a single-arm snatch. Removes leg drive, forcing the hip and shoulder to generate all power.'],
            ['name' => 'Kettlebell High Pull', 'equipment' => 'Kettlebell', 'category_slug' => 'power', 'target_muscles' => ['Glutes', 'Hamstrings', 'Upper Back', 'Shoulders', 'Biceps'], 'description' => 'Swing the kettlebell up to chest height while pulling your elbow high and wide, like an upright row. Keep the bell close to your body.'],
            ['name' => 'Kettlebell Goblet Squat', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings'], 'description' => 'Hold the kettlebell by the horns against your chest. Squat down, keeping your torso upright and elbows inside your knees.'],
            ['name' => 'Kettlebell Front Squat (Double Rack)', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Upper Back'], 'description' => 'Hold two kettlebells in the rack position at your shoulders. Squat as deep as possible while maintaining an upright chest.'],
            ['name' => 'Kettlebell Overhead Squat', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Shoulders', 'Core', 'Thoracic Spine'], 'description' => 'Press one kettlebell overhead and lock out the arm. Squat down while keeping the bell directly over your shoulder and your core braced.'],
            ['name' => 'Kettlebell Lunge', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Hold a kettlebell in the goblet, rack, or overhead position and perform forward or reverse lunges. Maintain an upright torso.'],
            ['name' => 'Kettlebell Racked Reverse Lunge', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Quadriceps', 'Core'], 'description' => 'With one kettlebell in the rack position, step backward into a lunge. The loaded side demands extra core stability.'],
            ['name' => 'Kettlebell Overhead Lunge', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Quadriceps', 'Shoulders', 'Core'], 'description' => 'Hold a kettlebell locked overhead and perform a lunge. Challenges shoulder stability and core control throughout the movement.'],
            ['name' => 'Kettlebell Turkish Get-Up', 'equipment' => 'Kettlebell', 'category_slug' => 'flexibility', 'target_muscles' => ['Shoulders', 'Core', 'Glutes', 'Hip Flexors', 'Triceps'], 'description' => 'Lie on your back with a kettlebell locked out overhead. Move through a series of positions to stand up, then reverse to lie down, keeping the arm vertical.'],
            ['name' => 'Kettlebell Windmill', 'equipment' => 'Kettlebell', 'category_slug' => 'flexibility', 'target_muscles' => ['Hamstrings', 'Obliques', 'Shoulders', 'Thoracic Spine'], 'description' => 'Hold a kettlebell overhead, push your hip out, and hinge sideways to touch the floor with your free hand. Keep the loaded arm locked and eyes on the bell.'],
            ['name' => 'Kettlebell Halo', 'equipment' => 'Kettlebell', 'category_slug' => 'core', 'target_muscles' => ['Shoulders', 'Core', 'Thoracic Spine'], 'description' => 'Hold the kettlebell upside down by the horns. Circle it around your head in a tight halo, keeping your core braced and avoiding neck strain.'],
            ['name' => 'Kettlebell Around the World', 'equipment' => 'Kettlebell', 'category_slug' => 'core', 'target_muscles' => ['Core', 'Shoulders', 'Hips'], 'description' => 'Pass the kettlebell around your body in a circular motion, switching hands in front and behind you. Keep your core tight to resist twisting.'],
            ['name' => 'Kettlebell Figure-8', 'equipment' => 'Kettlebell', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Hip Flexors', 'Glutes', 'Grip'], 'description' => 'Pass the kettlebell between your legs in a figure-8 pattern while hinging slightly. Keeps the core constantly engaged for dynamic stability.'],
            ['name' => 'Kettlebell Slingshot', 'equipment' => 'Kettlebell', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Core', 'Shoulders'], 'description' => 'Pass the kettlebell around your waist, transferring it from hand to hand in front and behind. Excellent for rotational core warm-up.'],
            ['name' => 'Kettlebell Deadlift', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Lower Back', 'Core'], 'description' => 'Stand over a kettlebell, hinge at your hips, grab the handle, and stand up straight. Keep your back flat and shoulders packed.'],
            ['name' => 'Kettlebell Single-Leg Deadlift', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Balance'], 'description' => 'Hold a kettlebell in one hand, hinge forward while raising the opposite leg straight back. Keep hips square and lower the bell toward the floor.'],
            ['name' => 'Kettlebell Row', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Core'], 'description' => 'Place one hand on a bench, row the kettlebell to your hip. Squeeze your shoulder blade and keep your elbow close to your body.'],
            ['name' => 'Renegade Row', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Core', 'Chest', 'Triceps', 'Shoulders'], 'description' => 'In a push-up position with hands on two kettlebells, row one bell up at a time while stabilizing your body. Engages the entire core fiercely.'],
            ['name' => 'Kettlebell Push Press', 'equipment' => 'Kettlebell', 'category_slug' => 'power', 'target_muscles' => ['Shoulders', 'Triceps', 'Glutes', 'Core'], 'description' => 'Slightly dip your knees, then explosively drive up with your legs to help press the kettlebell overhead. Finish with a locked-out arm.'],
            ['name' => 'Kettlebell Jerk', 'equipment' => 'Kettlebell', 'category_slug' => 'power', 'target_muscles' => ['Shoulders', 'Triceps', 'Quads', 'Glutes', 'Core'], 'description' => 'From the rack position, perform a quick dip and drive with your legs, then press yourself under the kettlebell to lock it overhead in one motion.'],
            ['name' => 'Kettlebell Thruster', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Shoulders', 'Core', 'Triceps'], 'description' => 'Hold kettlebells in the rack position, squat down, then drive up and press the bells overhead in one continuous movement.'],
            ['name' => 'Kettlebell Strict Press', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Triceps', 'Core'], 'description' => 'Press the kettlebell from the rack position straight overhead without using your legs. Keep your core tight and avoid leaning back.'],
            ['name' => 'Kettlebell Bottoms-Up Press', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Forearms', 'Core', 'Grip'], 'description' => 'Hold the kettlebell upside down by the handle, the bell above your fist. Press it overhead while stabilizing the wobble. Intense grip and shoulder stabilizer work.'],
            ['name' => 'Kettlebell Floor Press', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders'], 'description' => 'Lie on your back with knees bent, holding kettlebells at your chest. Press them up until your arms are locked, then lower until your triceps touch the floor.'],
            ['name' => 'Kettlebell Pullover', 'equipment' => 'Kettlebell', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Chest', 'Core'], 'description' => 'Lie on your back holding a kettlebell by the horns. Lower it behind your head in an arc, keeping your arms slightly bent, then pull it back over your chest.'],
            ['name' => 'Kettlebell Russian Twist', 'equipment' => 'Kettlebell', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Hip Flexors'], 'description' => 'Sit on the floor with knees bent, lean back slightly, and rotate the kettlebell from side to side, touching it to the floor by your hip.'],
            ['name' => 'Kettlebell Side Bend', 'equipment' => 'Kettlebell', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Quadratus Lumborum'], 'description' => 'Stand holding a kettlebell in one hand, bend sideways toward the weight, then use your obliques to pull yourself back upright.'],
            ['name' => 'Kettlebell Woodchopper', 'equipment' => 'Kettlebell', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Core', 'Shoulders', 'Glutes'], 'description' => 'Hold the kettlebell with both hands, rotate and chop diagonally from high outside one shoulder to low outside the opposite hip, pivoting the back foot.'],
            ['name' => 'Kettlebell Farmer\'s Walk', 'equipment' => 'Kettlebell', 'category_slug' => 'carry', 'target_muscles' => ['Grip', 'Core', 'Traps', 'Forearms', 'Glutes'], 'description' => 'Carry a heavy kettlebell in each hand and walk for distance or time. Keep your shoulders packed and core braced.'],
            ['name' => 'Kettlebell Overhead Carry', 'equipment' => 'Kettlebell', 'category_slug' => 'carry', 'target_muscles' => ['Shoulders', 'Core', 'Triceps', 'Grip'], 'description' => 'Walk while holding a kettlebell locked out overhead. Demands extreme shoulder stability and anti-lateral flexion strength.'],
            ['name' => 'Kettlebell Racked Carry', 'equipment' => 'Kettlebell', 'category_slug' => 'carry', 'target_muscles' => ['Core', 'Obliques', 'Glutes', 'Upper Back'], 'description' => 'Walk with a kettlebell held in the rack position. The uneven load forces the core to resist rotation and maintain an upright posture.'],
            ['name' => 'Kettlebell Bottoms-Up Carry', 'equipment' => 'Kettlebell', 'category_slug' => 'carry', 'target_muscles' => ['Grip', 'Forearms', 'Shoulders', 'Core'], 'description' => 'Carry a kettlebell upside down with the handle gripped tightly, bell above your fist. Intense stabilizer challenge from grip to shoulder.'],
            ['name' => 'Kettlebell Lunge with Rotation', 'equipment' => 'Kettlebell', 'category_slug' => 'core', 'target_muscles' => ['Quadriceps', 'Glutes', 'Obliques', 'Core'], 'description' => 'Hold a kettlebell at your chest, step into a forward lunge, and rotate your torso toward the leading leg. Return to center and repeat.'],
        ];

        $sourceDir = public_path('execises/kettlebell');
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
