<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContrasenaController;

Route::prefix('contrasena')->group(function () {
    Route::get('/', [ContrasenaController::class, 'index'])->name('contrasena.index');
    Route::post('/generar', [ContrasenaController::class, 'generar'])->name('contrasena.generar');
});
