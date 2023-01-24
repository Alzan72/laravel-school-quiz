<?php

namespace App\Models\Latihan;

use App\Models\groupstudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function group()
    {
        return $this->belongsTo(groupstudent::class);
    }
}
