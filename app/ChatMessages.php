<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessages extends Model
{
    public function chat(){
        return $this->belongsTo("App\Chat");
    }
    public function fromUser(){
        return $this->belongsTo("App\User","from_id","id")->select("avatar","id","full_name");
    }
}
