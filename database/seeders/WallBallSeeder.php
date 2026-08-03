<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class WallBallSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Wall Ball Shot (Standard)', 'equipment' => 'Wall Ball', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Shoulders', 'Triceps', 'Core'], 'description' => 'Squat holding the ball under chin, drive up explosively and throw the ball to a 9-10 ft target on the wall, catch it in the squat position, and repeat fluidly.'],
            ['name' => 'Wall Ball Shot (Lower Target)', 'equipment' => 'Wall Ball', 'category_slug' => 'endurance', 'target_muscles' => ['Quadriceps', 'Glutes', 'Shoulders', 'Core'], 'description' => 'Same as standard but throw to a lower target (e.g., 8 ft). Allows faster reps with reduced shoulder demand, emphasizing leg drive and cardio endurance.'],
            ['name' => 'Wall Ball Shot (Higher Target)', 'equipment' => 'Wall Ball', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Shoulders', 'Triceps', 'Core'], 'description' => 'Throw to a higher target (10-12 ft). Requires more explosive hip extension and shoulder power, increasing overall intensity.'],
            ['name' => 'Wall Ball Shot with Split Stance', 'equipment' => 'Wall Ball', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Shoulders', 'Core'], 'description' => 'Start in a split stance, squat down, then explode up and throw. Alternate legs each rep to challenge balance and unilateral leg strength.'],
            ['name' => 'Alternating Wall Ball Shot (Single Arm)', 'equipment' => 'Wall Ball', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Shoulders (unilateral)', 'Triceps', 'Obliques'], 'description' => 'Hold the ball in one hand, squat and throw against the wall with that arm, catch with both hands or the opposite hand, then alternate sides. Develops rotational core and shoulder stability.'],
            ['name' => 'Wall Ball Rotational Throw (Side Throw)', 'equipment' => 'Wall Ball', 'category_slug' => 'power', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Shoulders', 'Hips', 'Quadriceps'], 'description' => 'Stand sideways to the wall, hold ball at back hip, rotate explosively and throw the ball against the wall. Catch and repeat on the same side before switching.'],
            ['name' => 'Wall Ball Chest Pass', 'equipment' => 'Wall Ball', 'category_slug' => 'power', 'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps', 'Core'], 'description' => 'Stand facing the wall, hold ball at chest height, explosively push it forward with both hands against the wall. Catch after rebound and repeat.'],
            ['name' => 'Wall Ball Overhead Pass (Throw)', 'equipment' => 'Wall Ball', 'category_slug' => 'power', 'target_muscles' => ['Anterior Deltoids', 'Triceps', 'Latissimus Dorsi', 'Core', 'Quadriceps'], 'description' => 'Stand facing the wall, start with ball overhead, step forward and throw the ball downwards against the wall near the floor, catch and return overhead.'],
            ['name' => 'Wall Ball Sit-Up and Throw', 'equipment' => 'Wall Ball', 'category_slug' => 'core', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Anterior Deltoids', 'Triceps'], 'description' => 'Sit with feet against a wall, lie back with ball overhead, perform a sit-up, and at the top explosively throw the ball against the wall, catch, and lower.'],
            ['name' => 'Wall Ball Russian Twist', 'equipment' => 'Wall Ball', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Transverse Abdominis'], 'description' => 'Sit with knees bent, lean back, hold ball with both hands, rotate side to side tapping ball on the floor. For added difficulty, tap the ball against a side wall.'],
            ['name' => 'Wall Ball V-Up', 'equipment' => 'Wall Ball', 'category_slug' => 'core', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Obliques'], 'description' => 'Lie flat, hold ball between hands and feet (or hands only), simultaneously raise legs and upper body to pass the ball from hands to feet at the top, then lower.'],
            ['name' => 'Wall Ball Woodchop (High-to-Low)', 'equipment' => 'Wall Ball', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Transverse Abdominis', 'Rectus Abdominis', 'Shoulders'], 'description' => 'Hold ball overhead to one side, chop diagonally across body to the opposite hip, rotating torso. Can perform dynamically against a wall by tapping ball near the hip.'],
            ['name' => 'Wall Ball Woodchop (Low-to-High)', 'equipment' => 'Wall Ball', 'category_slug' => 'core', 'target_muscles' => ['Obliques', 'Transverse Abdominis', 'Rectus Abdominis', 'Shoulders'], 'description' => 'Start with ball at one hip, pull upward diagonally across body to the opposite overhead position, engaging obliques. Tap ball against wall at top if available.'],
            ['name' => 'Wall Ball Slam (Modified)', 'equipment' => 'Wall Ball', 'category_slug' => 'power', 'target_muscles' => ['Latissimus Dorsi', 'Triceps', 'Abdominals', 'Quadriceps', 'Glutes'], 'description' => 'Since wall balls are softer and less bouncy, slam the ball into a mat or padded floor with less bounce. Lift overhead and force it down, catching after a minimal bounce.'],
            ['name' => 'Wall Ball Plank with Hand Taps', 'equipment' => 'Wall Ball', 'category_slug' => 'core', 'target_muscles' => ['Transverse Abdominis', 'Rectus Abdominis', 'Obliques', 'Shoulders'], 'description' => 'Assume a plank with hands on the ball or floor, alternately tap the ball with one hand while maintaining plank stability.'],
            ['name' => 'Wall Ball Mountain Climbers', 'equipment' => 'Wall Ball', 'category_slug' => 'cardio', 'target_muscles' => ['Quadriceps', 'Hip Flexors', 'Core', 'Shoulders'], 'description' => 'Place both hands on the ball in a plank position, drive knees alternately toward the chest as fast as possible while keeping the ball stable.'],
            ['name' => 'Wall Ball Burpee', 'equipment' => 'Wall Ball', 'category_slug' => 'cardio', 'target_muscles' => ['Full Body', 'Quadriceps', 'Glutes', 'Shoulders', 'Core'], 'description' => 'Hold ball, squat to place it on the floor, jump feet back into plank, perform a push-up on the ball, jump feet forward, pick up ball, and jump to start with an overhead press or throw.'],
            ['name' => 'Wall Ball Squat and Press', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Shoulders', 'Triceps', 'Core'], 'description' => 'Hold ball at chest, squat down, then as you stand, press the ball overhead. Can be done as a thruster without the throw.'],
            ['name' => 'Wall Ball Goblet Squat', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Hold the ball vertically against your chest with both hands, squat until thighs are parallel, keeping torso upright, then stand.'],
            ['name' => 'Wall Ball Front Squat (Bear Hug)', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Biceps'], 'description' => 'Hug the ball tightly against your chest with arms wrapped around it, perform a squat, maintaining the bear hug position.'],
            ['name' => 'Wall Ball Overhead Squat', 'equipment' => 'Wall Ball', 'category_slug' => 'mobility', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Shoulders', 'Core'], 'description' => 'Hold the ball overhead with arms straight, squat as deep as possible while keeping the ball stable overhead. Excellent for shoulder stability and mobility.'],
            ['name' => 'Wall Ball Lunges (Walking or Static)', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Hold ball at chest, perform forward or reverse lunges, keeping torso upright. Can alternate legs or stay in place.'],
            ['name' => 'Wall Ball Lunge with Twist', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Obliques', 'Core'], 'description' => 'Hold ball at chest, step forward into a lunge, rotate the torso toward the front leg while keeping ball tight, return and alternate.'],
            ['name' => 'Wall Ball Split Squat', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Hold ball at chest, take a staggered stance with one foot forward, lower until back knee nearly touches the ground, then drive up.'],
            ['name' => 'Wall Ball Step-Up', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Hold ball at chest, step onto a box or bench with one foot, drive through the heel to stand, then lower back down.'],
            ['name' => 'Wall Ball Glute Bridge', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core'], 'description' => 'Lie on back, knees bent, place the ball on the hips or hold it across the pelvis, drive through heels to lift hips, squeeze glutes at top.'],
            ['name' => 'Wall Ball Hip Thrust', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core'], 'description' => 'Sit on floor, upper back against a bench, ball across the hips, thrust upward to full extension, squeezing glutes at the top.'],
            ['name' => 'Wall Ball Hamstring Curl (Floor Slide)', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core'], 'description' => 'Lie on back, heels on the ball, lift hips, then curl the ball toward you by bending the knees, rolling it, then extend back.'],
            ['name' => 'Wall Ball Single-Leg Deadlift', 'equipment' => 'Wall Ball', 'category_slug' => 'stability', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Balance'], 'description' => 'Hold ball in both hands or one hand, stand on one leg, hinge forward while extending the free leg behind, return to standing.'],
            ['name' => 'Wall Ball Push-Up on Ball', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Pectoralis Major', 'Triceps', 'Anterior Deltoids', 'Core'], 'description' => 'Place one or both hands on the ball and perform push-ups. The unstable surface increases core and stabilizer activation.'],
            ['name' => 'Wall Ball Floor Press', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids', 'Triceps'], 'description' => 'Lie on floor holding ball at chest, press straight up to lockout, lower with control. Can be done one arm at a time for core challenge.'],
            ['name' => 'Wall Ball Fly (Floor)', 'equipment' => 'Wall Ball', 'category_slug' => 'isolation', 'target_muscles' => ['Pectoralis Major', 'Anterior Deltoids'], 'description' => 'Lie on floor, ball held above chest with arms slightly bent, lower it out to the sides in a wide arc, then squeeze back together.'],
            ['name' => 'Wall Ball Pullover', 'equipment' => 'Wall Ball', 'category_slug' => 'isolation', 'target_muscles' => ['Latissimus Dorsi', 'Pectoralis Major', 'Serratus Anterior', 'Triceps'], 'description' => 'Lie across a bench with upper back supported, hold ball with both hands overhead, pull it over the chest in an arc until above the hips.'],
            ['name' => 'Wall Ball Bent-Over Row', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Erector Spinae'], 'description' => 'Hinge forward with flat back, hold ball with both hands, row it to the lower abdomen, squeezing shoulder blades.'],
            ['name' => 'Wall Ball Single-Arm Row', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Latissimus Dorsi (unilateral)', 'Rhomboids', 'Biceps', 'Core'], 'description' => 'Place one knee and hand on a bench, hold ball in opposite hand, row it to the side of torso, keeping back flat.'],
            ['name' => 'Wall Ball Reverse Fly', 'equipment' => 'Wall Ball', 'category_slug' => 'isolation', 'target_muscles' => ['Rear Deltoids', 'Rhomboids', 'Infraspinatus'], 'description' => 'Hinge at hips, hold ball with both hands hanging below, raise it out to the sides until arms are parallel, squeeze rear delts.'],
            ['name' => 'Wall Ball Upright Row', 'equipment' => 'Wall Ball', 'category_slug' => 'strength', 'target_muscles' => ['Medial Deltoids', 'Upper Traps', 'Biceps'], 'description' => 'Hold the ball by the edges with both hands, pull it up along the body to chin height, leading with elbows.'],
            ['name' => 'Wall Ball Shrug', 'equipment' => 'Wall Ball', 'category_slug' => 'isolation', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae'], 'description' => 'Hold ball at arm\'s length in front, shrug shoulders up toward ears, squeeze, lower.'],
            ['name' => 'Wall Ball Lateral Raise', 'equipment' => 'Wall Ball', 'category_slug' => 'isolation', 'target_muscles' => ['Medial Deltoids', 'Supraspinatus'], 'description' => 'Stand holding ball in one hand, raise out to the side until shoulder height, lower with control. Can use both hands on a smaller ball.'],
            ['name' => 'Wall Ball Front Raise', 'equipment' => 'Wall Ball', 'category_slug' => 'isolation', 'target_muscles' => ['Anterior Deltoids'], 'description' => 'Hold ball with both hands in front of thighs, raise straight forward to shoulder height, then lower.'],
            ['name' => 'Wall Ball Biceps Curl', 'equipment' => 'Wall Ball', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps Brachii', 'Brachialis'], 'description' => 'Hold ball with both hands underhand, curl up by flexing elbows, squeeze at top, lower.'],
            ['name' => 'Wall Ball Hammer Curl', 'equipment' => 'Wall Ball', 'category_slug' => 'isolation', 'target_muscles' => ['Biceps', 'Brachialis', 'Brachioradialis'], 'description' => 'Hold ball with neutral grip (palms facing each other) in one or both hands, curl up, keeping wrists straight.'],
            ['name' => 'Wall Ball Overhead Triceps Extension', 'equipment' => 'Wall Ball', 'category_slug' => 'isolation', 'target_muscles' => ['Triceps Brachii (Long Head)'], 'description' => 'Hold ball with both hands overhead, lower it behind the head by bending elbows, then extend arms straight up.'],
            ['name' => 'Wall Ball Triceps Kickback', 'equipment' => 'Wall Ball', 'category_slug' => 'isolation', 'target_muscles' => ['Triceps Brachii (Lateral Head)'], 'description' => 'Hinge forward, hold ball in one hand, upper arm parallel to body, extend arm straight back, squeeze triceps.'],
            ['name' => 'Wall Ball Calf Raise', 'equipment' => 'Wall Ball', 'category_slug' => 'isolation', 'target_muscles' => ['Gastrocnemius', 'Soleus'], 'description' => 'Hold ball at chest, stand on balls of feet on a step, raise heels as high as possible, then lower.'],
            ['name' => 'Wall Ball Farmer\'s Carry', 'equipment' => 'Wall Ball', 'category_slug' => 'endurance', 'target_muscles' => ['Forearms', 'Traps', 'Core', 'Quadriceps', 'Glutes'], 'description' => 'Hold a ball in each hand or one heavy ball in both, walk for distance, maintaining upright posture and grip.'],
            ['name' => 'Wall Ball Suitcase Carry', 'equipment' => 'Wall Ball', 'category_slug' => 'stability', 'target_muscles' => ['Obliques', 'Core', 'Forearms', 'Gluteus Medius'], 'description' => 'Carry a heavy ball in one hand like a suitcase, walk while resisting lateral lean. Switch sides.'],
            ['name' => 'Wall Ball Overhead Carry', 'equipment' => 'Wall Ball', 'category_slug' => 'stability', 'target_muscles' => ['Shoulders', 'Triceps', 'Core', 'Traps'], 'description' => 'Press the ball overhead with one or both hands, lock arms, and walk. Maintains shoulder stability and core engagement.'],
            ['name' => 'Wall Ball Lateral Lunge with Throw', 'equipment' => 'Wall Ball', 'category_slug' => 'power', 'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Shoulders', 'Core'], 'description' => 'Hold ball at chest, step to the side into a lateral lunge, push back to center while throwing the ball against the wall. Catch and repeat on the other side.'],
            ['name' => 'Wall Ball Clean and Press', 'equipment' => 'Wall Ball', 'category_slug' => 'power', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Shoulders', 'Triceps', 'Core'], 'description' => 'Start with ball on the floor, clean it to the shoulders (squat and curl), then press overhead. Can be done as one fluid motion or with a pause.'],
            ['name' => 'Wall Ball Wall Sit with Chest Pass', 'equipment' => 'Wall Ball', 'category_slug' => 'endurance', 'target_muscles' => ['Quadriceps', 'Glutes', 'Pectorals', 'Triceps'], 'description' => 'Hold a wall sit against a wall, perform chest passes against the opposite wall or to a partner, maintaining the squat position.'],
        ];

        $sourceDir = public_path('execises/wall-ball');
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
