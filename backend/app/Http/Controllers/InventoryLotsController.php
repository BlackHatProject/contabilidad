<?php

namespace App\Http\Controllers;

use App\Contracts\InventoryLotsContract;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryLotsController extends Controller
{
    public function __construct(
        protected InventoryLotsContract $contract
    ) {}
    public function store(Request $request)
    {
        $data = [
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'entry_date' => Carbon::now()->format('Y-m-d'),
            'entry_type' => $request->entry_type,
        ];
        //dd($data);
        //return dump([$data['name'], $data['user_id']]);
        $this->contract->store($data);
        return response()->json('Store de Intengory Lots');
    }
}
