<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post2 extends Model
{
    use HasFactory;

  //  protected $fillable=['title','excerpt','body']; Memilih field yang boleh di isi
  protected $guarded=['id'];  // Semua boleh diisi kecuali id
}
