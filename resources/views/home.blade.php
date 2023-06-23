<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/front.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js "></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
    {{-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" /> --}}



</head>

<body>
    <div class="main">
        <nav class="navbar navbar-expand-lg  b">
            <div class="container-fluid">
                <div>
                    <a href="/"><img src="/images/wishlogo.png" style="width:120px;height:70px;"
                            alt=""></a>
                </div>
                <a class="navbar-brand fw-bold  " style="font-size: 32px;" href="#">WISH</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item ">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <div class="nav-item">
                                @if (Route::has('admin.login'))
                                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                        @auth('admin')
                                            <a href="{{ route('admin.dashboard') }}" class="btn btn-success">Admin
                                                Dashboard</a>
                                        @else
                                            <a href="{{ route('admin.login') }}" class="btn btn-dark text-white">Admin
                                                Log in</a>
                                        @endauth
                                    </div>
                                @endif
                            </div>

                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        {{-- carousal starts --}}

        <div class="carousel-inner">
            <div class="carousel-item active" style="background-attachment: fixed;">
                <img src="/images/carousalbg-3.jpg" class=" w-100 carousal_img" style="" alt="...">
                <div class="carousel-caption d-none d-md-block" style="top:40%;margin-left:-600px;font-weight:600;">
                    <h5 style="font-size: 65px;">Learn Coding</h5>
                    <p>Built Your Dream </p>
                </div>
            </div>
        </div>
        {{-- carousal ends --}}
        {{-- <div class="container px-4 ">
            <div class="row ">
                <div class="col-md-6">
                    <div class="p-3 bg-transparent row-1">

                        <h1 style="font-weight:600;margin-top:200px;  " class="text-center ">Welcome To Wish</h1>
                        <p class="text-center ">Just one step ahead</p>

                    </div>

                </div>
                <div class="col-md-6">
                    <div class="p-3  bg-transparent" style="margin-top: 40px;"><img src="/images/col.png"
                            alt=""></div>
                </div>
            </div>
        </div> --}}

        {{-- card --}}
        <figure class="text-center">
            <h1 class="mt-4" style="font-weight:700; color:black;">EXPLORE COURSES</h1>
        </figure>
        {{-- <div class="cards ">
            <div class="row card-row-1 m">
                <div class="col-md-6 card course" style="width: 18rem;">
                    <img src="/images/htmlcsslogo.png" class="card-img-top" alt="">
                    <div class="card-body">
                        <h2 class="card-text text-center" style="font-weight:600;">HTML CSS</h2>
                    </div>
                </div>
                <br>
                <div class="col-md-6 card course" style="width: 18rem;">
                    <img src="/images/clogo.png" class="card-img-top" style="height:200px;" alt="">
                    <div class="card-body">
                        <h2 class="card-text text-center " style="font-weight:600;margin-top:-20px;">C</h2>
                    </div>
                </div>
                <br>
                <div class="col-md-6 card course" style="width: 18rem;">
                    <img src="/images/cplogo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2 class="card-text text-center" style="font-weight:600;">C++</h2>
                    </div>
                </div>

            </div>
            <div class="row card-row-1">
                <div class="col-md-3 card course" style="width: 18rem;">
                    <img src="/images/javalogo.png" class="card-img-top d-flex " style="height:200px;" alt="">
                    <div class="card-body">
                        <h2 class="text-center" style="font-weight:600;">JAVA</h2>
                    </div>
                </div>
                <div class="col-md-3 card course" style="width: 18rem;">
                    <img src="/images/jslogo.png" class="card-img-top mt-4" alt="">
                    <div class="card-body">
                        <h2 class="text-center mt-4" style="font-weight:600;">JAVASCRIPT</h2>

                    </div>
                </div>
                <div class="col-md-3 card course" style="width: 18rem;">
                    <img src="/images/pythonlogo.png" class="card-img-top mt-4" alt="">
                    <div class="card-body">
                        <h2 class="text-center mt-2" style="font-weight:600;">PYTHON</h2>

                    </div>
                </div>

            </div>


        </div> --}}

        {{-- card ends --}}
        <div class="row w-100 d-flex">
            <div class="col-md-6 mainbox mt-4 ms-4" style="padding-left: 80px;padding-top:70px;">
                <div class="inf">
                    <iconify-icon icon="mdi:hours-24" class="icon"></iconify-icon>CALL US
                </div>
                <div class="ph">782407 07689</div>
                <div class="inf">
                    <iconify-icon icon="material-symbols:location-on" class="icon"></iconify-icon>LOCATION
                </div>
                <div class="ph">panditbattala</div>
                <div class="inf">
                    <iconify-icon icon="ic:round-call" class="icon"></iconify-icon>EMAIL ADDRESS
                </div>
                <div class="ph">samirram007@gmail.com

                </div>
            </div>
            <div class="col-md-6  sec-box" style="width:700px;padding:40px;">
                <h1>CONTACT US</h1>
                <div><input type="text" placeholder=" Your Name"class="text"></div>
                <div><input type="text" class="text"placeholder="Email Address"></div>
                <div><input type="text"class=" txtbox" placeholder="Review"></div>
                <button class="btn btn-dark mt-4 w-100">Submit</button>
            </div>

        </div>
        <footer id="footer" class="footer mt-5">
            <div class="container" style="color:#494949;" id="footer">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="" class="logo d-flex align-items-center fw-bold  fs-2"
                            style="color:#494949;">
                            Wish Computer Centre
                        </a>
                        <p class="text-grey">Coding is the language of the future, and everybody should learn it.</p>

                    </div>
                    <div class="col-lg-3 col-md-6 footer_links">
                        <h3 class="fs-5  text-center position-relative pb-3" style="color:#494949;">Main Links</h3>
                        <ul class="text-center ">
                            <li><a href="" class="" style="color:#494949;">Home</a></li>
                            <li><a href="" style="color:#494949;">About</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center text-md-start">
                        <h3 class="fs-4  text-center position-relative pb-3" style="color:#494949;">Contact Us</h3>
                        <p class="text-center " style="color:#494949;">
                            Sameer Ram
                            <br>
                            Baguiati, jyangra
                        </p>
                    </div>

                </div>
                <div class="social_links d-flex mt-4 m-auto">
                    <div class="col-md-6">
                        <a href="https://www.facebook.com/samir.ram1?mibextid=ZbWKwL" class="facebook ">
                            <i class="fa fa-facebook fa-2x "></i></a>
                    </div>
                    <div class="col-md-6">
                        <a href="https://instagram.com/samirram007?igshid=MzRlODBiNWFlZA==" class="instagram">
                            <i class="fa fa-instagram fa-2x"></i></a>
                    </div>
                    <div class="col-md-6">
                        <a href="https://wa.me/8240504123 " class="whatsapp ">
                            <i class="fa fa-whatsapp fa-2x"></i></a>
                    </div>
                </div>

                <div class="container mt-4 py-3 pb-5">
                    <div class="copyright text-center " style="color:#494949;">
                        "@Copyright" <strong>Wish</strong>".All rights are Reserved by WISH"
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
