<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContrasenaGenerada;

class ContrasenaController extends Controller
{
    public function index()
    {
        return view('contrasena.index');
    }

    public function generar(Request $request)
    {
        $request->validate([
            'longitud' => 'required|integer|min:4|max:64',
            'incluir_mayusculas' => 'nullable|boolean',
            'incluir_numeros' => 'nullable|boolean',
            'incluir_simbolos' => 'nullable|boolean'
        ]);

        $caracteres = 'abcdefghijklmnopqrstuvwxyz';
        if ($request->incluir_mayusculas) $caracteres .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($request->incluir_numeros) $caracteres .= '0123456789';
        if ($request->incluir_simbolos) $caracteres .= '!@#$%^&*()-_+=<>?/';

        $longitud = $request->longitud;
        $contrasena = '';
        for ($i = 0; $i < $longitud; $i++) {
            $contrasena .= $caracteres[random_int(0, strlen($caracteres) - 1)];
        }

        $tiposSeleccionados = array_filter([
            $request->incluir_mayusculas ? 'mayúsculas' : null,
            $request->incluir_numeros ? 'números' : null,
            $request->incluir_simbolos ? 'símbolos' : null,
        ]);

        $tiposTexto = count($tiposSeleccionados) > 0 ? implode(', ', $tiposSeleccionados) : 'Ninguno';

        $registro = ContrasenaGenerada::create([
            'valor' => $contrasena,
            'longitud' => $longitud,
            'tipos' => $tiposTexto,
        ]);

        return view('contrasena.index', ['resultado' => $registro]);
    }
}
