<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistCv extends Model
{
    // artist
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }
}
