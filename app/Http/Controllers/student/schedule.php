<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\groupstudent;
use App\Models\Latihan\Lesson;
use App\Models\Latihan\Schedule as LatihanSchedule;
use App\Models\User;
use Illuminate\Http\Request;

class schedule extends Controller
{
    public function index()
    {
    //     $a=LatihanSchedule::all();
    //     foreach($a as $b){
    //     dd($b->lesson);
    // }
            return view('student.schedule',[
            'post'=>LatihanSchedule::all(),
            'title'=>'schedule'
        ]);
    // jika relation hasMany
    // $schedules = LatihanSchedule::all();
    // foreach ($schedules as $schedule) {
    // foreach($schedule->group as $sch){
    //     dd($sch->group_name);
    // } 
    }

    public function add()
    {
        return view('student.schedule_add',[
            'lesson'=>Lesson::all(),
            'us'
            'group'=>groupstudent::all()
        ]);
    }

    public function create(Request $insert)
    {
        $this->validate($insert,[
            'lesson'=>'required',
        ]);
        // dd($insert->lesson);
        LatihanSchedule::create([
            'user_id'=>$insert->user,
            'group_id'=>$insert->group,
            'schedule_id'=>$insert->lesson
        ]);
        return redirect('/schedule')->with('succes','Succes add schedule');
        
    }

    public function edit(LatihanSchedule $edit)
    {
    return view('student.schedule_edit',[
        'post' =>$edit,
        'lesson'=>Lesson::all(),
        'user'=>User::all(),
        'group'=>groupstudent::all()
    ]);
    }

    public function update(Request $update, LatihanSchedule $data)
    {
        $this->validate($update,[
            'lesson'=>'required',
            'user'=> 'required',
            'group'=>'required'
        ]);
        

    $data->where('id',$update->id)->update([
            'user_id'=>$update->user,
            'group_id'=>$update->group,
            'schedule_id'=>$update->lesson
        ]);
        return redirect('/schedule')->with('succes','Succes update schedule');

    }

    public function delete(LatihanSchedule $del)
    {
        $del->delete();

        return redirect('/schedule')->with('succes','Succes delete your data');
    }
    
}

