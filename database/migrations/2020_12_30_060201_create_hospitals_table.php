<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->increments('id');
			$table->string('hic_id_no')->length(20);
			$table->string('hic_name')->length(90);
            $table->string('hic_network')->length(60)->nullable();
            $table->string('hic_type')->length(60)->nullable();
			$table->string('hic_administrator')->legnth(60);            
			$table->string('hic_street')->length(90)->nullable();
            $table->string('hic_village')->length(60)->nullable();
            $table->string('hic_city')->legnth(60)->nullable();
            $table->string('hic_province')->length(60)->nullable();
            $table->string('user_firstname')->length(90);
            $table->string('user_lastname')->length(90);
            $table->string('hic_department')->length(60)->nullable();
            $table->string('hic_position')->length(60)->nullable();
			$table->string('user_account_type')->length(40)->nullable();
			$table->string('hic_user_level')->length(40)->nullable();
            $table->string('hic_user_status')->length(40)->nullable();
			$table->string('hic_contact_no')->length(14);
			$table->string('avatar')->default('default.jpg');
            $table->string('hic_documents')->default('documents.jpg');
            $table->string('email')->unique();
			$table->string('username');
            $table->string('password');
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
        Schema::dropIfExists('hospitals');
    }
}
