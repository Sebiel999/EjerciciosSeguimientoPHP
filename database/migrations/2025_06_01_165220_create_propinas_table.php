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
        Schema::create('propinas', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto_total', 10, 2);
            $table->unsignedInteger('porcentaje');
            $table->decimal('valor_propina', 10, 2)->nullable(); // Se puede calcular y guardar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propinas');
    }
};
