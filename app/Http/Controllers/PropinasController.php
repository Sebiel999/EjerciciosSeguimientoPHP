<?php

namespace App\Http\Controllers;

use App\Models\Propina;
use Illuminate\Http\Request;

class PropinasController extends Controller
{
    public function index()
    {
        return view('propinas.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'monto_total' => 'required|numeric|min:0',
            'porcentaje' => 'required|integer|min:0|max:100'
        ]);

        $valor_propina = $request->monto_total * ($request->porcentaje / 100);

        $registro = Propina::create([
            'monto_total' => $request->monto_total,
            'porcentaje' => $request->porcentaje,
            'valor_propina' => $valor_propina
        ]);

        return view('propinas.index', ['resultado' => $registro]);
    }
}
