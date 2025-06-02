@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Sistema de Reservas</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Formulario de reserva -->
    <form action="{{ route('reservas.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <input type="text" name="nombre_servicio" class="form-control" placeholder="Nombre del servicio" required>
        </div>
        <div class="mb-3">
            <input type="datetime-local" name="fecha_hora" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Reservar</button>
    </form>

    <!-- Listado de reservas -->
    <h4>Reservas Confirmadas</h4>
    @forelse($reservas as $reserva)
        <div class="card mb-2 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $reserva->nombre_servicio }}</strong><br>
                    {{ \Carbon\Carbon::parse($reserva->fecha_hora)->format('d/m/Y H:i') }}
                </div>
                <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
    @empty
        <p>No hay reservas aún.</p>
    @endforelse
</div>
@endsection
