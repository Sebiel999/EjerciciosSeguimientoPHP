<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="shrink-0">
                <a href="/">
                    <span class="font-bold text-xl text-gray-800">Apps:</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="space-x-6 flex">
                <a href="{{ route('tareas.index') }}" class="text-gray-700 hover:text-blue-600">Tareas</a>
                <a href="{{ route('propinas.index') }}" class="text-gray-700 hover:text-blue-600">Propinas</a>
                <a href="{{ route('contrasena.index') }}" class="text-gray-700 hover:text-blue-600">Contraseñas</a>
                <a href="{{ route('gastos.index') }}" class="text-gray-700 hover:text-blue-600">Gastos</a>
                <a href="{{ route('reservas.index') }}" class="text-gray-700 hover:text-blue-600">Reservas</a>
                <a href="{{ route('notas.index') }}" class="text-gray-700 hover:text-blue-600">Notas</a>
                <a href="{{ route('eventos.index') }}" class="text-gray-700 hover:text-blue-600">Eventos</a>
                <a href="{{ route('recetas.index') }}" class="text-gray-700 hover:text-blue-600">Recetas</a>
                <a href="{{ route('memoria.index') }}" class="text-gray-700 hover:text-blue-600">Memoria</a>
                <a href="{{ route('encuestas.index') }}" class="text-gray-700 hover:text-blue-600">Encuestas</a>
                <a href="{{ route('tiempos.index') }}" class="text-gray-700 hover:text-blue-600">Cronómetro</a>
            </div>
        </div>
    </div>
</nav>
