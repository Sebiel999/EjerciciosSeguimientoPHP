<header id="header" class="header d-flex align-items-center sticky-top" style="background-color: #3b4654;">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">CINEMA</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('profile.edit') }}">My Profile</a></li>
          <li><a href="{{ url('/') }}" >Home</a></li>
          <li><a href="{{ url('/cartelera') }}" >Movies</a></li>
          
          {{-- <li class="dropdown"><a href="about.html"><span>About</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="team.html">Team</a></li>
              <li><a href="testimonials.html">Testimonials</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
            </ul>
          </li> --}}
            @if (\App\Helpers\RoleHelper::isAuthorized('department.showDepartments'))

                <li><a href="{{ route('department.index') }}">Departments</a></li>

            @endif

            @if (\App\Helpers\RoleHelper::isAuthorized('city.showCities'))

                <li><a href="{{ route('city.index') }}">Cities</a></li>

            @endif

            @if (\App\Helpers\RoleHelper::isAuthorized('genre.showGenres'))
                <li><a href="{{ route('genre.index') }}">Gender</a></li>
            @endif


            @if (\App\Helpers\RoleHelper::isAuthorized('city.showCities'))

                <li><a href="{{ route('roles.index') }}">Roles</a></li>
            @endif
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    @if(!Auth::check())
    <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
    @else
    <li>
      <form method="POST" action="{{ route('logout') }}" style="display: contents;">
        @csrf
        <button type="submit" class="btn btn-outline-danger">Logout
          <i class="bi bi-box-arrow-right"></i>
        </button>


      </form>
    </li>
    @endif
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
