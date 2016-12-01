<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AAFdonate extends Model
{
    public $timestamps =true;
    public $table='aaf_donate';
    protected $fillable = [
        'user_id', 'donation_type','receiptcard_id',
    ];

    public function User(){

        return $this->belongsTo('App\AFFdonate');
    }

}
