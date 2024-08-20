<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Congenital;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Room;
use App\Models\Treatment_record;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class doctorController extends Controller
{
    function doctorProfile()
    {
        date_default_timezone_set('Asia/Bangkok');
        $user = User::find(Auth::user()->id);
        $age = floor((strtotime("now") - strtotime($user->birthday)) / (60 * 60 * 24 * 365));
        return view("doctor_view/doctorProfile", compact('user', 'age'));
    }

    function doctorProfileEdit(Request $rq)
    {
        $user = User::find(Auth::user()->id);
        $user->firstname = $rq->firstname;
        $user->lastname = $rq->lastname;
        $user->gender = $rq->gender;
        $user->prefix = $rq->prefix;
        $user->religion = $rq->religion;
        $user->card_id = $rq->card_id;
        $user->nationality = $rq->nationality;
        $user->address = $rq->address;
        $user->phone = $rq->phone;
        $doctor = Doctor::find($rq->doctor_id);
        $doctor->educational = $rq->educational;
        $doctor->career_experience = $rq->career_experience;
        $user->save();
        $doctor->save();
        return redirect()->route('doctorProfile');
    }

    function doctorAddPatient()
    {
        $user = User::find(Auth::user()->id);
        $building = Building::all();
        // $patient_treatment = User::where('usertype', '=', "user")->get(); //->groupBy('patient_id')
        $patient_treatment = Treatment_record::where('doctor_id', '=', NULL)->get(); //->groupBy('patient_id')
        $patient_treatment = $patient_treatment;
        return view("doctor_view/new_patient", compact('user', 'patient_treatment', 'building'));
    }

    function createPatient(Request $rq)
    {
        try {
            date_default_timezone_set('Asia/Bangkok');
            // $age = floor((strtotime("now") - strtotime($rq->birthday)) / (60 * 60 * 24 * 365));

            if (Patient::all()->count() == 0) $lastPatient = 0;
            else $lastPatient = Patient::latest('id')->first()->id;

            $user = new User;
            $user->username = "Patient" . ($lastPatient + 1);
            $user->email = $rq->email;
            $user->password = Hash::make($rq->password);
            $user->card_id = $rq->card_id;
            $user->usertype = "patient";
            $user->prefix = $rq->prefix;
            $user->firstname = $rq->firstname;
            $user->lastname = $rq->lastname;
            $user->gender = $rq->gender;
            $user->birthday = $rq->birthday;
            $user->bloodtype = $rq->bloodtype;
            $user->nationality = $rq->nationality;
            $user->religion = $rq->religion;
            $user->address = $rq->address;
            $user->phone = $rq->phone;

            $user->save();

            $patient = new Patient;
            $patient->job = $rq->job;
            $patient->allergy = $rq->allergy;
            $patient->health_insurance = $rq->health_insurance;
            $patient->user_id = User::latest('id')->first()->id;

            $patient->save();

            // หาคนไข้
            $find_patient = Patient::latest('id')->first()->id;
            // หาการลงทะเบียนผู้ป่วย
            $treatment_record = new Treatment_record;
            $treatment_record->patient_id = $find_patient;
            if (!$rq->by_case == NULL) {
                $treatment_record->by_case = $rq->by_case;
            }

            $treatment_record->save();

            if (!($rq->congenital == NULL)) {
                foreach ($rq->congenital as $congenital) {
                    DB::insert("INSERT INTO `congenital_treatment_record`(`treatment_record_id`, `congenital_id`)
                        VALUES ($treatment_record->id, $congenital)");
                }
            }

            return view('doctor_view/addSuccess');
        } catch (QueryException $e) {

            $err = ($e->getMessage());
            if (strpos($err, 'users_username_unique') > 0) {
                $errMessage = 'Username ถูกใช้ไปแล้ว กรุณาติดต่อแอดมิน';
            } else if (strpos($err, 'users_email_unique') > 0) {
                $errMessage = 'Email ถูกใช้ไปแล้ว';
            } else if (strpos($err, 'users_card_id_unique') > 0) {
                $errMessage = 'บัตรประจำตัวประชาชนถูกใช้ไปแล้ว';
            } else {
                // $errMessage = 'กรอกข้อมูลไม่ถูกต้อง';
                $errMessage = $err;
            }

            return view('doctor_view/addFail', compact('errMessage'));
        }
    }

    function addIncase(Request $rq)
    {
        foreach ($rq->treat_id as $row) {
            $treatment = Treatment_record::find($row);
            $treatment->doctor_id = $rq->doctor_id;
            $treatment->room_id = $rq->room_id;
            $treatment->save();
        }
        return redirect()->route('doctorAddPatient');
    }

    function doctorRegisterPatient()
    {
        if (Patient::all()->count() == 0) $pid = 0;
        else $pid = Patient::latest('id')->first()->id;;
        $pEmail = "patient" . ($pid + 1) . "@gmail.com";
        $congenitals = Congenital::all();
        return view("doctor_view/patient_register", compact('pEmail', 'congenitals'));
    }

    function building()
    {
        $buildings = Building::all();
        return view("doctor_view/patient_building", compact('buildings'));
    }
    function room(Request $rq)
    {
        $building = Building::find($rq->id);
        $rooms = Room::where('building_id', '=', $rq->id)->get();
        // echo $building;
        return view("doctor_view/patient_room", compact('rooms', 'building'));
    }

    function patientInformation()
    {
        $user = User::find(Auth::user()->id);
        $result = Treatment_record::where('doctor_id', "IS NOT", NULL)->withTrashed()->simplePaginate(5);
        $building = Building::all();
        // echo $building[0]->buildingName;
        return view("doctor_view/patient_information", compact('result','building'));
    }

    function patient_search(Request $rq)
    {
        if ($rq->patientInfo == NULL) {
            $result = Treatment_record::where('deleted_at', "=", NULL)->simplePaginate(5);
        } else {
            $user = User::where('users.firstname', 'like', "%$rq->patientInfo%")
                ->orWhere('users.lastname', 'like', "%$rq->patientInfo%")
                ->get();
            // echo $user[0]->patients[0];
            try {

                $result = Treatment_record::where('patient_id', '=', $user[0]->patients[0]->id)->simplePaginate(5);
            } catch (Exception) {

                $result = Treatment_record::where('deleted_at', "=", NULL)->simplePaginate(5);
            }
        }
        // echo $result;
        $building = Building::all();
        return view("doctor_view/patient_information", compact('result',"building"));
    }

    function patientIncase()
    {
        $congenitals=Congenital::all();
        $congenitalList=[];
        foreach ($congenitals as $con) {
            $id = $con->id;
            $name = $con->congenitalname;
            $congenitalList[$id]=$name;
            // echo$con->id;
        }
        $user = User::find(Auth::user()->id);
        $treatment = Treatment_record::where("doctor_id", "=", $user->doctors[0]->id)->paginate(5);
        // $treatment = $treatment->where("treated", "=", NULL)
        // echo $treatment;
        $treated_array = $array = json_decode(json_encode(DB::select("SELECT treatment_record_id,congenital_id FROM congenital_treatment_record
        WHERE deleted_at IS NOT NULL")), true);
        $untreated_array = json_decode(json_encode(DB::select("SELECT treatment_record_id,congenital_id FROM congenital_treatment_record
        WHERE deleted_at IS NULL")), true);

        // print_r($treated_array);
        // print_r($congenitalList);

        return view("doctor_view/patient_incase", compact('user', 'treatment','treated_array','untreated_array','congenitalList'));
    }

    function treated(Request $rq)
    {
        date_default_timezone_set('Asia/Bangkok');
        $treatment = Treatment_record::find($rq->treat_id);
        $treatment->treated = Carbon::now();
        $treatment->save();
        // $now = Carbon::now();
        // DB::update("UPDATE `congenital_treatment_record` SET `deleted_at` = '$now' WHERE `treatment_record_id` = $rq->treat_id ");
        return redirect()->route('patientIncase');
    }

    function treatedCongenital(Request $rq)
    {
        date_default_timezone_set('Asia/Bangkok');
        // $now = Carbon::now();
        $treatment = Treatment_record::find($rq->treat_id);
        if ($rq->by_case != null) {
            $treatment->by_case = null;
            $treatment->save();
        }
        if ($rq->congenital != null) {
            foreach ($rq->congenital as $con) {

                DB::update("UPDATE `congenital_treatment_record` SET `deleted_at` = now()
                WHERE `treatment_record_id` = $treatment->id
                AND `congenital_id` = $con");
            }
        }
        // echo $con;
        return redirect()->route('patientIncase');
    }

    function addCongenital(Request $rq)
    {
        $patient = Patient::find($rq->patient_id);
        $user = User::find($patient->user->id);
        $congenital = Congenital::all();
        $treatment = Treatment_record::find($rq->treatment_id); //->withTrashed()
        $treatment_id = $rq->treatment_id;
        // echo $user->patients[0]->health_insurance;
        return view('doctor_view/add_congenital', compact('patient', 'user', 'congenital', 'treatment_id', 'treatment'));
    }

    function saveCongenital(Request $rq)
    {
        $patient = Patient::find($rq->patient_id);
        $patient->allergy = $rq->allergy;
        $patient->health_insurance = $rq->health_insurance;
        $patient->save();
        if ($rq->congenitals == NULL) {
            DB::delete("DELETE FROM congenital_treatment_record WHERE
                        treatment_record_id = $rq->treatment_id");
        }

        if ($rq->congenitals != NULL) {
            $treat = Treatment_record::find($rq->treatment_id);
            $congenital_treat = DB::select("SELECT congenital_id FROM `congenital_treatment_record` 
            WHERE treatment_record_id=$treat->id");
            $congenital_treat_array = json_decode(json_encode($congenital_treat), true);
            $conInTreat = [];
            foreach ($congenital_treat_array as $array) {
                array_push($conInTreat, $array["congenital_id"]);
            }
            foreach ($rq->congenitals as $con) {
                if (!in_array($con, $conInTreat)) {
                    DB::insert("INSERT INTO `congenital_treatment_record`(`treatment_record_id`, `congenital_id`)
                VALUES ('$rq->treatment_id', '$con')");
                }
            }
            // echo "โรคที่ส่งเข้ามา <br>";
            $congenital_in = [];
            foreach ($rq->congenitals as $conID) {
                $conname = Congenital::find($conID)->congenitalname;
                // echo "- $conname <br>";
                array_push($congenital_in, $conID);
            }
            $congenitalList = Congenital::all();
            $congenital_out = [];

            foreach ($congenitalList as $conn) {
                if (!in_array($conn->id, $congenital_in)) {
                    // echo $conn->congenitalname . "<br>";
                    if (in_array($conn->id, $conInTreat)) {
                        // echo "-เจอ" . $conn->congenitalname . "<br>";
                        DB::delete("DELETE FROM congenital_treatment_record WHERE
                        treatment_record_id = $rq->treatment_id AND
                        congenital_id = $conn->id
                        ");
                    }
                }
            }
        }
        if ($rq->by_case != NULL) {
            $treatment = Treatment_record::where('patient_id', '=', $rq->patient_id)->get();
            $treatment[0]->by_case = $rq->by_case;
            $treatment[0]->save();
        }
        return redirect()->route('patientInformation');
    }

    function checkcon(Request $rq)
    {
        $patient = Patient::find($rq->patient_id);
        $treat = Treatment_record::find($rq->treat_id);
        $congenital_treat = DB::select("SELECT congenital_id FROM `congenital_treatment_record` WHERE treatment_record_id=$treat->id");
        $congenital_treat_array = json_decode(json_encode($congenital_treat), true);

        $conInTreat = [];
        foreach ($congenital_treat_array as $array) {
            array_push($conInTreat, $array["congenital_id"]);
        }
        print_r($conInTreat);
    }

    function addTreatment(Request $rq)
    {
        date_default_timezone_set('Asia/Bangkok');
        $user = User::find(Auth::user()->id);
        foreach ($rq->patient_id as $patient) {
            $treatment = new Treatment_record;
            $treatment->patient_id = intval($patient);
            $treatment->doctor_id = intval($user->doctors[0]->id);
            $treatment->room_id = intval($rq->select_room);
            $treatment->save();
        }
        return redirect()->route("patientInformation");
    }
    function qa()
    {
        return view('doc_view/qna');
    }

    function createSucess()
    {
        return view('doctor_view/addSuccess');
    }
}
