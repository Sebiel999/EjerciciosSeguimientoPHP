<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotasController;

Route::prefix('notas')->group(function () {
    Route::get('/', [NotasController::class, 'index'])->name('notas.index');
    Route::post('/crear', [NotasController::class, 'store'])->name('notas.store');
    Route::delete('/{id}', [NotasController::class, 'destroy'])->name('notas.destroy');
});
