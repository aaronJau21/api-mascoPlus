<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $families = [
            'Perros',
            'Gatos',
        ];

        foreach($families as $family){
            Family::create([
                'name' => $family,
                'slug' => Str::slug($family),
                'active' => true,
            ]);
        }
    }
}
