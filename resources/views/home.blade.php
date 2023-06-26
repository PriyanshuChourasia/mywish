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
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid ">

            <a class="navbar-brand fw-bold fs-2 "
                href="#">WISH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ">
                        <a class="nav-link active text-white" aria-current="page"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active text-white" aria-current="page"
                            href="/">About</a>
                    </li>

                    <li class="nav-item">
                        <div class="nav-item">
                            @if (Route::has('admin.login'))
                                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                    @auth('admin')
                                        <a href="{{ route('admin.dashboard') }}">Admin
                                            Login</a>
                                    @else
                                        <a href="{{ route('admin.login') }}"
                                            class=" nav-link text-decoration-none text-white">Admin
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
                                            Login</a>
                                    @else
                                        <a href="{{ route('student.login') }}"
                                            class="nav-link text-decoration-none text-white">Student
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
    <div class=" main">
        {{-- carousal starts --}}
        {{-- <section>
            <div class="carousel-inner">
                <div class="carousel-item active">
                   


                    <img src="/images/carousalbg-3.jpg" class=" w-100 carousal_img" style="" alt="...">
                    <div class="carousel-caption d-none d-md-block car-cap">
                        <h5 style="font-size: 65px;">Learn Coding</h5>
                        <p>Built Your Dream </p>
                    </div>
                </div>
            </div>

        </section> --}}
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('images/coding1.jpg')}}" class="d-block w-100 img-carousel-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  {{-- <h5>First slide label</h5> --}}
                  <p class="fs-3 text-white fw-bold">{{__('The best error message is the one that never shows up.')}}</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/coding2.jpg')}}" class="d-block w-100 img-carousel-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  {{-- <h5>Second slide label</h5> --}}
                  {{-- <p class="fs-3  fw-bold" style="color: #f62c16">{{__('Success is not final, failure is not fatal: It is the courage to continue that counts.')}}</p> --}}
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/coding3.jpg')}}" class="d-block w-100 img-carousel-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  {{-- <h5></h5> --}}
                  {{-- <p class="fs-3 text-dark fw-bold">{{__('Coding is like poetry, only in a language that computers can understand')}}</p> --}}
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

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

        <section style="padding-top:60px; padding-bottom:80px">
            <div class="container-fluid mt-5 mb-5 ">
                <div class="row  align-items-center">
                    <div class="col-md-6 position-relative mb-5 d-flex justify-content-center">
                        <div class=" ">

                            <h1 style="font-weight:900; font-size:55px; " class="animate-charcter">
                                Welcome To Wish
                            </h1>
                            <p class="text-center " style="font-weight:500;color:#ff5f50; font-size:25px; ">Just one
                                step
                                ahead</p>

                        </div>

                    </div>
                    <div class="col-md-6 ">
                        <div>

                            <marquee behavior="slide" scrollamount="5"  class="text-white fs-3 fw-bold" direction="left">Code is like humor. When you have to explain it, it's bad.</marquee>
                            {{-- <img src="/images/pol-bg.png"
                                class="welcome-img img-responsive img-fluid position-relative"> --}}


                        </div>
                    </div>
                </div>
            </div>

        </section>



        {{-- card --}}
        <section>
            <div class="container mt-5 mb-5">


                <div class="text-center mt-5 mb-5"
                    style="font-weight:700;font-size:50px; color:#FB9391;margin-bottom:90px !important;">EXPLORE
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
                            <div class="card-body">
                                <h4 class="text-center card-head">Java</h4>
                                <p class="card-txt">Java is a widely-used programming language for coding web
                                    applications. It has been a popular choice among developers for over two decades,
                                    with millions of Java applications in use today. Java is a multi-platform,
                                    object-oriented, and network-centric language that can be used as a platform in
                                    itself.</p>
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
                                <p>HTML (the Hypertext Markup Language) and CSS (Cascading Style Sheets) are two of the
                                    core technologies for building Web pages. HTML provides the structure of the page,
                                    CSS the (visual and aural) layout, for a variety of devices.</p>
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
                                <p>The C programming language is a procedural and general-purpose language that provides
                                    low-level access to system memory. </p>
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
                                <p>PHP (Hypertext Processor) is a general-purpose scripting language and interpreter
                                    that is freely available and widely used for web development.</p>
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
                                <p>JavaScript is a dynamic programming language that's used for web development, in web
                                    applications, for game development, and lots more. It allows you to implement
                                    dynamic features on web pages that cannot be done with only HTML and CSS.</p>
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
                                <p>C++ is an object-oriented programming (OOP) language that is viewed by many as the
                                    best language for creating large-scale applications. C++ is a superset of the C
                                    language.</p>
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
                    <div class="text-center mb-3" style="font-size: 55px;color:#ff5f50;font-weight:800; ">
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
            <footer id="footer" class="footer wish_footer" >
                <div class="container" id="footer">
                    <div class="row gy-4">
                        <div class="col-lg-5 col-md-6 footer-info">
                            <a href="" class="text-decoration-none logo d-flex align-items-center fw-bold  fs-2"
                                style="color:#ffffff;">
                                Wish Computer Centre
                            </a>
                            <p class="text-white">{{__('The only way to do great work is to love what you do.')}}
                            </p>

                        </div>
                        <div class="col-lg-3 col-md-6 footer_links">
                            <h3 class="fs-5  text-center position-relative pb-3" style="color:#ffffff;">Links
                            </h3>
                            <ul class="text-center text-white " style="list-style: none">
                                <li><a href="" class="text-white text-decoration-none">Home</a></li>
                                <li><a href="" class="text-white text-decoration-none">About</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6 text-center text-md-start">
                            <h3 class="fs-4  text-center position-relative pb-3" style="color:#ffffff;">Contact Us
                            </h3>
                            <p class="text-center " style="color:#ffffff;">
                                Sameer Ram
                                <br>
                                Baguiati, jyangra
                            </p>
                        </div>

                    </div>
                    <div class=" row d-flex mt-4 m-auto">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3"><a href="https://www.facebook.com/samir.ram1?mibextid=ZbWKwL" class="facebook " title="click me">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="white" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                      </svg> </a></div>
                                <div class="col-md-3">
                                    <a href="https://instagram.com/samirram007?igshid=MzRlODBiNWFlZA==" class="instagram" title="click me">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
                                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                          </svg></a>
                                </div>
                                <div class="col-md-3">
                                    <a href="https://wa.me/8240504123 " class="whatsapp " title="click me">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="white" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                          </svg> </a>
                                </div>
                            </div>
                        </div>
 
                    </div>

                    <div class="container mt-4 py-3 pb-5">
                        <div class="copyright text-center text-white">
                            "@Copyright" <strong>Wish</strong>".All rights are Reserved by WISH"
                        </div>
                    </div>
                </div>
            </footer>

        </section>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

