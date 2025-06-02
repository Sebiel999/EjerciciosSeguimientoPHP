@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Resultados: {{ $encuesta->titulo }}</h2>

    @foreach($encuesta->preguntas as $pregunta)
        <div class="mb-5">
            <h5>{{ $loop->iteration }}. {{ $pregunta->texto }}</h5>
            <canvas id="chart-{{ $pregunta->id }}" width="400" height="200"></canvas>
        </div>
    @endforeach
</div>

<script>
    @foreach($encuesta->preguntas as $pregunta)
        const ctx{{ $pregunta->id }} = document.getElementById('chart-{{ $pregunta->id }}').getContext('2d');
        new Chart(ctx{{ $pregunta->id }}, {
            type: 'bar',
            data: {
                labels: {!! json_encode($pregunta->respuestas->pluck('texto')) !!},
                datasets: [{
                    label: 'Votos',
                    data: {!! json_encode($pregunta->respuestas->pluck('votos')) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    @endforeach
</script>
@endsection
