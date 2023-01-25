<?php

namespace App\Models\Latihan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function students()
    {   
        // dd($this->belongsTo(Student::class));
        return $this->belongsTo(Student::class,'student_id');
    }

    public function name()
    {
        return $this->students();
    }

    public function schedule()
    {
        // dd($this->belongsTo(Schedule::class));
        return $this->belongsTo(Schedule::class);
    }

    // public function lesson()
    // {
    //     return $this->schedule->lesson();
    // }
     
}
