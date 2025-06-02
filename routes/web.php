<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home/index');
})->name('home.index');

require __DIR__.'/web/tareas.php';

require __DIR__.'/web/propinas.php';

require __DIR__.'/web/contrasenagenerada.php';

require __DIR__.'/web/gastos.php';

require __DIR__.'/web/reservas.php';

require __DIR__.'/web/notas.php';

require __DIR__.'/web/eventos.php';

require __DIR__.'/web/recetas.php';

require __DIR__.'/web/memoria.php';

require __DIR__.'/web/encuestas.php';

require __DIR__.'/web/tiempos.php';
