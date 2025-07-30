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

    public function store(array $data): Model
    {
        return InventoryLots::create($data);
    }

    public function consultById(string $id): ?Model
    {
        $product = InventoryLots::query()->first();
        return $product;
    }
}
