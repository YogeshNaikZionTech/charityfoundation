<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PVNotiff extends Model
{
    public $timestamps =true;
    public $table='pv_notiffs';
    protected $fillable = [
        'user_id','project_id','send_status',
    ];
}
