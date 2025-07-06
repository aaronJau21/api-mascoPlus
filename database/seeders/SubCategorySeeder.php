<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategory::create([
            'name' => 'Alimento Seco',
            'slug' => 'alimento-seco',
            'category_id' => 1,
            'active' => true,
        ]);

        SubCategory::create([
            'name' => 'Alimento Humedo',
            'slug' => 'alimento-humedo',
            'category_id' => 1,
            'active' => true,
        ]);

        SubCategory::create([
            'name' => 'Antiparasitarios',
            'slug' => 'antiparasitarios',
            'category_id' => 2,
            'active' => true,
        ]);

        SubCategory::create([
            'name' => 'Arena',
            'slug' => 'arena',
            'category_id' => 2,
            'active' => true,
        ]);

        SubCategory::create([
            'name' => 'Camas',
            'slug' => 'camas',
            'category_id' => 3,
            'active' => true,
        ]);

        SubCategory::create([
            'name' => 'Catnip',
            'slug' => 'catnip',
            'category_id' => 3,
            'active' => true,
        ]);


    }
}
