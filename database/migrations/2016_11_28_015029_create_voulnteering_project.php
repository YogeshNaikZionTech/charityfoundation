<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoulnteeringProject extends Migration
{
    /**
     * Run the migrations.
     * monthly donation table is created here.
     * @return void
     */
    public function up()
    {
        Schema::create('pm_notif', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pdonate_id');//this id is from donate_project pivot table;
            $table->integer('user_id');
            $table->dateTime('status_date');
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
        Schema::dropIfExists('pm_notif');
    }
}
