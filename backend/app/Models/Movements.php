<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movements extends Model
{
    protected $fillable = [
        'inventory_lots_id',
        'movement_type',
        'movement_date',
        'quantity',
    ];
}
