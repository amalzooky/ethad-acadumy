<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lectures()
    {
        return $this->hasMany('App\Lecture');
    }

  
}
