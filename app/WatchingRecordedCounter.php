<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchingRecordedCounter extends Model
{
    public function student(){
        return $this->belongsTo("App\Student");
    }



    public function virtualClassroom()
    {
        return $this->belongsTo('App\VirtualClassroom');
    }
}
