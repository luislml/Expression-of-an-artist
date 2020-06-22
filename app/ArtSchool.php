<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtSchool extends Model
{
    protected $fillable = [
        'user_id', 'name_school', 'location', 'about', 'mission', 'vision', 'state'
    ];
    // user
    public function admin()
    {
        return $this->belongsTo('App\User', 'admin_id');
    }
    // artist
    public function artists()
    {
        return $this->hasMany('App\Artist');
    }
    // recognition
    public function recognitions()
    {
        return $this->hasMany('App\Recognition');
    }
    // events
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
