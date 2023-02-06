<?php

namespace App\Models\Latihan;

use App\Models\groupstudent;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    
    public function group()
    {
        return $this->belongsTo(groupstudent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
