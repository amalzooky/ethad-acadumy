<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    
    public function users()
    {
        return $this->hasMany('App\User');
    }


    
}
