<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserdonationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User_Card', function (Blueprint $table) {
            $table->increments('id');
            $table ->integer('user_id');
            $table->string('card_num');
            $table->string('cvv_num');
            $table->string('expiry_time');
            $table->string('name_card');
            $table->string('zip_code');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('User_Card');
    }
}