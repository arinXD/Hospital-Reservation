<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียนผู้ป่วยใหม่</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/Register_new_patient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/set-link.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="{{asset('js/title.js')}}"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        input[type="text"] {
            display: block;
            border-radius: .25em;
        }

        input[type="checkbox"] {
            margin-right: 1em;
        }

        /* input[readonly] {
            background-color: gainsboro;
        } */

        .page-active {
            background-color: darkgreen !important;
        }

        section {
            padding-top: 2em !important;


        }

        .text-uppercase {
            margin-bottom: 0.5em !important
        }

        .account_p::after {
            content: "" !important;
            display: block !important;
            width: 15% !important;
            height: 6px !important;
            background-color: rgb(0, 76, 152) !important;
            /* margin: 10px 0 20px; */
            margin: 0 auto !important;
        }
    </style>

    <script>
        window.onload = function() {
            const selectOptionPrefix = document.getElementById('<?php echo $user->prefix; ?>');
            const selectOptionGender = document.getElementById('<?php echo $user->gender; ?>');
            const selectOptionBloodType = document.getElementById('<?php echo $user->bloodtype; ?>');
            selectOptionPrefix.setAttribute('selected', 'selected');
            selectOptionGender.setAttribute('selected', 'selected');
            selectOptionBloodType.setAttribute('selected', 'selected');
        }
    </script>
</head>

