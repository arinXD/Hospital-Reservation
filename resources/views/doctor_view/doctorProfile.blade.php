<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('./css/personal_information.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/css.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/set-link.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/based-css.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="{{asset('js/title.js')}}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .w-fit {
            width: fit-content;
        }

        input[type="text"],
        input[type="email"] {
            margin-bottom: 1em;
        }

        input[readonly] {
            background-color: lightgray;
        }
    </style>
</head>

<body></body>
<x-app-layout>

    <section>
        <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow ">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-bread" style="color: white;">หน้าหลัก</a></li>
            <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">ประวัติส่วนตัวบุคลากร</li>
        </ol>
        <p class="account_p mt-5">ประวัติส่วนตัวบุคลากร</p>
        <article class="container">
            <div class="in_art_first">
                <div class="section_img">

                    <!-- <div class="div_img_1">
                    </div> -->
                    <div class="img_block">

                        <img class="img-fluid personal_img rounded-circle" src="https://themomentum.co/wp-content/uploads/2022/05/thumbnail-1.jpg" alt="รูปประจำตัวผู้ใช้ ">
                    </div>
                    <!-- </div> -->
                </div>
                <form class="mt-5 mb-5" action="/doctor/profile/edit" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-3 ">
                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                ชื่อบัญชีผู้ใช้
                            </p>
                            <input type="text " name="user_id" value="{{$user->username}}" style="width: 100%; padding: 0.5em 1em; " readonly>
                        </div>

                        <div class="col-lg-6 mb-3 ">
                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                อีเมล
                            </p>
                            <input type="text " name="email" value="{{$user->email}}" style="width: 100%;  padding: 0.5em 1em; " readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3 ">
                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                รหัสประจำตัวแพทย์
                            </p>
                            <input type="text " name="doctor_id" value="{{$user->doctors[0]->id}}" style="width: 100%; padding: 0.5em 1em; " readonly>
                        </div>
                        <div class="col-lg-6 mb-3 ">
                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                วันเดือนปีเกิด
                            </p>
                            <input type="text " name="personal_dmy " style="width: 100%;  padding: 0.5em 1em; " value="{{$user->birthday}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 mb-3 ">
                            <p>คำนำหน้า</p>
                            <select name="prefix">
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                        </div>
                        <div class="col-lg-4 mb-3 ">
                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                ชื่อ
                            </p>
                            <input type="text " name="firstname" value="{{$user->firstname}}" style="width: 100%;  padding: 0.5em 1em; ">
                        </div>
                        <div class="col-lg-6 mb-3 ">
                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                นามสกุล
                            </p>
                            <input type="text " name="lastname" value="{{$user->lastname}}" style="width: 100%;  padding: 0.5em 1em; ">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3 ">
                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                เลขบัตรประชาชน
                            </p>
                            <input type="text " name="card_id" value="{{$user->card_id}}" style="width: 100%;  padding: 0.5em 1em; " readonly>
                        </div>
                        <div class="col-lg-3 mb-3 ">

                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                อายุ
                            </p>
                            <input type="text " style="width: 80%;  padding: 0.5em 1em; " value="{{$age}}">

                        </div>
                        <div class="col-lg-3 mb-3 ">
                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                เพศ
                            </p>
                            <select name="gender" style="width: 80%;  padding: 0.5em 1em; ">
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3 ">
                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                เบอร์โทรศัพท์
                            </p>
                            <input type="text " name="phone" value="{{$user->phone}}" style="width: 100%;  padding: 0.5em 1em; ">
                        </div>
                        <div class="col-lg-3 mb-3 ">

                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                สัญชาติ
                            </p>
                            <input type="text " name="nationality" value="{{$user->nationality}}" style="width: 80%;  padding: 0.5em 1em; ">

                        </div>
                        <div class="col-lg-3 mb-3 ">

                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                ศาสนา
                            </p>
                            <input type="text " name="religion" value="{{$user->religion}}" style="width: 80%;  padding: 0.5em 1em; ">

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3 ">
                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                การศึกษา
                            </p>
                            <input type="text " name="religion" value="{{$user->religion}}" style="width: 100%; padding: 0.5em 1em; ">
                        </div>
                        <div class="col-lg-6 mb-3 ">
                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                ประสบการณ์
                            </p>
                            <input type="text " name="career_experience" value="{{$user->doctors[0]->career_experience}}" style="width: 100%;  padding: 0.5em 1em; ">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-3 ">
                            <p class="label " style="color: rgb(0, 76, 152); font-weight: bold; ">
                                ที่อยู่ติดต่อ
                            </p>
                            <textarea rows="5" cols="50" name="address" value="">{{$user->address}}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="d-block mx-auto mt-3  btn mt-5" style=" background-color: rgb(18, 70, 130);
    color: white;
    ">บันทึก</button>
                </form>
        </article>

        <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-between p-4 text-white" style="background-color: rgb(0, 76, 152) !important">
                <!-- Left -->
                <div class="me-5">
                    <span></span>
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
                        <div class="col-12 col-md-3 col-lg-4 col-xl-5 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold">โรงพยาบาลมหาวิทยาลัยขอนแก่น</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto col-md-12 w-50" style="width: 0; background-color: rgb(0, 76, 152); height: 0.125em" />
                            <p style="width: 80%; text-indent: 2em;">
                                โรงพยาบาลมหาวิทยาลัยขอนแก่น ผู้ให้บริการทางการแพทย์ และการรักษาพยาบาลชั้นนำของประเทศ ที่ได้รับความไว้วางใจทั้งจากคนไทย และชาวต่างชาติเลือกใช้บริการตรวจวินิจฉัย รักษา และฟื้นฟูสุขภาพด้วยดีตลอดมา
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-12 col-md-2 col-lg-2 mb-4 text-left mb-4 col-xl-4 mx-auto mb-4 text-left">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">เมนู</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: rgb(0, 76, 152); height: 0.125em" />
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12 col-xl-6 mx-auto text-left">
                                    <p class="test_p">
                                        <a href="/advertise" class="text-dark link_text">ประชาสัมพันธ์</a>
                                    </p>

                                    <p class="test_p">
                                        <a href="/contact" class="text-dark link_text">ติดต่อเรา</a>
                                    </p>
                                    <p class="test_p">
                                        <a href="{{route('doctorRegisterPatient')}}" class="text-dark link_text">ลงทะเบียนผู้ป่วยใหม่</a>
                                    </p>
                                    <p class="test_p">
                                        <a href="{{route('questionForDoc')}}" class="text-dark link_text">Q&A</a>
                                    </p>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-xl-6 mx-auto text-left">
                                    <p class="test_p">
                                        <a href="{{route('doctorAddPatient')}}" class="text-dark link_text">ผู้ป่วยลงทะเบียนใหม่</a>
                                    </p>
                                    <p class="test_p">
                                        <a href="{{route('building')}}" class="text-dark link_text">อาคารผู้ป่วย</a>
                                    </p>

                                    <p class="test_p">
                                        <a href="{{route('patientInformation')}}" class="text-dark link_text">ประวัติผู้ป่วย</a>
                                    </p>
                                    <p class="test_p">
                                        <a href="{{route('patientIncase')}}" class="text-dark link_text">ผู้ป่วยในการดูแล</a>
                                    </p>

                                </div>

                            </div>
                            <!-- <p>
                            <a href="#!" class="text-dark">Bootstrap Angular</a>
                        </p> -->
                        </div>

                        <div class="col-12 col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-left">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">ติดต่อเรา</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: rgb(0, 76, 152); height: 0.125em" />
                            <p>KKU Hospital<br> มหาวิทยาลัยขอนแก่น</p>
                            <p>Email : maidainon@kkumail.com </p>
                            <p>เบอร์โทร : 043-123456</p>
                            <!-- <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p> -->
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center mt-5 p-3" style="background-color: rgb(0, 76, 152); color: #ECEFF1;">
                © 2022 Copyright: KKU Hospital Group 11
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js " integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8 " crossorigin="anonymous "></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct " crossorigin="anonymous "></script>
</body>

</html>