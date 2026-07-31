<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SnackFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $sourceDir = public_path('foods/snackfoods');
        $destDir = 'foods';

        $foods = [
            ['name' => 'Almond', 'category_slug' => 'snack', 'calories_per_100g' => 579, 'protein_per_100g' => 21.2, 'carbs_per_100g' => 21.6, 'fat_per_100g' => 49.9, 'serving_unit' => '1 genggam (23 butir, 28g)', 'image_file' => '1.png'],
            ['name' => 'Kacang mete', 'category_slug' => 'snack', 'calories_per_100g' => 553, 'protein_per_100g' => 18.2, 'carbs_per_100g' => 30.2, 'fat_per_100g' => 43.9, 'serving_unit' => '1 genggam (28g)', 'image_file' => '2.png'],
            ['name' => 'Rice cake (plain)', 'category_slug' => 'snack', 'calories_per_100g' => 387, 'protein_per_100g' => 7.7, 'carbs_per_100g' => 81.1, 'fat_per_100g' => 2.8, 'serving_unit' => '1 keping (9g)', 'image_file' => '3.png'],
            ['name' => 'Selai kacang (natural)', 'category_slug' => 'snack', 'calories_per_100g' => 588, 'protein_per_100g' => 25, 'carbs_per_100g' => 20, 'fat_per_100g' => 50, 'serving_unit' => '1 sdm (16g)', 'image_file' => '4.png'],
            ['name' => 'Protein bar rendah gula', 'category_slug' => 'snack', 'calories_per_100g' => 380, 'protein_per_100g' => 33, 'carbs_per_100g' => 20, 'fat_per_100g' => 15, 'serving_unit' => '1 batang (60g)', 'image_file' => '5.png'],
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
