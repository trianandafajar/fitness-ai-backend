<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class SlidersSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Slider Plank', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Chest', 'Triceps', 'Glutes'], 'description' => 'Hands or feet on sliders in plank position. Hold isometric while engaging entire core and stabilizers.'],
            ['name' => 'Slider Mountain Climber', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Core (Lower Abs)', 'Hip Flexors', 'Shoulders', 'Quadriceps'], 'description' => 'Plank with feet on sliders. Alternate driving knees to chest rapidly. Dynamic cardio and core movement.'],
            ['name' => 'Slider Pike', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Core', 'Triceps', 'Upper Chest', 'Hip Flexors'], 'description' => 'Plank with feet on sliders. Pike hips up by sliding feet toward hands until body forms an inverted V.'],
            ['name' => 'Slider Tuck', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Shoulders', 'Core (Lower Abs)', 'Hip Flexors', 'Triceps'], 'description' => 'Plank with feet on sliders. Slide knees toward chest, tucking into a ball, then extend back to plank.'],
            ['name' => 'Slider Knee Tuck (Bilateral)', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Lower Abs', 'Hip Flexors', 'Core', 'Shoulders'], 'description' => 'Plank with feet on sliders. Slide both knees simultaneously to chest, hold, then return to plank.'],
            ['name' => 'Slider Alternating Knee Tuck', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Hip Flexors', 'Quadriceps', 'Shoulders'], 'description' => 'Plank with feet on sliders. Alternate driving each knee toward opposite elbow. Cross-body core activation.'],
            ['name' => 'Slider Push-Up', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Stabilizers'], 'description' => 'Push-up with hands on sliders. Sliding increases instability, demanding more stabilizer muscle recruitment.'],
            ['name' => 'Slider Wide Push-Up', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Chest (Pecs)', 'Triceps', 'Shoulders', 'Core'], 'description' => 'Push-up with hands on sliders sliding wider at the bottom. Emphasizes chest stretch and adduction.'],
            ['name' => 'Slider Diamond Push-Up', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Triceps', 'Inner Chest', 'Shoulders', 'Core'], 'description' => 'Push-up with hands on sliders positioned close together (diamond). Sliding adds triceps and stabilizer challenge.'],
            ['name' => 'Slider Lunge (Forward Lunge)', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Stand with front foot on slider. Slide forward into a deep lunge, then push back to standing. Unilateral leg work.'],
            ['name' => 'Slider Reverse Lunge', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core'], 'description' => 'Stand with one foot on slider. Slide that foot backward into a lunge, then return to standing.'],
            ['name' => 'Slider Lateral Lunge', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Adductors', 'Hamstrings', 'Core'], 'description' => 'Stand with one foot on slider. Slide foot out to the side into a lateral lunge, then return.'],
            ['name' => 'Slider Curtsy Lunge', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Quadriceps', 'Adductors', 'Core', 'Stabilizers'], 'description' => 'Stand with one foot on slider. Slide foot diagonally behind and across into a curtsy lunge, then return.'],
            ['name' => 'Slider Bulgarian Split Squat', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hamstrings', 'Core', 'Stabilizers'], 'description' => 'Rear foot on slider behind you. Perform single-leg squat with front leg. Slider adds instability and control.'],
            ['name' => 'Slider Hamstring Curl (Glute Bridge)', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core (Lower Back)', 'Calves'], 'description' => 'Lie supine with feet on sliders. Bridge hips up and slide heels toward glutes, then extend back. Eccentric hamstring work.'],
            ['name' => 'Slider Single-Leg Hamstring Curl', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Stabilizers'], 'description' => 'Single-leg version of hamstring curl. One foot on slider, other foot elevated. Unilateral hamstring strength.'],
            ['name' => 'Slider Ab Rollout (Kneeling)', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Core (Rectus Abdominis', 'Transversus)', 'Shoulders', 'Lats'], 'description' => 'Kneel with hands on sliders. Slide hands forward until body is extended, then pull back. Anti-extension core exercise.'],
            ['name' => 'Slider Ab Rollout (Standing)', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Core (Entire)', 'Shoulders', 'Lats', 'Hip Flexors'], 'description' => 'Stand with hands on sliders. Roll forward into full extension, then pull back. Extreme anti-extension challenge.'],
            ['name' => 'Slider Side Plank Knee Tuck', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Core', 'Hip Flexors', 'Shoulders'], 'description' => 'Side plank with feet on sliders. Slide top knee toward chest, engaging obliques dynamically.'],
            ['name' => 'Slider Saw', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Core (Rectus Abdominis', 'Obliques)', 'Shoulders', 'Triceps'], 'description' => 'Plank with hands on sliders. Push body back by sliding hands toward feet, then forward. Dynamic plank variation.'],
            ['name' => 'Slider Bodyweight Row', 'equipment' => 'Sliders, Fixed Bar', 'category_slug' => 'strength', 'target_muscles' => ['Lats', 'Rhomboids', 'Biceps', 'Rear Deltoids', 'Core'], 'description' => 'Feet on sliders under a bar. Perform inverted row while sliding feet. Increases instability and core engagement.'],
            ['name' => 'Slider Jackknife', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Hip Flexors', 'Hamstrings'], 'description' => 'Plank with feet on sliders. Pike hips up while keeping legs straight, sliding feet toward hands. Full body fold.'],
            ['name' => 'Slider Scorpion', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Core (Obliques', 'Lower Back)', 'Glutes', 'Hamstrings', 'Shoulders'], 'description' => 'Plank with feet on sliders. Sweep one foot across and over the other to opposite side. Rotational core and mobility.'],
            ['name' => 'Slider Spider-Man', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Hip Flexors', 'Adductors', 'Chest', 'Shoulders'], 'description' => 'Plank with feet on sliders. Drive one knee toward same-side elbow, then alternate. Dynamic hip and core engagement.'],
            ['name' => 'Slider Skater Squat (Lateral Bound)', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Adductors', 'Core', 'Stabilizers'], 'description' => 'Stand with one foot on slider. Slide into a deep lateral lunge, then transfer weight and repeat other side.'],
            ['name' => 'Slider Calf Raise', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Calves (Gastrocnemius', 'Soleus)', 'Core', 'Stabilizers'], 'description' => 'Stand with feet on sliders. Roll up onto toes, then lower. Sliders add instability for ankle and calf stabilizers.'],
            ['name' => 'Slider Wall Sit with Feet Slide', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Quadriceps', 'Glutes', 'Core', 'Hamstrings'], 'description' => 'Wall sit with feet on sliders. Slide feet forward and backward while maintaining wall position. Dynamic isometric challenge.'],
            ['name' => 'Slider Bear Crawl', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Chest', 'Triceps', 'Quadriceps', 'Glutes'], 'description' => 'Bear crawl position with hands or feet on sliders. Move forward/backward. Full-body stability and coordination.'],
            ['name' => 'Slider Inchworm', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Shoulders', 'Triceps', 'Hamstrings', 'Calves'], 'description' => 'Hands on sliders. Walk hands forward into plank, then walk feet toward hands. Traveling full-body movement.'],
            ['name' => 'Slider Oblique Crunch (Kneeling)', 'equipment' => 'Sliders', 'category_slug' => 'strength', 'target_muscles' => ['Obliques', 'Rectus Abdominis', 'Core'], 'description' => 'Kneel with hands on sliders. Slide one hand forward and away while twisting torso. Dynamic oblique and shoulder work.'],
        ];

        foreach ($exercises as $data) {
            Exercise::create([
                'name' => $data['name'],
                'equipment' => $data['equipment'],
                'category_id' => $categories[$data['category_slug']],
                'target_muscles' => $data['target_muscles'],
                'description' => $data['description'],
            ]);
        }
    }
}
