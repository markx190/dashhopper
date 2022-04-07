<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('news_id_no')->length(20);
			$table->string('article_name')->length(120);
			$table->text('contents');
			$table->text('content_type')->legnt(120);
            $table->string('position')->length(120);
			$table->text('content_status');
            $table->string('news_image')->default('documents.jpg');
            $table->string('created_by')->length(60);
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
        Schema::dropIfExists('news_contents');
    }
}
