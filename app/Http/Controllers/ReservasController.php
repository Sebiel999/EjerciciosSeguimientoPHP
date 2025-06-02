<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    public function index()
    {
        $reservas = Reserva::orderBy('fecha_hora', 'asc')->get();
        return view('reservas.index', compact('reservas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_servicio' => 'required|string|max:255',
            'fecha_hora' => 'required|date|after_or_equal:now'
        ]);

        // Verificar disponibilidad
        $existe = Reserva::where('fecha_hora', $request->fecha_hora)->exists();
        if ($existe) {
            return redirect()->back()->with('error', 'Ya existe una reserva en esa fecha y hora.');
        }

        Reserva::create([
            'nombre_servicio' => $request->nombre_servicio,
            'fecha_hora' => $request->fecha_hora,
            'confirmada' => true
        ]);

        return redirect()->back()->with('success', 'Reserva confirmada.');
    }

    public function destroy($id)
    {
        Reserva::destroy($id);
        return redirect()->back();
    }
}
