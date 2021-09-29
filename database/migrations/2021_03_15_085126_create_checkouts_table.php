<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('patient_name')->nullable();
            $table->integer('room_id');
            $table->string('advance_payment')->nullable();
            $table->string('swab_test_type')->nullable();
            $table->dateTime('swab_test_date')->nullable();
            $table->string('swab_test_result')->nullable();
            $table->string('upload_test_result')->nullable();
            $table->longText('test_clearance_note')->nullable();
            $table->dateTime('checkout_date')->nullable();
            $table->longText('note')->nullable();
            $table->float('meal_cost');
            $table->float('report_cost');
            $table->float('medicine_cost');
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
        Schema::dropIfExists('checkouts');
    }
}
