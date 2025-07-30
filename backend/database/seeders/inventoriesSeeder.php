<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class inventoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = DB::table('products')->pluck('id');

        foreach ($products as $productId) {
            DB::table('inventories')->insert([
                'product_id' => $productId,
                'costing_method' => ['FIFO', 'FILO'][rand(0, 1)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
