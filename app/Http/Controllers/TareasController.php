<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function index()
    {
        $tareas = Tarea::orderBy('created_at', 'desc')->get();
        return view('tareas.index', compact('tareas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string'
        ]);

        Tarea::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Tarea::destroy($id);
        return redirect()->back();
    }

    public function toggle($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->completada = !$tarea->completada;
        $tarea->save();

        return redirect()->back();
    }
}
