<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    protected $fillable = ['name', 'year', 'is_active', 'user_id'];

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }
}
