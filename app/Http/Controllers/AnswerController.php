<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function index(){
        $questions = Question::whereNotIn('id', DB::table('answers')
        ->pluck('question_id'))->get();
        $count= $questions->count();
        // dd($questions);
        return view('QA/answer',compact('questions','count'));
    }
}
