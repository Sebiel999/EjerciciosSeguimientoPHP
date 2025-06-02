<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GastosController;

Route::prefix('gastos')->group(function () {
    Route::get('/', [GastosController::class, 'index'])->name('gastos.index');
    Route::post('/crear', [GastosController::class, 'store'])->name('gastos.store');
    Route::delete('/{id}', [GastosController::class, 'destroy'])->name('gastos.destroy');
});
