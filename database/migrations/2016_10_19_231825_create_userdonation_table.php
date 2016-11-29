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
        Schema::create('user_card', function (Blueprint $table) {
            $table->increments('id');
            $table ->integer('user_id')->references('id')->on('users') ->onDelete('cascade');;
            $table->string('card_num',500);
            $table->string('cvv_num');
            $table->string('expiry_date');
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
        Schema::dropIfExists('user_card');
    }
}
