<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Possacadmy extends Model
{

    protected $table = 'services';


    protected $fillable = [
        'photo','title', 'text', 'is_active', 'created_at', 'updated_at'
    ];

}
