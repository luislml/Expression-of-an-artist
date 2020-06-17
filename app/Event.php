<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // school
    public function school()
    {
        return $this->belongsTo('App\ArtSchool');
    }
    // artist
    public function artists() {
        return $this->belongsToMany('App\Artist');
    }
}
