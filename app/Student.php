<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = ['major_id', 'user_id','membership_no'];

    public function user(){
        return $this->belongsTo("App\User");
    }

    public function school(){
        return $this->belongsTo("App\School");
    }

    public function major(){
        return $this->belongsTo("App\Major");
    }

    public  function subjects()
    {
        return $this->belongsToMany("App\Subject");
    }

    public function lectures(){
        return $this->belongsToMany("App\Lecture");
    }

    public function studentClasses(){
        return $this->hasMany('App\StudentClass');
    }

    public function studentNotes()
    {
        return $this->hasMany('App\StudentNote');
    }
}
  