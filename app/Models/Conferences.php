<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conferences extends Model
{
    protected $table = 'conference';

    protected $fillable = [
        'name_confer',
        'date_confer',
        'created_at',
        'updated_at',
    ];

    public function doctor_conf()
    {
        return $this->belongsToMany('App\Models\DoctoresConf', 'doctor_conference', 'conference_id' , 'doctors_id');
    }
    public function confersdoc()
    {
        return $this->hasMany('App\Models\DoctorsConferences', 'conference_id', 'id');
    }

}
