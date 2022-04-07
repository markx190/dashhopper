<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYearsOfExperienceColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('years_of_exp')->length(20)->after('job_type');
            $table->string('area_of_specialty')->length(90)->after('position_applied');
            $table->string('user_age')->length(12)->after('user_suffix');
            $table->string('user_gender')->length(20)->after('user_age');
            $table->string('date_of_birth')->length(40)->after('user_gender');
            $table->string('place_of_birth')->length(90)->after('hic_province');
            $table->string('prc_number')->length(20)->after('area_of_specialty');
            $table->string('passport_number')->length(20)->after('prc_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
