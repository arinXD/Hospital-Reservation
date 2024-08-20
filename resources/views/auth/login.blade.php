<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โรงพยาบาลมหาวิทยาลัยขอนแก่น - Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        #wrapper {
            height: 100vh;
        }

        #login-box {
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            border-radius: 0.25em;
        }

        button[type="submit"] {
            width: 80%;
            border-radius: 2em;
            padding: .6em 0;
        }

        input[type="email"],
        input[type="password"] {
            border: 0px;
            /* border-radius: 0; */
            border-bottom: 1px solid lightgrey;
            box-shadow: none;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
        }

        /* #wrapper{
            background-image: url("https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fhospital&psig=AOvVaw183Iv1xHbqInaY5ByKMLhf&ust=1664724001651000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCNiQmqmqv_oCFQAAAAAdAAAAABAX");
        } */

        body{
            background-color: rgb(0, 76, 152) ;
        }

        .text-center{
            color: white;
        }
    </style>
</head>

<body>
    <div id="wrapper" class="d-flex flex-column justify-content-center">
        <div class="container w-50 px-0 mb-4 " >
            <h1 class="text-center">KKU HOSPITAL</h1>
        </div>
        <div id="login-box" class="container w-50 p-5 bg-white">
            
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf
                <div class="mb-4">
                    <label class="mb-3" for="email">Your email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" value="" required autocomplete="off">
                </div>

                <div class="mb-4 mt-4">
                    <label class="mb-3" for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" :value="old('password')" required autocomplete="off">
                </div>

                <x-jet-validation-errors class="text-danger" />

                <div class="d-flex justify-content-center mt-4 mb-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>

                <div class="form-group text-center">
                    <a class="" href="{{ route('register') }}">Register</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>