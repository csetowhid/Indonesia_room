<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mealreports', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->integer('checkin_id');
            $table->string('meal');
            $table->string('delivered_by');
            $table->string('food_name');
            $table->float('food_price');
            $table->dateTime('time');
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
        Schema::dropIfExists('mealreports');
    }
}
