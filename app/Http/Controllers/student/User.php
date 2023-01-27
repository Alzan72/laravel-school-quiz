<?php

namespace App\Http\Controllers\student;

use App\Models\User as us;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\groupstudent;

class User extends Controller
{
    public function index()
    {
        return view('student.user',[
            'post'=>us::all(),
            'title'=>'user'
        ]);
    }

    
}
