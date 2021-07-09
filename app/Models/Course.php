<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';


    protected $fillable = [
        'photo','cour_name', 'cour_text', 'price' , 'cout_time', 'cour_duration','is_active', 'created_at', 'updated_at'
    ];


}
