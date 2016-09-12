<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
	        $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
	        $table->string('avatar')->default('default.png');
	        $table->integer('phonenum')->default(0000);
	        $table->string('street')->default('None');
	        $table->integer('aptNo')->default(00000);
	        $table->string('state')->default('None');
	        $table->string('country')->default('None');
	        $table->integer('zipcode')->default(00000);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
