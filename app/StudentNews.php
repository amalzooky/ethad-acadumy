<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentNews extends Model
{
    
    public function major()
    {
        return $this->belongsTo('App\Major');
    }
}
