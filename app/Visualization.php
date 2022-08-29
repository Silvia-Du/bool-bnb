<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visualization extends Model
{
    public function announcement(){
        return $this->belongsTo("App\announcement");
    }
}
