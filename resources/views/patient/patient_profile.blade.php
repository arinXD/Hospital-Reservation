<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="{{asset('js/title.js')}}"></script>

    <style>
        *,
        *:before,
        *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            color: #384047;
        }

        .container form {
            max-width: 800px;
            margin: 10px auto;
            padding: 10px 20px;
            background: #f4f7f8;
            border-radius: 8px;
        }

        h1 {
            margin: 0 0 30px 0;
            text-align: center;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        input[type="datetime"],
        input[type="email"],
        input[type="number"],
        input[type="search"],
        input[type="tel"],
        input[type="time"],
        input[type="url"],
        textarea,
        select {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            font-size: 16px;
            height: auto;
            margin: 0;
            outline: 0;
            padding: 15px;
            width: 100%;
            background-color: #e8eeef;
            color: #8a97a0;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            margin-bottom: 30px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin: 0 4px 8px 0;
        }

        select {
            padding: 6px;
            height: 32px;
            border-radius: 2px;
        }

        button {
            padding: 19px 39px 18px 39px;
            color: #FFF;
            background-color: #4bc970;
            font-size: 18px;
            text-align: center;
            font-style: normal;
            border-radius: 5px;
            width: 100%;
            border: 1px solid #3ac162;
            border-width: 1px 1px 3px;
            box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
            margin-bottom: 10px;
        }

        fieldset {
            margin-bottom: 30px;
            border: none;
        }

        legend {
            font-size: 1.4em;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        label.light {
            font-weight: 300;
            display: inline;
        }
        .nav-shadow {
            background-color: rgba(1, 89, 177, 0.945) !important;
            border-radius: 0 !important;

        }

        .number {
            background-color: #004C98;
            color: #fff;
            height: 30px;
            width: 30px;
            display: inline-block;
            font-size: 0.8em;
            margin-right: 4px;
            line-height: 30px;
            text-align: center;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
            border-radius: 100%;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow" style="padding-top: 1em !important; padding-bottom: 1em !important;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-bread" style="color: white;">หน้าหลัก</a></li>
            <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">ข้อมูลส่วนตัว</li>
        </ol>
        <div class="container bg-white border w-100 my-5 py-5">
            <form action="/patient/edit" method="post" autocomplete="off">
                @csrf

                <h1 class="h1 mt-4 mb-4">ข้อมูลส่วนตัว</h1>

                <fieldset>

                    <legend><span class="number mb-3">1</span>ข้อมูลทั่วไป</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mb-3 text-dark">รหัสประจำตัวผู้ป่วย:</label>
                            <input type="text" name="patient_id" value="{{$user->patients[0]->id}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="mb-3 text-dark">เลขบัตรประชาชน:</label>
                            <input class="bg-white text-dark border" type="text" name="card_id" value="{{$user->card_id}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mb-3 text-dark">ชื่อ:</label>
                            <input class="bg-white text-dark border" type="text" name="firstname" value="{{$user->firstname}}">
                        </div>
                        <div class="col-md-6">
                            <label class="mb-3 text-dark">นามสกุล:</label>
                            <input class="bg-white text-dark border" type="text" name="lastname" value="{{$user->lastname}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mb-3 text-dark">วัน/เดือน/ปีเกิด:</label>
                            <input class="bg-white text-dark border" type="text" value="{{$user->birthday}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="mb-3 text-dark">อายุ:</label>
                            <input class="bg-white text-dark border" type="text" value="{{$age}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="mb-3 text-dark">กรุ๊ปเลือด:</label>
                            <input class="bg-white text-dark border" type="text" name="bloodtype" value="{{$user->bloodtype}}">
                        </div>
                        <div class="col-md-4">
                            <label class="mb-3 text-dark">ศาสนา:</label>
                            <input class="bg-white text-dark border" type="text" name="religion" value="{{$user->religion}}">
                        </div>
                        <div class="col-md-4">
                            <label class="mb-3 text-dark">สัญชาติ:</label>
                            <input class="bg-white text-dark border" type="text" name="nationality" value="{{$user->nationality}}">
                        </div>
                    </div>
                    <label class="mb-3 text-dark">อาชีพ:</label>
                    <input class="bg-white text-dark border" type="text" name="job" value="{{$user->patients[0]->job}}">

                    <label class="mb-3 text-dark">ที่อยู่ติดต่อ:</label>
                    <input class="bg-white text-dark border" type="text" name="address" value="{{$user->address}}">

                    <label class="mb-3 text-dark">เบอร์โทรศัพท์:</label>
                    <input class="bg-white text-dark border" type="text" name="phone" value="{{$user->phone}}">

                </fieldset>

                <div class="d-flex justify-content-center mt-4 mb-3">
                    <button class="btn btn-primary bg-primary w-100" type="submit">บันทึก</button>
                </div>

            </form>
        </div>

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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>