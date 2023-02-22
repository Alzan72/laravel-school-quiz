<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\groupstudent;
use App\Models\Latihan\Quiz;
use Illuminate\Http\Request;
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
    {   $group=groupstudent::where('user_id',Auth::user()->id)->value('id');
        // dd($group);
        return view('quiz.create',compact('group'));
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
        
        Quiz::create($requestData);

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

        return view('quiz.show', compact('quiz'));
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

        return view('quiz.edit', compact('quiz'));
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
        
        $requestData = $request->all();
        
        $quiz = Quiz::findOrFail($id);
        $quiz->update($requestData);

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

    public function quizstart($group)
    {
        $quiziz=Quiz::where('group_id',$group)->get();
        $grouped=groupstudent::where('id',$group)->first();
        // dd($grouped->group_name);
        return view('quiz.quiz', compact(['grouped','quiziz']));
    }
}
