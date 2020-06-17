<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtCategory extends Model
{
    // artist
    public function artists() {
        return $this->belongsToMany('App\Artist');
    }
}
