<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ucard extends Model
{

    public $timestamps =true;
    public $table='user_card';
    protected $fillable = [
        'user_id', 'card_num','cvv_num','expiry_date','name_card','zip_code',
    ];

    public function User(){

        return $this->belongsTo('App\User');
    }


}
