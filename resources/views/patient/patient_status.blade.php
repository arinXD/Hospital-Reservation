<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบการลงทะเบียน</title>
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
            top: 25%;
            left: 25%;
            /* width: fit-content;
            height: fit-content;
            background-color: lightblue;
            padding: 10px; */
            display: flex;
            flex-direction: column;
        }

        .check_status {
            width: 50%;
            margin: 1em auto;

        }

        .p_check {
            margin: 1em auto;
            text-align: center;
            font-size: 2em;

        }

        #btn-search {
            display: block;
            margin: 1em auto;

        }

        article img {
            text-align: center;
            width: 50%;
            height: 50%;
            margin: auto;
            margin-bottom: 2em;
        }

        .account_p::after {
            content: "" !important;
            display: block !important;
            width: 28% !important;
            height: 6px !important;
            background-color: rgb(0, 76, 152) !important;
            /* margin: 10px 0 20px; */
            margin: 0 auto !important;
        }
    </style>
</head>

<body>
    <x-app-layout>

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">

            <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-bread" style="color: white;">หน้าหลัก</a></li>
                <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">ลงทะเบียนผู้ป่วย</li>
            </ol>
        </nav>

        <section>
            <p class="account_p">ตรวจสอบสถานะการลงทะเบียน</p>
            <article>

                <div class="in_art">
                    <div class="row next_art">
                        @if(count($user->patients)==0)
                        <div class="col-12 col-sm-12 col-md-4 col-lg-6">
                            <a href="/new/patient" class="a_link_new_regist_2">ลงทะเบียน</a>
                        </div>
                        @else
                        <div class="col-12 col-sm-12 col-md-4 col-lg-6">
                            <a href="/new/patient" class="a_link_new_regist_2">ข้อมูลส่วนตัว</a>
                        </div>
                        @endif
                        @if($countDoctor!=0)
                        <div class="col-12 col-sm-12 col-md-4 col-lg-6 link_to">
                            <a href="/patient/regis/history" class="a_link_check_regist_2">ประวัติการลงทะเบียน</a>
                        </div>
                        @endif
                        <div class="col-12 col-sm-12 col-md-4 col-lg-6 link_to">
                            <a href="/check/patient/statut" class="a_link_check_regist_2">สถานะการลงทะเบียน</a>
                        </div>

                    </div>

                    @if($countTreatment==0)
                    <div class="border p-3" style="border-radius: 0.5em;">
                        ยังไม่ได้ลงทะเบียน
                    </div>
                    @else
                    <div class="border p-3" style="border-radius: 0.5em;">
                        รอการยืนยันจากแพทย์
                    </div>
                    @endif
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



    <script>
        const btnSearch = document.querySelector('#btn-search');
        btnSearch.addEventListener("click", show);

        function show() {
            const modalBody = document.querySelector(".modal-body");
            let content = "<p><?php echo "คุณ " . $user->firstname . " " . $user->lastname; ?></p>" +
                "<p><?php echo "เลขบัตรประชาชน " . "$user->card_id"; ?></p>" +
                "<p><?php echo "$status"; ?></p>"
            modalBody.innerHTML = content;
        }

        const search = document.querySelector("#search");
        search.addEventListener("click", createPopup);


        function createPopup() {
            const popup = document.createElement("div");
            const h1 = document.createElement("h1");
            const p1 = document.createElement("p1");
            const p2 = document.createElement("p2");
            const p3 = document.createElement("p3");
            const btn = document.createElement("button");

            h1.innerHTML = "ตรวจสอบสถานะบัตร";
            p1.innerHTML = "<?php echo "เลขบัตรประชาชน " . "$user->card_id"; ?>";
            p2.innerHTML = "<?php echo "คุณ " . $user->firstname . " " . $user->lastname; ?>";
            p3.innerHTML = "<?php echo "$status"; ?>";
            btn.setAttribute("type", "button");
            btn.setAttribute("id", "popup-btn");
            btn.innerHTML = 'ตกลง';
            btn.classList = "btn btn-success";
            popup.classList.add("container", "px-4", "py-4", "bg-white", "popUP", 'w-50');
            popup.setAttribute("id", "popup");
            popup.appendChild(h1);
            popup.appendChild(p2);
            popup.appendChild(p1);
            popup.appendChild(p3);
            popup.appendChild(btn);
            document.body.appendChild(popup);

            btn.addEventListener('click', destroy);
        }

        function destroy() {
            // const btn = document.querySelector("#popup-btn");
            const popup = document.querySelector("#popup");
            document.body.removeChild(popup);

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>