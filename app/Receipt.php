<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public $timestamps =true;
    public $table='projectd_receipt';
    protected $fillable = [
        'donate_id', 'card_id','amount_cents','receipt_num',
    ];
}
