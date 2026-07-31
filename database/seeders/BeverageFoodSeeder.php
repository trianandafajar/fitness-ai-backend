<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BeverageFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $sourceDir = public_path('foods/beveragefoods');
        $destDir = 'foods';

        $foods = [
            ['name' => 'Air kelapa', 'category_slug' => 'beverage', 'calories_per_100g' => 19, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 3.7, 'fat_per_100g' => 0.2, 'serving_unit' => '1 gelas (250ml)', 'image_file' => '1.png'],
            ['name' => 'Teh hijau (seduh)', 'category_slug' => 'beverage', 'calories_per_100g' => 1, 'protein_per_100g' => 0.1, 'carbs_per_100g' => 0, 'fat_per_100g' => 0, 'serving_unit' => '1 cangkir (240ml)', 'image_file' => '2.png'],
            ['name' => 'Kopi hitam', 'category_slug' => 'beverage', 'calories_per_100g' => 2, 'protein_per_100g' => 0.1, 'carbs_per_100g' => 0, 'fat_per_100g' => 0, 'serving_unit' => '1 cangkir (240ml)', 'image_file' => '3.png'],
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
