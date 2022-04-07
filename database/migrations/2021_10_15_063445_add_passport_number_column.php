<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPassportNumberColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('passport_exp_month')->length(20)->after('passport_number');
            $table->string('passport_exp_day')->length(20)->after('passport_exp_month');
            $table->string('passport_exp_year')->length(20)->after('passport_exp_day');
            $table->string('prc_exp_month')->length(20)->after('prc_number');
            $table->string('prc_exp_day')->length(20)->after('prc_exp_month');
            $table->string('prc_exp_year')->length(20)->after('prc_exp_day');
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
