<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	public $timestamps =true;
	public $table='event';
	protected $fillable = [
		'eventTitle', 'eventDescription', 'eventDate', 'eventStartTime', 'eventEndTime','eventstatus', 'eventimage', 'category',
	];

    public function  User(){

        return $this->belongsToMany('App\User', 'Donate_Event')->withPivot('event_cents')->withTimestamps();
    }
}
