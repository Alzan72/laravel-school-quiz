<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\groupstudent;
use Illuminate\Http\Request;

class Group extends Controller
{
    public function index()
    {
        return view('student.group',[
            'post'=>groupstudent::all(),
            'title'=>'group'
        ]);
    }
    public function group(groupstudent $id)
    {
        return view('student.group_list',[
            
            'post'=>$id,
            'title'=>'group-list'
        ]);
    }
}
