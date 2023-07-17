<nav class="navbar navbar-expand-lg navbar-background ">
    <div class="container-fluid px-4">

        <a class="navbar-brand fw-bold text-white fs-2 " href="#">WISH</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" class="bi bi-hdd-stack" viewBox="0 0 16 16">
                <path d="M14 10a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h12zM2 9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2z"/>
                <path d="M5 11.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM14 3a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                <path d="M5 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
              </svg>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-2">
                    <a class="nav-link "  href="#">Home</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link "  href="{{ route('aboutus') }}">About</a>
                </li>

            </ul>
            <div class="popup-btn text-center">
                <a class="text-white text-decoration-none load-popup"  data-url="{{route('loginSection')}}" href="javascript:void(0)">{{__('JOIN')}}</a>
            </div>
        </div>
    </div>
</nav>
