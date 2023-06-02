<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                      <div>
                        @if (Route::has('admin.login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                @auth('admin')
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-success">Admin Dashboard</a>
                                @else
                                    <a href="{{ route('admin.login') }}" class="btn btn-dark">Admin Log in</a>
                                @endauth
                            </div>
                        @endif
                      </div>
                    </li>
                  
                </ul>
               
            </div>
        </div>
    </nav>


    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
{{-- <div>
  @if (Route::has('admin.login'))
      <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
          @auth('admin')
              <a href="{{ route('admin.dashboard') }}" class="btn btn-success">Admin Dashboard</a>
          @else
              <a href="{{ route('admin.login') }}" class="btn btn-dark">Admin Log in</a>
          @endauth
      </div>
  @endif
</div>
<div>
  @if (Route::has('student.login'))
      <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
          @auth('student')
              <a href="{{ route('student.dashboard') }}" class="btn btn-success">Student Dashboard</a>
          @else
              <a href="{{ route('student.login') }}" class="btn btn-primary">Student Log in</a>
          @endauth
      </div>
  @endif
</div> --}}