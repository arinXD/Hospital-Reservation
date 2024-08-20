<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="{{asset('js/title.js')}}"></script>

    <style>
        .btn-img {
            height: 100px;
            /* border: 1px solid rgb(0, 76, 152);; */
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 0.5em;
            background-color: rgb(0, 76, 152);
        }

        .btn-img:hover {
            border: 0.25em solid rgb(0, 76, 152);
            background-color: white;
            transition: 0.6s;
        }

        .w100 {
            width: 50%;
            margin: 2em auto !important;
        }

        .text-center {
            text-align: center;
        }

        .mt-1 {
            margin-top: 1em;
        }

        .mt-2 {
            margin-top: 2em;
        }

        .mt-3 {
            margin-top: 3em;
        }

        .mt-4 {
            margin-top: 4em;
        }

        .mt-5 {
            margin-top: 5em;
        }

        .f-h1 {
            font-size: 2em;
        }

        .f-h2 {
            font-size: 1.25em;
        }

        .px-1 {
            padding-left: 1em;
            padding-right: 1em;
        }

        .px-2 {
            padding-left: 2em;
            padding-right: 2em;
        }

        .mx-1 {
            margin-left: 1em;
            margin-right: 1em;
        }

        .mx-2 {
            margin-left: 2em;
            margin-right: 2em;
        }

        .mx-5 {
            margin-left: 5em;
            margin-right: 5em;
        }

        .img-link {
            color: white;

        }

        .img-link:hover {
            color: black;


        }

        .art {
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <!-- white bar -->
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a id="h2" href="/admin">{{ __(' Admin Management') }}</a>
            </h2>
        </x-slot>


        <div class="py-5 px-5 bg-white text-dark w-100 art">
            <h1 class="f-h1 text-center mt-3">ADMIN CONTROL</h1>
            <p class="f-h2 text-center mt-3">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</p>
            <a class="img-link" href="/add/doctor">
                <div class="btn-img img1 w100 mt-3 mx-1 px-2">เพิ่มหมอ</div>
            </a>
            <a class="img-link" href="/show/docter">
                <div class="btn-img img1 w100 mt-3 mx-1 px-2">รายชื่อบุคลากร</div>
            </a>
            <a class="img-link" href="/manage_user_account">
                <div class="btn-img img1 w100 mt-3 mx-1 px-2">จัดการบัญชีผู้ใช้</div>
            </a>
        </div>
        <footer style="width:100%; height:auto; background-color:rgb(0, 76, 152);">
            <div class="text-center p-3" style="background-color: rgb(0, 76, 152); color: #ECEFF1;">
                © 2022 Copyright: KKU Hospital Group 11
            </div>
        </footer>

    </x-app-layout>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>