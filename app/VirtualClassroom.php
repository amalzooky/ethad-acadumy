<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VirtualClassroom extends Model
{
    use SoftDeletes;

    public function lecture()
    {
        return $this->belongsTo('App\Lecture');
    }
    public function note()
    {
        return $this->hasMany('App\Note');
    }

    public function getRecordingUrlAttribute($url)
    {
        return str_replace('http://','https://',$url);
    }

    public function getPresenterUrlAttribute($url)
    {
        return str_replace('http://','https://',$url);
    }

    public function setRecordingUrlAttribute($url)
    {
        $this->attributes['recording_url'] =  str_replace('http://','https://',$url);
    }

    public function setPresenterUrlAttribute($url)
    {
        $this->attributes['presenter_url'] =  str_replace('http://','https://',$url);
    }
}
