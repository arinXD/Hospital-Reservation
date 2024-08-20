<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/based-css.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/set-link.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="{{asset('js/title.js')}}"></script>
    <style>
        * {
            box-sizing: border-box;

        }
    </style>
</head>

<body>
    <x-app-layout>
        <nav>
            <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-bread" style="color: white;">หน้าหลัก</a></li>
                <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">ผู่ป่วยในการดูแล</li>
            </ol>
        </nav>
        <div style="background-color: white; padding:5em 1em 20em;">
            <div class="px-3 py-3 w-75 mb-3 bg-white border" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; border-radius: 5px; margin:0 auto !important;">

                <table class="table">
                    <caption>รายชื่อผู้ป่วยในการดูแล</caption>
                    <thead>
                        <tr>
                            <th scope="col">รหัสผู้ป่วย</th>
                            <th scope="col">ชื่อ-สกุล</th>
                            <th scope="col">ห้อง</th>
                            <th scope="col">โรค</th>
                            <th scope="col">รักษาแล้ว</th>
                            <th class="text-center" colspan="2" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($treatment)==0)
                        <tr>
                            <td colspan="6">ไม่มีผู้ป่วยในการดูแล</td>
                        </tr>
                        @else

                        @foreach($treatment as $row)
                        <tr>
                            @if($row->patient->user==NULL)
                            <td colspan="6" class="text-center">บัญชีนี้ถูกลบโดยแอดมิน</td>
                            @else
                            <form action="{{route('treatedCongenital')}}" method="post">
                                @csrf
                                <td class="d-none">
                                    <input type="text" class="d-none" name="treat_id" value="{{$row->id}}">
                                </td>
                                <td>
                                    {{$row->patient->id}}
                                </td>
                                <td>
                                    {{$row->patient->user->prefix}}{{$row->patient->user->firstname}} {{$row->patient->user->lastname}}
                                </td>
                                <td>
                                    {{$row->room->roomName}}
                                </td>
                                <td>
                                    <ul style=" margin-left:1em;">
                                        <?php $i = 0 ?>
                                        @foreach($untreated_array as $untreated)
                                        @if($untreated["treatment_record_id"]==$row->id)
                                        <li style="margin-bottom: .5em;"><span style="display:inline-block; width: 120px; margin-right:1em;">{{$congenitalList[$untreated["congenital_id"]]}}</span> <input type="checkbox" name="congenital[]" value="{{$untreated['congenital_id']}}"></li>
                                        @endif
                                        @endforeach
                                        @if($row->by_case!=null)
                                        <li><span style="display:inline-block; width: 120px; margin-right:1em;">{{$row->by_case}}</span> <input type="checkbox" name="by_case" value="{{$row->by_case}}"></li>
                                        @endif
                                    </ul>
                                </td>
                                <td>
                                    <ul style=" margin-left:1em;">
                                        <?php $i = 0 ?>
                                        @foreach($treated_array as $treated)
                                        @if($treated["treatment_record_id"]==$row->id)
                                        <li style="margin-bottom: .5em;">{{$congenitalList[$treated["congenital_id"]]}}</li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <div style="display: flex; flex-direction: column; align-items:center;">
                                        @if($row->treated==null)
                                        <button type="submit" class="btn btn-primary bg-primary mb-1">Treate</button>
                                        <a onclick="return confirm('Confirm')" class=" btn btn-success w-100" href="{{route('treated', $row->id)}}">Done</a>
                                        @else
                                        <p style="border:1px solid green; width:fit-content; padding:.5em 1em; color:green;">Done</p>
                                        @endif
                                    </div>
                                </td>
                            </form>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {!! $treatment->appends(Request::all())->links() !!}
                </div>
                @endif
            </div>
        </div>
        <!-- </div> -->

        <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1; margin-top:0em !important;">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-between p-4 text-white" style="background-color: rgb(0, 76, 152) !important">
                <!-- Left -->
                <div class="me-5">
                    <span></span>
                </div>
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
        function confirmDelete(id) {
            let confirm = confirm("Confirm");
            if (confirm) {
                window.location.href = "/doctor/treated/" + id;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>