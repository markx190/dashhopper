<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnsOnRdDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rd_documents', function (Blueprint $table) {
            $table->text('contents')->after('hic_docs_name');
            $table->string('position')->length(120)->after('contents');
            $table->string('created_by')->length(60)->after('hic_documents');
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
