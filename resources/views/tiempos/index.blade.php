@extends('layouts.app')

@section('content')
<div class="container py-4 text-center">
    <h2>Cronómetro Online</h2>

    <div id="display" class="display-4 my-4">00:00:00.000</div>

    <div class="mb-3">
        <button class="btn btn-success" onclick="start()">Iniciar</button>
        <button class="btn btn-warning" onclick="pause()">Pausar</button>
        <button class="btn btn-danger" onclick="reset()">Reiniciar</button>
        <button class="btn btn-primary" onclick="lap()">Registrar Vuelta</button>
    </div>

    <h5 class="mt-5">Vueltas registradas</h5>
    <ul class="list-group w-50 mx-auto mb-4" id="laps">
        @foreach($vueltas as $tiempo)
            <li class="list-group-item d-flex justify-content-between">
                <span>{{ $tiempo->tiempo_formateado }}</span>
                <small class="text-muted">{{ $tiempo->created_at->format('Y-m-d H:i:s') }}</small>
            </li>
        @endforeach
    </ul>
</div>

<script>
    let startTime, interval, elapsed = 0;

    function format(ms) {
        let date = new Date(ms);
        return date.toISOString().substr(11, 8) + '.' + String(ms % 1000).padStart(3, '0');
    }

    function update() {
        const now = Date.now();
        const time = now - startTime + elapsed;
        document.getElementById('display').textContent = format(time);
    }

    function start() {
        if (!interval) {
            startTime = Date.now();
            interval = setInterval(update, 10);
        }
    }

    function pause() {
        if (interval) {
            clearInterval(interval);
            interval = null;
            elapsed += Date.now() - startTime;
        }
    }

    function reset() {
        pause();
        elapsed = 0;
        document.getElementById('display').textContent = '00:00:00.000';
    }

    function lap() {
        const current = document.getElementById('display').textContent;
        const seconds = Math.floor(elapsed / 1000);

        // Mostrar en la interfaz (opcional)
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between';
        li.innerHTML = `<span>${current}</span><small class="text-muted">Ahora</small>`;
        document.getElementById('laps').prepend(li);

        // Guardar en BD
        fetch("{{ route('tiempos.guardar') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                tiempo: current,
                segundos: seconds
            })
        });
    }
</script>
@endsection
