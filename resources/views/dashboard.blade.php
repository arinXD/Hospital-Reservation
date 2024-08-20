<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โรงพยาบาลมหาวิทยาลัยขอนแก่น</title>
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/based-css.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="{{asset('js/title.js')}}"></script>
    <style>
        hr {

            background-color: rgb(0, 76, 152) !important;
            height: 0.125em !important;
        }

        .link_at_home {
            text-align: center !important;
            padding: 1em !important;
            /* background-color: rgb(0, 76, 152); */
            background-color: white !important;
            border: 0.125em solid rgb(0, 76, 152) !important;
            color: rgb(20, 21, 24) !important;
            display: inline-block !important;
            width: 45% !important;
            margin: 2% !important;
            border-radius: 0.5em !important;
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px !important;
            height: auto !important;
        }

        .link_at_home:hover {
            /* box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset; */
            /* background-color: rgb(0, 76, 152); */
            text-decoration: none !important;
            background-color: rgb(0, 76, 152) !important;
            /* color: white; */
            color: white !important;
            transition: 1s !important;
        }
    </style>
    <style>
        nav a {
            color: black;
            text-decoration: none;
            font-size: .85em;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        li {
            display: inline-block;
            padding: .5em 1.6em;
        }

        .logo {
            flex: 1;
            text-align: left;
        }

        .logo a {
            font-size: .95em;
        }
    </style>
    <style>
        #btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            z-index: 99;
        }

        .link_a:hover {
            padding-bottom: 0.25em;
            border-bottom: 0.2em solid white;
            transition: 0.6s;
            

        }

        .head1 {
            font-size: 1.75em !important;
            font-weight: 600;
            padding-bottom: 0.5em;

        }

        * {
            font-family: SF Thonburi !important;
        }
    </style>

</head>

<body>
    <x-app-layout>
        <section>
            <article>
                <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow" style="background-color: rgba(1, 89, 177, 0.945)!important; border-radius: 0em;">
                    <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">หน้าหลัก</li>
                </ol>
                <div id="carouselExampleIndicators" class="carousel slide border-bottom" data-bs-ride="true">
                    <div class="carousel-inner" style="overflow: hidden; max-height:1010px">
                        <div class="carousel-item active">
                            <img style="height: 65vh !important;" src="./img/home.png" class="d-block w-100 img-fluid" alt="Advertisement Picture">
                        </div>
                        <div class="carousel-item">
                            <img style="height: 65vh !important;" src="./img/pic_ad_2.jpg" class="d-block w-100 h-100 img-fluid" alt="Advertisement Picture">
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="in_art">
                    <a class="link_at_home" href="{{route('newPatient')}}"><img src="./img/user_register.svg" class="icon_img" style="width: auto; height:auto; margin-right:1em; ">
                        <span style="vertical-align: bottom;">ลงทะเบียนผู้ป่วยใหม่</span></a>
                    <a class="link_at_home" href="{{route('question')}}"><img src="./img/qna.png" class="icon_img" style="width: auto; height:auto; margin-right:1em; ">
                        <span style="vertical-align: bottom;">Q/A สอบถาม</span></a>
                </div>
                <hr id="line1">
                <div>
                    <img class="imghome " src="./img/home1.png" alt="advertise image">
                </div>
                <div class="divpas p-5 pb-0 shadow">
                    <h3 class="head1" style="color:#2C229C; font-size:1.5em; "> BE STRONG FOR SURGERY <br> คืนชีวิตใหม่ ฟื้นตัวไว </h3>
                    <p class="">ด้วยโปรแกรมฟื้นตัวไวหลังผ่าตัด ERAS PROGRAM ให้คุณสามารถวางแผนการรักษาได้ ตั้งแต่ก่อนผ่าตัด – ระหว่างผ่าตัด – หลังผ่าตัด ลงตัวกับไลฟ์สไตล์ที่คุณต้องการเพื่อผลลัพธ์ที่เต็มประสิทธิภาพ</p>
                    <p class="float-right pt-4  " style="color:#2C229C;font-weight: 700;">ดูเพิ่มเติม</p>
                </div>

                <div class="arti_1">
                    <p class="adver_p" style="clear: both; ">ประชาสัมพันธ์</p>
                    <div class="row align-items-start row_class " style="margin-top:0em ;">
                        <a href="">
                            <div class="card " style="width:18rem; ">
                                <img src="./img/image7.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Medication Safety Week 2022</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </a>
                        <a href="">
                            <div class="card " style="width: 18rem;">
                                <img src="./img/image8.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Medication Safety Week 2022</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                </div>
                            </div>
                        </a>
                        <a href="">
                            <div class="card" style="width: 18rem;">
                                <img src="./img/image9.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Medication Safety Week 2022</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                </div>
                            </div>
                        </a>
                        <a href="">
                            <div class="card" style="width: 18rem;">
                                <img src="./img/image10.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Medication Safety Week 2022</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                </div>
                            </div>
                        </a>
                    </div>

            </article>
            <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1; clear: both; ">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-between p-4 text-white" style="background-color: rgb(0, 76, 152) !important">
                    <!-- Left -->
                    <div class="me-5">
                        <!-- <span>Get connected with us on social networks:</span> -->
                    </div>
                    <!-- Left -->

                    <!-- Right -->
                </section>
                <!-- Section: Social media -->

                <!-- Section: Links  -->
                <section class="">
                    <div class="container text-left text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row mt-3">
                            <!-- Grid column -->
                            <div class="col-12 col-md-3 col-lg-4 col-xl-6 mx-auto mb-4">
                                <!-- Content -->
                                <h6 class=" text-uppercase fw-bold">โรงพยาบาลมหาวิทยาลัยขอนแก่น</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 50%; background-color: rgb(0, 76, 152); height: 0.125em" />
                                <p style="width: 80%; text-indent: 2em;">
                                    โรงพยาบาลมหาวิทยาลัยขอนแก่น ผู้ให้บริการทางการแพทย์ และการรักษาพยาบาลชั้นนำของประเทศ ที่ได้รับความไว้วางใจทั้งจากคนไทย และชาวต่างชาติเลือกใช้บริการตรวจวินิจฉัย รักษา และฟื้นฟูสุขภาพด้วยดีตลอดมา
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-12 col-md-2 col-lg-2 col-xl-3 mx-auto mb-4 text-left">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">เมนู</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 30px; background-color: rgb(0, 76, 152); height: 0.125em" />

                                <p class="test_p">
                                    <a href="/advertise" class="text-dark link_text">ประชาสัมพันธ์</a>
                                </p>

                                <p class="test_p">
                                    <a href="/contact" class="text-dark link_text">ติดต่อเรา</a>
                                </p>
                                <p class="test_p">
                                    <a href="{{route('newPatient')}}" class="text-dark link_text">ลงทะเบียนผู้ป่วยใหม่</a>
                                </p>
                                <p class="test_p">
                                    <a href="{{route('question')}}" class="text-dark link_text">Q&A</a>
                                </p>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-left">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">ติดต่อเรา</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: rgb(0, 76, 152); height: 0.125em" />
                                <p>KKU Hospital<br> มหาวิทยาลัยขอนแก่น</p>
                                <p>Email : maidainon@kkumail.com </p>
                                <p>เบอร์โทร : 043-123456</p>

                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <div class="text-center mt-5 p-3" style="background-color: rgb(0, 76, 152); color: #ECEFF1;">
                    © 2022 Copyright: KKU Hospital Group 11
                </div>
            </footer>
            <!-- Footer -->


    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>