<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $ans = Answer::all();
        $questions = Question::all();
        $question_count = $ans->count();
        try {
            $answers = Answer::whereBelongsTo($questions)->get();
        } catch (Exception $e) {
            $answers = [];
        }
        // dd($answers);
        // whereIn('question_id', DB::table('questions')->pluck('id'))
        // ->get();
        return view('QA/question', compact('answers', 'question_count', 'answers'));
    }
    public function index_doct()
    {
        $ans = Answer::all();
        $questions = Question::all();
        $question_count = $ans->count();
        try {
            $answers = Answer::whereBelongsTo($questions)->get();
        } catch (Exception $e) {
            $answers = [];
        }
        // $answers=Answer::all();
        // echo $answers[0]->question;
        return view('QA/questionForDoctor', compact( 'question_count', 'answers'));
    }

    public function sendQuestion(Request $request)
    {
        $massage = $request->validate(
            [
                'topic' => 'required|unique:questions',
            ],
            [
                'topic.unique' => 'หัวข้อนี้มีคำตอบแล้ว',
            ]
        );
        $new = new Question;
        $new->topic = $request->topic;
        $new->question_detail = $request->question_detail;
        try {
            $userid = Auth::user()->id;
        } catch (Exception) {
            $userid = NULL;
        }
        $new->user_id=$userid;
        $new->save();
        return redirect('/question')->with('success', 'ส่งคำถามเรียบร้อยแล้ว');
    }

    public function search(Request $request)
    {
        $query = '%' . $request->topic . '%';
        $questions = Question::where('topic', 'LIKE', $query)->get();
        $ans = Answer::all();

        try {
            $answers = Answer::whereBelongsTo($questions)->get();
        } catch (Exception $e) {
            $answers = [];
        }
        
        $question_count = count($answers);;
        return view('QA/question', compact('answers', 'question_count'));
    }
}
