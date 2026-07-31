<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FatSeedFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $sourceDir = public_path('foods/fatfoods');
        $destDir = 'foods';

        $foods = [
            ['name' => 'Minyak zaitun', 'category_slug' => 'fat', 'calories_per_100g' => 884, 'protein_per_100g' => 0, 'carbs_per_100g' => 0, 'fat_per_100g' => 100, 'serving_unit' => '1 sdm (14g)', 'image_file' => '1.png'],
            ['name' => 'Biji chia', 'category_slug' => 'fat', 'calories_per_100g' => 486, 'protein_per_100g' => 16.5, 'carbs_per_100g' => 42.1, 'fat_per_100g' => 30.7, 'serving_unit' => '1 sdm (15g)', 'image_file' => '2.png'],
            ['name' => 'Biji rami', 'category_slug' => 'fat', 'calories_per_100g' => 534, 'protein_per_100g' => 18.3, 'carbs_per_100g' => 28.9, 'fat_per_100g' => 42.2, 'serving_unit' => '1 sdm (10g)', 'image_file' => '3.png'],
            ['name' => 'Kenari', 'category_slug' => 'fat', 'calories_per_100g' => 654, 'protein_per_100g' => 15.2, 'carbs_per_100g' => 13.7, 'fat_per_100g' => 65.2, 'serving_unit' => '1 genggam (28g)', 'image_file' => '4.png'],
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
