<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalreports', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->integer('checkin_id');
            $table->string('doctor_name');
            $table->string('nurse_name');
            $table->dateTime('date');
            $table->string('temperature');
            $table->string('blood_pressure');
            $table->string('oxygen_saturation');
            $table->string('breathing');
            $table->float('report_cost');
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('medicalreports');
    }
}
