@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Gestor de Gastos</h2>

    <!-- Formulario para agregar gasto -->
    <form action="{{ route('gastos.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <input type="text" name="descripcion" class="form-control" placeholder="Descripción" required>
        </div>
        <div class="mb-3">
            <input type="number" step="0.01" name="monto" class="form-control" placeholder="Monto" required>
        </div>
        <div class="mb-3">
            <input type="text" name="categoria" class="form-control" placeholder="Categoría" required>
        </div>
        <div class="mb-3">
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Gasto</button>
    </form>

    <!-- Listado de gastos -->
    <h4>Gastos Registrados</h4>
    @forelse($gastos as $gasto)
        <div class="card mb-2 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $gasto->descripcion }}</strong> ({{ $gasto->categoria }})<br>
                    ${{ number_format($gasto->monto, 2) }} — {{ $gasto->fecha }}
                </div>
                <form action="{{ route('gastos.destroy', $gasto->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    @empty
        <p>No hay gastos registrados aún.</p>
    @endforelse

    <!-- Resumen mensual -->
    <h4 class="mt-4">Resumen mensual</h4>
    <ul class="list-group">
        @forelse($resumenMensual as $resumen)
            <li class="list-group-item d-flex justify-content-between">
                <span>{{ $resumen->mes }}</span>
                <span><strong>${{ number_format($resumen->total, 2) }}</strong></span>
            </li>
        @empty
            <li class="list-group-item">Sin datos</li>
        @endforelse
    </ul>
</div>
@endsection
