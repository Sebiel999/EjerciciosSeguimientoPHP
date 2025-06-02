<?php
?>

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Juego de Memoria 🧠</h2>

    <div class="mb-3">
        <label for="dificultad">Selecciona dificultad:</label>
        <select id="dificultad" class="form-select w-auto d-inline-block">
            <option value="4">Fácil (4x4)</option>
            <option value="6">Medio (6x6)</option>
            <option value="8">Difícil (8x8)</option>
        </select>
        <button id="iniciarJuego" class="btn btn-primary ms-2">Empezar juego</button>
    </div>

    <div class="mb-3">
        <strong>Intentos:</strong> <span id="intentos">0</span>
        <strong class="ms-3">Aciertos:</strong> <span id="aciertos">0</span>
    </div>

    <div id="tablero" class="d-grid gap-2"></div>
</div>

<style>
    #tablero {
        margin-top: 20px;
        display: grid;
        justify-content: center;
        gap: 10px;
    }

    .carta {
        width: 70px;
        height: 70px;
        font-size: 2rem;
        background-color: #f2f2f2;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        user-select: none;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .carta.oculta {
        background-color: #999;
        color: transparent;
    }

    .carta.completada {
        background-color: #8bc34a;
        color: white;
        cursor: default;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const emojis = ['🍕','🍔','🍟','🌭','🍿','🍣','🍩','🍪','🍓','🍇','🍎','🍉','🍒','🥝','🍌','🍍',
                    '🚗','✈️','🚀','🚁','🚂','🚌','🚜','🚲','🏍️','🚓','🚑','🚒','🚕','🚛','🚠','🚡'];

    const tablero = document.getElementById('tablero');
    const btnIniciar = document.getElementById('iniciarJuego');
    const dificultad = document.getElementById('dificultad');
    const intentosEl = document.getElementById('intentos');
    const aciertosEl = document.getElementById('aciertos');

    let intentos = 0;
    let aciertos = 0;
    let totalPares = 0;
    let primeraCarta = null;
    let bloqueo = false;

    btnIniciar.addEventListener('click', iniciarJuego);

    function iniciarJuego() {
        const tamaño = parseInt(dificultad.value);
        const totalCartas = tamaño * tamaño;
        totalPares = totalCartas / 2;

        // reiniciar
        intentos = 0;
        aciertos = 0;
        primeraCarta = null;
        bloqueo = false;
        intentosEl.textContent = '0';
        aciertosEl.textContent = '0';

        tablero.innerHTML = '';
        tablero.style.gridTemplateColumns = `repeat(${tamaño}, 70px)`;

        const seleccionados = emojis.slice(0, totalPares);
        const cartas = [...seleccionados, ...seleccionados]
            .sort(() => Math.random() - 0.5);

        cartas.forEach((emoji, index) => {
            const div = document.createElement('div');
            div.classList.add('carta', 'oculta');
            div.dataset.valor = emoji;
            div.dataset.index = index;
            div.textContent = emoji;
            div.addEventListener('click', () => voltearCarta(div));
            tablero.appendChild(div);
        });
    }

    function voltearCarta(carta) {
        if (bloqueo || carta.classList.contains('completada') || !carta.classList.contains('oculta')) return;

        carta.classList.remove('oculta');

        if (!primeraCarta) {
            primeraCarta = carta;
        } else {
            bloqueo = true;
            intentos++;
            intentosEl.textContent = intentos;

            if (carta.dataset.valor === primeraCarta.dataset.valor) {
                carta.classList.add('completada');
                primeraCarta.classList.add('completada');
                aciertos++;
                aciertosEl.textContent = aciertos;
                primeraCarta = null;
                bloqueo = false;

                if (aciertos === totalPares) {
                    setTimeout(() => {
                        guardarResultado();
                        alert('¡Juego completado! 🎉');
                    }, 500);
                }

            } else {
                setTimeout(() => {
                    carta.classList.add('oculta');
                    primeraCarta.classList.add('oculta');
                    primeraCarta = null;
                    bloqueo = false;
                }, 800);
            }
        }
    }

    function guardarResultado() {
        const nivel = dificultad.value;

        fetch("{{ route('memoria.guardar') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                nivel_dificultad: nivel,
                puntaje: aciertos
            })
        }).then(res => res.json())
          .then(data => console.log("Resultado guardado:", data));
    }
});
</script>
@endsection
