<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการลงทะเบียน</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/Register_new_patient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/set-link.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="{{asset('js/title.js')}}"></script>
    <style>
        .page-active {
            background-color: darkgreen !important;
        }

        .popUP {
            position: absolute;
            top: 0;
            width: 100px;
            height: 100px;
            background-color: red;
        }

        ul {
            list-style-type: circle;
        }

        .span_infor {
            color: darkslategrey;
        }
    </style>
</head>

<body>
    <x-app-layout>


        <header>
            <!-- jet stream template -->
        </header>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">

            <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-bread" style="color: white;">หน้าหลัก</a></li>
                <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">ลงทะเบียนผู้ป่วย (ข้อมูลการรักษาพยาบาล)</li>
            </ol>
        </nav>
        <section>

            <p class="account_p">ประวัติการลงทะเบียน</p>
            <article>

                <div class="in_art">
                    <div class="row next_art">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-6">
                            <a href="/new/patient" class="a_link_new_regist_2">ข้อมูลส่วนตัว</a>
                        </div>

                        <div class="col-12 col-sm-12 col-md-4 col-lg-6 link_to">
                            <a href="/patient/regis/history" class="a_link_check_regist_2">ข้อมูลการรักษาพยาบาล</a>
                        </div>

                        <!-- <div class="col-12 col-sm-12 col-md-4 col-lg-4 ">
                            <a href="/check/patient/statut" class="a_link_check_regist_2">ตรวจสอบสถานะบัตร</a>
                        </div> -->
                    </div>
                    <h4 class="ml-auto mr-auto" style="text-align: center; margin-bottom: 1em;font-size:1.55em ;width: max-content;">ประวัติการลงทะเบียนผู้ป่วย</h4>
                    <h5 class="pl-2" style="margin: 1em auto;font-size:1.5em ;border-left:5px solid rgb(0, 76, 152) ; ">ข้อมูลส่วนบุคคล</h5>
                    @if(count($find_treatment_record)>0)
                    @foreach($find_treatment_record as $row)
                    <div class="border p-3" style="border-radius: 0.5em;">
                        <div>
                            <label>วันที่ลงทะเบียน : </label><span class="span_infor"> {{$row->created_at}}</span>
                        </div>
                        <div>
                            <label>วันที่รักษาเสร็จ : </label><span class="span_infor"> {{$row->treated}}</span>
                        </div>
                        <div>
                            <label>โรคที่เข้ารับการรักษา : </label>
                            <ul>
                                @if($row->by_case != NULL)
                                <li style="color:darkslategrey;">- {{$row->by_case}}</li>
                                @endif
                                @if(count($row->congenitals) != 0)
                                @foreach($row->congenitals as $congenital)
                                <li style="color:darkslategray;">
                                    - {{$congenital->congenitalname}}
                                </li>
                                @endforeach
                                @endif
                                
                            </ul>
                        </div>
                        <div>
                            <label>แพทย์ที่ดูแล :</label><span class="span_infor">{{$row->doctor->user->prefix}}{{$row->doctor->user->firstname}} {{$row->doctor->user->lastname}}</span>
                        </div>
                        <div>
                            <label>อาคาร : <span class="span_infor">{{$row->room->building->buildingName}}</span> ห้องพักที่ : <span class="span_infor">{{$row->room->id}}</span></label>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="border p-3" style="border-radius: 0.5em;">
                        รอการยืนยันจากแพทย์
                    </div>
                    @endif
                </div>
            </article>
        </section>
        <!-- Footer -->

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