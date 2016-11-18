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
	        $table->string('phonenum')->default(1234567890);
	        $table->string('street')->default('None');
	        $table->integer('aptNo')->default(123);
	        $table->string('state')->default('None');
	        $table->string('country')->default('None');
	        $table->integer('zipcode')->default(12345);
	        $table->boolean('isAdmin')->default(false);
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
