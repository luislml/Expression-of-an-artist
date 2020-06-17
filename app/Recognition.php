<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recognition extends Model
{
    // school
    public function school()
    {
        return $this->belongsTo('App\ArtSchool');
    }
}
