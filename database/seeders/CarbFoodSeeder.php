<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CarbFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $sourceDir = public_path('foods/carbofoods');
        $destDir = 'foods';

        $foods = [
            ['name' => 'Nasi merah (matang)', 'category_slug' => 'carb', 'calories_per_100g' => 123, 'protein_per_100g' => 2.7, 'carbs_per_100g' => 25.6, 'fat_per_100g' => 0.9, 'serving_unit' => '1 mangkuk (150g)', 'image_file' => '1.png'],
            ['name' => 'Oatmeal (mentah)', 'category_slug' => 'carb', 'calories_per_100g' => 389, 'protein_per_100g' => 16.9, 'carbs_per_100g' => 66.3, 'fat_per_100g' => 6.9, 'serving_unit' => '½ mangkuk (40g)', 'image_file' => '2.png'],
            ['name' => 'Ubi jalar (kukus)', 'category_slug' => 'carb', 'calories_per_100g' => 86, 'protein_per_100g' => 1.6, 'carbs_per_100g' => 20.1, 'fat_per_100g' => 0.1, 'serving_unit' => '1 buah sedang (150g)', 'image_file' => '3.png'],
            ['name' => 'Kentang (rebus)', 'category_slug' => 'carb', 'calories_per_100g' => 87, 'protein_per_100g' => 1.9, 'carbs_per_100g' => 20.1, 'fat_per_100g' => 0.1, 'serving_unit' => '1 buah sedang (150g)', 'image_file' => '4.png'],
            ['name' => 'Pasta gandum utuh (matang)', 'category_slug' => 'carb', 'calories_per_100g' => 124, 'protein_per_100g' => 5.3, 'carbs_per_100g' => 26.5, 'fat_per_100g' => 0.5, 'serving_unit' => '1 piring (200g)', 'image_file' => '5.png'],
            ['name' => 'Roti gandum utuh', 'category_slug' => 'carb', 'calories_per_100g' => 247, 'protein_per_100g' => 13, 'carbs_per_100g' => 41, 'fat_per_100g' => 3.4, 'serving_unit' => '2 lembar (60g)', 'image_file' => '6.png'],
            ['name' => 'Quinoa (matang)', 'category_slug' => 'carb', 'calories_per_100g' => 120, 'protein_per_100g' => 4.4, 'carbs_per_100g' => 21.3, 'fat_per_100g' => 1.9, 'serving_unit' => '1 mangkuk (150g)', 'image_file' => '7.png'],
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
