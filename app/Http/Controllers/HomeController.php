<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Latihan\Student;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if( Auth::user()->role !='student'){
            return view('student.index',[
                'post'=> Student::all()
             ]);
        }else{
            return view('student-quiz.dashboard');
        }
        // return view('home');
    }
}
