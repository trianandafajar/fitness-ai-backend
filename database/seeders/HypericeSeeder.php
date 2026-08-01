<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseCategory;
use Illuminate\Database\Seeder;

class HypericeSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ExerciseCategory::pluck('id', 'slug');

        $execises = [
            ['name' => 'Hyperice Upper Back (Thoracic)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Erector Spinae', 'Rhomboids', 'Trapezius', 'Thoracic Spine'], 'description' => 'Apply Hyperice to upper back. Glide over knots with vibration. Use medium pressure for myofascial release.'],
            ['name' => 'Hyperice Lower Back (Lumbar)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Erector Spinae', 'Quadratus Lumborum', 'Lumbar Multifidus'], 'description' => 'Place Hyperice on lower back. Move slowly over tight spots. Use gentle pressure on lumbar region.'],
            ['name' => 'Hyperice Glutes', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Gluteus Maximus', 'Gluteus Medius', 'Gluteus Minimus', 'Piriformis'], 'description' => 'Sit on Hyperice. Glide over gluteal muscles. Cross ankle over knee for deeper piriformis access.'],
            ['name' => 'Hyperice Piriformis', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Piriformis', 'Deep Rotators', 'Gluteus Medius', 'Obturator Internus'], 'description' => 'Sit on Hyperice with cross-legged position. Target deep glute/hip rotator area. Vibration penetrates deep tissue.'],
            ['name' => 'Hyperice Hip Flexors', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Psoas Major', 'Iliacus', 'Rectus Femoris', 'Tensor Fasciae Latae'], 'description' => 'Apply Hyperice to anterior hip and groin. Glide slowly over psoas and iliacus. Great for tight hip flexors.'],
            ['name' => 'Hyperice Quadriceps', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Rectus Femoris', 'Vastus Lateralis', 'Vastus Medialis', 'Vastus Intermedius'], 'description' => 'Apply Hyperice to front of thigh. Glide from hip to knee. Vary speed and pressure for deep release.'],
            ['name' => 'Hyperice Hamstrings', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Biceps Femoris', 'Semitendinosus', 'Semimembranosus'], 'description' => 'Apply Hyperice to back of thigh. Glide from glute to knee. Rotate leg to target medial/lateral heads.'],
            ['name' => 'Hyperice IT Band', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Iliotibial Tract', 'TFL', 'Vastus Lateralis', 'Gluteus Medius'], 'description' => 'Side-lying with Hyperice on outer thigh. Glide from hip to knee with steady pressure. Vibration aids release.'],
            ['name' => 'Hyperice Adductors (Inner Thigh)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Adductor Longus', 'Adductor Magnus', 'Gracilis', 'Pectineus'], 'description' => 'Apply Hyperice to inner thigh. Glide from groin to knee. Great for groin tightness and adductor strains.'],
            ['name' => 'Hyperice Calves', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Gastrocnemius', 'Soleus', 'Tibialis Posterior', 'Peroneals'], 'description' => 'Apply Hyperice to back of lower leg. Glide from below knee to Achilles. Use vibration for deep calf release.'],
            ['name' => 'Hyperice Soleus (Deep Calf)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Soleus', 'Tibialis Posterior', 'Flexor Hallucis Longus'], 'description' => 'Bend knee slightly. Apply Hyperice to deep calf area. Vibration penetrates to soleus muscle below gastrocnemius.'],
            ['name' => 'Hyperice Tibialis Anterior (Shin)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Tibialis Anterior', 'Extensor Digitorum Longus', 'Peroneus Tertius'], 'description' => 'Apply Hyperice to front of shin. Glide from knee to ankle. Great for shin splint prevention and relief.'],
            ['name' => 'Hyperice Lats (Latissimus Dorsi)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Latissimus Dorsi', 'Teres Major', 'Posterior Deltoid', 'Thoracolumbar Fascia'], 'description' => 'Reach arm overhead. Apply Hyperice to side of back/ribs. Glide from armpit to lower back region.'],
            ['name' => 'Hyperice Pecs (Chest)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Pectoralis Major', 'Pectoralis Minor', 'Anterior Deltoid', 'Subclavius'], 'description' => 'Apply Hyperice horizontally across chest. Glide from sternum to armpit. Excellent for posture and shoulder mobility.'],
            ['name' => 'Hyperice Upper Traps (Trapezius)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Upper Trapezius', 'Levator Scapulae', 'Splenius Capitis', 'Semispinalis'], 'description' => 'Apply Hyperice to neck/shoulder junction. Tilt head to opposite side. Vibration releases chronic tension.'],
            ['name' => 'Hyperice Rhomboids', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Rhomboids Major/Minor', 'Middle Trapezius', 'Erector Spinae'], 'description' => 'Reach arms forward. Apply Hyperice between shoulder blades. Glide vertically over rhomboid region.'],
            ['name' => 'Hyperice Neck (Cervical)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Sternocleidomastoid', 'Scalene', 'Levator Scapulae', 'Suboccipitals'], 'description' => 'Apply Hyperice gently to neck sides and base. Use lowest pressure on cervical spine. Great for tech neck.'],
            ['name' => 'Hyperice Triceps', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Triceps Brachii (Long, Lateral, Medial Heads)', 'Anconeus'], 'description' => 'Apply Hyperice to back of upper arm. Glide from shoulder to elbow with arm bent or extended.'],
            ['name' => 'Hyperice Biceps', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Biceps Brachii', 'Brachialis', 'Coracobrachialis', 'Brachioradialis'], 'description' => 'Apply Hyperice to front of upper arm. Glide from shoulder to elbow. Great for bicep tension release.'],
            ['name' => 'Hyperice Forearms (Flexors)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Flexor Carpi Radialis/Ulnaris', 'Flexor Digitorum', 'Palmaris Longus'], 'description' => 'Apply Hyperice to underside of forearm. Glide from elbow to wrist with palm up. Great for climbers and office workers.'],
            ['name' => 'Hyperice Forearms (Extensors)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Extensor Carpi Radialis/Ulnaris', 'Extensor Digitorum', 'Brachioradialis'], 'description' => 'Apply Hyperice to top of forearm. Glide from elbow to wrist with palm down. Relieves extensor tightness.'],
            ['name' => 'Hyperice Wrist (Carpal Tunnel)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Flexor Retinaculum', 'Wrist Flexors/Extensors', 'Hand Intrinsics'], 'description' => 'Apply Hyperice gently to wrist joint. Use light pressure and slow movements. Great for carpal tunnel syndrome.'],
            ['name' => 'Hyperice Achilles Tendon', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Achilles Tendon', 'Gastrocnemius', 'Soleus', 'Plantaris'], 'description' => 'Apply Hyperice gently along Achilles. Use light to moderate pressure. Vibration aids tendon recovery.'],
            ['name' => 'Hyperice Plantar Fascia (Foot)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Plantar Fascia', 'Foot Intrinsics', 'Flexor Digitorum Brevis', 'Abductor Hallucis'], 'description' => 'Apply Hyperice to bottom of foot. Glide from heel to toes. Excellent for plantar fasciitis relief.'],
            ['name' => 'Hyperice Tibialis Posterior (Deep Shin)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Tibialis Posterior', 'Flexor Digitorum Longus', 'Flexor Hallucis Longus'], 'description' => 'Apply Hyperice to medial lower leg. Glide along shin bone inner side. Targets deep calf stabilizers.'],
            ['name' => 'Hyperice Peroneals (Lateral Calf)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Peroneus Longus', 'Peroneus Brevis', 'Peroneus Tertius'], 'description' => 'Apply Hyperice to outer side of lower leg. Glide from knee to ankle. Releases lateral calf muscles.'],
            ['name' => 'Hyperice SCM (Neck Side)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Sternocleidomastoid', 'Scalene', 'Platysma'], 'description' => 'Turn head slightly. Apply Hyperice gently along side of neck from collarbone to behind ear.'],
            ['name' => 'Hyperice Subscapularis', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Subscapularis', 'Teres Minor', 'Infraspinatus', 'Supraspinatus'], 'description' => 'Reach arm across body. Apply Hyperice under armpit and scapula. Targets deep rotator cuff muscles.'],
            ['name' => 'Hyperice Thoracolumbar Fascia', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Thoracolumbar Fascia', 'Erector Spinae', 'Latissimus Dorsi'], 'description' => 'Apply Hyperice horizontally across lower back. Glide over fascial tissue. Vibration releases deep connective tissue.'],
            ['name' => 'Hyperice Serratus Anterior', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Serratus Anterior', 'External Obliques', 'Intercostals', 'Rib Muscles'], 'description' => 'Reach arm overhead. Apply Hyperice along side of ribcage. Releases serratus and lateral core muscles.'],
            ['name' => 'Hyperice Posterior Shoulder (Rotator Cuff)', 'equipment' => 'Hyperice', 'category_slug' => 'mobility', 'target_muscles' => ['Infraspinatus', 'Teres Minor', 'Subscapularis', 'Supraspinatus', 'Posterior Deltoid'], 'description' => 'Reach arm across chest. Apply Hyperice to rear deltoid and rotator cuff area. Vibration aids shoulder recovery.'],
        ];

        foreach ($execises as $data) {
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
