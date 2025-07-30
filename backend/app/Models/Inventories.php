<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventories extends Model
{
    protected $fillable = [
        'product_id',
        'costing_method',
    ];

  public function product()
  {
    return $this->hasOne(Products::class, 'categorie_id');
  }
}
