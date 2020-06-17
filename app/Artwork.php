<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    // artist
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }
    // gallery
    public function gallery()
    {
        return $this->hasMany('App\ArtGallery');
    }
}
