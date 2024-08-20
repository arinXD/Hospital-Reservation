<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerFormController extends Controller
{
    function index(Request $req){
        $questions = Question::find($req->id);
        return view('QA/answerform',compact('questions'));
    }
    function sendReply(Request $req){
        $answer = new Answer;
        $answer->answer_detail=$req->ans;
        $answer->question_id=$req->id;
        $answer->docter_id=User::find(Auth::user()->id)->doctors[0]->id;
        $answer->save();
        return redirect('answer')->with('success','ตอบกลับเรียบร้อยแล้ว');
    }
}
