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
        Schema::create('kebabs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos')->cascadeOnDelete();
            $table->enum('carne', ['pollo', 'ternera', 'mixto']);
            $table->unsignedInteger('lechuga');
            $table->unsignedInteger('tomate');
            $table->unsignedInteger('cebolla');
            $table->unsignedInteger('salsa');
            $table->unsignedInteger('picante');
            $table->unsignedInteger('precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebabs');
    }
};
