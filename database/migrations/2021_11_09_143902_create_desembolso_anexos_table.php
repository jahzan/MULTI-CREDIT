<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesembolsoAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desembolso_anexos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desembolso_id')->constrained('desembolsos'); // se le indica el desembolso realizado.
            $table->string('anexo');//anexos necesarios para la firmar el contrato
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
        Schema::dropIfExists('desembolso_anexos');
    }
}
