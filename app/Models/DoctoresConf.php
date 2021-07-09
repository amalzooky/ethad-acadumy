<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctoresConf extends Model
{
    protected $table = 'docsconfs';

    protected $fillable = [
        'doct_name',
        'doct_job',
    ];
    public $timestamps = false;

    public function conferencess()
    {
        return $this->belongsTo('App\Models\Conferences', 'conference_id');
    }
//    public $timestamps = false;

    public function doc_confers()
    {
        return $this->hasMany('App\Models\DoctorsConferences', 'doctors_id', 'id');
    }




    public function conferences()
    {
        return $this->belongsToMany('App\Models\Conferences','DoctorsConferences','student_id','subject_id');
    }
}
