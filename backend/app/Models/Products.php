<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function inventory()
    {
        return $this->hasMany(Inventories::class, 'product_id', 'id');
    }

    public function inventory_lots()
    {
        return $this->hasMany(InventoryLots::class, 'product_id', 'id');
    }

}
