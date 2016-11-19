<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EVNotiff extends Model
{
    public $timestamps =true;
    public $table='ev_notiffs';
    protected $fillable = [
        'user_id','event_id','send_status',
    ];


}
