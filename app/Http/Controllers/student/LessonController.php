<?php

namespace App\Http\Controllers\student;

use App\Models\Latihan\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.lesson_index',[
            'post'=>Lesson::all(),
            'title'=>'lesson'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.lesson_insert',[
            'post'=>Lesson::all(),
            'title'=>'lesson'

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'start_at'=>'required',
            'end_at'=>'required'
        ]);

        Lesson::create([
            'name'=>$request->name,
            'start'=>$request->start_at,
            'end'=>$request->end_at
        ]);

       return redirect()->route('lesson.index')->with('succes','Succes Add Your Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('student.lesson_edit',[
            'post'=>$lesson,
            'title'=>'index'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $lesson)
    {
        // dd($request->all());
        $this->validate($request,[
            'name'=>'required',
            'start_at'=>'required',
            'end_at'=>'required'
        ]);
    
        $lesson = Lesson::findOrFail($lesson);
        $lesson->update([
            'name'=>$request->name,
            'start'=>$request->start_at,
            'end'=>$request->end_at
        ]);
    
        return redirect()->route('lesson.index')->with('success','Succes update your data');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $lesson, Lesson $data)
    {
       
        foreach ($lesson->remove as  $value) {
            $data->find($value)->delete();
        }
        return redirect()->route('lesson.index')->with('succes','Succes delete the lesson');

    }
}
