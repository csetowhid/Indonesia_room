<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkins', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->integer('room_id');
            $table->dateTime('admit_date');
            $table->string('ptype');
            $table->string('company_name');
            $table->string('categories');
            $table->string('swab_test_type');
            $table->string('swab_test_result');
            $table->string('advance_payment');
            $table->string('test_file')->nullable();
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
        Schema::dropIfExists('checkins');
    }
}
