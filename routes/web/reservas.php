<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasController;

Route::prefix('reservas')->group(function () {
    Route::get('/', [ReservasController::class, 'index'])->name('reservas.index');
    Route::post('/crear', [ReservasController::class, 'store'])->name('reservas.store');
    Route::delete('/{id}', [ReservasController::class, 'destroy'])->name('reservas.destroy');
});
