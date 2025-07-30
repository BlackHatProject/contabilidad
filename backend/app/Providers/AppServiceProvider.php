<?php

namespace App\Providers;

use App\Contracts\InventoryLotsContract;
use App\Contracts\ProductsContract;
use App\Http\Controllers\api\ProductsController;
use App\Http\Controllers\InventoryLotsController;
use App\Models\InventoryLots;
use App\Services\InventoryLotsServices;
use App\Services\ProductsServices;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(ProductsController::class)
             ->needs(ProductsContract::class)
             ->give(ProductsServices::class);

        $this->app->when(InventoryLotsController::class)
             ->needs(InventoryLotsContract::class)
             ->give(InventoryLotsServices::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
