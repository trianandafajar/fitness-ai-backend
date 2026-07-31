<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DairyFoodSeeder extends Seeder
{
    public function run(): void
    {
        $categories = FoodCategory::pluck('id', 'slug');

        $sourceDir = public_path('foods/dairyfoods');
        $destDir = 'foods';

        $foods = [
            ['name' => 'Greek yogurt (plain, rendah lemak)', 'category_slug' => 'dairy', 'calories_per_100g' => 73, 'protein_per_100g' => 10, 'carbs_per_100g' => 4, 'fat_per_100g' => 1.9, 'serving_unit' => '1 cup (200g)', 'image_file' => '1.png'],
            ['name' => 'Susu rendah lemak', 'category_slug' => 'dairy', 'calories_per_100g' => 42, 'protein_per_100g' => 3.4, 'carbs_per_100g' => 5, 'fat_per_100g' => 1, 'serving_unit' => '1 gelas (250ml)', 'image_file' => '2.png'],
            ['name' => 'Cottage cheese (rendah lemak)', 'category_slug' => 'dairy', 'calories_per_100g' => 72, 'protein_per_100g' => 12.4, 'carbs_per_100g' => 2.7, 'fat_per_100g' => 1, 'serving_unit' => '½ cup (113g)', 'image_file' => '3.png'],
            ['name' => 'Keju mozzarella rendah lemak', 'category_slug' => 'dairy', 'calories_per_100g' => 280, 'protein_per_100g' => 28, 'carbs_per_100g' => 3.1, 'fat_per_100g' => 17, 'serving_unit' => '1 slice (28g)', 'image_file' => '4.png'],
            ['name' => 'Kefir (plain, rendah lemak)', 'category_slug' => 'dairy', 'calories_per_100g' => 41, 'protein_per_100g' => 3.3, 'carbs_per_100g' => 4.5, 'fat_per_100g' => 1, 'serving_unit' => '1 gelas (250ml)', 'image_file' => '5.png'],
            ['name' => 'Susu cokelat (rendah lemak)', 'category_slug' => 'dairy', 'calories_per_100g' => 63, 'protein_per_100g' => 3.2, 'carbs_per_100g' => 10.5, 'fat_per_100g' => 1, 'serving_unit' => '1 gelas (250ml)', 'image_file' => '6.png'],
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
