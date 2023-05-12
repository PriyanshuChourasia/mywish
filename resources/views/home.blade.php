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
    </div>

    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>