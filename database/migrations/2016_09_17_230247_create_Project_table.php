<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

	    public function up()
	    {
		    Schema::create('project', function (Blueprint $table) {
			    $table->increments('id');
			    $table->string('project_Title');
			    $table->text('project_Description');
			    $table->date('project_Date');
			    $table->string('project_location');
			    $table->dateTime('project_StartTime');
			    $table->string('project_Status');
			    $table->string('project_Image');
			    $table->string('category_ID');
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
		    Schema::dropIfExists('project');
	    }


}
