<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRdItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rd_items', function (Blueprint $table) {
            $table->increments('id');
			$table->string('item_id_no')->length(12);
            $table->string('item_code')->length(20);
			$table->string('item_name')->length(60);
            $table->string('category')->length(90)->nullable();
            $table->string('qty_stock')->length(12)->nullable();
            $table->string('unit_of_measure')->length(20)->nullable();
            $table->string('buying_price')->length(10)->nullable();
            $table->string('unit_price')->length(10)->nullable();
			$table->string('beginning_inventory')->length(12)->nullable();           
            $table->string('current_inventory')->length(12)->nullable();
            $table->string('remaining_inventory')->length(12)->nullable();
            $table->string('company_name')->length(90)->nullable();
            $table->string('hic_network')->length(90)->nullable();
            $table->string('region')->length(90)->nullable();
            $table->string('purchase_month')->length(60)->nullable();
            $table->string('purchase_day')->length(10)->nullable();
            $table->string('purchase_year')->length(12)->nullable();
            $table->string('exp_month')->length(60)->nullable();
            $table->string('exp_day')->length(10)->nullable();
            $table->string('exp_year')->length(12)->nullable();
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
        Schema::dropIfExists('rd_items');
    }
}
