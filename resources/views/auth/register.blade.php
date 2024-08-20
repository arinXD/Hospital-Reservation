<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โรงพยาบาลมหาวิทยาลัยขอนแก่น</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="{{asset('js/title.js')}}"></script>
    <style>
        .box-shadow {
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            border-radius: 0.25em;
        }

        body {
            background-color: rgb(0, 76, 152);
        }

        button[type="submit"] {
            width: 80%;
            border-radius: 2em;
            padding: .6em 0;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            border: 0px;
            /* border-radius: 0; */
            border-bottom: 1px solid lightgrey;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid py-4 ">
        <div class="text-center mb-4">
            <h1 id="title text-white" style="color: white;">KKC HOSPITAL</h1>
            <h2 id="h2" class="mb-0 text-white" id="subtitle">Register</h2>
        </div>
        <div class="border container w-50 py-4 px-5 box-shadow bg-white">
            <form method="POST" action="{{ route('register') }}" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" value="" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" :value="old('email')" required>
                </div>

                <div class="form-group">
                    <label>วัน/เดือน/ปีเกิด</label>
                    <input type="date" name="birthday" placeholder="dd-mm-yyyy" value="" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>โทรศัพท์</label>
                    <input class="form-control" type="tel" name="phone" :value="old('phone')" pattern="[0]{1}[9-5]{1}[0-9]{8}" required>
                </div>

                <div class="form-group">
                    <label>รหัสผ่าน</label>
                    <input class="form-control" type="password" name="password" required>
                </div>

                <div class="form-group mb-4">
                    <label>ยืนยันรหัสผ่าน</label>
                    <input class="form-control" type="password" name="password_confirmation" required>
                </div>

                <x-jet-validation-errors class="text-danger" />

                <div class="form-group text-center my-4">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>

                <div class="form-group text-center">
                    <a class="" href="{{ route('login') }}">Already registered?</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>