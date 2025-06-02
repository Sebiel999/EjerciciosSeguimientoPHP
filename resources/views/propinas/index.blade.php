@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Calculadora de Propinas</h2>

    <form method="POST" action="{{ route('propinas.store') }}" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="monto_total" class="form-label">Monto Total de la Cuenta</label>
            <input type="number" step="0.01" name="monto_total" id="monto_total" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="porcentaje" class="form-label">Porcentaje de Propina (%)</label>
            <input type="number" name="porcentaje" id="porcentaje" class="form-control" required min="0" max="100">
        </div>

        <button type="submit" class="btn btn-primary">Calcular Propina</button>
    </form>

    @isset($resultado)
        <div class="alert alert-success">
            <p><strong>Monto Total:</strong> ${{ number_format($resultado->monto_total, 2) }}</p>
            <p><strong>Porcentaje:</strong> {{ $resultado->porcentaje }}%</p>
            <p><strong>Propina Calculada:</strong> ${{ number_format($resultado->valor_propina, 2) }}</p>
        </div>
    @endisset
</div>
@endsection
