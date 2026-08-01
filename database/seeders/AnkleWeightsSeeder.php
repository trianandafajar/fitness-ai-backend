<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AnkleWeightsSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Ankle Weight Leg Raise (Supine)', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Hip Flexors', 'Rectus Abdominis', 'Quadriceps', 'Core', 'Iliopsoas'], 'description' => 'Lie supine with weights on ankles. Raise straight legs to 90°, lower with control. Hip flexor and lower ab strength.'],
            ['name' => 'Ankle Weight Side-Lying Leg Raise', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Gluteus Minimus', 'Tensor Fasciae Latae', 'Core', 'Hip Abductors'], 'description' => 'Lie on side with weight on top ankle. Raise top leg upward. Squeeze glute medius at peak.'],
            ['name' => 'Ankle Weight Glute Kickback (Quadruped)', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core', 'Erector Spinae', 'Hip Extensors'], 'description' => 'All fours position. Kick weighted leg straight back. Squeeze glutes at top. Posterior chain emphasis.'],
            ['name' => 'Ankle Weight Donkey Kick', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core', 'Hip Extensors', 'Quadratus Lumborum'], 'description' => 'All fours with knee bent 90°. Drive heel toward ceiling. Glute-dominant hip extension.'],
            ['name' => 'Ankle Weight Fire Hydrant', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Hip Abductors', 'Core', 'Obliques', 'Tensor Fasciae Latae'], 'description' => 'All fours. Lift weighted knee out to side. Targets hip abductors and glute medius.'],
            ['name' => 'Ankle Weight Straight Leg Kickback', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core', 'Erector Spinae', 'Hip Extensors'], 'description' => 'All fours with straight leg. Lift straight leg backward. Full glute and hamstring engagement.'],
            ['name' => 'Ankle Weight Lying Leg Curl (Prone)', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Calves', 'Hip Extensors'], 'description' => 'Lie face down with weights. Curl heels toward glutes. Hamstring isolation with ankle weights.'],
            ['name' => 'Ankle Weight Standing Leg Curl', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Stand with weight on one ankle. Curl heel toward glutes. Standing hamstring isolation.'],
            ['name' => 'Ankle Weight Standing Side Leg Raise', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Tensor Fasciae Latae', 'Core', 'Hip Abductors', 'Stabilizers'], 'description' => 'Stand holding support. Lift weighted leg out to side. Hip abduction with balance challenge.'],
            ['name' => 'Ankle Weight Standing Front Leg Raise', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Hip Flexors', 'Quadriceps', 'Core', 'Iliopsoas', 'Rectus Femoris'], 'description' => 'Stand with weight on one ankle. Lift leg straight forward. Hip flexor and quad emphasis.'],
            ['name' => 'Ankle Weight Standing Back Leg Raise', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Maximus', 'Hamstrings', 'Core', 'Erector Spinae', 'Hip Extensors'], 'description' => 'Stand with weight on one ankle. Lift leg straight backward. Glute and hamstring emphasis.'],
            ['name' => 'Ankle Weight Seated Leg Extension', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Rectus Femoris', 'Vastus Lateralis', 'Vastus Medialis', 'Core'], 'description' => 'Sit with legs hanging. Extend weighted leg straight. Quadriceps isolation.'],
            ['name' => 'Ankle Weight Seated Hamstring Curl', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Calves', 'Hip Extensors'], 'description' => 'Sit with weighted leg extended. Curl heel under chair. Seated hamstring isolation.'],
            ['name' => 'Ankle Weight Seated Hip Abduction', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Tensor Fasciae Latae', 'Hip Abductors', 'Core', 'Stabilizers'], 'description' => 'Sit with weighted legs. Open legs outward against weight. Hip abduction seated variation.'],
            ['name' => 'Ankle Weight Seated Hip Adduction', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Gracilis', 'Pectineus', 'Core', 'Hip Adductors'], 'description' => 'Sit with weighted legs open. Close legs inward against weight. Hip adduction isolation.'],
            ['name' => 'Ankle Weight Reverse Lunge (Weighted)', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear ankle weights. Perform reverse lunges. Unilateral leg strength with added load.'],
            ['name' => 'Ankle Weight Walking Lunge', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear ankle weights. Perform walking lunges. Dynamic unilateral leg work.'],
            ['name' => 'Ankle Weight Lateral Lunge', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Adductors', 'Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Stabilizers'], 'description' => 'Wear ankle weights. Step laterally into deep lunge. Targets inner thighs and hips.'],
            ['name' => 'Ankle Weight Step-Up', 'equipment' => 'Ankle Weights, Box/Platform', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear ankle weights. Step up onto platform. Unilateral leg strength with added load.'],
            ['name' => 'Ankle Weight Lateral Step-Up', 'equipment' => 'Ankle Weights, Box/Platform', 'category_slug' => 'strength', 'target_muscles' => ['Gluteus Medius', 'Adductors', 'Quadriceps', 'Core', 'Stabilizers'], 'description' => 'Wear ankle weights. Step up sideways. Targets hip abductors and adductors.'],
            ['name' => 'Ankle Weight Squat', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Calves', 'Stabilizers'], 'description' => 'Wear ankle weights. Perform bodyweight squats. Adds resistance to lower body.'],
            ['name' => 'Ankle Weight Sumo Squat', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Adductors', 'Core', 'Hamstrings', 'Calves'], 'description' => 'Wear ankle weights. Wide stance sumo squats. Emphasizes inner thighs and glutes.'],
            ['name' => 'Ankle Weight Bulgarian Split Squat', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Stabilizers', 'Calves'], 'description' => 'Wear ankle weights. Rear foot elevated. Single-leg squat with added load.'],
            ['name' => 'Ankle Weight Pistol Squat', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings', 'Calves', 'Stabilizers'], 'description' => 'Wear ankle weights. Perform single-leg pistol squat. Advanced unilateral leg strength.'],
            ['name' => 'Ankle Weight Hip Thrust', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Flexors', 'Lower Back'], 'description' => 'Wear ankle weights near hips. Bridge hips up, squeeze glutes. Glute-dominant hip extension.'],
            ['name' => 'Ankle Weight Single-Leg Glute Bridge', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Hip Extensors', 'Stabilizers'], 'description' => 'Wear ankle weights. Single-leg glute bridge. Unilateral glute and hamstring strength.'],
            ['name' => 'Ankle Weight Calf Raise', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Wear ankle weights. Rise up on toes, lower with control. Calf development with added load.'],
            ['name' => 'Ankle Weight Seated Calf Raise', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Soleus', 'Gastrocnemius', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Sit with knees bent. Raise heels off floor. Soleus-dominant calf work.'],
            ['name' => 'Ankle Weight Single-Leg Calf Raise', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Calves', 'Core', 'Stabilizers'], 'description' => 'Wear ankle weights. One-legged calf raise. Unilateral calf development.'],
            ['name' => 'Ankle Weight Bear Crawl', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Quadriceps', 'Glutes', 'Calves', 'Stabilizers'], 'description' => 'Wear ankle weights. Bear crawl forward/backward. Full-body stability with added leg load.'],
            ['name' => 'Ankle Weight Mountain Climber', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Hip Flexors', 'Shoulders', 'Quadriceps', 'Stabilizers'], 'description' => 'Wear ankle weights. Plank position, alternate driving knees. Adds resistance to mountain climbers.'],
            ['name' => 'Ankle Weight Flutter Kick (Supine)', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Quadriceps', 'Core', 'Iliopsoas'], 'description' => 'Lie supine with weights. Alternating small kicks with legs elevated. Lower ab and hip flexor endurance.'],
            ['name' => 'Ankle Weight Scissor Kick (Supine)', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Quadriceps', 'Core', 'Adductors'], 'description' => 'Lie supine with weights. Alternate crossing legs over each other. Lower ab and hip flexor work.'],
            ['name' => 'Ankle Weight Bicycle Crunch', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Hip Flexors', 'Core', 'Quadriceps'], 'description' => 'Wear ankle weights. Bicycle crunch motion. Oblique and core with added leg resistance.'],
            ['name' => 'Ankle Weight V-Up', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Rectus Abdominis', 'Hip Flexors', 'Core', 'Shoulders', 'Quadriceps'], 'description' => 'Lie supine with weights. Simultaneously raise legs and torso to V. Full core with added leg load.'],
            ['name' => 'Ankle Weight Reverse Crunch', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Lower Rectus Abdominis', 'Hip Flexors', 'Core', 'Iliopsoas'], 'description' => 'Lie supine with weights. Curl pelvis off floor by lifting weighted legs. Lower ab emphasis.'],
            ['name' => 'Ankle Weight Windshield Wiper', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Core (Obliques)', 'Hip Flexors', 'Quadriceps', 'Shoulders', 'Stabilizers'], 'description' => 'Lie supine with legs raised 90°. Rotate legs side to side. Oblique and core with added load.'],
            ['name' => 'Ankle Weight Russian Twist', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders', 'Quadriceps'], 'description' => 'Sit with knees bent, feet weighted. Rotate torso side to side. Rotational core with leg resistance.'],
            ['name' => 'Ankle Weight Plank Leg Lift', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Glutes', 'Hamstrings', 'Shoulders', 'Hip Extensors', 'Stabilizers'], 'description' => 'Plank position with weights. Alternate lifting one leg. Core and glute with added resistance.'],
            ['name' => 'Ankle Weight Side Plank Leg Lift', 'equipment' => 'Ankle Weights', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Gluteus Medius', 'Shoulders', 'Hip Abductors'], 'description' => 'Side plank with weighted top leg. Lift and lower top leg. Oblique and hip abductor work.'],
        ];

        $sourceDir = public_path('execises/ankle-weights');
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

            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categoryId,
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
                'image' => $data['image'] ?? null,
            ]);
        }
    }
}
