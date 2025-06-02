<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('fecha_inicio')->get();
        return view('eventos.index', compact('eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio'
        ]);

        Evento::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'recordatorio' => $request->has('recordatorio'),
        ]);

        return redirect()->back()->with('success', 'Evento creado.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio'
        ]);

        $evento = Evento::findOrFail($id);
        $evento->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'recordatorio' => $request->has('recordatorio'),
        ]);

        return redirect()->back()->with('success', 'Evento actualizado.');
    }

    public function destroy($id)
    {
        Evento::destroy($id);
        return redirect()->back();
    }
}
