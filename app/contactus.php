<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactus extends Model
{
	public $table = "contactus";
	public $timestamps = false;
     protected $fillable = [
	'name', 'email', 'message', 'tstamp',
];
}
