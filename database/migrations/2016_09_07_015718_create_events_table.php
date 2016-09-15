<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('eventTitle');
	        $table->text('eventDescription');
	        $table->date('eventDate');
	        $table->dateTime('eventStartTime');
	        $table->dateTime('eventEndTime');
	         $table->string('eventstatus');
	        $table->string('eventImage');
	        $table->string('category');
	        $table->dateTime('updated_at');
	        $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
