<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/set-link.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="{{asset('js/title.js')}}"></script>

    <style>
        * {
            font-family: SF Thonburi,sans-serif !important;
        }

        nav a {
            color: black;
            text-decoration: none;
            font-size: .85em;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            display: flex;

            justify-content: space-between;
            align-items: center;
        }

        li {
            display: inline-block;
            padding: .5em 1.6em;
        }

        .logo {
            flex: 1;
            text-align: left;
        }

        .logo a {
            font-size: .95em;
        }

        .mt-10 {
            margin-top: 4em;
        }

        


        .link_a:hover {
            padding-bottom: 0.25em;
            border-bottom: 0.2em solid white;
            transition: 0.6s;

        }

        .link:hover,
        .link_a:hover {
            color: white;
            text-decoration: none;

        }

        .link_a {
            color: white;
        }
    </style>
</head>

<body>
    <x-app-layout>
        
        <article>

            <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow ">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard')}}" class="link-bread" style="color: white;">หน้าหลัก</a>
                </li>
                <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">ประชาสัมพันธ์</li>
            </ol>

            <div class="py-5 px-5 bg-white text-dark w-100">
                <h1 id="h2" class="ml-auto mr-auto " style="border-bottom: 0.125em solid rgb(0, 76, 152) ; width:5.7em ;">
                    ประชาสัมพันธ์</h1>
                <div class="container">
                    <div class="col align-self-center mt-5">
                        <h3 style=" font-weight: 900; text-align: center; color:rgb(0, 76, 152) ;"> ประชุมวิชาการ 1st BDMS-OHSU Cardiovascular
                            <br> Prevention Conference
                        </h3>
                    </div>
                    <div class="d-flex justify-content-center my-4">
                        <img class="mt-5" src="./img/new5.png" alt="" style="width:100%; height: auto;">
                    </div>
                    <div class="pl-2 pr-2 shadow " style="border-left:0.5em solid rgb(0, 76, 152) ; background-color: white;height: 7em;">
                        <p class="mt-5 mb-5 pt-3 pl-2">การประชุมวิชาการ “1st BDMS - OHSU Cardiovascular Prevention Conference” โดย 6 BDMS CoE Cardiac ร่วมกับวิทยากรผู้ทรงคุณวุฒิทั้งในและต่างประเทศ นำโดย Dr. Sergio Fazio, Dr. M. Shapiro, นายแพทย์กัมปนาท วีรกุล, ศาสตราจารย์เกียรติคุณ นายแพทย์อภิชาต สุคนธสรรพ์, นายแพทย์ปริญญา ชมแสง, แพทย์หญิงเลิศลักษณ์ เชาวน์ทวี และแพทย์หญิงสุภัค กาญจนาภรณ์ มาร่วมอัพเดตแนวโน้มความเสี่ยงในการเกิดโรคหลอดเลือดหัวใจ </p>
                    </div>
                    <!-- <div class="">  -->
                    <div>
                        <img class="mt-5 shadow" src="./img/new6.png" alt="" style="width:40%; height: auto;float: left; position: absolute;">
                    </div>
                    <div class="shadow" style="width:50% ;  background-color: white; margin-top: 10em; margin-left: 36em;">
                        <p class="p-5">รวมถึงการควบคุมปัจจัยที่จะเพิ่มโอกาสเกิดโรคหลอดเลือดหัวใจในอนาคต ในหัวข้อ Pathogenesis and current situation, How to predict CVD events in asymptomatic cases?, How to reduce future events in CVD ซึ่งได้รับความสนใจจากแพทย์และบุคลากรทางการแพทย์จำนวนมาก เมื่อวันที่ 18 ธันวาคม 2560 โอกาสนี้นพ.ประดับ สุขุม BDMS Chief Faculty of CoE Cardiovascular Institute และผู้อำนวยการอาวุโส โรงพยาบาลหัวใจกรุงเทพ ร่วมกล่าวต้อนรับและทำพิธีเปิดงานประะชุมในครั้งนี้</p>
                    </div>
                    <!-- </div> -->
                    <!-- <div class=""> -->
                    <div>
                        <img class="shadow" src="./img/new7.png" alt="" style="width:40%; height:auto;float: left; position: absolute; margin-top: 5em;">
                    </div>

                    <div class="shadow" style="width:50% ; background-color: white; margin-top: 15em; margin-left: 36em;">
                        <p class="p-5" style=" z-index: 999999; ">รวมถึงการควบคุมปัจจัยที่จะเพิ่มโอกาสเกิดโรคหลอดเลือดหัวใจในอนาคต ในหัวข้อ Pathogenesis and current situation, How to predict CVD events in asymptomatic cases?, How to reduce future events in CVD ซึ่งได้รับความสนใจจากแพทย์และบุคลากรทางการแพทย์จำนวนมาก เมื่อวันที่ 18 ธันวาคม 2560 โอกาสนี้นพ.ประดับ สุขุม BDMS Chief Faculty of CoE Cardiovascular Institute และผู้อำนวยการอาวุโส โรงพยาบาลหัวใจกรุงเทพ ร่วมกล่าวต้อนรับและทำพิธีเปิดงานประะชุมในครั้งนี้</p>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </article>
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