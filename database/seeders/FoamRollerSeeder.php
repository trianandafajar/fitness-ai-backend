<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class FoamRollerSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $exercises = [
            ['name' => 'Foam Roller Upper Back (Thoracic Spine)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Thoracic Spine', 'Rhomboids', 'Traps', 'Erector Spinae'], 'description' => 'Lie on roller placed mid-back. Roll from upper to mid-back, pausing on tight spots. Avoid lumbar extension.'],
            ['name' => 'Foam Roller Lower Back (Erector Spinae)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Erector Spinae', 'Quadratus Lumborum', 'Lumbar Spine'], 'description' => 'Roll lower back area with gentle pressure. Keep core engaged and avoid excessive arching.'],
            ['name' => 'Foam Roller Glutes', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Gluteus Maximus', 'Gluteus Medius', 'Piriformis'], 'description' => 'Sit on roller with one ankle crossed over opposite knee. Lean into the glute and roll side to side.'],
            ['name' => 'Foam Roller Piriformis', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Piriformis', 'Gluteus Medius', 'Deep Rotators'], 'description' => 'Sit on roller with crossed ankle. Lean into the lateral glute area and roll until tender point releases.'],
            ['name' => 'Foam Roller Hip Flexors (Psoas/Illiacus)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Psoas Major', 'Iliacus', 'Rectus Femoris', 'TFL'], 'description' => 'Lie face down with roller under hip crease. Roll from hip bone toward thigh. Keep core engaged.'],
            ['name' => 'Foam Roller Quadriceps', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Rectus Femoris', 'Vastus Lateralis', 'Vastus Medialis'], 'description' => 'Lie face down with roller under thighs. Roll from hip to knee, pausing on tight spots. Great for runners.'],
            ['name' => 'Foam Roller Hamstrings', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Biceps Femoris', 'Semitendinosus', 'Semimembranosus'], 'description' => 'Sit on roller with legs extended. Roll from glute to knee, rotating legs slightly to hit medial/lateral heads.'],
            ['name' => 'Foam Roller IT Band (Iliotibial Tract)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['IT Band', 'TFL', 'Vastus Lateralis', 'Gluteus Medius'], 'description' => 'Side-lying with roller under outer thigh. Roll from hip to knee. Use bodyweight for pressure.'],
            ['name' => 'Foam Roller Adductors (Inner Thigh)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Adductor Longus', 'Adductor Magnus', 'Gracilis', 'Pectineus'], 'description' => 'Lie face down with one leg extended to side, roller under inner thigh. Roll from groin to knee.'],
            ['name' => 'Foam Roller Calves (Gastrocnemius)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Tibialis Posterior'], 'description' => 'Sit with roller under calves. Cross one leg over the other for added pressure. Roll from ankle to knee.'],
            ['name' => 'Foam Roller Soleus (Deep Calf)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Soleus', 'Tibialis Posterior', 'Flexor Hallucis Longus'], 'description' => 'Bend knee slightly while rolling calves to target deeper soleus muscle. Roll from ankle to below knee.'],
            ['name' => 'Foam Roller Tibialis Anterior (Shin)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Tibialis Anterior', 'Extensor Digitorum Longus'], 'description' => 'Kneel with roller under shins. Roll from ankle to knee using bodyweight. Great for shin splints.'],
            ['name' => 'Foam Roller Lats (Latissimus Dorsi)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Latissimus Dorsi', 'Teres Major', 'Posterior Deltoid'], 'description' => 'Side-lying with roller under armpit/lat area. Roll from mid-back to armpit. Arm extended overhead.'],
            ['name' => 'Foam Roller Pecs (Chest)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Pectoralis Major', 'Pectoralis Minor', 'Anterior Deltoid'], 'description' => 'Lie face down with roller diagonally under chest. Roll from sternum to armpit. Great for posture.'],
            ['name' => 'Foam Roller Traps (Upper Trapezius)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae', 'Cervical Muscles'], 'description' => 'Lie on side with roller under neck/shoulder junction. Apply gentle pressure and nod head side to side.'],
            ['name' => 'Foam Roller Rhomboids', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Rhomboids Major/Minor', 'Middle Trapezius', 'Thoracic Spine'], 'description' => 'Lie on roller placed between shoulder blades. Roll vertically up and down upper back region.'],
            ['name' => 'Foam Roller Triceps', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Triceps Brachii (Long, Lateral, Medial Heads)', 'Anconeus'], 'description' => 'Side-lying with roller under triceps. Roll from shoulder to elbow. Keep arm straight or slightly bent.'],
            ['name' => 'Foam Roller Biceps', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Biceps Brachii', 'Brachialis', 'Brachioradialis'], 'description' => 'Lie face down with roller under front of upper arm. Roll from shoulder to elbow with arm extended.'],
            ['name' => 'Foam Roller Forearms (Flexors)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Flexor Carpi Radialis', 'Flexor Digitorum', 'Palmaris Longus'], 'description' => 'Kneel with roller under forearms. Roll from wrist to elbow. Great for climbers and grip athletes.'],
            ['name' => 'Foam Roller Forearms (Extensors)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Extensor Carpi Radialis', 'Extensor Digitorum', 'Brachioradialis'], 'description' => 'Kneel with roller under forearm tops (extensors). Roll from wrist to elbow with palms down.'],
            ['name' => 'Foam Roller Thoracic Extension (Mobilization)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Thoracic Spine', 'Erector Spinae', 'Intercostals', 'Core'], 'description' => 'Lie with roller under mid-back, hands behind head. Gently arch back over roller to open chest and thoracic spine.'],
            ['name' => 'Foam Roller Spinal Twist (Mobilization)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Thoracic Spine', 'Obliques', 'Intercostals', 'Erector Spinae'], 'description' => 'Lie on roller with knees bent. Rotate legs to one side while shoulders stay grounded. Stretches thoracic spine.'],
            ['name' => 'Foam Roller Hip Flexor Stretch (Dynamic)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Hip Flexors', 'Rectus Femoris', 'Psoas', 'Iliacus'], 'description' => 'Kneel with one hip on roller, lean forward into hip extension. Dynamic stretch for hip flexors.'],
            ['name' => 'Foam Roller Wall Squat (Mobilization)', 'equipment' => 'Foam Roller', 'category_slug' => 'mobility', 'target_muscles' => ['Quadriceps', 'Glutes', 'Hip Flexors', 'Core'], 'description' => 'Stand with roller between lower back and wall. Perform squat while rolling up and down. Mobilizes spine and hips.'],
            ['name' => 'Foam Roller Plank (Core Stability)', 'equipment' => 'Foam Roller', 'category_slug' => 'strength', 'target_muscles' => ['Core (Transversus, Rectus)', 'Shoulders', 'Chest', 'Glutes'], 'description' => 'Plank with forearms or feet on roller. Adds instability, forcing core and stabilizers to engage intensely.'],
            ['name' => 'Foam Roller Push-Up (Instability)', 'equipment' => 'Foam Roller', 'category_slug' => 'strength', 'target_muscles' => ['Chest', 'Triceps', 'Shoulders', 'Core', 'Stabilizers'], 'description' => 'Push-up with hands on roller. Roller instability demands high shoulder and core stabilization.'],
            ['name' => 'Foam Roller Mountain Climber', 'equipment' => 'Foam Roller', 'category_slug' => 'strength', 'target_muscles' => ['Core', 'Hip Flexors', 'Shoulders', 'Quadriceps'], 'description' => 'Plank with feet on roller. Alternate driving knees to chest while roller rolls, adding dynamic instability.'],
            ['name' => 'Foam Roller Hamstring Curl', 'equipment' => 'Foam Roller', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Calves'], 'description' => 'Lie supine with heels on roller. Bridge hips up, curl roller toward glutes by flexing knees, then extend.'],
            ['name' => 'Foam Roller Single-Leg Hamstring Curl', 'equipment' => 'Foam Roller', 'category_slug' => 'strength', 'target_muscles' => ['Hamstrings', 'Glutes', 'Core', 'Stabilizers'], 'description' => 'Single-leg version of roller hamstring curl. One foot on roller, other elevated. Unilateral hamstring strength.'],
            ['name' => 'Foam Roller Glute Bridge', 'equipment' => 'Foam Roller', 'category_slug' => 'strength', 'target_muscles' => ['Glutes', 'Hamstrings', 'Core', 'Lower Back'], 'description' => 'Lie supine with feet on roller. Bridge hips up, squeezing glutes, then lower. Roller adds instability.'],
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
