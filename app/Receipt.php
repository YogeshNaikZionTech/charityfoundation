<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public $timestamps =true;
    public $table='projectd_receipt';
    protected $fillable = [
        'donate_id', 'ucard_id','amount_cents','type','receipt_num',
    ];

    public function Ucard(){

        return $this->belongsTo('App\Ucard');
    }
}
