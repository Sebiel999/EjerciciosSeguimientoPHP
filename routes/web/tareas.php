<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;

Route::prefix('tareas')->group(function () {
    Route::get('/', [TareasController::class, 'index'])->name('tareas.index');
    Route::post('/crear', [TareasController::class, 'store'])->name('tareas.store');
    Route::delete('/{id}', [TareasController::class, 'destroy'])->name('tareas.destroy');
    Route::patch('/{id}/toggle', [TareasController::class, 'toggle'])->name('tareas.toggle');
});
