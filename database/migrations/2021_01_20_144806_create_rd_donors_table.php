<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRdDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rd_donors', function (Blueprint $table) {
            $table->increments('id');
			$table->string('donor_id_no')->length(12);
            $table->string('firstname')->length(90);
			$table->string('lastname')->length(90);
            $table->string('middlename')->length(90)->nullable();
            $table->string('gender')->length(20)->nullable();
            $table->string('age')->length(10)->nullable();
            $table->string('birth_month')->length(20)->nullable();
            $table->string('birth_day')->length(10)->nullable();
            $table->string('birth_year')->length(10)->nullable();
			$table->string('blood_type')->length(60)->nullable();           
            $table->string('donation_month')->length(20)->nullable();
            $table->string('donation_day')->length(10)->nullable();
            $table->string('donation_year')->length(10)->nullable();
            $table->string('region')->length(120)->nullable();
            $table->string('blood_centers')->length(120)->nullable();
            $table->string('hic_name')->length(120)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('rd_donors');
    }
}
