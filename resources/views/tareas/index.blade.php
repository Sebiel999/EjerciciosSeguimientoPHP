@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Lista de Tareas</h2>

    <!-- Formulario para agregar tarea -->
    <form action="{{ route('tareas.store') }}" method="POST" class="mb-4">
        @csrf
        <input type="text" name="titulo" placeholder="Título de la tarea" required class="form-control mb-2">
        <textarea name="descripcion" placeholder="Descripción (opcional)" class="form-control mb-2"></textarea>
        <button type="submit" class="btn btn-primary">Agregar Tarea</button>
    </form>

    <!-- Listado de tareas -->
    @forelse ($tareas as $tarea)
        <div class="card mb-2 p-3 {{ $tarea->completada ? 'bg-light text-muted' : '' }}">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $tarea->titulo }}</strong>
                    @if($tarea->descripcion)
                        <p class="mb-1">{{ $tarea->descripcion }}</p>
                    @endif
                </div>
                <div class="btn-group">
                    <form action="{{ route('tareas.toggle', $tarea->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm {{ $tarea->completada ? 'btn-warning' : 'btn-success' }}">
                            {{ $tarea->completada ? 'Desmarcar' : 'Completar' }}
                        </button>
                    </form>

                    <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p>No hay tareas aún.</p>
    @endforelse
</div>
@endsection
