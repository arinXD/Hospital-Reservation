<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/alert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/Register_new_patient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/set-link.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="{{asset('js/alert.js')}}"></script>

    <style>
        button[type="button"] {
            font-size: 1.25em;
        }

        p {
            font-size: 1.7em;
            font-weight: bold;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        input[type="text"] {
            display: block;
            border-radius: .25em;
        }

        input[type="checkbox"] {
            margin-right: 1em;
        }

        /* input[readonly] {
            background-color: gainsboro;
        } */

        .page-active {
            background-color: darkgreen !important;
        }

        section {
            padding-top: 2em !important;

        
        }

        .text-uppercase{
            margin-bottom: 0.5em !important
        }

        .account_p::after {
            content: "" !important;
            display: block !important;
            width: 12% !important;
            height: 6px !important;
            background-color: rgb(0, 76, 152) !important;
            /* margin: 10px 0 20px; */
            margin: 0 auto !important;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <!-- white bar -->
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-1 px-5 nav-shadow ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-bread" style="color: white;">หน้าหลัก</a></li>
                    <li class="breadcrumb-item personal-active" aria-current="page" style="color: yellow;">ลงทะเบียนผู้ป่วย (ทำบัตรใหม่)</li>
                </ol>
            </nav>

    </x-app-layout>


    <script>
        let customAlert = new CustomAlert();

        window.onload = customAlert.alert('ลงทะเบียนผู้ป่วยสำเร็จ', 'KKC HOSPITAL')
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>