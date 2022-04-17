<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripPassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_passengers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bus_id_no')->length(12);
			$table->string('travel_id_no')->length(12);
            $table->string('passenger_id_no')->length(60);
            $table->string('bus_number')->length(60)->nullable();
			$table->string('bus_type')->length(60);
            $table->string('company_name')->length(60)->nullable();
            $table->string('origin_address')->length(90)->nullable();
            $table->string('destination_address')->length(90)->nullable();
            $table->string('site_terminal')->length(60)->nullable();
            $table->string('travel_date')->length(10)->nullable();
            $table->string('travel_time')->length(10)->nullable();
            $table->string('time_ap')->length(12)->nullable();
            $table->string('first_name')->length(60)->nullable();
            $table->string('middle_name')->length(60)->nullable();
            $table->string('last_name')->length(60)->nullable();
            $table->string('gender')->length(10)->nullable();
            $table->string('age')->length(10)->nullable();
            $table->string('p_address')->length(90)->nullable();
            $table->string('fare_amount')->length(12)->nullable();
            $table->string('passenger_type')->length(60)->nullable();
            $table->string('ref_number')->length(40)->nullable();
            $table->string('p_status')->length(60)->nullable();
            $table->string('payment_method')->length(60)->nullable();
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
        Schema::dropIfExists('trip_passengers');
    }
}
