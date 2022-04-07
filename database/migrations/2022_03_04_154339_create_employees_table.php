<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hic_id_no')->length(12);
			$table->string('employee_id_no')->length(12);
            $table->string('firstname')->length(60);
            $table->string('middlename')->length(60)->nullable();
			$table->string('lastname')->length(60);
            $table->string('company_name')->length(60)->nullable();
            $table->string('position')->length(60)->nullable();
            $table->string('contact_number')->length(40)->nullable();
            $table->string('employee_avatar')->length(120)->nullable();
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
        Schema::dropIfExists('employees');
    }
}
