<?php

namespace App\Models\Latihan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class,'lesson_id');
    }
}
