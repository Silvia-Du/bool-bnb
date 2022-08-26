<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function Announcement(){
        return $this->belongsTo("App\Announcement");
    }
}
