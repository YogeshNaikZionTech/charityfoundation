<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	public $timestamps =false;
	protected $fillable = [
		'eventTitle', 'eventDescription', 'eventDate', 'eventStartTime', 'eventEndTime','eventstatus', 'eventimage', 'category', 'created_at', 'updated_at',
	];
}
