<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSdContactNoColumnOnBtServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bt_services_details', function (Blueprint $table) {
            $table->dropColumn('sd_contact_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bt_services_details', function (Blueprint $table) {
            $table->string('sd_contact_no');
        });
    }
}
