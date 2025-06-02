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
        Schema::create('contrasena_generadas', function (Blueprint $table) {
            $table->id();
            $table->string('valor'); // contraseña generada
            $table->integer('longitud');
            $table->string('tipos')->nullable(); // ej: "mayúsculas, símbolos, números"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrasena_generadas');
    }
};
