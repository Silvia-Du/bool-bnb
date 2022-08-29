<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorization extends Model

{
    public function announcements(){
        return $this->belongsToMany('App\Announcement');
    }
}
