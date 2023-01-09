<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 	
use Illuminate\Support\Facades\DB;

class TabelController extends Controller
{
    public function index()
    {
    	// mengambil data dari table syllabus
    	$syllabus = DB::table('silabus')->get();
        
    	// mengirim data syllabus ke view index
    	return view('latihan/tabel', ['syllabus' => $syllabus]);
 
    }
}
