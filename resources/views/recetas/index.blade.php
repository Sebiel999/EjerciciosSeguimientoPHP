@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Plataforma de Recetas</h2>

    <!-- Buscador -->
    <form method="GET" action="{{ route('recetas.index') }}" class="mb-3">
        <input type="text" name="buscar" class="form-control" placeholder="Buscar por título, tipo o ingredientes" value="{{ request('buscar') }}">
    </form>

    <!-- Formulario para agregar receta -->
    <form action="{{ route('recetas.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-2">
            <input type="text" name="titulo" class="form-control" placeholder="Título de la receta" required>
        </div>
        <div class="mb-2">
            <textarea name="ingredientes" class="form-control" placeholder="Ingredientes (separados por coma)" required></textarea>
        </div>
        <div class="mb-2">
            <textarea name="preparacion" class="form-control" placeholder="Pasos de preparación" required></textarea>
        </div>
        <div class="mb-3">
            <input type="text" name="tipo" class="form-control" placeholder="Tipo de comida (ej. postre, entrada)">
        </div>
        <button class="btn btn-primary" type="submit">Guardar Receta</button>
    </form>

    <!-- Listado de recetas -->
    @forelse($recetas as $receta)
        <div class="card mb-3 p-3">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>{{ $receta->titulo }}</h5>
                    @if($receta->tipo)
                        <span class="badge bg-info">{{ $receta->tipo }}</span>
                    @endif
                    <p><strong>Ingredientes:</strong> {{ $receta->ingredientes }}</p>
                    <p><strong>Preparación:</strong> {{ $receta->preparacion }}</p>
                </div>
                <form action="{{ route('recetas.destroy', $receta->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    @empty
        <p>No hay recetas registradas.</p>
    @endforelse
</div>
@endsection
