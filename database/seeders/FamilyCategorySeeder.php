<?php

namespace Database\Seeders;

use App\Models\FamilyCategory;
use Illuminate\Database\Seeder;

class FamilyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FamilyCategory::create([
            'family_id' => 1,
            'category_id' => 1,
        ]);

        FamilyCategory::create([
            'family_id' => 1,
            'category_id' => 2,
        ]);

        FamilyCategory::create([
            'family_id' => 1,
            'category_id' => 3,
        ]);

        FamilyCategory::create([
            'family_id' => 2,
            'category_id' => 1,
        ]);

        FamilyCategory::create([
            'family_id' => 2,
            'category_id' => 2,
        ]);

        FamilyCategory::create([
            'family_id' => 2,
            'category_id' => 3,
        ]);
    }
}
