<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRdPurchasingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rd_purchasings', function (Blueprint $table) {
            $table->increments('id');
			$table->string('pur_id_no')->length(10);
            $table->string('hic_id_no')->length(10);
			$table->string('item_id_no')->length(10);
			$table->string('item_name')->length(00);
            $table->string('category')->length(90)->nullable();
			$table->string('quantity')->length(12)->nullable();           
            $table->string('unit_price')->length(10)->nullable();
            $table->string('total_amount')->length(10)->nullable();
            $table->string('company_name')->length(90)->nullable();
            $table->string('payment_method')->length(90)->nullable();
            $table->string('pur_status')->length(10)->nullable();
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
        Schema::dropIfExists('rd_purchasings');
    }
}
