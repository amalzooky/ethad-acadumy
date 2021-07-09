<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'is_active', 'image', 'user_id'];

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

    public  function students()
    {
        return $this->hasMany("App\Student");
    }

    public function studentNews()
    {
        return $this->hasMany('App\StudentNews');
    }
}
 