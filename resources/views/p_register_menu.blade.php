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
        button[type="button"] {
            font-size: 1.25em;
        }
        p {
            font-size: 1.7em;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <!-- white bar -->
        <x-slot name="header">
            <h2 id="h2" class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('ลงทะเบียนผู้ป่วย') }}
            </h2>
        </x-slot>


        <div class="py-5 px-5 bg-white text-dark w-100">
            <div class="container w-100">
                <p class="text-center mb-4">ลงทะเบียนผู้ป่วย</p>
                <div class="container d-flex flex-column">
                    <a class="d-block" href="/new/patient"><button type="button" class="w-100 bg-success btn btn-success my-3 py-4">ข้อมูลผู้ป่วย</button></a>
                    <a class="d-block" href="/patient/regis/history"><button type="button" class="w-100 bg-success btn btn-success my-3 py-4">ประวัติการลงทะเบียน</button></a>
                    <a class="d-block" href="/check/patient/statut"><button type="button" class="w-100 bg-success btn btn-success my-3 py-4">ตรวจสอบสถานะการลงทะเบียน</button></a>
                </div>
            </div>

        </div>

    </x-app-layout>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>