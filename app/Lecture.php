<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecture extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'is_active', 'teacher_id', 'subject_id', 'user_id'];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function virtualClassrooms()
    {
        return $this->hasMany('App\VirtualClassroom');
    }

    public function students(){
        return $this->belongsToMany("App\Student");
    }


}
