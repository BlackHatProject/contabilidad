<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryLots extends Model
{
    protected $fillable = [
        'product_id',
        'entry_date',
        'quantity_entered',
        'unit_cost',
        'remaining_quantity',
    ];

    public function movements() 
    {
        return $this->hasMany(Movements::class, 'inventory_lots_id', 'id');
    }
}
