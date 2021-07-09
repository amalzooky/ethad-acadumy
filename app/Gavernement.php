<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gavernement extends Model
{
    use SoftDeletes;
    protected $table = 'governorates';

    protected $fillable = [
        'id','governorate_name_ar', 'governorate_name_en'
    ];




    public function users()
    {
        return $this->hasMany('App\User');
    }

}
