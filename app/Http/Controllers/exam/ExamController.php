<?php

namespace App\Http\Controllers\exam;

use App\Models\Exam;
use App\Models\User;

use App\Models\Reply;
use App\Models\Topic;
use App\Http\Requests;
use App\Models\keyanswers;
use App\Models\groupstudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
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
            $exam = Exam::where('name', 'LIKE', "%$keyword%")
                ->orWhere('dekskripsi', 'LIKE', "%$keyword%")
                ->orWhere('topic_id', 'LIKE', "%$keyword%")
                ->orWhere('start', 'LIKE', "%$keyword%")
                ->orWhere('end', 'LIKE', "%$keyword%")
                ->orWhere('group_id', 'LIKE', "%$keyword%")
                ->orWhere('time', 'LIKE', "%$keyword%")
                ->orWhere('point', 'LIKE', "%$keyword%")
                ->orWhere('token', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $exam = Exam::latest()->paginate($perPage);
        }

        return view('exam.exam.index', compact('exam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $topic=Topic::all();
        $group=groupstudent::where('user_id',auth()->user()->id)->first();
        return view('exam.exam.create',compact(['topic','group']));
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
        
        Exam::create($requestData);

        return redirect('exam/exam')->with('flash_message', 'Exam added!');
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
        $exam = Exam::findOrFail($id);
        $topic=Topic::all();
        return view('exam.exam.show', compact(['topic','exam']));
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
        $exam = Exam::findOrFail($id);
        $topic=Topic::all();
        return view('exam.exam.edit', compact(['exam','topic']));
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
        
        $exam = Exam::findOrFail($id);
        $exam->update($requestData);

        return redirect('exam/exam')->with('flash_message', 'Exam updated!');
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
        Exam::destroy($id);

        return redirect('exam/exam')->with('flash_message', 'Exam deleted!');
    }

   public function score($exam)
{   
    $reply=Reply::where('exam_id',$exam)->get();
    $ex=Exam::where('id',$exam)->first();
    $rep=$reply->groupBy('user_id');
    $an=keyanswers::all();
    $user=User::all();

    return view('exam.exam.score',compact(['rep','ex','an','user']));
}

}
