@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

$guards = array_keys(config('auth.guards'));

$guard = Auth::getDefaultDriver();

$user = Auth::guard($guard)->user();
//   @dd($guard);
@endphp
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user-circle fw-bold" style="font-size: 28px;"></i>
          {{-- <span class="badge badge-warning navbar-badge">15</span> --}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <div class="text-center">
          <form method="POST" action="{{ route($guard.'.logout') }}">
            @csrf
            <a href="{{route($guard.'.logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-danger"> {{ __('Log Out') }}</a>
        </form>
          </div>
          {{-- <div class="dropdown-divider"></div> --}}
         
          {{-- <div class="dropdown-divider"></div> --}}
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->