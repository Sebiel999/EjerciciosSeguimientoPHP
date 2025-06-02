<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Tiempo;

Route::get('/tiempos', function () {
    $vueltas = \App\Models\Tiempo::latest()->get();
    return view('tiempos.index', compact('vueltas'));
})->name('tiempos.index');

Route::post('/tiempos/guardar', function (Request $request) {
    Tiempo::create([
        'tiempo_formateado' => $request->tiempo,
        'duracion_segundos' => $request->segundos,
        'descripcion' => $request->descripcion
    ]);
    return response()->json(['success' => true]);
})->name('tiempos.guardar');
