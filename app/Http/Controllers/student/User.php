<?php

namespace App\Http\Controllers\student;

use App\Models\User as us;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\groupstudent;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{
    public function index()
    {
        $data=us::where('id',Auth::user()->id)->get();
        return view('student.user',[
            'post'=>$data,
            'title'=>'user'
        ]);
    }

    
}
