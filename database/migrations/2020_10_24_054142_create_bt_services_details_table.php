<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBtServicesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bt_services_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sd_id_no')->unsigned();
            $table->integer('bt_id_no')->unsigned();
            $table->string('bt_name')->length(100);
            $table->string('company_name')->length(100)->nullable();
			$table->string('service_name')->length(100);
            $table->string('service_industry')->length(100);
            $table->string('service_avatar')->length(100);
            $table->string('service_label')->length(100)->nullable();
            $table->string('service_route')->length(100)->nullable();
            $table->string('business_lic_no')->length(100)->nullable();
            $table->string('unit_plate_no')->length(100)->nullable();
            $table->string('service_description')->length(255);
            $table->string('sd_firstname')->length(100);
            $table->string('sd_lastname')->length(100);
            $table->integer('sd_contact_no')->unsigned(100)->nullable();
            $table->string('sd_lic_no')->length(100)->nullable();
            $table->string('service_origin')->length(100)->nullable();
            $table->string('payment_method')->length(100)->nullable();
            $table->string('sd_status')->length(100)->nullable();
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
        Schema::dropIfExists('bt_services_details');
    }
}
