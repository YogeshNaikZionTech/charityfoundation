<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'avatar','phonenum', 'street', 'aptNo', 'state', 'country', 'zipcode',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function Event(){

        return $this->belongsToMany('App\Event', 'Donate_Event')->withPivot('event_cents')->withTimestamps();
    }

    public function Project(){

        return $this->belongsToMany('App\Project', 'Donate_Project')->withPivot('project_cents')->withPivot('receipt_num')->withTimestamps();
    }
}
