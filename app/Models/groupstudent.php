<?php

namespace App\Models;

use App\Models\Latihan\Schedule;
use App\Models\Latihan\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupstudent extends Model
{
    use HasFactory;
    protected $guarded=['id'];  // Semua boleh diisi kecuali id
    
    public function students()
    {
        return $this->hasMany(Student::class,'group_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class,'group_id');
    }
}
