<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AAMnotiff extends Model
{
    public $timestamps =true;
    public $table='aafm_notif';
    protected $fillable = [
        'user_id','aaf_id','status_date',
    ];
}
