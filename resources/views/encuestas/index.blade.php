@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Encuestas disponibles</h2>

    <a href="{{ route('encuestas.crear') }}" class="btn btn-primary my-3">Crear nueva encuesta</a>

    <ul class="list-group">
        @foreach($encuestas as $encuesta)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $encuesta->titulo }}</strong>
                    <br>
                    <small>{{ $encuesta->descripcion }}</small>
                </div>
                <div>
                    <a href="{{ route('encuestas.mostrar', $encuesta) }}" class="btn btn-sm btn-success">Responder</a>
                    <a href="{{ route('encuestas.resultados', $encuesta) }}" class="btn btn-sm btn-info">Resultados</a>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
