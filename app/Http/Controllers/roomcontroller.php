<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class roomcontroller extends Controller
{
    function room(Request $rq){
        $room = Room::find($rq->id);
        $treatment = $room->treatment_records;
        $patientName = [];

        // echo $treatment;
        foreach($treatment as $row){
            $fpatient = Patient::find($row->patient_id);
            $fpatient = User::find($fpatient->user_id);
            // echo gettype($fpatient);
            if($fpatient!=NULL){
                $pname = $fpatient->prefix.$fpatient->firstname." ".$fpatient->lastname;
                array_push($patientName,$pname);
            }else{
                array_push($patientName,"This user has been already deleted.");
            }
        }
        // print_r( $patientName);
        return view("doctor_view/room/pRoom",compact('room','patientName'));
    }
}
