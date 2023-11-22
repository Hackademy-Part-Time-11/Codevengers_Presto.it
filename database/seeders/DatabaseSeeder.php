<?php

namespace Database\Seeders;

use Faker\Factory as FakerFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory(10)->create();
        \App\Models\item::factory(40)->create();

        \App\Models\item::all()->each(function ($item) {
            $faker = FakerFactory::create();
            for ($i = 1; $i <= 4; $i++) {
                \App\Models\item_image::create([
                    'item_id' => $item->id,
                    'image' => $faker->imageUrl(),
                ]);
            }
        });

        \App\Models\Category::factory(10)->create();

        $this->categoriesToItems();



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

    private function categoriesToItems()
    {
        $items = \App\Models\Item::all();
        $categoryIds = \App\Models\Category::pluck('id')->toArray();

        foreach ($items as $item) {
            $categoryIdsWithoutZero = array_diff($categoryIds, [0]);

        // Controlla che ci siano almeno 2 ID di categorie disponibili
        if (count($categoryIdsWithoutZero) >= 2) {
            // Estrae due ID di categorie casuali
            $randomCategoryIds = array_rand($categoryIdsWithoutZero, 2);
            // Ottiene gli ID reali delle categorie
            $selectedCategoryIds = array_intersect_key($categoryIdsWithoutZero, array_flip($randomCategoryIds));

            // Associa gli ID delle categorie all'elemento
            $item->categories()->attach($selectedCategoryIds);
        }
    }
    }
}
