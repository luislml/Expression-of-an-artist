<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    // user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // school
    public function school()
    {
        return $this->belongsTo('App\ArtSchool');
    }
    // artwork
    public function artworks()
    {
        return $this->hasMany('App\Artwork');
    }
    // artist CV
    public function cvs()
    {
        return $this->hasMany('App\ArtistCv');
    }
    // artist award
    public function awards()
    {
        return $this->hasMany('App\ArtistAward');
    }
    /* n:M */
    // categories
    public function categories() {
        return $this->belongsToMany('App\ArtCategory');
    }
    // events
    public function events() {
        return $this->belongsToMany('App\Event');
    }
}
