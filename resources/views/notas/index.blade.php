@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Gestor de Notas</h2>

    <!-- Buscador -->
    <form method="GET" action="{{ route('notas.index') }}" class="mb-3">
        <input type="text" name="buscar" class="form-control" placeholder="Buscar notas por título, contenido o categoría" value="{{ request('buscar') }}">
    </form>

    <!-- Formulario para agregar nota -->
    <form action="{{ route('notas.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-2">
            <input type="text" name="titulo" class="form-control" placeholder="Título" required>
        </div>
        <div class="mb-2">
            <textarea name="contenido" rows="3" class="form-control" placeholder="Contenido de la nota" required></textarea>
        </div>
        <div class="mb-3">
            <input type="text" name="categoria" class="form-control" placeholder="Categoría (opcional)">
        </div>
        <button class="btn btn-primary" type="submit">Guardar Nota</button>
    </form>

    <!-- Listado de notas -->
    @forelse($notas as $nota)
        <div class="card mb-3 p-3">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h5 class="mb-1">{{ $nota->titulo }}</h5>
                    <p class="mb-1">{{ $nota->contenido }}</p>
                    @if($nota->categoria)
                        <span class="badge bg-secondary">{{ $nota->categoria }}</span>
                    @endif
                </div>
                <form action="{{ route('notas.destroy', $nota->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    @empty
        <p>No hay notas registradas.</p>
    @endforelse
</div>
@endsection
