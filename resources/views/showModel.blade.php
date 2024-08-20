<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p{
            /* border: 1px solid black; */
            width: fit-content;
            padding: .5em;
            border-bottom: 2px solid black;
            
        }
    </style>
</head>
<body>
    <fieldset>
        <legend>User patient</legend>
        @foreach($users as $user)
            <p>username: {{$user->username}}</p>
            <ul>
                @foreach($user->patients as $patient)
                <li>patient id: {{$patient->id}}</li>
                <li>user id: {{$patient->user_id}}</li>
                @endforeach
            </ul>
        @endforeach
    </fieldset>

    <fieldset>
        <legend>User doctor</legend>
        @foreach($users as $user)
            <p>username: {{$user->username}}</p>
            <ul>
                @foreach($user->doctors as $doctor)
                <li>patient id: {{$doctor->id}}</li>
                <li>user id: {{$doctor->user_id}}</li>
                @endforeach
            </ul>
        @endforeach
    </fieldset>
</body>
</html>