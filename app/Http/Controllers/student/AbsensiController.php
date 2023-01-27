<?php

namespace App\Http\Controllers\student;

use DateTimeZone;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Latihan\Absensi;
use App\Models\Latihan\Student;
use App\Models\Latihan\Schedule;
use App\Http\Controllers\Controller;

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
        $ti = Carbon::now('Asia/Jakarta');
        $time = $ti->format('H:i:s');
    
        $schedules = Schedule::with('lesson')->get();
        $validSchedules = [];
        foreach($schedules as $schedule){
            $sd = $schedule->lesson->start;
            // Mengubah waktu start menjadi objek Carbon
            $startTime = Carbon::createFromFormat('H:i:s', $sd);
            // Menambahkan 10 menit pada waktu start
            $startTime->addMinutes(10);
            $start=$startTime->format('H:i:s');
            if ($time >= $sd && $time <= $start) {
                $validSchedules[] = $schedule;
            }
        }

        // dd($time);
        return view('student.absensi_insert', [
            'student' => Student::all(),
            'schedule' => $validSchedules,
            'title' => 'index'
        ]);
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
