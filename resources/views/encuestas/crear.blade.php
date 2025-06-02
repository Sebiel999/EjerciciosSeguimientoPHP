@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Crear nueva encuesta</h2>

    <form method="POST" action="{{ route('encuestas.guardar') }}">
        @csrf

        <div class="mb-3">
            <label>Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>

        <div id="preguntasContainer">
            <!-- preguntas dinámicas -->
        </div>

        <button type="button" class="btn btn-secondary mb-3" onclick="agregarPregunta()">Agregar pregunta</button>
        <br>
        <button class="btn btn-primary" type="submit">Guardar encuesta</button>
    </form>
</div>

<script>
let contadorPreguntas = 0;

function agregarPregunta() {
    const container = document.getElementById('preguntasContainer');
    const index = contadorPreguntas++;
    const html = `
        <div class="card mb-3 p-3">
            <div class="mb-2">
                <label>Pregunta</label>
                <input type="text" name="preguntas[${index}][texto]" class="form-control" required>
            </div>
            <div class="respuestas">
                <label>Respuestas</label>
                <input type="text" name="preguntas[${index}][respuestas][]" class="form-control mb-2" required>
                <input type="text" name="preguntas[${index}][respuestas][]" class="form-control mb-2" required>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="agregarRespuesta(this, ${index})">Agregar respuesta</button>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
}

function agregarRespuesta(button, index) {
    const input = `<input type="text" name="preguntas[${index}][respuestas][]" class="form-control mb-2" required>`;
    button.parentNode.querySelector('.respuestas').insertAdjacentHTML('beforeend', input);
}
</script>
@endsection
