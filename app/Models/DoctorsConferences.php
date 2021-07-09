<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorsConferences extends Model
{
    protected $table = 'doctor_conference';

    protected $fillable = [
        'conference_id',
        'doctors_id',
    ];
    public $timestamps = false;

    public function conferencess()
    {
        return $this->belongsTo('App\Models\Conferences', 'conference_id');
    }


    public function doc_confers()
    {
        return $this->belongsTo('App\Models\DoctoresConf', 'doctors_id');
    }
//    public $timestamps = false;

}

