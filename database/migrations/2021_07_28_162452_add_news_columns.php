<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rd_documents', function (Blueprint $table) {
            $table->string('photo_signatory')->length(120)->after('hic_documents');
            $table->string('content_source')->length(120)->after('contents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rd_documents', function (Blueprint $table) {
            //
        });
    }
}
