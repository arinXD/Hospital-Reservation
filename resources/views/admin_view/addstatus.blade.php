<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โรงพยาบาลมหาวิทยาลัยขอนแก่น</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/alert.css')}}">
</head>

<body>
    <x-app-layout>
        
    </x-app-layout>

    

    <script>
        function CustomAlert() {
    this.alert = function(message, title) {
        document.body.innerHTML = document.body.innerHTML + '<div id="dialogoverlay"></div><div id="dialogbox" class="slit-in-vertical"><div><div id="dialogboxhead"></div><div id="dialogboxbody"></div><div id="dialogboxfoot"></div></div></div>';

        let dialogoverlay = document.getElementById('dialogoverlay');
        let dialogbox = document.getElementById('dialogbox');

        let winH = window.innerHeight;
        dialogoverlay.style.height = winH + "px";

        dialogbox.style.top = "100px";

        dialogoverlay.style.display = "block";
        dialogbox.style.display = "block";

        document.getElementById('dialogboxhead').style.display = 'block';

        if (typeof title === 'undefined') {
            document.getElementById('dialogboxhead').style.display = 'none';
        } else {
            document.getElementById('dialogboxhead').innerHTML = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> ' + title;
        }
        document.getElementById('dialogboxbody').innerHTML = message;
        document.getElementById('dialogboxfoot').innerHTML = '<button class="pure-material-button-contained active" onclick="customAlert.ok()">OK</button>';
    }

    this.ok = function() {
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
        window.location.replace("/dashboard");
    }
}
        let customAlert = new CustomAlert();

        window.onload = customAlert.alert('<?php echo $status;?><br><?php echo $errMessage; ?>', 'KKC HOSPITAL')
    </script>
</body>

</html>