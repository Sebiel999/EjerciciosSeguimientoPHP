<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropinasController;

Route::prefix('propinas')->group(function () {
    Route::get('/', [PropinasController::class, 'index'])->name('propinas.index');
    Route::post('/calcular', [PropinasController::class, 'store'])->name('propinas.store');
});
