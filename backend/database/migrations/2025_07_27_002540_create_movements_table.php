<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('inventory_lots_id');
            $table->enum('movement_type', ['ENTRADA', 'SALIDA']);
            $table->dateTime('movement_date');
            $table->integer('quantity')->check('quantity > 0');
            //$table->decimal('total_cost_impact', 10, 4);
            //$table->text('details')->nullable();
            $table->timestamps();

            //$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('inventory_lots_id')->references('id')->on('inventory_lots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
