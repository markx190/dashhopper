<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCivilStatusColumnOnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_civil_status')->length(60)->after('user_gender');
            $table->string('user_birth_month')->length(20)->after('user_age');
            $table->string('user_birth_day')->length(20)->after('user_birth_month');
            $table->string('user_birth_year')->length(20)->after('user_birth_day');
            $table->string('user_place_of_birth')->length(90)->after('user_birth_year');
            $table->string('user_religion')->length(90)->after('user_place_of_birth');
            $table->string('user_abroad_exp')->length(60)->after('country');
            $table->string('user_ex_country')->length(60)->after('user_abroad_exp');
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
