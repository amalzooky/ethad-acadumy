<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function student(){
        return $this->belongsTo("App\Student");
    }

    public function teacher(){
        return $this->belongsTo("App\Teacher");
    }

    public function virtualClassroom(){
        return $this->belongsTo("App\VirtualClassroom");
    }
}
