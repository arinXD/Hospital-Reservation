<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    function advertise(){
        return view("user_content/news");
    }
    function contact(){
        return view("user_content/contact");
    }
    function service(){
        return view("user_content/service");
    }
}
