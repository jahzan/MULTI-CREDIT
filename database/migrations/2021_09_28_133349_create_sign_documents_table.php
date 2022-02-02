<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;
use Illuminate\Support\Facades\Schema;

class CreateSignDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sign_documents', function (Blueprint $table) {
            $table->id();
            $table->string('id_otp');
            $table->string('pathDocument');
            $table->string('tipoDoc',20);
            $table->binary('firma');
            $table->text('datosFirmar');
            $table->foreignId('solicitud_id')->nullable()->references('id')->on('solicituds')->onDelete('cascade');
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
        Schema::dropIfExists('sign_documents');
    }
}
