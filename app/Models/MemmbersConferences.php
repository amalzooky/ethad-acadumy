<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemmbersConferences extends Model
{
    protected $table = 'regist_conferen';

    protected $fillable = [
        'name_conf', 'sex','tel_conf','email_conf', 'cover_conf', 'adress_conf', 'job_conf'
    ];
    public $timestamps = false;


}
