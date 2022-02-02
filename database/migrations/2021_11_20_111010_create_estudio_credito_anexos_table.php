<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudioCreditoAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudio_credito_anexos', function (Blueprint $table) {
            $table->id();
            $table->string('anexo');//anexo del estudio realizado para la solicitud
            $table->foreignId('estudio_credito_id')->constrained('estudio_creditos'); // se le indica el desembolso realizado.
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
        Schema::dropIfExists('estudio_credito_anexos');
    }
}