<body>
    <x-app-layout>

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">

            <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-bread" style="color: white;">หน้าหลัก</a></li>
                <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">ลงทะเบียนผู้ป่วย (ข้อมูลส่วนตัว)</li>
            </ol>
        </nav>
        <section>
            <p class="account_p">ลงทะเบียนผู้ป่วย</p>
            <article>

                <div class="in_art">
                    <div class="row next_art">
                        @if(count($user->patients)==0)
                        <div class="col-12 col-sm-12 col-md-4 col-lg-6 link_to">
                            <a href="/new/patient" class="a_link_new_regist_2">ลงทะเบียน</a>
                        </div>
                        @else
                        <div class="col-12 col-sm-12 col-md-4 col-lg-6 link_to">
                            <a href="/new/patient" class="a_link_new_regist_2">ข้อมูลส่วนตัว</a>
                        </div>
                        @endif
                        @if($count!=0)
                        <div class="col-12 col-sm-12 col-md-4 col-lg-6 ">
                            <a href="/patient/regis/history" class="a_link_check_regist_2">ข้อมูลการรักษาพยาบาล</a>
                        </div>
                        @else
                        <div class="col-12 col-sm-12 col-md-4 col-lg-6 ">
                            <a href="/check/patient/statut" class="a_link_check_regist_2">สถานะการลงทะเบียน</a>
                        </div>
                        @endif
                    </div>
                    <h4 class="ml-auto mr-auto" style="text-align: center; margin-bottom: 1em;font-size:1.55em ;width: max-content;">แบบฟอร์มข้อมูลเพื่อลงทะเบียน</h4>
                    <h5 class="pl-2" style="margin: 1em auto;font-size:1.5em ;border-left:5px solid rgb(0, 76, 152) ; ">ข้อมูลส่วนบุคคล</h5>
                    <form action="/add/patient" method="post">
                        @csrf
                        <!-- start row -->
                        <div class="row first_inputs" style="margin: 1em auto;">
                            <div class=" col-lg-2 ">
                                <p class="label ">
                                    คำนำหน้า
                                </p>
                                <select name="prefix" style="width: 6em; height: 3em; border-radius: 0.5em; text-align: center; border-color: rgb(200,200,200); border-width: 0.125em;">
                                    <option id="นาย" value="นาย" selected> นาย
                                    <option id="นางสาว" value="นางสาว"> นางสาว
                                    <option id="นาง" value="นาง"> นาง
                                </select>
                            </div>
                            <div class="col-lg-5 ">
                                <p class="label ">
                                    ชื่อ
                                </p>
                                <input type="text " class="input_text " name="firstname" value="{{$user->firstname}}" style="border:0.125em solid rgb(200,200,200) !important;" required>
                            </div>
                            <div class="col-lg-5 ">
                                <p class="label ">
                                    นามสกุล
                                </p>
                                <input type="text " class="input_text " name="lastname" value="{{$user->lastname}}" style="border:0.125em solid rgb(200,200,200) !important;" required>
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- start row -->
                        <div class=" row second_input " style="margin: 1em auto; ">
                            <div class="col-lg-2 ">
                                <p class="label ">
                                    เพศ
                                </p>
                                <select name="gender" style="width: 6em; height: 3em; border-radius: 0.5em; text-align: center; border-color: rgb(200, 200, 200); border-width: 0.125em; ">
                                    <option id="ชาย" value="ชาย" selected> ชาย
                                    <option id="หญิง" value="หญิง"> หญิง

                                </select>
                            </div>

                            <div class="col-lg-3">

                                <p class="label">
                                    อายุ
                                </p>
                                <input type="text" value="{{$age}}" class="new_date rounded" readonly>
                            </div>
                            <div class="col-lg-4 ">

                                <p class="label">
                                    วันเดือนปีเกิด
                                </p>
                                <input type="date" value="{{$user->birthday}}" class="new_date rounded" required readonly>
                            </div>
                            <div class=" col-lg-3 ">
                                <p class="label ">
                                    กรุ๊ปเลือด
                                </p>
                                <select name="bloodtype" value="{{$user->bloodtype}}" style="width: 100%; height: 3em; border-radius: 0.5em; text-align: center; border-color: rgb(200, 200, 200); border-width: 0.125em; " required>
                                    <option id="A" value="A" selected> A
                                    <option id="B" value="B"> B
                                    <option id="AB" value="AB"> AB
                                    <option id="O" value="O"> O
                                </select>
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- start row -->
                        <div class="row third_input " style="margin: 1em auto; ">

                            <div class="col-lg-6">
                                <p class="label">
                                    เลขบัตรประชาชน
                                </p>
                                <input type="text " class="input_text" value="{{$user->card_id}}" name="card_id" required>
                            </div>

                            <div class="col-lg-6">
                                <p class="label">
                                    สัญชาติ
                                </p>
                                <input type="text" class="input_text" value="{{$user->nationality}}" name="nationality" required>
                            </div>

                        </div>
                        <!-- end row -->

                        <!-- start row -->
                        <div class="row forth_input" style="margin: 1em auto; ">

                            <div class="col-lg-6 ">
                                <p class="label ">
                                    ศาสนา
                                </p>
                                <input type="text " class="input_text " name="religion" value="{{$user->religion}}" required>
                            </div>

                            <div class="col-lg-6">
                                <p class="label">
                                    อาชีพ
                                </p>
                                <input type="text" class="input_text" name="job" value="{{$patients['job']}}" required>
                            </div>

                        </div>

                        <!-- start row -->
                        <div class="row forth_input " style="margin: 2em auto; ">


                            <div class="col-lg-12 ">
                                <p class="label ">
                                    ที่อยู่
                                </p>

                                <div>
                                    <textarea name="address" class="input_address" value="" require>{{$user->address}}</textarea>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->

                        <!-- start row -->
                        <div class="row forth_input " style="margin: 2em auto; ">


                            <div class="col-lg-12 ">
                                <p class="label ">
                                    เบอร์โทรศัพท์
                                </p>

                                <div>
                                    <input type="input_phone_number" style="padding-left:1em;" name="phone" class="input_phonenumber " value="{{$user->phone}}" required>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->
                        @if(count($user->patients)==0)
                        <center><button type="submit " class="buttom_submit " name="button_submit ">บันทึก</button></center>
                        @endif
                    </form>
                </div>
            </article>
        </section>

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

    </x-app-layout>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>