<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistAward extends Model
{
    // artist
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }
}
