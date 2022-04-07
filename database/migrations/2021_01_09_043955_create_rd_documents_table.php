<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRdDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rd_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hic_id_no')->length(20);
            $table->string('docs_id_no')->length(20);
			$table->string('hic_docs_name')->length(90);
            $table->string('hic_documents')->default('documents.jpg');
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
        Schema::dropIfExists('rd_documents');
    }
}
