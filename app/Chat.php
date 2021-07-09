<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
  
class Chat extends Model
{
    public function fromUser(){
        return $this->belongsTo("App\User","from_id","id");
    }
    public function toUser(){
        return $this->belongsTo("App\User","to_id","id");
    }

    public function chatMessages(){
        return $this->hasMany("App\ChatMessages");
    }
}
