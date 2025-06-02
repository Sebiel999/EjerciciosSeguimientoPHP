<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tiempos', function (Blueprint $table) {
            $table->id();
            $table->string('tiempo_formateado');        // ej: "00:01:12.315"
            $table->unsignedInteger('duracion_segundos'); // en segundos
            $table->string('descripcion')->nullable();   // opcional
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('tiempos');
    }
};
