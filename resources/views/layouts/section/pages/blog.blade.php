<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/wish.css')}}">
    <style>
        .b-pg-head{
            font-size: 55px;
            font-weight: 900;


        }
        .b-pg-head-below{
            font-size: 25px;
            color: #1F1F26;
        }
        .b-img-1-back{
            background-color: #D9886A !important;
            width: 580px;
            height: 420px !important;

        }
        .b-img-1{
            margin-top: 200px;
            margin-right: 220px;

        }
        .card-heading{

                    font-size: 55px;
            font-weight: 900;
            color: #1F1F26;
        }
        .blog-card{
            /* background-image: url("/images/comp2.jpg");
            background-repeat: no-repeat;
    background-size: cover;
 background-attachment: fixed;          */
 background-color: #D9886A !important;


        }
        .blog-card-header{
            font-size: 30px;
            font-weight: 600;
            color: #1F1F26;
        }
        .blog-card-label{
            font-size: 18px;
            font-weight: 500;

        }
        .blog-card-txt{
            font-size: 18px;

        }
    </style>
</head>

<body>
    @include('layouts.section.navbar')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row m-5">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="  p-5 m-5">
                        <div class="b-pg-head">Grow Your Skills Define Your Future</div>
                        <div class="b-pg-head-below mt-5">
                            Unlock Your Potential: Embrace Personalized Learning with Us!
                        </div>
                    </div>

                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="position-relative b-img-1-back rounded-2 h-100  d-flex justify-content-center align-items-center">
                            <img src="/images/blogimg/blog-pg-1.jpg" height="350px" alt="" class="b-img-1 position-absolute  rounded-2">

                    </div>

                </div>
            </div>

        </div>
        <div class="container pt-5">
            <div class="card-heading text-center mt-5 mb-4">
                Our Daily Blog
            </div>
            <div class="row">
                <div class="card blog-card w-100 ">
                    <div class="row">
                        <div class="col-md-8 p-5">
                            <div class="blog-card-header">
                                Podcast Title
                            </div>
                            <div class="blog-card-time">
                                <div class="d-flex justify-items-center align-items-center">
                                    <iconify-icon icon="simple-line-icons:calender" style="color: black;" width="18" height="18" class="me-2"></iconify-icon>
                                    <div class="blog-card-label">Mon,July 25th 2023</div>


                                </div>
                                <div class="blog-card-txt mt-3">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!
                                </div>
                            </div>
                            <div class="row">
                                <div class="blog-card-btn btn d-flex justify-items-start align-items-center">
                                    Learn More
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <img src="/images/coma4.jfif" alt="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-5">
                <div class="card blog-card w-100 ">
                    <div class="row">
                        <div class="col-md-8 p-5">
                            <div class="blog-card-header">
                                Podcast Title
                            </div>
                            <div class="blog-card-time">
                                <div class="d-flex justify-items-center align-items-center">
                                    <iconify-icon icon="simple-line-icons:calender" style="color: black;" width="18" height="18" class="me-2"></iconify-icon>
                                    <div class="blog-card-label">Mon,July 25th 2023</div>


                                </div>
                                <div class="blog-card-txt mt-3">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!
                                </div>
                            </div>
                            <div class="row">
                                <div class="blog-card-btn btn d-flex justify-items-start align-items-center">
                                    Learn More
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <img src="/images/coma4.jfif" alt="">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

</body>

</html>
