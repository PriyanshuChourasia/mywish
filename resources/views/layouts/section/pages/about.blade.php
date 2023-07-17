<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        .header {
            background-color: #1F1F26;
            width: 500px;
            height: 120px;
            border-start-end-radius: 20px;
            border-bottom-left-radius: 20px;

        }

        .about {
            font-size: 80px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-weight: 700;
            color: #D8D9D7;
            transform: translateY(-600px);
            animation: fromTop 2s forwards;

        }

        @keyframes fromTop {

            100% {
                transform: translateY(0);

            }
        }

        .row-1 {
            background-color: #D9886A !important;

        }

        .row-2 {
            background-color: #1F1F26;


        }

        .row-2_text {
            height: 600px;
            line-height: 36px;
            color: #D8D9D7;
            font-size: 18px;
            animation: fadeIn 6s;



        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

     @import url("https://fonts.googleapis.com/css?family=Lato:700");

        .row-1_text {
            color: #efefef;
            line-height: 36px;
            font-size: 18px;
            animation: fadeIn 3s;
        }

        .text--scale [data-scroll='out'] .char {
            -webkit-transform: scale(0);
            transform: scale(0);
        }
    </style>

</head>

<body>
    <div class="container-fluid p-5" style="background-color: #BFA07A;">
        <div class="header ">
            <div class="about text-center d-flex justify-content-center align-items-center ">ABOUT US</div>
        </div>
        <div class="container-fluid m-0 w-100 row-1  p-0 ">
            <div class="row">
                <div class="row-1_text col-md-6 p-5 m-0 d-flex justify-content-center align-items-center">

                    Welcome to WISH! Here, we believe that programming is not just a technical skill, but a gateway to
                    creativity, problem-solving, and limitless innovation.
                </div>
                <div class="col-md-6 ms-0">
                    <img src="/images/about1.jpg" class="img-fluid w-100 " alt="">
                </div>
            </div>
        </div>
        <div class="container-fluid m-0 w-100  p-0">
            <div class="row row-2 m-0">

                <div class="text text--scale row-2_text mx-auto  w-50  p-5 d-flex justify-content-center align-items-center"
                    data-scroll="out" data-splitting="">

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
        <div class="container-fluid m-0 w-100 row-1 p-0 ">
            <div class="row">
                <div class="col-md-6">
                    <img src="/images/coma5.jpeg" class="img-fluid w-100" alt="">
                </div>
                <div class="row-1_text col-md-6 p-5 d-flex justify-content-center align-items-center">

                    In our tuition program, collaboration and hands-on learning take center stage. We believe in the
                    power of teamwork and encourage our students to engage in interactive projects, solve real-world
                    challenges, and build a portfolio that showcases their accomplishments. Our goal is to empower you
                    with the confidence to transform ideas into reality, to think critically, and to embrace the
                    iterative nature of software development.
                </div>

            </div>
        </div>

    </div>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>


</body>

</html>
