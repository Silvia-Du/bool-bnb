<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function Announcements(){
        return $this->belongsToMany("App\Announcement");
    }
}
