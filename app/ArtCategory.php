<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtCategory extends Model
{
    // use SoftDeletes;

    // protected $dates = ['deleted_at'];

    // artist
    public function artists() {
        return $this->belongsToMany('App\Artist', 'artist_art_categories', 'category_id', 'artist_id');
    }
}
