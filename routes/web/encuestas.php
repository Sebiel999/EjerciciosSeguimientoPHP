<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncuestasController;

Route::prefix('encuestas')->group(function () {
    Route::get('/', [EncuestasController::class, 'index'])->name('encuestas.index');
    Route::get('/crear', [EncuestasController::class, 'crear'])->name('encuestas.crear');
    Route::post('/guardar', [EncuestasController::class, 'guardar'])->name('encuestas.guardar');
    Route::get('/{encuesta}', [EncuestasController::class, 'mostrar'])->name('encuestas.mostrar');
    Route::post('/{encuesta}/votar', [EncuestasController::class, 'votar'])->name('encuestas.votar');
    Route::get('/{encuesta}/resultados', [EncuestasController::class, 'resultados'])->name('encuestas.resultados');
});
