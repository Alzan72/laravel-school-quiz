<?php

namespace App\Http\Controllers\student;

use DateTimeZone;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Latihan\Absensi;
use App\Models\Latihan\Student;
use App\Models\Latihan\Schedule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $data=Absensi::all();
       return view('student.absensi',[
        'post'=>$data->unique('schedule_id')->values(),
        // 'schedule'=>$data->schedule->lesson->unique('name'),
        'title'=>'presence' 
       ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $timeNow = Carbon::now(new DateTimeZone('Asia/Jakarta'));
        $time = $timeNow->format('H:i:s');
        // dd($time);
        $schedules = Schedule::with('lesson')->where('user_id',Auth::user()->id)->get();
        $validSchedules = [];
        foreach($schedules as $schedule){
            $sd = $schedule->lesson->start;
            // Mengubah waktu start menjadi objek Carbon
            $startTime = Carbon::parse($sd);
            // Menambahkan 10 menit pada waktu start
            $waktu = $startTime->addMinutes(10);
            $start = $waktu->format('H:i:s');
            if ($time >=$sd && $time <= $start) {
                $validSchedules[] = $schedule;
            }
        }
    
        return view('student.absensi_insert', [
            'student' => Student::all(),
            'schedule' => $validSchedules,
            'title' => 'index'
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
            'status'=>'required',
            'schedule'=>'required'
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
    public function lesson(Absensi $absensi)
    {
         $abs=$absensi->schedule_id;
        // dd($abs);
        return view('student.absensi_list',[
            'post'=>Absensi::where('schedule_id',$abs)->get(),
            'no'=>1,
            'title'=>'absensi'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function Edit(Absensi $absensi)
    {   
    //     foreach($absensi->students as $abs){
    //    } dd($abs->id);
        return view('student.absensi_edit',[
            'post'=> $absensi,
            'schedule'=>Schedule::all()
        ]);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
    }
}
