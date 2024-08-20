<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โรงพยาบาลมหาวิทยาลัยขอนแก่น</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('./css/personal_information.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/css.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/set-link.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/based-css.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="{{asset('js/title.js')}}"></script>
    <style>
        .w-f {
            width: fit-content;
        }

        .img_block {
            width: 17.75em;
            height: 18.75em;
            /* background-color: #47B5FF; */
            overflow: hidden;
            /* margin: 2em auto; */
            /* position: absolute; */
            margin-left: 5em;
            margin-top: -5em;



        }

        .pas {
            margin: 0.5em 0em 0em 3em;
            
            /* margin-top: -8.5em;
             */
            font-size: 1.5em !important;
            /* text-align:center; */

            /* position: absolute; */
        }

        .div_img {
            border: 1px solid #dbdee4;
            height: 15em;
            width: 30em;
            border-radius: 0.5em;
            background-color: white;
            box-shadow: 2px 2px 1px #14378f;
            margin-left: 0em;
        }

        article {
            border-radius: 0 !important;
            margin: 0 !important;
        }

        .box {
            border: 1px solid #dbdee4;
            height: 10em;
            width: 40em;
            border-radius: 0.5em;
            background-color: white;
            box-shadow: 2px 2px 1px #14378f;
            margin: auto;

        }

        th {
            background-color: #14378f;
            color: white;

        }

        td {
            background-color: white;
        }

        #add,
        #save {
            background-color: #14378f;
        }
        #addAll:hover{
            background-color: #0d2050 !important;
        }
    </style>

</head>

<body>
    <x-app-layout>
        <nav>
            <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-bread" style="color: white;">หน้าหลัก</a></li>
                <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">ยืนยันการลงทะเบียน</li>
            </ol>
        </nav>

        <article class="mt-5">
            <div class="container">
                <div class="box mb-5" style="width: fit-content; height: fit-content;">
                    <div class="pas" style="padding: 1em !important; margin: 0;">
                        <h2 class="" style="line-height:3em ; color:#14378f;">แพทย์ : {{$user->prefix}}{{$user->firstname}} {{$user->lastname}}</h2>
                        <!-- <h3 style="color:#14378f;">รหัส : {{$user->doctors[0]->id}} </h3> -->
                    </div>

                </div>
                <div class=" px-3 py-3 w-75 ml-3 m-auto">
                    <div class="py-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="pb-1 text-dark" style="font-size:1.5em ;border-bottom:5px solid #14378f ">รายชื่อผู้ป่วย</h2>
                        </div>

                    </div>
                    <button id="addAll" class="btn btn-primary float-right shadow" style="background-color: #14378f; border: 0 !important;">เลือกทั้งหมด</button>
                    <table class="table mt-4 shadow">
                        <thead>
                            <tr>
                                <th scope="col">รหัสผู้ป่วย</th>
                                <th scope="col">ชื่อ-นามสกุล</th>
                                <th scope="col">เวลาลงทะเบียน</th>
                                <!-- <th scope="col">ห้อง</th> -->
                                <th scope="col" id="th-chk" class=""></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($patient_treatment->count()==0)
                            <tr>
                                <td colspan="4" class="text-center">ไม่มีข้อมูลการลงทะเบียนของผู้ป่วย</td>
                            </tr>
                            @else
                            <form action="/doctor/add/incase" method="post">
                                @foreach($patient_treatment as $treatment)
                                @csrf
                                <tr>
                                    <td>{{$treatment->patient_id}}</td>
                                    <td>{{$treatment->patient->user->prefix}}{{$treatment->patient->user->firstname}} {{$treatment->patient->user->lastname}}</td>
                                    <td>{{$treatment->created_at}}</td>
                                    <td class="tr-treat"><input class="chkTreat" type="checkbox" name="treat_id[]" value="{{$treatment->id}}"></td>
                                </tr>
                                @endforeach
                                <tr id="tr-room" class="border-0">
                                    <td class="text-right border-0" colspan="5">
                                        <select class="w-25" name="room_id" class="form-control" required>
                                            @foreach($building as $row)
                                            <optgroup label="{{$row->buildingName}}">
                                                @foreach($row->rooms as $room)
                                                <option value="{{$room->id}}">ห้อง {{$room->id}}</option>
                                                @endforeach

                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr class="d-none border-0">
                                    <td colspan="5">
                                        <input type="text" name="doctor_id" value="{{$user->doctors[0]->id}}">
                                    </td>
                                </tr>
                                <tr id="tr-button" class="border-0">
                                    <td class="text-right border-0" colspan="5">
                                        <button id="save" class="btn btn-primary " type="submit">บันทึก</button>
                                    </td>
                                </tr>
                            </form>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
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

    <script>
        const tr_button = document.querySelector("#tr-button");
        const th_chk = document.querySelector("#th-chk");
        const tr_room = document.querySelector("#tr-room");
        const tr_treat = document.querySelectorAll(".tr-treat");
        const addAll = document.querySelector("#addAll");
        const chkTreat = document.querySelectorAll(".chkTreat")

        addAll.addEventListener('click', function() {
            chkTreat.forEach(e => {
                e.setAttribute("checked","checked")
            });
        })
    </script>






    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>
