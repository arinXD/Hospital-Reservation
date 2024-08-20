<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/css.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/set-link.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="{{asset('js/title.js')}}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .w-fit {
            width: fit-content;
        }

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

        .mt-10 {
            margin-top: 4em;
        }

        .nav-shadow {
            background-color: rgba(1, 89, 177, 0.945) !important;
            border-radius: 0 !important;

        }


        .breadcrumb-item {
            padding: 0.5em 0.5em 0.5em 0.25em !important;
        }

        .breadcrumb-item::before {
            color: white !important;
            font-weight: bolder;
        }

        .link_a:hover {
            padding-bottom: 0.25em;
            border-bottom: 0.2em solid white;
            transition: 0.6s;

        }

        .link:hover,
        .link_a:hover {
            color: white;
            text-decoration: none;

        }

        .link_a,
        .link {
            color: white;
        }
    </style>

</head>

<body>
    <x-app-layout>
        <article>
            <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-bread" style="color: white;">หน้าหลัก</a></li>
                <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">ติดต่อเรา</li>
            </ol>
            <div class="py-5 px-5  text-dark w-100">
                <div class="in_art mt-0">

                    <h1 id="h2" class="contact pb-2" style="text-align:center;border-bottom: 0.125em solid rgb(0, 76, 152) ; width:4.5em ;">ติดต่อเรา</h1>
                    <div class="divcontact mt-5 mb-5">
                        <div class=" pt-5 pl-5">
                            <h4 class="head">ข้อมูลสำหรับติดต่อ</h4>
                            <p class="pt-3">โรงพยาบาลมหาวิทยาลัยขอนแก่น </p>
                            <p>คณะหมูกรอบ มหาวิทยาลัยขอนแก่น</p>
                            <p>เบอร์โทร : 043-123456</p>
                            <p>Email : maidainon@kkumail.com </p>
                        </div>
                        <div class=" pt-3 pl-5 ">
                            <h4 class="head">ที่อยู่</h4>
                            <p class="pt-2 mb-5">345 ถนนมิตรภาพ ตำบลในเมือง
                                อำเภอเมืองขอนแก่น จังหวัดขอนแก่น
                                40002 </p>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </article>
        <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1; clear: both; ">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-between p-4 text-white" style="background-color: rgb(0, 76, 152) !important">
                <!-- Left -->
                <div class="me-5">
                </div>
                <!-- Left -->

                <!-- Right -->
            </section>
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


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>