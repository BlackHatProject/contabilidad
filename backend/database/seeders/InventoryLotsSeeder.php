<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class InventoryLotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productIds = DB::table('products')->pluck('id');

        foreach ($productIds as $productId) {
            DB::table('inventory_lots')->insert([
                'product_id' => $productId,
                'entry_date' => Carbon::now()->subDays(rand(1, 30)), // fechas en los últimos 30 días
                'quantity_entered' => rand(50, 200),
                'unit_cost' => round(mt_rand(1000, 5000) / 100, 4), // precios entre 10.00 y 50.00
                'remaining_quantity' => rand(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
