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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // equivale a INT AUTO_INCREMENT PRIMARY KEY
            $table->string('name', 255)->unique(); // VARCHAR(255) NOT NULL UNIQUE
            $table->foreignId('user_id') // INT NOT NULL + FK
                  ->constrained('users') // FOREIGN KEY REFERENCES Product(id)
                  ->onDelete('cascade');
            //$table->string('category', 100)->nullable(); // VARCHAR(100), puede ser nulo si no se definió como NOT NULL
            $table->timestamps(); // crea columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
