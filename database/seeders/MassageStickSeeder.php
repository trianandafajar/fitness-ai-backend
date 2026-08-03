<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class MassageStickSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Massage Stick Upper Back', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Erector Spinae', 'Rhomboids', 'Trapezius', 'Thoracic Spine'], 'description' => 'Stand or sit. Roll massage stick across upper back using both hands. Apply pressure to tight knots and trigger points.'],
            ['name' => 'Massage Stick Lower Back', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Erector Spinae', 'Quadratus Lumborum', 'Lumbar Spine'], 'description' => 'Roll stick vertically or horizontally along lower back. Control pressure to avoid spinal bone contact.'],
            ['name' => 'Massage Stick Glutes', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Gluteus Maximus', 'Gluteus Medius', 'Gluteus Minimus', 'Piriformis'], 'description' => 'Sit on chair and roll stick over gluteal muscles. Cross ankle over knee for deeper glute access.'],
            ['name' => 'Massage Stick Piriformis', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Piriformis', 'Deep Rotators', 'Gluteus Medius'], 'description' => 'Sit and position stick under lateral glute/hip area. Roll and apply deep pressure to piriformis trigger point.'],
            ['name' => 'Massage Stick Hip Flexors', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Psoas Major', 'Iliacus', 'Rectus Femoris', 'TFL'], 'description' => 'Stand or lie down. Roll stick over anterior hip and groin area. Great for tight hip flexors from sitting.'],
            ['name' => 'Massage Stick Quadriceps', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Rectus Femoris', 'Vastus Lateralis', 'Vastus Medialis', 'Vastus Intermedius'], 'description' => 'Sit or stand. Roll massage stick down front of thigh from hip to knee. Vary pressure for deep tissue release.'],
            ['name' => 'Massage Stick Hamstrings', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Biceps Femoris', 'Semitendinosus', 'Semimembranosus'], 'description' => 'Sit with leg extended. Roll stick along back of thigh from glute to knee. Rotate leg to target inner/outer heads.'],
            ['name' => 'Massage Stick IT Band', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Iliotibial Tract', 'TFL', 'Vastus Lateralis', 'Gluteus Medius'], 'description' => 'Side-lying or standing. Roll stick along outer thigh from hip to knee. Apply firm pressure along IT band.'],
            ['name' => 'Massage Stick Adductors (Inner Thigh)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Adductor Longus', 'Adductor Magnus', 'Gracilis', 'Pectineus'], 'description' => 'Sit with legs spread. Roll stick along inner thigh from groin to knee. Great for groin tightness.'],
            ['name' => 'Massage Stick Calves', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Tibialis Posterior', 'Peroneals'], 'description' => 'Sit with leg extended. Roll stick along back of lower leg from below knee to Achilles tendon.'],
            ['name' => 'Massage Stick Soleus (Deep Calf)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Soleus', 'Tibialis Posterior', 'Flexor Hallucis Longus'], 'description' => 'Bend knee slightly while rolling lower calf. Stick targets deeper soleus muscle below gastrocnemius.'],
            ['name' => 'Massage Stick Tibialis Anterior (Shin)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Tibialis Anterior', 'Extensor Digitorum Longus', 'Peroneus Tertius'], 'description' => 'Sit or stand. Roll stick along front of shin from knee to ankle. Great for shin splint relief.'],
            ['name' => 'Massage Stick Lats (Latissimus Dorsi)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Latissimus Dorsi', 'Teres Major', 'Posterior Deltoid', 'Thoracolumbar Fascia'], 'description' => 'Stand or sit. Reach arm overhead and roll stick along side of back/ribs from armpit to lower back.'],
            ['name' => 'Massage Stick Pecs (Chest)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Pectoralis Major', 'Pectoralis Minor', 'Anterior Deltoid', 'Subclavius'], 'description' => 'Stand or lie. Roll stick horizontally across chest from sternum to armpit. Great for posture improvement.'],
            ['name' => 'Massage Stick Upper Traps (Trapezius)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae', 'Splenius Capitis'], 'description' => 'Stand or sit. Roll stick along neck/shoulder junction. Tilt head to opposite side to expose traps.'],
            ['name' => 'Massage Stick Rhomboids', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Rhomboids Major/Minor', 'Middle Trapezius', 'Erector Spinae'], 'description' => 'Reach arms forward. Roll stick vertically between shoulder blades. Apply pressure to tight knots.'],
            ['name' => 'Massage Stick Neck (Cervical Muscles)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Sternocleidomastoid', 'Scalene', 'Levator Scapulae', 'Suboccipitals'], 'description' => 'Sit upright. Gently roll stick along sides and back of neck. Use light pressure on cervical spine area.'],
            ['name' => 'Massage Stick Triceps', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Triceps Brachii (Long, Lateral, Medial Heads)', 'Anconeus'], 'description' => 'Stand or sit with arm bent. Roll stick along back of upper arm from shoulder to elbow.'],
            ['name' => 'Massage Stick Biceps', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Biceps Brachii', 'Brachialis', 'Coracobrachialis', 'Brachioradialis'], 'description' => 'Extend arm forward. Roll stick along front of upper arm from shoulder to elbow.'],
            ['name' => 'Massage Stick Forearms (Flexors)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Flexor Carpi Radialis/Ulnaris', 'Flexor Digitorum', 'Palmaris Longus'], 'description' => 'Extend arm with palm up. Roll stick along underside of forearm from elbow to wrist.'],
            ['name' => 'Massage Stick Forearms (Extensors)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Extensor Carpi Radialis/Ulnaris', 'Extensor Digitorum', 'Brachioradialis'], 'description' => 'Extend arm with palm down. Roll stick along top of forearm from elbow to wrist.'],
            ['name' => 'Massage Stick Wrist (Carpal Tunnel Area)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Flexor Retinaculum', 'Wrist Flexors/Extensors', 'Hand Intrinsics'], 'description' => 'Gently roll stick over wrist joint and palm. Small, controlled movements for carpal tunnel relief.'],
            ['name' => 'Massage Stick Achilles Tendon', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Achilles Tendon', 'Gastrocnemius', 'Soleus', 'Plantaris'], 'description' => 'Sit with leg extended. Gently roll stick along Achilles tendon. Use lighter pressure than muscle bellies.'],
            ['name' => 'Massage Stick Plantar Fascia (Foot)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Plantar Fascia', 'Foot Intrinsics', 'Flexor Digitorum Brevis'], 'description' => 'Sit and roll stick along bottom of foot from heel to toes. Great for plantar fasciitis relief.'],
            ['name' => 'Massage Stick Tibialis Posterior (Deep Shin)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Tibialis Posterior', 'Flexor Digitorum Longus', 'Flexor Hallucis Longus'], 'description' => 'Roll stick along medial shin (inside of calf bone). Targets deep calf stabilizers.'],
            ['name' => 'Massage Stick Peroneals (Lateral Calf)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Peroneus Longus', 'Peroneus Brevis', 'Peroneus Tertius'], 'description' => 'Roll stick along outer side of lower leg from knee to ankle. Targets lateral calf muscles.'],
            ['name' => 'Massage Stick SCM (Sternocleidomastoid)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Sternocleidomastoid', 'Scalene Muscles'], 'description' => 'Turn head slightly. Gently roll stick along side of neck from collarbone to behind ear.'],
            ['name' => 'Massage Stick Subscapularis', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Subscapularis', 'Teres Minor', 'Infraspinatus', 'Supraspinatus'], 'description' => 'Reach arm across body. Roll stick under armpit and scapula. Targets deep rotator cuff muscles.'],
            ['name' => 'Massage Stick Thoracolumbar Fascia', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Thoracolumbar Fascia', 'Erector Spinae', 'Latissimus Dorsi'], 'description' => 'Stand and cross arms. Roll stick horizontally across lower back region. Targets deep fascial tissue.'],
            ['name' => 'Massage Stick Serratus Anterior', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Serratus Anterior', 'External Obliques', 'Rib Intercostals'], 'description' => 'Reach arm overhead and roll stick along side of ribcage. Targets serratus and lateral core.'],
            ['name' => 'Massage Stick Posterior Shoulder (Rotator Cuff)', 'equipment' => 'Massage Stick', 'category_slug' => 'mobility', 'target_muscles' => ['Infraspinatus', 'Teres Minor', 'Subscapularis', 'Supraspinatus', 'Deltoid'], 'description' => 'Reach arm across chest. Roll stick across rear deltoid and rotator cuff area. Great for shoulder health.'],
        ];

        $sourceDir = public_path('execises/massage-stick');
        $files = glob($sourceDir . '/*.png');
        sort($files);

        foreach ($execises as $i => $data) {
            $sourceFile = $files[$i] ?? null;

            if ($sourceFile) {
                $imagePath = Storage::disk('public')->putFile('exercises', new File($sourceFile));
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
