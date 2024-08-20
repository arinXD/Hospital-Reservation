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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="{{asset('js/title.js')}}"></script>
    <style>
        .btnq {
            padding: 7px 1.2em !important;
            background-color: rgb(0, 76, 152) !important;
            box-sizing: border-box;
        }

        .btnq:hover {
            background-color: #0A10CB !important;
        }

        th {
            background-color: rgb(18, 70, 130);
        }

        td {
            background-color: white;
        }

        .h2 {
            background-color: #f5f5f5;
        }
    </style>

</head>

<body>
    <x-app-layout>
        <nav>
            <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-bread" style="color: white;">หน้าหลัก</a></li>
                <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">ประวัติผู้ป่วย</li>
            </ol>
        </nav>


        <div class="py-5 px-5  text-dark w-100 vh-100">
            <div class="ml-auto mr-auto ">
                <h1 class="h2" class="mt-5 pb-2 " style="border-bottom: 0.2em solid rgb(0, 76, 152) ; width:5.7em ;font-size:2em;">
                    ประวัติผู้ป่วย</h1>
            </div>
            <div>
                <button id="addTreatment" class="btn d-inline-block float-right ml-4" style="background-color: rgb(18, 70, 130); color:white;">ลงทะเบียนซ้ำ</button>
                <form class="form-inline float-right mb-3" action="{{route('patientSearch')}}" method="POST">
                    @csrf
                    <div class="input-group ">
                        <div class="form-outline">
                            <input type="text" class="form-control" name="patientInfo" placeholder="ค้นหาผู้ป่วย (ชื่อหรือนามสกุล)" />
                        </div>
                        <button type="submit" class="btnq btn-primary">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <table class="table border shadow" style="border-radius: 0.5em !important; ">
                <thead>
                    <tr style="background-color:rgb(0, 76, 152); color:white;">
                        <th scope="col">อาคาร</th>
                        <th scope="col">ห้อง</th>
                        <th scope="col">ชื่อ-สกุล</th>
                        <th scope="col">ประวัติการแพ้ยา</th>
                        <th scope="col">โรคที่เป็น</th>
                        <th scope="col">อื่นๆ</th>
                        <th scope="col">วันที่รักษาเสร็จ</th>
                        <th scope="col">Action</th>
                        <th id="thHide" class="d-none" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('addTreatment')}}" method="post">
                        @csrf
                        @if($result->count()==0)
                        <tr class="text-center">
                            <td colspan="7">ไม่พบข้อมูลผู้ป่วย</td>
                        </tr>
                        @else
                        @foreach($result as $rs)
                        <tr>
                            @if($rs->patient->user==NULL)
                                <td colspan="8" class="text-center">บัญชีนี้ถูกลบโดยแอดมิน</td>
                            @else
                                <td>{{$rs->room->building->buildingName}}</td>
                                <td>{{$rs->room->roomType}} {{$rs->room_id}}</td>

                                <td>{{$rs->patient->user->prefix}}{{$rs->patient->user->firstname}} {{$rs->patient->user->lastname}}</td>
                                
                                <td>{{$rs->patient->allergy}}</td>
                                <td>
                                    <ul>
                                        @forelse($rs->congenitals as $con)
                                        <li>{{$con->congenitalname}}</li>
                                        <!-- <a href="" class="btn btn-warning">แก้ไข</a> -->
                                        @empty
                                        ยังไม่กรอกโรค
                                        @endforelse
                                    </ul>
                                </td>
                                <td class="text-start">
                                    @if($rs->by_case!=NULL)
                                    <span>{{$rs->by_case}}</span>
                                    @else
                                    <span>-</span>
                                    @endif
                                </td>
                                @if($rs->treated!=null)
                                <td class="text-start">{{$rs->treated}}</td>
                                @else
                                <td class="text-start">-</td>
                                @endif
                                <td>
                                    @if($rs->treated==null)
                                    <a href="/doctor/add/congenital/{{$rs->patient_id}}/{{$rs->id}}" class="btn btn-warning">แก้ไข</a>
                                    @endif
                                </td>
                                <td class="chkPatient d-none">
                                    <input type="checkbox" name="patient_id[]" value="{{$rs->patient_id}}">
                                </td>
                            @endif
                        </tr>
                        @endforeach
                        @endif
                        <tr id="trRoom" class="border-top text-right d-none">
                            <td class="border-0" colspan="9">
                                <select name="select_room">
                                    @foreach($building as $b)
                                    <optgroup label="{{$b->buildingName}}">
                                        @foreach($b->rooms as $room)
                                        <option value="{{$room->id}}">{{$room->roomName}}</option>
                                        @endforeach
                                        @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr id="trBtn" class="border-0 text-right d-none">
                            <td class="border-0" colspan="9">
                                <button class="btn btn-primary bg-primary">ตกลง</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
            
            <div class="d-flex justify-content-center">
                <!-- {!! $result->links() !!} -->
                {!! $result->appends(Request::all())->links() !!}
            </div>

        </div>
        <footer class="text-center text-lg-start text-dark mt-5" style="background-color: #ECEFF1">
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
        const addBtn = document.querySelector("#addTreatment")
        const trRoom = document.querySelector("#trRoom")
        const trBtn = document.querySelector("#trBtn")
        const chkPatient = document.querySelectorAll(".chkPatient")
        const thHide = document.querySelector("#thHide")
        addBtn.addEventListener("click", function() {
            trRoom.classList.remove("d-none")
            trBtn.classList.remove("d-none")
            thHide.classList.remove("d-none")
            chkPatient.forEach(e => {
                e.classList.remove("d-none")
            });

        })
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>