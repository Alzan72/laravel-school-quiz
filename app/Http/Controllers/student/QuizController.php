<?php

namespace App\Http\Controllers\student;

use App\Http\Requests;
use App\Models\keyanswers;
use App\Models\groupstudent;
use App\Models\Latihan\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $quiz = Quiz::where('group_id', 'LIKE', "%$keyword%")
                ->orWhere('number', 'LIKE', "%$keyword%")
                ->orWhere('question', 'LIKE', "%$keyword%")
                ->orWhere('answer1', 'LIKE', "%$keyword%")
                ->orWhere('answer2', 'LIKE', "%$keyword%")
                ->orWhere('answer3', 'LIKE', "%$keyword%")
                ->orWhere('answer4', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $quiz = Quiz::latest()->paginate($perPage);
        }

        return view('quiz.index', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   $group=groupstudent::where('user_id',Auth::user()->id)->first();
        $topic=Topic::all();
        // dd($group->group_name);
        return view('quiz.create',compact(['group','topic']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
       
        $requestData = $request->all();
        $quiz=Quiz::create($requestData);
        // dd($quiz->id);
        keyanswers::create([
            'quizzes_id'=>$quiz->id,
            'answer'=>$request->answer
        ]);
        return redirect("/group/quiz/$request->group_id")->with('flash_message', 'Quiz added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
        $answer=keyanswers::where('quizzes_id',$id)->first()->answer;
        // dd($answer);
        return view('quiz.show', compact(['quiz','answer']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        $answer=keyanswers::where('quizzes_id',$id)->first()->answer;
        return view('quiz.edit', compact(['quiz','answer']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // dd($request->answer);
        $requestData = $request->all();
        $quiz = Quiz::findOrFail($id);
        $quiz->update($requestData);
        keyanswers::where('quizzes_id',$id)->update([
            'answer'=>$request->answer
        ]);

        return redirect("/group/quiz/$request->group_id")->with('flash_message', 'Quiz updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Quiz::destroy($id);

        return redirect('quiz/quiz')->with('flash_message', 'Quiz deleted!');
    }

    public function quiztest($group)
    {
        $quiziz=Quiz::where('group_id',$group)->get();
        $grouped=groupstudent::where('id',$group)->first();
        // dd($grouped->group_name);
        return view('quiz.quiz', compact(['grouped','quiziz']));
    }
    public function quizstart($group,$id)
    {  $reply='';
        $group=groupstudent::where('user_id',Auth::user()->id)->first();
        // dd($group->id);
        $quiz=Quiz::where('group_id',$group->id)->get();
        $total=count($quiz);
        $replied=Reply::where('user_id',Auth::user()->id);
        // dd($replied->where('quizzes_id',$quiz[$id]->id)->first());
        if($rep=$replied->where('quizzes_id',$quiz[$id]->id)->first()){
            $reply=$rep->reply;
        }
        // dd($quiz[0]);/
        // $quiz = Quiz::findOrFail($id);
        return view('quiz.quiztest', compact(['quiz','id','total','reply','group','replied']));
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
        Reply::create([
            'user_id'=>$request->user,
            'quizzes_id'=>$quiz_id,
            'reply'=>$request->answer
        ]);
        }
        }
        return redirect($request->move);
    }
}
