<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSdContactNoColumnOnBtServicesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bt_services_details', function (Blueprint $table) {
            $table->string('sd_contact_no')->length(20)->after('sd_lic_no');
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
            //
        });
    }
}
