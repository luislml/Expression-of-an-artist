<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artist extends Model
{
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    protected $dates = ['deleted_at'];
    protected $softCascade = ['cvs'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //revisar created_at 'created_at',
    protected $hidden = [
         'updated_at',
    ];
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
        return $this->belongsToMany('App\ArtCategory', 'artist_art_categories', 'artist_id', 'category_id');
    }
    // events
    public function events() {
        return $this->belongsToMany('App\Event');
    }
}
