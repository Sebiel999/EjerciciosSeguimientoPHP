<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoriaController;

Route::prefix('memoria')->group(function () {
    Route::get('/', [MemoriaController::class, 'index'])->name('memoria.index');
    Route::post('/guardar', [MemoriaController::class, 'guardar'])->name('memoria.guardar');
});
