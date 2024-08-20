<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียนผู้ป่วยใหม่</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/css.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/set-link.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/based-css.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}"> -->
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

        form {
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

        .h-45 {
            height: 45%;
        }
        .ty{
            margin-top:2em !important;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <nav>
            <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-bread" style="color: white;">หน้าหลัก</a></li>
                <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">ลงทะเบียนผู้ป่วย</li>
            </ol>
        </nav>
        <div class="container bg-white border w-100 mt-5 pt-6 pb-6 py-5">
            <form action="/doctor/create/patient" method="post" autocomplete="off">
                @csrf

                <h1 class="h1 mt-4 mb-4">ลงทะเบียนผู้ป่วย</h1>

                <fieldset>

                    <legend><span class="number mb-3">1</span>ข้อมูลทั่วไป</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mb-3">อีเมล:<span class="float-right">*</span></label>
                            <input class="bg-white text-dark border" type="email" class="form-control" name="email" value="{{$pEmail}}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="mb-3">รหัสผ่าน:<span class="float-right">*</span></label>
                            <input class="bg-white text-dark border" type="text" class="form-control" name="password" value="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="mb-3">คำนำหน้า:</label>
                            <select class="form-control w-100 h-45" name="prefix">
                                <option value="นาย" selected>นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="mb-3">ชื่อ:<span class="float-right">*</span></label>
                            <input class="bg-white text-dark border" type="text" class="form-control" name="firstname" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label class="mb-3">นามสกุล:<span class="float-right">*</span></label>
                            <input class="bg-white text-dark border" type="text" class="form-control" name="lastname" value="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mb-3">เลขบัตรประชาชน:<span class="float-right">*</span></label>
                            <input class="bg-white text-dark border" class="form-control" type="text" name="card_id" value="" required>
                        </div>
                        <div class="col-md-3">
                            <label class="mb-3">เพศ:</label>
                            <select class="form-control w-100 h-45" name="gender">
                                <option value="ชาย">ชาย </option>
                                <option value="หญิง">หญิง </option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="mb-3">วันเกิด:<span class="float-right">*</span></label>
                            <input class="form-control bg-white text-dark border" class="form-control" type="date" name="birthday" value="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="mb-3">กรุ๊ปเลือด:</label>
                            <select class="form-control w-100 h-45" name="bloodtype">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="mb-3">สัญชาติ:</label>
                            <input class="form-control bg-white text-dark border h-45" type="text" name="nationality" value="">
                        </div>
                        <div class="col-md-2">
                            <label class="mb-3">ศาสนา:</label>
                            <input class="bg-white text-dark border" type="text" name="religion" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="mb-3">อาชีพ:</label>
                            <input class="bg-white text-dark border" type="text" name="job" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mb-3">ที่อยู่</label>
                            <textarea class="form-control bg-white text-dark border" name="address" rows="2" cols="20" value=""></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="mb-3">เบอร์โทรศัพท์</label>
                            <input class="form-control bg-white text-dark border" type="text" name="phone" value="">
                        </div>
                    </div>


                    <!-- <label>Age:</label>
          <input type="radio" id="under_13" value="under_13" name="user_age"><label for="under_13" class="light">Under 13</label><br>
          <input type="radio" id="over_13" value="over_13" name="user_age"><label for="over_13" class="light">13 or Older</label> -->
                </fieldset>

                <fieldset>

                    <legend><span class="number mb-3">2</span>ประวัติผู้ป่วย</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mb-3">สิทธิ์การรักษาพยาบาล:</label>
                            <select class="form-control w-100 h-50" name="health_insurance">
                                <option value="จ่ายเอง">ผู้ป่วยทั่วไปที่ไม่มีสิทธิ์การรักษาพยาบาล</option>
                                <option value="ประกันสังคม">ข้าราชการ</option>
                                <option value="ประกันสุขภาพ">ประกันสุขภาพถ้วนหน้า</option>
                                <option value="บัตรทอง">ประกันสังคม</option>      
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="mb-3">ประวัติการแพ้ยา:</label>
                            <textarea class="form-control bg-white text-dark border" name="allergy" rows="2" cols="20" value="" required></textarea>
                        </div>
                    </div>
                    <label class="mb-3 mt-3">โรคที่ต้องการพบแพทย์:</label>
                    @foreach($congenitals as $row)
                    <div class="col-6">
                        <input type="checkbox" name="congenital[]" value="{{$row->id}}">{{$row->congenitalname}}
                    </div>
                    @endforeach
                    <label class=" mt-3">อื่นๆ</label>
                    <input class="bg-white text-dark border" type="text" name="by_case" value="">

                </fieldset>

                <div class="d-flex justify-content-center mt-3 mb-3">
                    <button class="btn btn-primary bg-primary w-100" type="submit">เพิ่มข้อมูล</button>
                </div>

            </form>
        </div>



        <!-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4 px-4">
                    
                </div>
            </div>
        </div> -->
        <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-between p-4 text-white" style="background-color: rgb(0, 76, 152) !important">
                <!-- Left -->
                <div class="me-5">
                    <span></span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <!-- <div>
                <a href="" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-github"></i>
                </a>
            </div> -->
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
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <!-- <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        Links 
                    <h6 class="text-uppercase fw-bold">Useful links</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-10" style="width: 60px; background-color: rgb(0, 76, 152); height: 0.125em" />
                    <p>
                        <a href="#!" class="text-dark">Your Account</a>
                    </p>
                    <p>
                        <a href="#!" class="text-dark">Become an Affiliate</a>
                    </p>
                    <p>
                        <a href="#!" class="text-dark">Shipping Rates</a>
                    </p>
                    <p>
                        <a href="#!" class="text-dark">Help</a>
                    </p>
                </div> -->
                        <!-- Grid column -->

                        <!-- Grid column -->
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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>