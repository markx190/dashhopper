<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropRFirstName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comment_section', function (Blueprint $table) {
            $table->dropColumn('r_first_name');
            $table->dropColumn('r_last_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comment_section', function (Blueprint $table) {
            $table->string('r_first_name');
            $table->string('r_last_name');
        });
    }
}
