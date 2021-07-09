<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HonoraryBoard extends Model
{
    protected $fillable = ['name', 'image', 'is_active', 'marker', 'year','university','major', 'interview_url'];

}
