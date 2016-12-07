<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyAFFnoiify extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aafm_notif', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aaf_id');//this id is from donate_project pivot table;
            $table->integer('user_id');
            $table->date('status_date');
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
         Schema::dropIfExists('aafm_notif');
    }
}
