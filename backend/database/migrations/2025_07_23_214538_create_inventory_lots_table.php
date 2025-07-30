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
        Schema::create('inventory_lots', function (Blueprint $table) {
            $table->id(); 

            $table->foreignId('product_id') 
                  ->constrained('products') 
                  ->onDelete('cascade');    

            $table->dateTime('entry_date'); 

            $table->integer('quantity_entered'); 
            $table->decimal('unit_cost', 10, 4); 
            $table->integer('remaining_quantity'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_lots');
    }
};
