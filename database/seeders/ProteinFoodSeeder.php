<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;

class ProteinFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $foods = [
            ['name' => 'Dada ayam (tanpa kulit, panggang)', 'category_slug' => 'protein', 'calories_per_100g' => 165, 'protein_per_100g' => 31, 'carbs_per_100g' => 0, 'fat_per_100g' => 3.6, 'serving_unit' => '1 potong sedang (150g)'],
            ['name' => 'Telur utuh (rebus)', 'category_slug' => 'protein', 'calories_per_100g' => 155, 'protein_per_100g' => 12.6, 'carbs_per_100g' => 1.1, 'fat_per_100g' => 10.6, 'serving_unit' => '2 butir besar (100g)'],
            ['name' => 'Putih telur (rebus)', 'category_slug' => 'protein', 'calories_per_100g' => 52, 'protein_per_100g' => 10.9, 'carbs_per_100g' => 0.7, 'fat_per_100g' => 0.2, 'serving_unit' => '4 putih telur (100g)'],
            ['name' => 'Ikan tuna (kaleng, dalam air)', 'category_slug' => 'protein', 'calories_per_100g' => 116, 'protein_per_100g' => 25.5, 'carbs_per_100g' => 0, 'fat_per_100g' => 0.8, 'serving_unit' => '1 kaleng kecil (100g)'],
            ['name' => 'Ikan salmon (panggang)', 'category_slug' => 'protein', 'calories_per_100g' => 206, 'protein_per_100g' => 25.4, 'carbs_per_100g' => 0, 'fat_per_100g' => 12.3, 'serving_unit' => '1 fillet sedang (150g)'],
            ['name' => 'Daging sapi tanpa lemak (panggang)', 'category_slug' => 'protein', 'calories_per_100g' => 188, 'protein_per_100g' => 27.7, 'carbs_per_100g' => 0, 'fat_per_100g' => 8.3, 'serving_unit' => '1 potong sedang (150g)'],
            ['name' => 'Whey protein (bubuk)', 'category_slug' => 'protein', 'calories_per_100g' => 400, 'protein_per_100g' => 80, 'carbs_per_100g' => 10, 'fat_per_100g' => 4, 'serving_unit' => '1 scoop (30g)'],
            ['name' => 'Tahu (padat, mentah)', 'category_slug' => 'protein', 'calories_per_100g' => 76, 'protein_per_100g' => 8.1, 'carbs_per_100g' => 1.9, 'fat_per_100g' => 4.8, 'serving_unit' => '½ blok (150g)'],
            ['name' => 'Tempe (mentah)', 'category_slug' => 'protein', 'calories_per_100g' => 193, 'protein_per_100g' => 18.5, 'carbs_per_100g' => 7.6, 'fat_per_100g' => 10.8, 'serving_unit' => '1 potong (100g)'],
            ['name' => 'Edamame (kupas, rebus)', 'category_slug' => 'protein', 'calories_per_100g' => 121, 'protein_per_100g' => 11.9, 'carbs_per_100g' => 8.9, 'fat_per_100g' => 5.2, 'serving_unit' => '1 cup (155g)'],
        ];

        foreach ($foods as $data) {
            $categoryId = $categories[$data['category_slug']] ?? null;
            unset($data['category_slug']);
            $data['category_id'] = $categoryId;
            Food::create($data);
        }
    }
}
