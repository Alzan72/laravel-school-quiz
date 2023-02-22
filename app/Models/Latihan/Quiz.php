<?php

namespace App\Models\Latihan;

use App\Models\groupstudent;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quizzes';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['group_id', 'number', 'question', 'answer1', 'answer2', 'answer3', 'answer4'];


    public function group()
    {
        return $this->belongsTo(groupstudent::class);
    }

    
}
