<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProteinFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $sourceDir = public_path('foods/proteinfoods');
        $destDir = 'foods';

        $foods = [
            ['name' => 'Dada ayam (tanpa kulit, panggang)', 'category_slug' => 'protein', 'calories_per_100g' => 165, 'protein_per_100g' => 31, 'carbs_per_100g' => 0, 'fat_per_100g' => 3.6, 'serving_unit' => '1 potong sedang (150g)', 'image_file' => '1.png'],
            ['name' => 'Telur utuh (rebus)', 'category_slug' => 'protein', 'calories_per_100g' => 155, 'protein_per_100g' => 12.6, 'carbs_per_100g' => 1.1, 'fat_per_100g' => 10.6, 'serving_unit' => '2 butir besar (100g)', 'image_file' => '2.png'],
            ['name' => 'Putih telur (rebus)', 'category_slug' => 'protein', 'calories_per_100g' => 52, 'protein_per_100g' => 10.9, 'carbs_per_100g' => 0.7, 'fat_per_100g' => 0.2, 'serving_unit' => '4 putih telur (100g)', 'image_file' => '3.png'],
            ['name' => 'Ikan tuna (kaleng, dalam air)', 'category_slug' => 'protein', 'calories_per_100g' => 116, 'protein_per_100g' => 25.5, 'carbs_per_100g' => 0, 'fat_per_100g' => 0.8, 'serving_unit' => '1 kaleng kecil (100g)', 'image_file' => '4.png'],
            ['name' => 'Ikan salmon (panggang)', 'category_slug' => 'protein', 'calories_per_100g' => 206, 'protein_per_100g' => 25.4, 'carbs_per_100g' => 0, 'fat_per_100g' => 12.3, 'serving_unit' => '1 fillet sedang (150g)', 'image_file' => '5.png'],
            ['name' => 'Daging sapi tanpa lemak (panggang)', 'category_slug' => 'protein', 'calories_per_100g' => 188, 'protein_per_100g' => 27.7, 'carbs_per_100g' => 0, 'fat_per_100g' => 8.3, 'serving_unit' => '1 potong sedang (150g)', 'image_file' => '6.png'],
            ['name' => 'Whey protein (bubuk)', 'category_slug' => 'protein', 'calories_per_100g' => 400, 'protein_per_100g' => 80, 'carbs_per_100g' => 10, 'fat_per_100g' => 4, 'serving_unit' => '1 scoop (30g)', 'image_file' => '7.png'],
            ['name' => 'Tahu (padat, mentah)', 'category_slug' => 'protein', 'calories_per_100g' => 76, 'protein_per_100g' => 8.1, 'carbs_per_100g' => 1.9, 'fat_per_100g' => 4.8, 'serving_unit' => '½ blok (150g)', 'image_file' => '8.png'],
            ['name' => 'Tempe (mentah)', 'category_slug' => 'protein', 'calories_per_100g' => 193, 'protein_per_100g' => 18.5, 'carbs_per_100g' => 7.6, 'fat_per_100g' => 10.8, 'serving_unit' => '1 potong (100g)', 'image_file' => '9.png'],
            ['name' => 'Edamame (kupas, rebus)', 'category_slug' => 'protein', 'calories_per_100g' => 121, 'protein_per_100g' => 11.9, 'carbs_per_100g' => 8.9, 'fat_per_100g' => 5.2, 'serving_unit' => '1 cup (155g)', 'image_file' => '10.png'],
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
