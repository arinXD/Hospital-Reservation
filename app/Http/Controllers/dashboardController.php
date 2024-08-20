<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class dashboardController extends Controller
{
    // private const $userTypeList=["adin"];
    function index(){
        $user = Auth::user()->usertype;
        if($user=="user" || $user=="patient"){
            return view("/dashboard");
        }
        else if($user=="doctor"){
            return view("doctor_view/dashboard_doctor");
        }
        else{
            return view('admin_view/dashboard_admin');
        }
    }

}
