<header id="header" class="header d-flex align-items-center sticky-top" style="background-color: #3b4654;">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
      <h1 class="sitename">Apps:</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ route('tareas.index') }}">Tareas</a></li>
        <li><a href="{{ route('propinas.index') }}">Propinas</a></li>
        <li><a href="{{ route('contrasena.index') }}">Contraseñas</a></li>
        <li><a href="{{ route('gastos.index') }}">Gastos</a></li>
        <li><a href="{{ route('reservas.index') }}">Reservas</a></li>
        <li><a href="{{ route('notas.index') }}">Notas</a></li>
        <li><a href="{{ route('eventos.index') }}">Eventos</a></li>
        <li><a href="{{ route('recetas.index') }}">Recetas</a></li>
        <li><a href="{{ route('memoria.index') }}">Memoria</a></li>
        <li><a href="{{ route('encuestas.index') }}">Encuestas</a></li>
        <li><a href="{{ route('tiempos.index') }}">Cronómetro</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>

<style>
  .navmenu a {
    color: white;
  }

  .header .logo h1 {
    color: white;
  }
</style>
