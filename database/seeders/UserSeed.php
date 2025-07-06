<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Aaron Jauregui',
            'email' => 'aaron@mascoplus.com',
            'password' => Hash::make('12345678'),
            'user_role_id' => 1,
        ]);

        User::create([
            'name' => 'Prueba1',
            'email' => 'prueba1@mascoplus.com',
            'password' => Hash::make('12345678'),
            'user_role_id' => 2,
        ]);

        User::create([
            'name' => 'Prueba2',
            'email' => 'prueba2@mascoplus.com',
            'password' => Hash::make('12345678'),
            'user_role_id' => 3,
        ]);
    }
}
