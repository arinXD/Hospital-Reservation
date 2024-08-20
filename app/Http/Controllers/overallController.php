<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class overallController extends Controller
{
    function showUser(){
        $users = User::all();
        $patients = Patient::all();
        return view("showModel", compact(
            'users',
            'patients',
        ));

    }
    function modelRelation(){
        $authID = Auth::user()->id;
        $user = User::find($authID);

        echo $authID . "<br>";
        echo Auth::user()->username . "<br>";
        echo $user->patients . "<br>";
        echo gettype($user->patients) . "<br><br>";

        if (!$user->patients->count()) {
            echo "T";
        }else{
            echo "F";
        }
    }
}
