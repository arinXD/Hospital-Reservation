<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/css.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/set-link.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/based-css.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="{{asset('js/title.js')}}"></script>
    <style>
        .divroom {

            margin-bottom: 10em;
            height: max-content;
            padding-bottom: 5em;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <nav>
            <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-bread" style="color: white;">หน้าหลัก</a></li>
                <li class="breadcrumb-item"><a href="{{route('building')}}" class="link-bread" style="color: white;">อาคารผู้ป่วย</a></li>
                <li class="breadcrumb-item"><a href="/doctor/building/room/{{$room->building->id}}" class="link-bread" style="color: white;">ห้องพักผู้ป่วย (อาคาร {{$room->building->buildingName}})</a></li>
                <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">ห้องพักผู้ป่วยที่{{$room->id}}</li>
            </ol>
        </nav>
        <article>
            <div style="font-size:1.5em; border-bottom: 0.2em solid rgb(0, 76, 152) ; width:max-content ; margin:auto;">
                <h1 class=" head1_room ml-auto mr-auto mt-5 pb-1 text-center text-dark" style="font-size:1.5em;">
                    ห้องพักผู้ป่วย</h1>

            </div>

            <div class="container  ">
                <div class="divroom ml-auto mr-auto shadow ">
                    <div class="row justify-content-evenly p-5">
                        <div class="col-4">
                            <h2 class="head2 pl-5 " style="font-size:1.5em;">อาคาร {{$room->building->buildingName}}</h4>
                        </div>
                        <div class="col-3">
                            <h2 style="color: rgb(0, 76, 152);font-size:1.5em;">{{ __('ห้องพักผู้ป่วยที่')}} {{$room->id}}</h4>
                        </div>
                    </div>
                    <div class="" style="margin-left:10em ; margin-bottom: 4em;">
                        <h3 style="font-size:1.5em;"> รายชื่อผู้ป่วย : </h3>
                        @php
                        $i = 0
                        @endphp
                        @if(!count($room->treatment_records)==0)
                        @foreach($room->treatment_records as $treatment)
                            @if($treatment->treated==null)
                            <div class=" px-3 py-3">
                                <p class="pb-2" style="font-size:1.2em;margin-left:7em;">รหัสประจำตัวผู้ป่วย : {{$treatment->patient_id}}</p>
                                <p class="pb-2" style="font-size:1.2em;margin-left:7em">ชื่อ :{{$patientName[$i]}}</p>
                                <p class="pb-2" style="font-size:1.2em;margin-left:7em">เข้าพักเมื่อ :{{$treatment->updated_at}}</p>
                                
                                
                            </div>
                            <hr class="" style="width: 70%; background-color:  rgb(197, 212, 226);" />
                            @endif
                        @php
                        $i += 1
                        @endphp
                        @endforeach
                        @else
                        <p class="" style="font-size:1.35em;margin-left:8em">ไม่มีผู้ป่วย</p>
                        @endif



                    </div>

                </div>
            </div>


        </article>

        <!-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4 px-4">
                    
                </div>
            </div>
        </div> -->

        <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1;">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-between p-4 text-white" style="background-color: rgb(0, 76, 152) !important">
                <!-- Left -->
                <div class="me-5">
                    <span>Get connected with us on social networks:</span>
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
                                Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
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
                                        <a href="#!" class="text-dark link_text">ประชาสัมพันธ์</a>
                                    </p>

                                    <p class="test_p">
                                        <a href="#!" class="text-dark link_text">ติดต่อเรา</a>
                                    </p>
                                    <p class="test_p">
                                        <a href="#!" class="text-dark link_text">ลงทะเบียนผู้ป่วยใหม่</a>
                                    </p>
                                    <p class="test_p">
                                        <a href="#!" class="text-dark link_text">Q&A</a>
                                    </p>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-xl-6 mx-auto text-left">
                                    <p class="test_p">
                                        <a href="#!" class="text-dark link_text">อาคารผู้ป่วย</a>
                                    </p>

                                    <p class="test_p">
                                        <a href="#!" class="text-dark link_text">ประวัติผู้ป่วย</a>
                                    </p>
                                    <p class="test_p">
                                        <a href="#!" class="text-dark link_text">ผู้ป่วยในการดูแล</a>
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