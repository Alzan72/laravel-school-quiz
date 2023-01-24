<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Latihan\Schedule as LatihanSchedule;
use Illuminate\Http\Request;

class schedule extends Controller
{
    public function index()
    {
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

    
    
}

