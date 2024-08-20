<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โรงพยาบาลมหาวิทยาลัยขอนแก่น</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/alert.css')}}">
    <script src="{{asset('js/alert.js')}}"></script>

</head>

<body>
    <x-app-layout>
    </x-app-layout>
    <div></div>

    <script>

        let customAlert = new CustomAlert();

        window.onload = customAlert.alert('ลงทะเบียนสำเร็จ', 'KKC HOSPITAL')       
    </script>
    
</body>

</html>