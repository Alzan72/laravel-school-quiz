<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function index()
    {
        return view('survey.index');
    }

    public function insert(Request $request)
    {
            Survey::create([
            'survey'=>$request->value
        ]);
    }
}
