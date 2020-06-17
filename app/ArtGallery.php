<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtGallery extends Model
{
    // artwork
    public function artwork()
    {
        return $this->belongsTo('App\Artwork');
    }
}
