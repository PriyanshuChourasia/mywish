<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{ asset('css/front.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css
    ">


    {{-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" /> --}}



</head>

<body>

    <div class=" main">
<<<<<<< HEAD
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container ">
                {{-- <div>
                    <a href="/"><img src="/images/wishlogo.png" style="width:120px;height:70px;"
                            alt=""></a>
                </div> --}}
                <a class="navbar-brand fw-bold " style="font-size: 32px;color:#ff5f50;" href="#">WISH</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item ">
                            <a class="nav-link active text-danger" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active text-danger" aria-current="page" href="/">About</a>
                        </li>

                        <li class="nav-item">
                            <div class="nav-item">
                                @if (Route::has('admin.login'))
                                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                        @auth('admin')
                                            <a href="{{ route('admin.dashboard') }}">Admin
                                                Dashboard</a>
                                        @else
                                            <a href="{{ route('admin.login') }}" class="btn "
                                                style="border:3px solid #ff676f !important;font-weight: 500;color:#ff676f;">Admin
                                                Log in</a>
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </li>
                        <li class="nav-item">

                            <div class="nav-item ms-2">
                                @if (Route::has('student.login'))
                                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                        @auth('student')
                                            <a href="{{ route('student.dashboard') }}" class="btn btn-success">Student
                                                Dashboard</a>
                                        @else
                                            <a href="{{ route('student.login') }}" class="btn btn-dark text-white">Student
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
=======
>>>>>>> 06d49589fb106751e2e89c53ddbcb849e0c23524
        {{-- carousal starts --}}
        <section>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <nav class="navbar navbar-expand-lg bg-transparent position-absolute">
                        <div class="container-fluid ">
                            
                            <a class="navbar-brand fw-bold " style="font-size: 32px;color:#ff5f50;" href="#">WISH</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item ">
                                        <a class="nav-link active text-danger" aria-current="page" href="/">Home</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link active text-danger" aria-current="page" href="/">About</a>
                                    </li>
    
                                    <li class="nav-item">
                                        <div class="nav-item">
                                            @if (Route::has('admin.login'))
                                                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                                    @auth('admin')
                                                        <a href="{{ route('admin.dashboard') }}">Admin
                                                            Dashboard</a>
                                                    @else
                                                        <a href="{{ route('admin.login') }}" class="btn "
                                                            style="border:3px solid #ff676f !important;font-weight: 500;color:#FB9391;">Admin
                                                            Log in</a>
                                                    @endauth
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                    <li class="nav-item">
    
                                        <div class="nav-item ms-2">
                                            @if (Route::has('student.login'))
                                                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                                    @auth('student')
                                                        <a href="{{ route('student.dashboard') }}"
                                                            class="btn btn-success">Student
                                                            Dashboard</a>
                                                    @else
                                                        <a href="{{ route('student.login') }}"
                                                            class="btn btn-dark text-white">Student
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
    
    
                    <img src="/images/carousalbg-3.jpg" class=" w-100 carousal_img" style="" alt="...">
                    <div class="carousel-caption d-none d-md-block car-cap">
                        <h5 style="font-size: 65px;">Learn Coding</h5>
                        <p>Built Your Dream </p>
                    </div>
                </div>
            </div>
    
        </section>

        {{-- carousal ends --}}
        {{-- <div class="container ">
            <div class="row">
                <div class="col-md-6">
                    <img src="/images/illustrator.png" alt="">
                </div>
                <div class="col-md-6">
                    <div style="font-size: 65px;" class="text-center text-white">Learn Coding</div>
                    <p>Built Your Dream </p>
                </div>
            </div>
        </div> --}}
        
        <section>
            <div class="container-fluid mt-5 mb-5 ">
                <div class="row  align-items-center" >
                    <div class="col-md-6 position-relative mb-5 d-flex justify-content-center">
                        <div class=" ">
    
                            <h1 style="font-weight:900; font-size:55px; " class="animate-charcter">
                                Welcome To Wish
                            </h1>
                            <p class="text-center " style="font-weight:500;color:#ff5f50; font-size:25px; ">Just one step
                                ahead</p>
    
                        </div>
    
                    </div>
                    <div class="col-md-6 ">
                        <div >
                            <img src="/images/pol-bg.png" class="welcome-img img-responsive img-fluid" >

                        </div>
                    </div>
                </div>
            </div>
    
        </section>



        {{-- card --}}
        <section>
            <div class="container mt-5 mb-5">
         

                <div class="text-center mt-5 mb-5" style="font-weight:700;font-size:50px; color:#FB9391;margin-bottom:90px !important;">EXPLORE
                    COURSES</div>


                <div class="row mt-5">
                    <div class="col-md-4 card-wrap">
                        <div class="card text-white " style="background-color: rgba(255, 121, 121, 0.204);">
                            <div class="card-header one ">
                                <i class="fa-brands fa-5x fa-java "></i>
                            </div>
                            {{-- <div class="card-t">
                                JAVA
                            </div> --}}
                            <div class="card-body" >
                                <h4 class="text-center card-head">Java</h4>
                                <p class="card-txt">Java is a widely-used programming language for coding web applications. It has been a popular choice among developers for over two decades, with millions of Java applications in use today. Java is a multi-platform, object-oriented, and network-centric language that can be used as a platform in itself.</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card " style="background-color: rgba(255, 121, 121, 0.204);">
                            <div class="card-header one">
                                <i class="fa-brands fa-5x fa-html5"></i>
                            </div>
                            <div class="card-body">
                                <h4 class="text-center">HTML CSS</h4>
                                <p>HTML (the Hypertext Markup Language) and CSS (Cascading Style Sheets) are two of the core technologies for building Web pages. HTML provides the structure of the page, CSS the (visual and aural) layout, for a variety of devices.</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card " style="background-color: rgba(255, 121, 121, 0.204);">
                            <div class="card-header one">
                                <i class="fa-solid fa-3x fa-c"></i>
                            </div>
                            <div class="card-body">
                                <h4 class="text-center">C</h4>
                                <p>The C programming language is a procedural and general-purpose language that provides low-level access to system memory. </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row gy-2 mt-4 mb-5">
                    <div class="col-md-4">
                        <div class="card" style="background-color: rgba(255, 121, 121, 0.204);">
                            <div class="card-header one">
                                <i class="fa-brands fa-5x fa-php"></i>
                            </div>
                            <div class="card-body">
                                <h4 class="text-center">PHP</h4>
                                <p>PHP (Hypertext Processor) is a general-purpose scripting language and interpreter that is freely available and widely used for web development.</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card" style="background-color: rgba(255, 121, 121, 0.204);">
                            <div class="card-header one">
                                <i class="fa-brands fa-5x fa-js"></i>
                            </div>
                            <div class="card-body">
                                <h4 class="text-center">JAVASCRIPT</h4>
                                <p>JavaScript is a dynamic programming language that's used for web development, in web applications, for game development, and lots more. It allows you to implement dynamic features on web pages that cannot be done with only HTML and CSS.</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card " style="background-color: rgba(255, 121, 121, 0.204);">
                            <div class="card-header one">
                                <i class="fa-solid fa-5x fa-c">++</i>
                            </div>
                            <div class="card-body">
                                <h4 class="text-center">C</h4>
                                <p>C++ is an object-oriented programming (OOP) language that is viewed by many as the best language for creating large-scale applications. C++ is a superset of the C language.</p>
                            </div>
                        </div>

                    </div>

                </div>


            
        </div>


        </section>


        {{-- card ends --}}
        <section>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-6 mainbox mt-4" style="padding-left:80px;padding-top:70px;">
                        <div class="inf">
                            <iconify-icon icon="mdi:hours-24" class="icon"></iconify-icon>CALL US
                        </div>
                        <div class="ph">82407 07689</div>
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
                    <div class="col-md-6  sec-box" style="padding:40px;">
                        <h1>CONTACT US</h1>
                        <div><input type="text" placeholder=" Your Name"class="text"></div>
                        <div><input type="text" class="text"placeholder="Email Address"></div>
                        <div><input type="text"class=" txtbox" placeholder="Review"></div>
                        <button class="btn mt-4 w-100 text-white"
                            style="background-color: rgba(255, 58, 91, 0.877);">Submit</button>
                    </div>
    
                </div>
    
            </div>
    
        </section>
        <section>
            <div class="container-fluid mt-5">
                <div class="">
                    <div class="text-center mb-3"
                        style="font-size: 55px;color:#ff5f50;font-weight:800; ">
                        FIND US
                    </div>
                    <div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.1473664879836!2d88.44265899999999!3d22.610971499999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02757fcaf5fa09%3A0x8fa854cbea6d83f5!2sWISH%20COMPUTER%20%26%20EDUCATION%20CENTER!5e0!3m2!1sen!2sin!4v1687629833753!5m2!1sen!2sin"
                            height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" class="mx-auto w-100"></iframe>
                    </div>
                </div>
            </div>
    
        </section>
<section>
    <footer id="footer" class="footer " style="background-color:#444444; margin-top:180px;">
        <div class="container" id="footer">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="" class="logo d-flex align-items-center fw-bold  fs-2"
                        style="color:#ffffff;">
                        Wish Computer Centre
                    </a>
                    <p class="text-white">Coding is the language of the future, and everybody should learn it.</p>

                </div>
                <div class="col-lg-3 col-md-6 footer_links">
                    <h3 class="fs-5  text-center position-relative pb-3" style="color:#ffffff;">Main Links</h3>
                    <ul class="text-center text-white">
                        <li><a href="" class="text-white">Home</a></li>
                        <li><a href="" class="text-white">About</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 text-center text-md-start">
                    <h3 class="fs-4  text-center position-relative pb-3" style="color:#ffffff;">Contact Us</h3>
                    <p class="text-center " style="color:#ffffff;">
                        Sameer Ram
                        <br>
                        Baguiati, jyangra
                    </p>
                </div>

            </div>
            <div class="social_links d-flex mt-4 m-auto">
                <div class="col-md-6">
                    <a href="https://www.facebook.com/samir.ram1?mibextid=ZbWKwL" class="facebook ">
                        <i class="fa-brands fa-3x fa-facebook"></i> </a>
                </div>
                <div class="col-md-6">
                    <a href="https://instagram.com/samirram007?igshid=MzRlODBiNWFlZA==" class="instagram">
                        <i class="fa-brands fa-3x fa-instagram"></i></a>
                </div>
                <div class="col-md-6">
                    <a href="https://wa.me/8240504123 " class="whatsapp ">
                        <i class="fa-brands fa-3x fa-whatsapp"></i> </a>
                </div>
            </div>

            <div class="container mt-4 py-3 pb-5">
                <div class="copyright text-center ">
                    "@Copyright" <strong>Wish</strong>".All rights are Reserved by WISH"
                </div>
            </div>
        </div>
<<<<<<< HEAD
        <footer id="footer" class="footer mt-5 bg-black">
            <div class="container" id="footer">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="" class=" text-decoration-none logo d-flex align-items-center fw-bold  fs-2"
                            style="color:#ffffff;">
                            Wish Computer Centre
                        </a>
                        <p class="text-white">Coding is the language of the future, and everybody should learn it.</p>

                    </div>
                    <div class="col-lg-3 col-md-6 footer_links">
                        <h3 class="fs-5  text-center position-relative pb-3" style="color:#ffffff;">Main Links</h3>
                        <ul class="text-center text-white" style="list-style: none">
                            <li><a href="" class="text-white text-decoration-none">Home</a></li>
                            <li><a href="" class="text-white text-decoration-none">About</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center text-md-start">
                        <h3 class="fs-4  text-center position-relative pb-3" style="color:#ffffff;">Contact Us</h3>
                        <p class="text-center " style="color:#ffffff;">
                            Sameer Ram
                            <br>
                            Baguiati, jyangra
                        </p>
                    </div>

                </div>
                <div class="social_links d-flex mt-4 m-auto">
                    <div class="col-md-6">
                        <a href="https://www.facebook.com/samir.ram1?mibextid=ZbWKwL" class="facebook ">
                            <i class="fa-brands fa-3x fa-facebook"></i> </a>
                    </div>
                    <div class="col-md-6">
                        <a href="https://instagram.com/samirram007?igshid=MzRlODBiNWFlZA==" class="instagram">
                            <i class="fa-brands fa-3x fa-instagram"></i></a>
                    </div>
                    <div class="col-md-6">
                        <a href="https://wa.me/8240504123 " class="whatsapp ">
                            <i class="fa-brands fa-3x fa-whatsapp"></i> </a>
                    </div>
                </div>

                <div class="container mt-4 py-3 pb-5">
                    <div class="copyright text-center text-white ">
                        "@Copyright" <strong>Wish</strong>".All rights are Reserved by WISH"
                    </div>
                </div>
            </div>
        </footer>
=======
    </footer>

</section>
>>>>>>> 06d49589fb106751e2e89c53ddbcb849e0c23524

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

{{-- <div class="p-card-container h-100 " style="" >
    
    <div class=" p-cards h-100" style=" --angle: -5deg; --x: 5%; --y: 15%; ">
        <img src="/images/coma5.jpeg" alt="" class="polaroid">
    </div>
    <div class=" p-cards h-100" style=" --angle: -1deg; --x: -10%; --y: -20%; ">
        <img src="/images/coma5.jpeg" class="polaroid">
    </div>
    <div class="p-cards h-100" style=" --angle: -4deg; --x: -20%; --y: 5%; ">
        <img src="/images/comp2.jpg" alt="" class="polaroid">
    </div>
    <div class="p-cards h-100" style=" --angle: 7deg; --x: 10%; --y: -7%;  ">
        <img src="/images/coma5.jpeg" class="polaroid">
    </div>

</div> --}}

