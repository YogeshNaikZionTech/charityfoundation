<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactus extends Model
{
	public $table = "contactus";
     protected $fillable = [
	'firstname', 'lastname', 'email', 'message',
];
}
