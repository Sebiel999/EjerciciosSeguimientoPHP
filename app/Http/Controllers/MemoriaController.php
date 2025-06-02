<?php

namespace App\Http\Controllers;

use App\Models\JuegoMemoria;
use Illuminate\Http\Request;

class MemoriaController extends Controller
{
    public function index()
    {
        return view('memoria.index');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nivel_dificultad' => 'required|in:4,6,8',
            'puntaje' => 'required|integer|min:0'
        ]);

        JuegoMemoria::create([
            'nivel_dificultad' => $request->nivel_dificultad,
            'puntaje' => $request->puntaje
        ]);

        return response()->json(['success' => true]);
    }
}
