<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="{{asset('js/title.js')}}"></script>
    <style>
        label {
            display: inline-block;
            width: 120px;
            height: 42px;
            text-align: right;
            margin-right: 1em;
            margin-bottom: 0;
            vertical-align: middle;
        }

        .input-wrap {
            margin-top: 1em;
        }

        .form-wrap {
            width: fit-content;
            margin: 0 auto;
        }

        #title,
        #subtitle {
            text-align: center;
            margin: 2em 1em 2em 1em;
            display: block;
            font-weight: bolder;
        }

        .title-wrap {
            display: flex;
            justify-content: center;
        }

        .add-d {
            background-color: white;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        select {
            width: 220px;
        }

        button[type="submit"] {
            display: block;
            width: fit-content;
            margin: 2em auto;
            border: 0.125em solid rgb(0, 76, 152);
            padding: .5em 1em;
            border-radius: 1em;
            background-color: white
            
        }

        .art{
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }

        button[type="submit"]:hover {
            background-color: rgb(0, 76, 152);
            color: white;
            transition: 0.6s;
            
        }

        .dis {
            background-color: lightgray !important;
        }

        label{
            text-transform: capitalize;
            text-align: left;
            color: rgb(0, 76, 152);
        }

        input, select, textarea{
            border: 0.125em solid rgb(200, 200, 200) !important;
            border-radius: 0.5em !important;
            
        }

    </style>

</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a id="h2" href="/admin">{{ __(' Admin Management') }}</a>
            </h2>
        </x-slot>
        <div class="py-5 px-5 bg-white text-dark w-100 art">
            <div class="title-wrap">
                <h1 id="title">KKC Hospital</h1>
                <h2 id="subtitle">Edit Userinformation</h2>
            </div>
            <div class="form-wrap">
                <form action="/update_user" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="input-wrap col-3">
                            <label>user id:</label><input type="text" name="id" value="{{$user->id}}" class="dis" readonly>
                        </div>

                        <div class="input-wrap col-3">
                            <label>username:</label><input type="text" name="username" value="{{$user->username}}" class="dis" readonly>
                        </div>

                        <div class="input-wrap col-3">
                            <label>email:</label><input type="email" name="email" value="{{$user->email}}" class="dis" readonly>
                        </div>

                        <div class="input-wrap col-3">
                            <label>card id:</label><input type="text" name="card_id" value="{{$user->card_id}}" class="dis" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-wrap col-3">
                            <label>prefix:</label><select name="prefix" required>
                                <option value="นาย" selected>นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                        </div>

                        <div class="input-wrap col-3">
                            <label>firstname:</label><input type="text" name="firstname" value="{{$user->firstname}}" required>
                        </div>
                        <div class="input-wrap col-3">
                            <label>lastname:</label><input type="text" name="lastname" value="{{$user->lastname}}" required>
                        </div>

                        <div class="input-wrap col-3">
                            <label>gender:</label><select name="gender" required>
                                <option value="ชาย" selected>ชาย</option>
                                <option value="หญิง">หญิง</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-wrap col-3">
                            <label>bloodtype:</label>
                            <br>
                            <select name="bloodtype" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                            </select>
                        </div>

                        <div class="input-wrap col-3">
                            <label>nationality:</label>
                            <br><input type="text" name="nationality" value="{{$user->nationality}}" required>
                        </div>

                        <div class="input-wrap col-3">
                            <label>religion:</label>
                            <br><input type="text" name="religion" value="{{$user->religion}}" required>
                        </div>
                    
                    </div>
                    <div class="row">
                    <div class="input-wrap col-5">
                            <label>address:</label><br><textarea name="address" rows="5" cols="50" value="" required>{{$user->address}}</textarea>
                        </div>
                        <div class="input-wrap col-3">
                            <label>phone:</label>
                            <br><input type="text" name="phone" value="{{$user->phone}}" required>
                        </div>
                    </div>
                    <button type="submit">แก้ไขข้อมูล</button>

                </form>
            </div>
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