<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
    <link rel="stylesheet" href="{{asset('css/QnA.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sarabun">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script>
        window.onload = function() {
            const title = document.querySelector("#title").innerText;
            document.title = title
        }
    </script>
    <style>

        *{
            font-family: Sarabun !important;
        }
        .alert {
            height: min-content;
            -moz-animation: hideAlert 0s ease-in 3.5s forwards;
            -webkit-animation: hideAlert 0s ease-in 3.5s forwards;
            -o-animation: hideAlert 0s ease-in 3.5s forwards;
            animation: hideAlert 0s ease-in 3.5s forwards;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
        }

        @keyframes hideAlert {
            to {
                visibility: hidden;
            }
        }

        @-webkit-keyframes hideAlert {
            to {
                visibility: hidden;
            }
        }

        .headdoc {
            text-align: center;
        }

        section{
            background-color: white !important;
            padding-top:2em !important;
        }

       

        .new_div{
            display: block !important;
            clear: both !important;  
            margin: 0 auto !important;
            width: max-content !important;
            margin-top: 1em !important;
            
        }

        input, textarea{
            border: 0.125em solid rgb(200,200,200) !important;
        }

        .btn:hover{
            background-color: white !important;
            outline: 0.0625em solid rgb(0, 76,152) !important;
            transition: 0.6s;  
            color: rgb(0, 76, 152);
        }
        nav {
            padding: .75em 1.35em !important;
            background-color: rgb(0, 76, 152);
            /* border: 1px solid lightgray; */
            z-index: 2;
            box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px !important;
            position: fixed;
            width: 100%;
            top: 0;
        }
        
    </style>
    
</head>

<body>
    <x-app-layout>
        <section style="margin-top: 6em;">
            <article>
                <div class="art_1">
                    @if(session('success'))<div class="alert alert-success"> <b>{{session('success')}}</b> </div>@endif
                    <h3 class="headdoc">ถามหมอ</h3>
                    <div class="search" style="padding-top:2%;padding-bottom: 2%;width:100%;">
                        <form action="/search" class="form-inline my-2" method="post" style="border: 1px solid; border-radius:1.5em; display:block; overflow:hidden; background-color:white;">
                            @csrf
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="1.5rem" fill="currentColor" class="bi bi-search">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                                <input type="text" class="my-2" name="topic" placeholder="ค้นหาคำถาม" value="">
                                <button class="btn-outline-white my-2" type="submit" style="background-color: steelblue; width:6rem;height:3rem; border:none;margin:0 !important;padding:0 !important; float:right; color:white;">ค้นหา</button>
                            </div>
                        </form>
                    </div>
                    <!-- <h3>ถามหมอ</h3> -->
                    <p class="your_qna">ถามคำถามของคุณ : </p>
                    <form action="/question/add" method="post">
                        @csrf
                        <input type="text" name="topic" placeholder="หัวข้อคำถาม" style="border-radius:10px !important;">
                        <textarea name="question_detail" placeholder="สอบถามคำถาม......" style="border-radius:10px !important; height:15vh !important;" required></textarea><br>
                        <button type="submit" class="btn btn-success" style="background-color: rgb(0, 76, 152); border-radius: 0.5em;
                    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
                    border-color: rgb(0, 76, 152);">ส่งคำถาม</button>
                    </form>
                </div>
                <!-- <hr style="clear: both; border-bottom:1px solid; margin: 2em auto;" > -->
                <div class="container art_2" style="padding: 4em;">
                <div class="new_div">
                    <h3 class="h3_2" style="padding-bottom:0.5em;">คำถามที่ตอบแล้วทั้งหมด</h3>
                    <!-- strat tag -->
                    <h5 style="font-size: 1.5rem; text-align:center; margin-top:1em;">จำนวนทั้งหมด : {{$question_count}}</h5>
                </div>
                    @if($question_count != 0)
                    @foreach($answers as $answer)
                    <p class="p_qna">
                        <span class="question">ถาม - </span>
                        <span class="question_detail">{{$answer->question->topic}}</span>
                    <p>
                        <span>รายละเอียด - </span><span>{{$answer->question->question_detail}}</span>
                    </p>
                    </p>

                    <p class="p_answer">
                        <span class="span_answer">ตอบ</span><br>
                        <span class="span_answer_detail">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{$answer->answer_detail}} </span>
                    </p>
                    <br>
                    <hr class="line_down" style="margin: 2em auto;">
                    <!-- end tag -->
                    @endforeach
                    @else
                    <p style="margin-top:2%; font-size: large; font-weight:bold;">ยังไม่มีคำถามที่ถูกตอบ</p>

                    @endif
                </div>
            </article>
        </section>
        <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1">
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
                        <div class="col-12 col-md-3 col-lg-4 col-xl-6 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold">โรงพยาบาลมหาวิทยาลัยขอนแก่น</h6>
                            <hr class="mb-4 mt-2 d-inline-block mx-auto col-md-12 w-25" style="width: 200px !important; background-color: rgb(0, 76, 152) !important; height: 0.125em !important;">
                            <p style="width: 80%; text-indent: 2em;">
                                Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-12 col-md-2 col-lg-2 col-xl-3 mx-auto mb-4 text-left">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">เมนู</h6>
                            <hr class="mb-4 mt-2 d-inline-block mx-auto" style="width: 30px !important; background-color: rgb(0, 76, 152) !important; height: 0.125em !important;">

                            <p class="test_p">
                                <a href="{{route('advertise')}}" class="text-dark link_text">ประชาสัมพันธ์</a>
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

                            <!-- <div class="col-12 col-md-12 col-lg-12 col-xl-6 mx-auto text-left">
                                    <p>
                                        <a href="#!" class="text-dark link_text">อาคารผู้ป่วย</a>
                                    </p>
    
                                    <p>
                                        <a href="#!" class="text-dark link_text">ประวัติผู้ป่วย</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="text-dark link_text">ผู้ป่วยในการดูแล</a>
                                    </p>
    
                                </div> -->


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
                            <hr class="mb-4 mt-2 d-inline-block mx-auto" style="width: 60px; background-color: rgb(0, 76, 152); height: 0.125em;">
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
            <div class="text-center mt-5 p-3 footer" style="background-color: rgb(0, 76, 152); color: #ECEFF1;">
                © 2022 Copyright: KKU Hospital Group 11
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </x-app-layout>
</body>

</html>