<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FruitFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $sourceDir = public_path('foods/fruitfoods');
        $destDir = 'foods';

        $foods = [
            ['name' => 'Pisang', 'category_slug' => 'fruit', 'calories_per_100g' => 89, 'protein_per_100g' => 1.1, 'carbs_per_100g' => 22.8, 'fat_per_100g' => 0.3, 'serving_unit' => '1 buah sedang (120g)', 'image_file' => '1.png'],
            ['name' => 'Apel', 'category_slug' => 'fruit', 'calories_per_100g' => 52, 'protein_per_100g' => 0.3, 'carbs_per_100g' => 13.8, 'fat_per_100g' => 0.2, 'serving_unit' => '1 buah sedang (180g)', 'image_file' => '2.png'],
            ['name' => 'Blueberry', 'category_slug' => 'fruit', 'calories_per_100g' => 57, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 14.5, 'fat_per_100g' => 0.3, 'serving_unit' => '1 cup (148g)', 'image_file' => '3.png'],
            ['name' => 'Stroberi', 'category_slug' => 'fruit', 'calories_per_100g' => 32, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 7.7, 'fat_per_100g' => 0.3, 'serving_unit' => '1 cup (150g)', 'image_file' => '4.png'],
            ['name' => 'Jeruk', 'category_slug' => 'fruit', 'calories_per_100g' => 47, 'protein_per_100g' => 0.9, 'carbs_per_100g' => 11.8, 'fat_per_100g' => 0.1, 'serving_unit' => '1 buah sedang (150g)', 'image_file' => '5.png'],
            ['name' => 'Semangka', 'category_slug' => 'fruit', 'calories_per_100g' => 30, 'protein_per_100g' => 0.6, 'carbs_per_100g' => 7.6, 'fat_per_100g' => 0.2, 'serving_unit' => '1 potong besar (300g)', 'image_file' => '6.png'],
            ['name' => 'Alpukat', 'category_slug' => 'fruit', 'calories_per_100g' => 160, 'protein_per_100g' => 2, 'carbs_per_100g' => 8.5, 'fat_per_100g' => 14.7, 'serving_unit' => '½ buah (68g)', 'image_file' => '7.png'],
            ['name' => 'Kurma', 'category_slug' => 'fruit', 'calories_per_100g' => 282, 'protein_per_100g' => 2.5, 'carbs_per_100g' => 75, 'fat_per_100g' => 0.4, 'serving_unit' => '3 butir (24g)', 'image_file' => '8.png'],
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
