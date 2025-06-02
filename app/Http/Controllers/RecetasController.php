<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class RecetasController extends Controller
{
    public function index(Request $request)
    {
        $query = Receta::query();

        if ($request->filled('buscar')) {
            $query->where('titulo', 'like', "%{$request->buscar}%")
                  ->orWhere('ingredientes', 'like', "%{$request->buscar}%")
                  ->orWhere('tipo', 'like', "%{$request->buscar}%");
        }

        $recetas = $query->orderBy('created_at', 'desc')->get();

        return view('recetas.index', compact('recetas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'ingredientes' => 'required|string',
            'preparacion' => 'required|string',
            'tipo' => 'nullable|string|max:100'
        ]);

        Receta::create($request->all());

        return redirect()->back();
    }

    public function destroy($id)
    {
        Receta::destroy($id);
        return redirect()->back();
    }
}
