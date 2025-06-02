@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>{{ $encuesta->titulo }}</h2>
    <p>{{ $encuesta->descripcion }}</p>

    <form method="POST" action="{{ route('encuestas.votar', $encuesta) }}">
        @csrf

        @foreach($encuesta->preguntas as $pregunta)
            <div class="mb-4">
                <strong>{{ $pregunta->texto }}</strong>
                <br>
                @foreach($pregunta->respuestas as $respuesta)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="respuestas[{{ $pregunta->id }}]" value="{{ $respuesta->id }}" required>
                        <label class="form-check-label">{{ $respuesta->texto }}</label>
                    </div>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Enviar respuestas</button>
    </form>
</div>
@endsection
