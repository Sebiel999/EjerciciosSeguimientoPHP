@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Calendario de Eventos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Formulario para agregar evento -->
    <form action="{{ route('eventos.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-2">
            <input type="text" name="titulo" class="form-control" placeholder="Título del evento" required>
        </div>
        <div class="mb-2">
            <textarea name="descripcion" class="form-control" placeholder="Descripción (opcional)"></textarea>
        </div>
        <div class="mb-2">
            <label>Fecha y hora de inicio:</label>
            <input type="datetime-local" name="fecha_inicio" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Fecha y hora de fin:</label>
            <input type="datetime-local" name="fecha_fin" class="form-control" required>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="recordatorio" id="recordatorio">
            <label class="form-check-label" for="recordatorio">¿Enviar recordatorio?</label>
        </div>
        <button type="submit" class="btn btn-primary">Crear Evento</button>
    </form>

    <!-- Lista de eventos -->
    <h4>Próximos eventos</h4>
    @forelse($eventos as $evento)
        <div class="card mb-3 p-3">
            <div class="d-flex justify-content-between">
                <div>
                    <strong>{{ $evento->titulo }}</strong>
                    <p class="mb-1">{{ $evento->descripcion }}</p>
                    <p class="mb-1">
                        {{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d/m/Y H:i') }} →
                        {{ \Carbon\Carbon::parse($evento->fecha_fin)->format('d/m/Y H:i') }}
                    </p>
                    @if($evento->recordatorio)
                        <span class="badge bg-success">Recordatorio activado</span>
                    @endif
                </div>
                <div class="btn-group">
                    <!-- Botón Editar -->
                    <button type="button" class="btn btn-warning btn-sm d-flex align-items-center justify-content-center px-3" style="height: 32px;" data-bs-toggle="modal" data-bs-target="#editarEvento{{ $evento->id }}">
                        Editar
                    </button>




                    <!-- Formulario Eliminar -->
                    <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal de Edición -->
        <div class="modal fade" id="editarEvento{{ $evento->id }}" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                  <h5 class="modal-title">Editar Evento</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <input type="text" name="titulo" class="form-control mb-2" value="{{ $evento->titulo }}" required>
                  <textarea name="descripcion" class="form-control mb-2">{{ $evento->descripcion }}</textarea>
                  <label>Inicio</label>
                  <input type="datetime-local" name="fecha_inicio" class="form-control mb-2"
                      value="{{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('Y-m-d\TH:i') }}" required>
                  <label>Fin</label>
                  <input type="datetime-local" name="fecha_fin" class="form-control mb-2"
                      value="{{ \Carbon\Carbon::parse($evento->fecha_fin)->format('Y-m-d\TH:i') }}" required>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="recordatorio" id="rec{{ $evento->id }}"
                      {{ $evento->recordatorio ? 'checked' : '' }}>
                    <label class="form-check-label" for="rec{{ $evento->id }}">Recordatorio</label>
                  </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancelar
                </button>
                  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    @empty
        <p>No hay eventos programados.</p>
    @endforelse
</div>
@endsection
