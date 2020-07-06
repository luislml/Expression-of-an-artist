<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    protected $dates = ['deleted_at'];
    protected $softCascade = ['artists'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRoles(array $roles)
    {
        foreach ($roles as $role) 
        {
            if ($this->role_id == $role ) 
            {
                return true;
            } 
        }
        return false; 
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    // artist
    public function artists()
    {
        return $this->hasMany('App\Artist');
    }
    // school
    public function schools()
    {
        return $this->hasMany('App\ArtSchool');
    }
}
