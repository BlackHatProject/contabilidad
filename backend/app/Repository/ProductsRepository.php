<?php

namespace App\Repository;

//use App\Models\InventoryLots;

use App\Models\InventoryLots;
use App\Models\Movements;
use App\Models\Products;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductsRepository
{

    public function consultAll(): Collection
    {
        $products = Products::with('inventory_lots', 'inventory')->get();
        return $products;
    }

    public function store(array $data): Model
    {
        $product = Products::create(
            ['name' => $data['name'], 'user_id' => $data['user_id']]
        );
        $inventory_lots = InventoryLots::create(
            ['product_id' => $product->id, 
             'entry_date' => $data['entry_date'], 
             'quantity_entered' => $data['quantity'], 
             'unit_cost' => $data['price'], 
             'remaining_quantity' => $data['quantity']]
        );
        $movement = Movements::create(
            ['inventory_lots_id' => $inventory_lots->id, 
             'movement_date' => $data['entry_date'],
              'movement_type' => $data['entry_type'], 
              'quantity' => $data['quantity']]
        );
        return $product;
    }

    public function consultById(string $id): ?Model
    {
        $product = Products::query()->with('inventory_lots.movements', 'inventory')->where("id", "=", $id)->first();
        return $product;
    }
}
