<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetasController;

Route::prefix('recetas')->group(function () {
    Route::get('/', [RecetasController::class, 'index'])->name('recetas.index');
    Route::post('/crear', [RecetasController::class, 'store'])->name('recetas.store');
    Route::delete('/{id}', [RecetasController::class, 'destroy'])->name('recetas.destroy');
});
