<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToConsumers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consumers', function (Blueprint $table) {
            $table->string('object_address')->nullable();
            $table->string('member_position')->nullable();
            $table->string('member_position_p')->nullable();
            $table->string('member_name')->nullable();
            $table->string('member_name_p')->nullable();
	        $table->integer('contract_id')->default(1);
	        $table->string('contract_number')->nullable();
	        $table->date('contract_date')->nullable();
	        $table->text('conclusion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consumers', function (Blueprint $table) {
	        $table->dropColumn('object_address');
	        $table->dropColumn('member_position');
	        $table->dropColumn('member_position_p');
	        $table->dropColumn('member_name');
	        $table->dropColumn('member_name_p');
	        $table->dropColumn('contract_id');
	        $table->dropColumn('contract_number');
	        $table->dropColumn('contract_date');
	        $table->dropColumn('conclusion');
        });
    }
}
