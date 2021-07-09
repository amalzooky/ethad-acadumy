<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $table = 'services';


    protected $fillable = [
        'photo','title', 'text', 'is_active', 'created_at', 'updated_at'
    ];

}
