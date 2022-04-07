<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceFeaturedImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_featured_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fi_id_no')->unsigned();
            $table->integer('sd_id_no')->unsigned();
            $table->integer('bt_id_no')->unsigned();
            $table->string('bt_name')->length(100);
			$table->string('service_name')->length(100);
            $table->string('image_name')->length(100);
            $table->string('featured_image')->length(100);
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
        Schema::dropIfExists('service_featured_images');
    }
}
