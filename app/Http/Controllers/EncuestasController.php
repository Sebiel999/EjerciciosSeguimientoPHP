<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;

class EncuestasController extends Controller
{
    public function index()
    {
        $encuestas = Encuesta::all();
        return view('encuestas.index', compact('encuestas'));
    }

    public function crear()
    {
        return view('encuestas.crear');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'nullable',
            'preguntas.*.texto' => 'required',
            'preguntas.*.respuestas.*' => 'required'
        ]);

        $encuesta = Encuesta::create($request->only(['titulo', 'descripcion']));

        foreach ($request->preguntas as $preguntaData) {
            $pregunta = $encuesta->preguntas()->create([
                'texto' => $preguntaData['texto']
            ]);

            foreach ($preguntaData['respuestas'] as $textoRespuesta) {
                $pregunta->respuestas()->create([
                    'texto' => $textoRespuesta,
                    'votos' => 0
                ]);
            }
        }

        return redirect()->route('encuestas.index');
    }

    public function mostrar(Encuesta $encuesta)
    {
        $encuesta->load('preguntas.respuestas');
        return view('encuestas.mostrar', compact('encuesta'));
    }

    public function votar(Request $request, Encuesta $encuesta)
    {
        foreach ($request->respuestas as $respuesta_id) {
            $respuesta = Respuesta::find($respuesta_id);
            if ($respuesta) {
                $respuesta->increment('votos');
            }
        }

        return redirect()->route('encuestas.resultados', $encuesta);
    }

    public function resultados(Encuesta $encuesta)
    {
        $encuesta->load('preguntas.respuestas');
        return view('encuestas.resultados', compact('encuesta'));
    }
}
