<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <script src="{{asset('js/title.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


    <style>
        nav {
            padding: .75em 1.35em;
            background-color: white;
            /* border: 1px solid lightgray; */
            z-index: 2;
            box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px !important;
            position: fixed;
            width: 100%;
            top:0;
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
        .mt-10{
            margin-top: 4em;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <div class="logo">
                <a href="/">Logo</a>
            </div>
            <li><a href="/advertise">ประชาสัมพันธ์</a></li>
            <li><a href="/contact">ติดต่อเรา</a></li>
            <!-- <li><a href="/service">บริการ</a></li> -->
            <li><a href="{{route('login')}}">Login</a></li>
        </ul>
    </nav>
    <article class="mt-10">
        <ol class="breadcrumb mb-0 py-3 px-5 nav-shadow">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">หน้าหลัก</a></li>
            <li class="breadcrumb-item personal-active" aria-current="page">บริการ</li>
        </ol>

        <div class="py-5 px-5 bg-white text-dark w-100">
            <div class="container bg-white px-5 py-5">
                <h1 id="h2" class="h1 mb-4 text-center">Services</h1>
                <div class="container d-flex justify-content-center">
                    <div class="row ">
                        <div class="col-sm-6 col-lg-4"><img class="w-50 rounded-circle border border-success" src="https://img.freepik.com/free-vector/illustration-user-avatar-icon_53876-5907.jpg?size=338&ext=jpg&uid=R65840667&ga=GA1.2.1857505461.1661873654" alt="dev-img"></div>
                        <div class="col-sm-6 col-lg-4"><img class="w-50 rounded-circle border border-success" src="https://img.freepik.com/free-vector/illustration-user-avatar-icon_53876-5907.jpg?size=338&ext=jpg&uid=R65840667&ga=GA1.2.1857505461.1661873654" alt="dev-img"></div>
                        <div class="col-sm-6 col-lg-4"><img class="w-50 rounded-circle border border-success" src="https://img.freepik.com/free-vector/illustration-user-avatar-icon_53876-5907.jpg?size=338&ext=jpg&uid=R65840667&ga=GA1.2.1857505461.1661873654" alt="dev-img"></div>
                        <div class="col-sm-6 col-lg-4"><img class="w-50 rounded-circle border border-success" src="https://img.freepik.com/free-vector/illustration-user-avatar-icon_53876-5907.jpg?size=338&ext=jpg&uid=R65840667&ga=GA1.2.1857505461.1661873654" alt="dev-img"></div>
                        <div class="col-sm-6 col-lg-4"><img class="w-50 rounded-circle border border-success" src="https://img.freepik.com/free-vector/illustration-user-avatar-icon_53876-5907.jpg?size=338&ext=jpg&uid=R65840667&ga=GA1.2.1857505461.1661873654" alt="dev-img"></div>
                    </div>
                </div>
                <p class="my-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
                    deserunt! Veniam dolores aliquam impedit optio amet molestias autem
                    magnam consequuntur voluptas aut cumque voluptate, eum doloribus? Ex saepe
                    neque sint!
                </p>
            </div>
        </div>
    </article>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>