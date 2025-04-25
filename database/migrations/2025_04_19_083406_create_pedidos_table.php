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

        Schema::create('ventanas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_pedido');
            $table->enum('estado', ['pagado', 'preparacion', 'listo', 'entregado']);
            $table->date('fecha');
            $table->unsignedInteger('precio_total');
            $table->foreignId('ventana_id')->constrained('ventanas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
