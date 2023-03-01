<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class student_quiz extends Controller
{
    public function index()
    {
        return view('student-quiz.dashboard');
    }

    public function exam()
    {
        $exam=Exam::where('status','aktif')->where('group_id',Auth::user()->student->group_id)->get();
        return view('student-quiz.list_exam',compact('exam'));
    }

    public function prepare(Exam $id)
    {
        return view('student-quiz.prepare',[
            'exam'=>$id
        ]);
    }
    public function token(Request $request)
    {
        $token=Exam::where('id', $request->id)->first()->token;
        if($request->token !=$token){
            return back()->with('error','Token salah!!');
        }else{
            return redirect('');
        }
    }
}
