<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class StudentClass extends Model
{

    protected $fillable = ['url', 'virtual_classroom_id', 'student_id'];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function getUrlAttribute($url)
    {
        return str_replace('http://','https://',$url);
    }

    public function setUrlAttribute($url)
    {
        $this->attributes['url'] =  str_replace('http://','https://',$url);
    }
}
