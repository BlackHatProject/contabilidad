<?php

use App\Http\Controllers\api\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix("products")->group(function () {

    Route::get("/", [ProductsController::class, "consultAll"]);
    Route::get("/{id}", [ProductsController::class, "consultById"]);
    Route::post("/store", [ProductsController::class, "store"]);
    
});