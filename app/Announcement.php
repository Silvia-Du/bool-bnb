<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Announcement extends Model

{

    public function user(){
        return $this->belongsTo("App\User");
    }

    public function messages(){
        return $this->hasMany("App\Message");
    }

    public function sponsorizations(){
        return $this->belongsToMany('App\Sponsorization');
    }

    public static function slugGenerator($title){

        $slug = Str::slug($title, '-');
        $slug_new_announcement = $slug;
        $counter = 1;
        $same_announcement = Announcement::where('slug', $slug)->first();
        while($same_announcement){
            $slug = $slug_new_announcement.'-'.$counter;
            $same_announcement = Announcement::where('slug', $slug)->first();
            $counter ++;
        }
        return $slug;
    }
}
