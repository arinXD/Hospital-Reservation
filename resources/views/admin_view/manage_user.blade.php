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
        .w-f {
            display: inline-block;
            width: fit-content !important;
        }

        .art{
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

        <div class="py-5 px-5 bg-white text-dark w-100 vh-100 art">
            <table class="table table-striped border">
                <tr style="background-color: rgb(0, 76, 152); color:white;">
                    <!-- <th scope="col">User ID</th> -->
                    <th scope="col">Role</th>
                    <th scope="col">Fullname</th>
                    <!-- <th scope="col">Email</th> -->
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">Bloodtype</th>
                    <th scope="col">Action</th>
                    <!-- <th scope="col">Delete</th> -->
                </tr>
                @foreach($users as $user)
                <tr >
                    <!-- <th scope="row">{{$user->id}}</th> -->
                    <td>{{$user->usertype}}</td>
                    <td>{{$user->prefix}}{{$user->firstname}}&nbsp;&nbsp;{{$user->lastname}}</td>
                    <!-- <td>{{$user->email}}</td> -->
                    <td>{{$user->gender}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->bloodtype}}</td>
                    <td><a class="btn btn-success" href="/update_user/{{$user->id}}">แก้ไข</a><a class="ml-3 btn btn-danger" onclick="return confirm('Delete this user?')" href="{{route('deleteUser', $user->id)}}">ลบ</a></td>
                    <!-- <td></td> -->
                    <!-- <td><a href="/delete_user/{{$user->id}}">ลบ</a></td> -->

                    <!-- <td><button onclick="confirm()">ลบ</button></td> -->

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

    <script>
        function confirmDelete(id) {
            let confirm = confirm("Delete this user?");
            if (confirm) {
                window.location.href = "/delete_user/" + id;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>