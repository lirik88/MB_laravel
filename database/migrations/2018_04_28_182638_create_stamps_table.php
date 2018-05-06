<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stamps', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('slug');
	        $table->integer('consumer_id');
	        $table->date('act_date');
	        $table->string('place_1')->nullable();
	        $table->string('place_2')->nullable();
	        $table->string('place_3')->nullable();
	        $table->string('place_4')->nullable();
	        $table->string('place_5')->nullable();
	        $table->string('place_6')->nullable();
	        $table->string('place_7')->nullable();
	        $table->string('number_1')->nullable();
	        $table->string('number_2')->nullable();
	        $table->string('number_3')->nullable();
	        $table->string('number_4')->nullable();
	        $table->string('number_5')->nullable();
	        $table->string('number_6')->nullable();
	        $table->string('number_7')->nullable();
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
        Schema::dropIfExists('Stamp');
    }
}
