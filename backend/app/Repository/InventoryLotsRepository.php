<?php

namespace App\Repository;

use App\Models\InventoryLots;
use App\Models\Movements;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class InventoryLotsRepository
{

    public function consultAll(): Collection
    {
        $products = InventoryLots::with('inventory_lots', 'intentory')->get();
        return $products;
    }

    public function consultFIFO($id): ?Model
    {
        $inventory_lots = InventoryLots::where('product_id', $id)->orderBy('created_at', 'ASC')->first();
        return $inventory_lots;
    }

    public function store(array $data): Model
    {

        if($data['entry_type'] == "SALIDA") {
            $inventory_lots = $this->consultFIFO($data['product_id']);

            $movement = Movements::create(
                ['inventory_lots_id' => $inventory_lots->id, 
                'movement_date' => $data['entry_date'],
                'movement_type' => $data['entry_type'], 
                'quantity' => $data['quantity']]
            );
        }
        else {

            $inventory_lots = InventoryLots::create(
                ['product_id' => $data['product_id'], 
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
        }
        return $movement;
    }

    public function consultById(string $id): ?Model
    {
        $product = InventoryLots::query()->first();
        return $product;
    }
}
