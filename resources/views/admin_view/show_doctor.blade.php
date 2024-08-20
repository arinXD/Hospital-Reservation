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
    <script>
        window.onload = function() {
            const sort_by = "<?php echo $sort_by?>"
            const option = document.getElementById(sort_by);
            option.setAttribute('selected','selected')
        }
    </script>
    <style>
        .art{
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <!-- white bar -->
        <x-slot name="header">
            <div class="d-flex justify-content-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <a id="h2" href="/admin">{{ __(' Admin Management') }}</a>
                </h2>
                <!-- <div class="form-inline">
                    


                </div> -->
                <form class="form-inline" action="/show/docter" method="get">
                    <div class="form-group">
                        <label>เรียงตาม:</label>
                    </div>
                    <div class="form-group mx-sm-3">
                        <select class="form-control form-control-sm w-100" name="sort" style="padding-right: 2em ; ">
                            <option id="id_lowToHigh" value="id asc">รหัสแพทย์จากน้อยไปมาก</option>
                            <option id="id_highToLow" value="id desc">รหัสแพทย์จากมากไปน้อย</option>
                            <option id="age_lowToHigh" value="age asc">อายุจากน้อยไปมาก</option>
                            <option id="age_highToLow" value="age desc">อายุจากมากไปน้อย</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary" style="padding: .17em .35em;">ตกลง</button>
                </form>
            </div>
        </x-slot>

        <div class="py-5 px-5 bg-white text-dark w-100 vh-100 art">
            <table class="table table-striped border">
                <tr style="background-color: rgb(0, 76, 152); color:white;">
                    <th scope="col">Doctor ID</th>
                    <th scope="col">Doctor Fullname</th>
                    <th scope="col">Educational</th>
                    <th scope="col">Career Experience</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                </tr>
                @foreach($doctors as $doctor)

                <tr>
                    <th scope="row">{{$doctor->id}}</th>
                    <td>{{$doctor->prefix}}{{$doctor->firstname}} {{$doctor->lastname}}</td>
                    <td>
                        @if($doctor->educational=="")
                        ###
                        @else
                        {{$doctor->educational}}
                        @endif
                    </td>
                    <td>
                        @if($doctor->career_experience=="")
                        ###
                        @else
                        {{$doctor->career_experience}}
                        @endif
                    </td>
                    <td>{{$doctor->email}}</td>
                    <td>{{$doctor->gender}}</td>
                    <?php 
                        $age = floor((strtotime("now") - strtotime($doctor->birthday)) / (60 * 60 * 24 * 365));
                    ?>
                    <td>{{$age}}</td>
                </tr>
                @endforeach
            </table>
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