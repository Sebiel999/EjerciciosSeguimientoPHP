<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotasController extends Controller
{
    public function index(Request $request)
    {
        $query = Nota::query();

        if ($request->filled('buscar')) {
            $query->where('titulo', 'like', "%{$request->buscar}%")
                  ->orWhere('contenido', 'like', "%{$request->buscar}%")
                  ->orWhere('categoria', 'like', "%{$request->buscar}%");
        }

        $notas = $query->orderBy('created_at', 'desc')->get();

        return view('notas.index', compact('notas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'categoria' => 'nullable|string|max:100'
        ]);

        Nota::create($request->all());

        return redirect()->back();
    }

    public function destroy($id)
    {
        Nota::destroy($id);
        return redirect()->back();
    }
}
