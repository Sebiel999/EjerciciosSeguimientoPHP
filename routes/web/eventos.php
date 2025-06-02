<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventosController;

Route::prefix('eventos')->group(function () {
    Route::get('/', [EventosController::class, 'index'])->name('eventos.index');
    Route::post('/crear', [EventosController::class, 'store'])->name('eventos.store');
    Route::patch('/{id}/actualizar', [EventosController::class, 'update'])->name('eventos.update');
    Route::delete('/{id}', [EventosController::class, 'destroy'])->name('eventos.destroy');
});
