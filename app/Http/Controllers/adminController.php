<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    function index()
    {
        return view("admin_view/dashboard_admin");
    }

    function checkType()
    {
        $user = Auth::user()->usertype;
        if ($user == "admin") {
            return redirect("/admin");
        } else if ($user == "doctor") {
            return redirect("/doctor");
        } else {
            return redirect('/dashboard');
        }
    }

    function createFormAdd()
    {
        $lastdoctor = Doctor::latest('id')->first();
        if ($lastdoctor == NULL) $docid = 1;
        else $docid = $lastdoctor->id + 1;
        $docUsername = "DOCT" . $docid;
        $docEmail = "doct" . $docid . "@gmail.com";
        return view("admin_view/form_add_doctor", compact('docUsername', 'docEmail'));
    }
    function addDoctor(Request $rq)
    {
        date_default_timezone_set('Asia/Bangkok');
        // $age = floor((strtotime("now") - strtotime($rq->birthday)) / (60 * 60 * 24 * 365));
        try {
            $newUser = new User;
            $newUser->username = $rq->username;
            $newUser->email = $rq->email;
            $newUser->password = Hash::make($rq->password);
            $newUser->usertype = "doctor";
            $newUser->prefix = $rq->prefix;
            $newUser->firstname = $rq->firstname;
            $newUser->lastname = $rq->lastname;
            $newUser->gender = $rq->gender;
            $newUser->birthday = $rq->birthday;
            $newUser->save();

            $user = User::where("username", "=", $rq->username)->get();
            $doctor = new Doctor;
            $doctor->user_id = $user[0]->id;
            $doctor->save();

            $status = "ลงทะเบียนสำเร็จ";
            $errMessage ="";
        } catch (QueryException $e) {

            $err = ($e->getMessage());
            if (strpos($err, 'users_username_unique') > 0) {
                $errMessage = 'Username ถูกใช้ไปแล้ว กรุณาติดต่อแอดมิน';
            } else if (strpos($err, 'users_email_unique') > 0) {
                $errMessage = 'Email ถูกใช้ไปแล้ว';
            } else if (strpos($err, 'users_card_id_unique') > 0) {
                $errMessage = 'บัตรประจำตัวประชาชนถูกใช้ไปแล้ว';
            } else {
                $errMessage = $err;
            }
            $status = "ลงทะเบียนไม่สำเร็จ";
            
            return view('admin_view/addstatus', compact("status",'errMessage'));
        }
        
        return redirect("admin_view/addstatus");
    }


    function showDoctor(Request $rs)
    {
        function sort_db($table, $column, $sort)
        {
            $rs = DB::table('users')
                ->crossJoin('doctors')
                ->select('*')
                ->where('users.id', '=', DB::raw('doctors.user_id'))
                ->orderBy("$table." . "$column", "$sort")
                ->get();
            return $rs;
        }

        if ($rs->sort == NULL || $rs->sort == "id asc") {
            $doctors = sort_db('doctors', "id", 'asc');
            $sort_by = 'id_lowToHigh';
        } else if ($rs->sort == "id desc") {
            $doctors = sort_db('doctors', "id", 'desc');
            $sort_by = 'id_highToLow';
        } else if ($rs->sort == "age asc") {
            $doctors = sort_db('users', "birthday", 'asc');
            $sort_by = 'age_lowToHigh';
        } else {
            $doctors = sort_db('users', "birthday", 'desc');
            $sort_by = 'age_highToLow';
        }

        return view("admin_view/show_doctor", compact("doctors", 'sort_by'));
    }

    function manageUser()
    {
        $users = User::where("usertype", "!=", "admin")->get();
        return view("admin_view/manage_user", compact("users"));
    }

    function createForm(Request $rq)
    {
        $user = User::find($rq->id);
        return view("admin_view/update_user", compact("user"));
        // echo $user;
    }
    function updateUser(Request $rs)
    {
        $editUser = User::find($rs->id);
        $editUser->prefix = $rs->prefix;
        $editUser->firstname = $rs->firstname;
        $editUser->lastname = $rs->lastname;
        $editUser->gender = $rs->gender;
        $editUser->bloodtype = $rs->bloodtype;
        $editUser->nationality = $rs->nationality;
        $editUser->religion = $rs->religion;
        $editUser->address = $rs->address;
        $editUser->phone = $rs->phone;
        $editUser->birthday = $editUser->birthday;
        $editUser->save();
        return redirect()->route("manageUser");
    }

    function deleteUser(Request $rq)
    {
        User::destroy($rq->id);
        return redirect()->route("manageUser");
    }

    function checkidbyname(Request $rq)
    {
        $user1 = User::where("username", "=", $rq->name)->get();
        $user2 = User::find(2);
        echo $user1[0]->id;
        echo "<br><br>";
        echo $user2;
    }
}
