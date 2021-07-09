<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Whyuse extends Model
{



    protected $table = 'whyuses';


    protected $fillable = [
        'photo','title', 'text', 'is_active', 'created_at', 'updated_at'
    ];


}
