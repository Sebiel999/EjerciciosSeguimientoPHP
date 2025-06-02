<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GastosController extends Controller
{
    public function index()
    {
        $gastos = Gasto::orderBy('fecha', 'desc')->get();

        $resumenMensual = Gasto::select(
                DB::raw("DATE_FORMAT(fecha, '%Y-%m') as mes"),
                DB::raw("SUM(monto) as total")
            )
            ->groupBy('mes')
            ->orderBy('mes', 'desc')
            ->get();

        return view('gastos.index', compact('gastos', 'resumenMensual'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
            'categoria' => 'required|string|max:100',
            'fecha' => 'required|date'
        ]);

        Gasto::create($request->all());

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gasto::destroy($id);
        return redirect()->back();
    }
}
