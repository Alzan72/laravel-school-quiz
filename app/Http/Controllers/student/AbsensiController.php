<?php

namespace App\Http\Controllers\student;

use App\Models\Latihan\Absensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Latihan\Schedule;
use App\Models\Latihan\Student;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.absensi_list',[
            'post'=>Absensi::all(),
            'no'=>1,
            'title'=>'absensi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.absensi_insert',[
            'student'=>Student::all(),
            'schedule'=>Schedule::all(),
            'title'=>'index'
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
            'status'=>'required'
        ]);
        // dd($request->all());
        foreach($request->status as $name=> $status){
            $note = $request->note[$name];
            Absensi::create([
                'student_id'=>$name,
                'status'=>$status,
                'note'=>$note,
                'schedule_id'=>$request->schedule
            ]);
        }
        
        
       return redirect()->route('presence.index')->with('succes','Succes');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
