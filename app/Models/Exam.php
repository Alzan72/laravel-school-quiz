<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exams';

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
    protected $fillable = ['name', 'dekskripsi', 'topic_id', 'start', 'end', 'group_id', 'time', 'point', 'token', 'status'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function group()
    {
        return $this->belongsTo(groupstudent::class);
    }
    
}
