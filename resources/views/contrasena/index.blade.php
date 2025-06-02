@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Generador de Contraseñas Seguras</h2>

    <form method="POST" action="{{ route('contrasena.generar') }}" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="longitud" class="form-label">Longitud</label>
            <input type="number" name="longitud" id="longitud" class="form-control" value="12" min="4" max="64" required>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="incluir_mayusculas" value="1" id="mayusculas">
            <label class="form-check-label" for="mayusculas">Incluir Mayúsculas</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="incluir_numeros" value="1" id="numeros">
            <label class="form-check-label" for="numeros">Incluir Números</label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="incluir_simbolos" value="1" id="simbolos">
            <label class="form-check-label" for="simbolos">Incluir Símbolos</label>
        </div>

        <button type="submit" class="btn btn-primary">Generar Contraseña</button>
    </form>

    @isset($resultado)
        <div class="alert alert-success">
            <p><strong>Contraseña Generada:</strong> {{ $resultado->valor }}</p>
            <p><strong>Longitud:</strong> {{ $resultado->longitud }}</p>
            <p><strong>Tipos Incluidos:</strong> {{ $resultado->tipos }}</p>
        </div>
    @endisset
</div>
@endsection
