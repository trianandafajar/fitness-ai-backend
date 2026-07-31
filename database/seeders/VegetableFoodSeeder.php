<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class VegetableFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $sourceDir = public_path('foods/vegetablefoods');
        $destDir = 'foods';

        $foods = [
            ['name' => 'Brokoli (kukus)', 'category_slug' => 'vegetable', 'calories_per_100g' => 35, 'protein_per_100g' => 2.4, 'carbs_per_100g' => 7.2, 'fat_per_100g' => 0.4, 'serving_unit' => '1 mangkuk (150g)', 'image_file' => '1.png'],
            ['name' => 'Bayam (mentah)', 'category_slug' => 'vegetable', 'calories_per_100g' => 23, 'protein_per_100g' => 2.9, 'carbs_per_100g' => 3.6, 'fat_per_100g' => 0.4, 'serving_unit' => '2 cup (60g)', 'image_file' => '2.png'],
            ['name' => 'Kale (mentah)', 'category_slug' => 'vegetable', 'calories_per_100g' => 49, 'protein_per_100g' => 4.3, 'carbs_per_100g' => 8.8, 'fat_per_100g' => 0.9, 'serving_unit' => '1 cup (67g)', 'image_file' => '3.png'],
            ['name' => 'Asparagus (kukus)', 'category_slug' => 'vegetable', 'calories_per_100g' => 22, 'protein_per_100g' => 2.4, 'carbs_per_100g' => 4.1, 'fat_per_100g' => 0.2, 'serving_unit' => '6 batang (100g)', 'image_file' => '4.png'],
            ['name' => 'Paprika (merah, mentah)', 'category_slug' => 'vegetable', 'calories_per_100g' => 31, 'protein_per_100g' => 1, 'carbs_per_100g' => 6, 'fat_per_100g' => 0.3, 'serving_unit' => '1 buah besar (150g)', 'image_file' => '5.png'],
            ['name' => 'Timun', 'category_slug' => 'vegetable', 'calories_per_100g' => 15, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 3.6, 'fat_per_100g' => 0.1, 'serving_unit' => '1 buah sedang (200g)', 'image_file' => '6.png'],
            ['name' => 'Wortel', 'category_slug' => 'vegetable', 'calories_per_100g' => 41, 'protein_per_100g' => 0.9, 'carbs_per_100g' => 9.6, 'fat_per_100g' => 0.2, 'serving_unit' => '1 buah sedang (61g)', 'image_file' => '7.png'],
        ];

        foreach ($foods as $data) {
            $imageFile = $data['image_file'];
            unset($data['image_file']);

            $sourcePath = $sourceDir . '/' . $imageFile;

            if (file_exists($sourcePath)) {
                $destPath = $destDir . '/' . uniqid('food_') . '.png';
                Storage::disk('public')->put($destPath, file_get_contents($sourcePath));
                $data['image'] = $destPath;
            }

            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;
            Food::create($data);
        }
    }
}
