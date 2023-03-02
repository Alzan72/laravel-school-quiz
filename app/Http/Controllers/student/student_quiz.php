<?php

namespace App\Http\Controllers\student;

use App\Models\Exam;
use App\Models\Reply;
use App\Models\groupstudent;
use App\Models\Latihan\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
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
            $topic=Exam::where('id', $request->id)->first()->topic_id;
            $group=Auth::user()->student->group_id;
            // sesion
            session()->flash('exam_token', auth()->user()->id.'-'.$request->token);
            return redirect("/quiz/$group/$topic/start/0");
        }
    }

    public function quizstart($group,$topic,$id)
    {  $reply='';
        $top=Topic::where('id',$topic)->first()->status;
        if($top !='aktif'){
            return redirect('/student/exam')->with('alert','Soal telah di tutup');
        }
        $group=Auth::user()->student->group_id;
        $quiz=Quiz::where('group_id',$group)->where('topic_id',$topic)->get();
        foreach( $quiz as $quest ){
            Reply::create([
                'user_id'=>auth()->user()->id,
                'quizzes_id'=>$quest->id,
                'reply'=> null
            ]);
        }
        $total=count($quiz);
        $replied=Reply::where('user_id',Auth::user()->id);
        if($rep=$replied->where('quizzes_id',$quiz[$id]->id)->first()){
            $reply=$rep->reply;
        }
        if (!session()->has('exam_token')) {
            return redirect('/exam/prepare')->with('error', 'Anda harus memasukkan token terlebih dahulu');
        }
        $token=session()->get('exam_token');
        session()->flash('exam_token', $token);
        return view('quiz.quiztest', compact(['quiz','id','total','reply','group','replied','topic']));
    }

    public function reply(Request $request)
    {
        // dd($request);
       
        if($request->click==1){
        $quiz_id=$request->quest;
        $replied=Reply::where('user_id',$request->user)->where('quizzes_id',$quiz_id)->first();
        if($replied){
            Reply::where('id',$replied->id)->update([
                'reply'=>$request->answer
            ]);
        }
        else{
        // Reply::create([
        //     'user_id'=>$request->user,
        //     'quizzes_id'=>$quiz_id,
        //     'reply'=>$request->answer
        // ]);
        }
        }
        $token=session()->get('exam_token');
        session()->flash('exam_token', $token);
        return redirect($request->move);
    }
}
