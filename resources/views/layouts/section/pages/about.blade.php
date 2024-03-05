<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/aboutus.css') }}">
    <link rel="stylesheet" href="{{ asset('css/wish.css') }}">




</head>

<body>
    @include('layouts.section.navbar')
    <div class="p-5 container-fluid" style="background-color: #BFA07A;">
        <div class="row-fluid">
            <div class="header ">
                <div class="text-center about d-flex justify-content-center align-items-center">OUR STORY</div>
            </div>

        </div>
        <div class="p-0 m-0 container-fluid w-100 row-1 ">
            <div class="row">
                <div class="p-5 m-0 row-1_text col-md-6 d-flex justify-content-center align-items-center">

                    Welcome to WISH! Here, we believe that programming is not just a technical skill, but a gateway to
                    creativity, problem-solving, and limitless innovation.
                </div>
                <div class="col-md-6 ms-0">
                    <img src="/images/about1.jpg" class="img-fluid w-100 " alt="">
                </div>
            </div>
        </div>
        <div class="p-0 m-0 container-fluid w-100">
            <div class="m-0 row row-2">

                <div
                    class="p-5 mx-auto text text--scale row-2_text w-50 d-flex justify-content-center align-items-center">

                    Programming is an art form that allows you to bring ideas to life through lines of code. It is a
                    language that transcends borders and connects individuals from diverse backgrounds, united by a
                    shared passion for building solutions and shaping the future. Our program goes beyond teaching
                    syntax and algorithms; we focus on cultivating a deep understanding of programming principles,
                    critical thinking, and logical reasoning.
                    Whether you are a beginner taking your first steps into the coding realm or an experienced
                    programmer seeking to expand your skill set, our dedicated instructors are here to guide you on your
                    journey.
                </div>
            </div>
        </div>
        <div class="p-0 m-0 container-fluid w-100 row-1 ">
            <div class="row">
                <div class="col-md-6">
                    <img src="/images/coma5.jpeg" class="img-fluid w-100" alt="">
                </div>
                <div class="p-5 row-1_text col-md-6 d-flex justify-content-center align-items-center">

                    In our tuition program, collaboration and hands-on learning take center stage. We believe in the
                    power of teamwork and encourage our students to engage in interactive projects, solve real-world
                    challenges, and build a portfolio that showcases their accomplishments. Our goal is to empower you
                    with the confidence to transform ideas into reality, to think critically, and to embrace the
                    iterative nature of software development.
                </div>

            </div>
        </div>
        <div class="mt-5 container-fluid mi-vi">
            <div class="row">
                <div class="p-5 col-md-6">
                    <div class="mission ms-5 ps-5">
                        OUR MISSION
                    </div>
                    <div class="mt-5 d-flex">
                        <div class="pt-2 d-flex justify-content-top align-items-top">
                            <iconify-icon icon="mdi:star-david" style="color: white;" width="85" height="85">
                            </iconify-icon>
                        </div>
                        <div class="m-3 text-white mission-txt">
                            The mission of computer tuition, or computer education, is to empower individuals with the
                            knowledge
                            and skills necessary to effectively and confidently use computers and related technologies.
                            Computer
                            tuition aims to provide education and training on various aspects of computing, including
                            hardware,
                            software, operating systems, programming, and digital literacy.
                        </div>
                    </div>
                </div>
                <div class="p-5 col-md-6">
                    <div class="mission ms-5 ps-5">
                        OUR VISION
                    </div>
                    <div class="mt-5 d-flex">
                        <div class="pt-2 d-flex justify-content-top align-items-top">
                            <iconify-icon icon="mdi:star-david" style="color: white;" width="85" height="85">
                            </iconify-icon>
                        </div>
                        <div class="m-3 text-white mission-txt">
                            Our vision for computer tuition is to create a society where everyone has access to quality
                            computer
                            education and is equipped with the necessary skills to succeed in the digital age.
                            We strive to provide computer tuition that is relevant to the current and future needs of
                            individuals and society. We anticipate technological advancements and adapt our curriculum
                            to equip learners with skills in emerging fields such as artificial intelligence, data
                            science, cybersecurity, and internet of things .
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="p-5 mt-5 container-fluid team w-100">
            <div class="mx-auto header2 d-flex justify-content-center align-items-center">
                <div class="m-3 text-center title2 "> OUR TEACHERS</div>

            </div>
            <div class="mx-auto mb-5 line"></div>
            <div class="row ">
                <div class="mx-auto mt-5 mb-3 col-md-4 col-sm-6 col-lg-3">
                    <div class="our-team rounded-2">
                        <div class="mx-auto d-flex justify-content-center align-items-center">
                            <img src="/images/sir2.jpg" class="m-3 rounded-circle" width="180" height="180"
                                alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="name">Samir Ram</h3>
                            <h4 class="title">Teacher</h4>
                            <div class="p-3 caption text-dark ">
                                "Programming is the art of turning imagination into reality, one line of code at a
                                time."
                            </div>
                        </div>
                        <ul class="pt-2 social h-100">
                            <li><a href="https://www.facebook.com/samir.ram1?mibextid=ZbWKwL" aria-hidden="true"><i
                                        class="fa-brands fa-facebook"></i>
                                </a></li>
                            <li><a href="https://instagram.com/samirram007?igshid=MzRlODBiNWFlZA=="
                                    aria-hidden="true"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href=" " aria-hidden="true"><i class="fa-brands fa-github"></i></a></li>
                            <li><a href="https://wa.me/8240504123" aria-hidden="true"><i
                                        class="fa-brands fa-whatsapp"></i>
                                </a></li>
                        </ul>
                    </div>
                </div>



                <div class="mx-auto mt-5 mb-3 col-md-4 col-sm-6 col-lg-3">
                    <div class="our-team rounded-2">
                        <div class="mx-auto d-flex justify-content-center align-items-center">
                            <img src="/images/sir2.jpg" class="m-3 rounded-circle" width="180" height="180"
                                alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="name">Kabita Ram</h3>
                            <h4 class="title">Teacher</h4>
                            <div class="p-3 caption text-dark ">
                                "Programming is the art of turning imagination into reality, one line of code at a
                                time."
                            </div>
                        </div>
                        <ul class="pt-2 social h-100">
                            <li><a href="https://www.facebook.com/samir.ram1?mibextid=ZbWKwL" aria-hidden="true"><i
                                        class="fa-brands fa-facebook"></i>
                                </a></li>
                            <li><a href="https://instagram.com/samirram007?igshid=MzRlODBiNWFlZA=="
                                    aria-hidden="true"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href=" " aria-hidden="true"><i class="fa-brands fa-github"></i></a></li>
                            <li><a href="https://wa.me/8240504123" aria-hidden="true"><i
                                        class="fa-brands fa-whatsapp"></i>
                                </a></li>
                        </ul>
                    </div>
                </div>




                <div class="mx-auto mt-5 mb-3 col-md-4 col-sm-6 col-lg-3">
                    <div class="our-team rounded-2">
                        <div class="mx-auto d-flex justify-content-center align-items-center">
                            <img src="/images/sir2.jpg" class="m-3 rounded-circle" width="180" height="180"
                                alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="name">Samir Ram</h3>
                            <h4 class="title">Teacher</h4>
                            <div class="p-3 caption text-dark ">
                                "Programming is the art of turning imagination into reality, one line of code at a
                                time."
                            </div>
                        </div>
                        <ul class="pt-2 social h-100">
                            <li><a href="https://www.facebook.com/samir.ram1?mibextid=ZbWKwL" aria-hidden="true"><i
                                        class="fa-brands fa-facebook"></i>
                                </a></li>
                            <li><a href="https://instagram.com/samirram007?igshid=MzRlODBiNWFlZA=="
                                    aria-hidden="true"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href=" " aria-hidden="true"><i class="fa-brands fa-github"></i></a></li>
                            <li><a href="https://wa.me/8240504123" aria-hidden="true"><i
                                        class="fa-brands fa-whatsapp"></i>
                                </a></li>
                        </ul>
                    </div>
                </div>


            </div>


        </div>
        <div class="mt-5 mb-5 container-fluid">
            <div class="mx-auto header2 d-flex justify-content-center align-items-center">
                <div class="m-3 text-center title2 "> WHY CHOOSE US?</div>
            </div>
            <div class="mx-auto mb-5 line"></div>
            <div class="mt-5 cards">
                <div class="mx-auto mt-5 row">
                    <div class=" col-md-4">
                        <div class="p-5 card h-100">
                            <div class="c-header d-flex">
                                <div class="d-flex justify-content-center align-items-centers ">
                                    <iconify-icon icon="mdi:thunder" style="color: white;" width="36"
                                        height="36"></iconify-icon>
                                </div>
                                <div class="pb-3"> Effective Lessons</div>
                            </div>
                            <div class="card-description">
                                Our lessons are taught by experienced teachers who are experts in their fields and skilled
                                at explaining complex topics in a simple, easy to understand way.
                            </div>
                        </div>

                    </div>
                    <div class=" col-md-4">
                        <div class="p-5 card h-100">
                            <div class="c-header d-flex">
                                <div class="d-flex justify-content-center align-items-centers pe-2">
                                    <iconify-icon icon="carbon:skill-level-advanced" style="color: white;" width="32" height="32"></iconify-icon>                                </div>
                                <div class="pb-3"> Soft Skills Development</div>
                            </div>
                            <div class="card-description">
                                We at WISH, along with the course you select, we teach you the significance of soft skills in
                                professional and inter-personal communications and facilitate an all-round development of
                                personality </div>
                        </div>

                    </div>
                    <div class="col-md-4 ">
                        <div class="p-5 card h-100">
                            <div class="c-header d-flex">
                                <div class="d-flex justify-content-center align-items-centers pe-2">
                                    <iconify-icon icon="ic:outline-balance" style="color: white;" width="32" height="32"></iconify-icon>                                </div>
                                <div class="pb-3">Project Development</div>
                            </div>
                            <div class="card-description">
                                Project-based training programs are designed to address current and upcoming industry that
                                utilizes multifaceted projects as a central organizing strategy for educating students.
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>
    @include('layouts.section.footer')

    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>


</body>

</html>
