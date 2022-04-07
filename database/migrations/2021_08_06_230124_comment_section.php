<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_section', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reply_id_no')->length(12);
            $table->string('comment_id_no')->length(12);
            $table->string('v_first_name')->length(100);
			$table->string('v_last_name')->length(100);
            $table->string('r_first_name')->length(100);
			$table->string('r_last_name')->length(100);
            $table->string('likes')->length(60);
            $table->string('reactions')->length(60);
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
        Schema::dropIfExists('comment_section');
    }
}
