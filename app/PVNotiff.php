<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PVNotiff extends Model
{
    public $timestamps =true;
    public $table='pm_notif';
    protected $fillable = [
        'user_id','pdonate_id',
    ];
}
