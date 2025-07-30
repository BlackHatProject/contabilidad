<?php

namespace App\Http\Controllers\api;

use App\Contracts\ProductsContract;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function __construct(protected ProductsContract $products) {}

    public function consultAll(Request $request)
    {
        return $this->products->consultAll();
    }

     public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'user_id' => 1,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'entry_date' => Carbon::now()->format('Y-m-d'),
            'entry_type' => $request->entry_type,
        ];
        //return dump([$data['name'], $data['user_id']]);
        $this->products->store($data);
        return response()->json('Se ha guardado los datos');
    }

    public function consultById(Request $request, $id)
    {
        return $this->products->consultById($id);
    }
}
