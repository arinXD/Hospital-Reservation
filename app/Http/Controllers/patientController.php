<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Room;
use App\Models\Congenital;
use App\Models\Treatment_record;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class patientController extends Controller
{
    function findOrfail()
    {
        try {
            $patient = DB::select("SELECT `id` FROM `patients` WHERE `id`=6");
            foreach ($patient[0] as $row) {
                echo $row;
            }
        } catch (Exception $e) {
            echo "can't find ID";
        }
    }

    // MENU
    function registerMenu()
    {
        return view("p_register_menu");
    }

    function editPatient(Request $rq)
    {
        date_default_timezone_set('Asia/Bangkok');
        $user = User::find(auth()->user()->id);
        $patient = patient::find($rq->patient_id);

        $user->card_id = $rq->card_id;
        $user->firstname = $rq->firstname;
        $user->lastname = $rq->lastname;
        $user->bloodtype = $rq->bloodtype;
        $user->religion = $rq->religion;
        $user->nationality = $rq->nationality;
        $user->address = $rq->address;
        $user->phone = $rq->phone;
        $user->save();

        $patient->job = $rq->job;
        $patient->save();

        return redirect()->route('patientProfile');
    }

    // Create New patient form
    function newPatient()
    {
        date_default_timezone_set('Asia/Bangkok');
        $user = User::find(auth()->user()->id);
        $patient = $user->patients;
        $age = floor((strtotime("now") - strtotime($user["birthday"])) / (60 * 60 * 24 * 365));
        // echo $patient->count();
        if (!$patient->count()) {
            $patients = [
                "job" => "",
                "allergy" => "",
            ];
        } else {
            $job = $patient[0]->job;
            $allergy = $patient[0]->allergy;
            $patients = [
                "job" => $job,
                "allergy" => $allergy,
            ];
        }
        try {
            $count = $user->patients[0]->treatment_records[0]->doctor_id;
        } catch (Exception $e) {
            $count = 0;
        }
        // echo ;

        return view("patient/new_patient", compact("user", "patients", "count", "age"));
    }

    // Add New patient
    function addPatient(Request $rq)
    {
        date_default_timezone_set('Asia/Bangkok');
        // echo $rq->firstname;
        try {
            $updateUser = User::find(Auth::user()->id);
            $updateUser->card_id = $rq->card_id;
            $updateUser->prefix = $rq->prefix;
            $updateUser->firstname = $rq->firstname;
            $updateUser->lastname = $rq->lastname;
            $updateUser->gender = $rq->gender;
            $updateUser->nationality = $rq->nationality;
            $updateUser->religion = $rq->religion;
            $updateUser->bloodtype = $rq->bloodtype;
            $updateUser->address = $rq->address;
            $updateUser->phone = $rq->phone;
            $updateUser->usertype = "patient";
            $updateUser->save();

            $user_has_patient = User::find(Auth::user()->id)->patients;
            if ($user_has_patient->count()) {
                // มีแล้ว
                $fpatient = Patient::where("user_id", "=", $updateUser->id)->get();
                $update_p = Patient::find($fpatient[0]->id);
                $update_p->job = $rq->job;
                $update_p->allergy = $rq->allergy;
                $update_p->health_insurance = $rq->health_insurance;
                $update_u = User::find(Auth::user()->id);
                $update_p->save();
                $update_u->save();

                $fpatient = Patient::where("user_id", "=", $updateUser->id)->get();
                $treat_ment = new Treatment_record;
                $treat_ment->patient_id = $fpatient[0]->id;
                $treat_ment->save();
            } else {
                // ยังไม่มี
                // เพิ่มผู้ป่วย
                $new_p = new Patient;
                $new_p->job = $rq->job;
                $new_p->allergy = $rq->allergy;
                $new_p->health_insurance = $rq->health_insurance;
                // เพิ่ม FK ให้ patient
                $new_p->user_id = $updateUser->id;
                $new_p->save();

                $fpatient = Patient::where("user_id", "=", $updateUser->id)->get();
                $treat_ment = new Treatment_record;
                $treat_ment->patient_id = $fpatient[0]->id;
                $treat_ment->save();
            }
            return redirect("addpatientsuccess");
        } catch (Exception $e) {
            $err = ($e->getMessage());
            if (strpos($err, 'users_card_id_unique') > 0) {
                $errMessage = 'บัตรประจำตัวประชาชนถูกใช้ไปแล้ว';
            }
        }
        return view("patient/add_patient_fail", compact("errMessage"));
    }

    // Patient Profile
    function patientProfile()
    {
        date_default_timezone_set('Asia/Bangkok');
        /*
        -----------------------
        | User
        | Patient
        | Treatment_record
        | Doctor
        | Room
        | Congenital
        -----------------------
        */
        $user = User::find(Auth::user()->id);

        $find_patient = Patient::where("user_id", "=", $user->id)->get();
        $find_treatment_record = Treatment_record::where("patient_id", "=", $find_patient[0]->id)->get();

        $patient = Patient::find($find_patient[0]->id);
        $treatment_record = Treatment_record::find($find_treatment_record[0]->id);
        $treatment_has_congenital = $treatment_record->congenitals;

        $congenital = [];
        foreach ($treatment_has_congenital as $row) {
            $find_congenital = Congenital::find($row->id);
            array_push($congenital, $find_congenital->congenitalname);
        };
        $congenital = join(", ", $congenital);
        date_default_timezone_set('Asia/Bangkok');
        $age = floor((strtotime("now") - strtotime($user["birthday"])) / (60 * 60 * 24 * 365));

        return view("patient/patient_profile", compact(
            'user',
            'patient',
            'treatment_record',
            'congenital',
            'age'
        ));
    }

    // registe history
    function regisHistory()
    {
        date_default_timezone_set('Asia/Bangkok');
        $user = User::find(Auth::user()->id);
        $find_treatment_record = Treatment_record::where("patient_id", "=", $user->patients[0]->id)
            ->where('doctor_id', '<>', NULL)
            ->withTrashed()
            ->get();

        if ($find_treatment_record->count() == 1) {
            $doctor = Doctor::find($find_treatment_record[0]->doctor_id);
            $room = Room::find($find_treatment_record[0]->room_id);
        } else {
            $doctor = NULL;
            $room = NULL;
        }

        $patient = $user->patients;

        // echo $find_treatment_record[0];
        return view("patient/patient_register_history", compact(
            "user",
            "patient",
            "find_treatment_record",
            "doctor",
            "room",
        ));
    }

    // Alert status
    function checkStatusP()
    {
        
        $user = User::find(Auth::user()->id);
        if ($user->patients->count()) {
            $status = "ลงทะเบียนเรียบร้อยแล้ว";
        } else {
            $status = "ยังไม่ได้ลงทะเบียน";
        }
        try {
            $countTreatment = count($user->patients[0]->treatment_records);
        } catch (Exception $e) {
            $countTreatment = 0;
        }
        try {
            $countDoctor = count($user->patients[0]->treatment_records->doctor_id);
        } catch (Exception $e) {
            $countDoctor = 0;
        }
        return view('patient/patient_status', compact('user', 'status', "countTreatment", "countDoctor"));
    }
}
