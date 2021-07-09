<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Latestnews extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo("App\User");
    }
}
