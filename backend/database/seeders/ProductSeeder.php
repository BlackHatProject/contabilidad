<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Producto Demo ' . Str::random(5),
            'user_id' => 1, // Asegúrate de que el usuario con ID 1 existe
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
