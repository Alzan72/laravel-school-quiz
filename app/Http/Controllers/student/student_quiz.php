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
        // dd($id);
        $replied=Reply::where('user_id',auth()->user()->id)->where('exam_id',$id->id)->first();
        return view('student-quiz.prepare',[
            'exam'=>$id,
            'replied'=>$replied
        ]);
    }
    public function token(Request $request)
    {
        $exam_id=$request->id;
        $token=Exam::where('id', $exam_id)->first()->token;
        if($request->token !=$token){
            return back()->with('error','Token salah!!');
        }else{
            $topic=Exam::where('id', $exam_id)->first()->topic_id;
            $group=Auth::user()->student->group_id;
            $quiz=Quiz::where('group_id',$group)->where('topic_id',$topic)->get();
         foreach( $quiz as $quest ){
            Reply::create([
                'user_id'=>auth()->user()->id,
                'quizzes_id'=>$quest->id,
                'reply'=> null,
                'exam_id'=>$exam_id
            ]);
             }
            // sesion
            session()->flash('exam_token', "$request->token-$exam_id");
            return redirect("/quiz/$group/$topic/start/0");
        }
    }

 public function quizstart($group, $topic, $id)
{
    $reply = '';
    $top = Topic::where('id', $topic)->first()->status;
    if ($top != 'aktif') {
        return redirect('/student/exam')->with('alert', 'Soal telah di tutup');
    }

    $group = Auth::user()->student->group_id;
    $quiz = Quiz::where('group_id', $group)->where('topic_id', $topic)->get();
    $total = count($quiz);
    $exam = explode('-', session()->get('exam_token'));
    $ex = end($exam);

    // Menampilkan jawaban yang sudah diberikan pada soal saat ini
    $replied = Reply::where('user_id', Auth::user()->id)->where('exam_id', $ex);
     $repli_user =Reply::where('user_id', Auth::user()->id)->where('exam_id', $ex)->where('reply',null)->get();
    // Cari jawaban dari soal yang sedang dikerjakan
    if ($rep = $replied->where('quizzes_id', $quiz[$id]->id)->first()) {
        $reply = $rep->reply;
    }
    // dd($replied->where('quizzes_id', $quiz[$id]->id)->first());
    if (!session()->has('exam_token')) {
        return redirect('/student/exam')->with('alert', 'Anda harus memasukkan token terlebih dahulu');
    }
    $token = session()->get('exam_token');
    session()->flash('exam_token', $token);
    return view('quiz.quiztest', compact(['quiz', 'id', 'total', 'reply', 'group'   , 'topic', 'ex', 'repli_user']));
}


    public function reply(Request $request)
    {
        if($request->click==1){
        $quiz_id=$request->quest;
        $replied=Reply::where('user_id',Auth::user()->id)->where('quizzes_id',$quiz_id)->where('exam_id',$request->exam)->first();
        if($replied){
            Reply::where('id',$replied->id)->update([
                'reply'=>$request->answer
            ]);
        }
        }
        $token=session()->get('exam_token');
        session()->flash('exam_token', $token);
        return redirect($request->move);
    }
}
