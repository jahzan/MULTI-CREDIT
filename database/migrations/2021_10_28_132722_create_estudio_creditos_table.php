<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudioCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudio_creditos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitud_estado_id')->constrained('solicitud_estados');// estado de la solicitud
            $table->foreignId('solicitud_id')->references('id')->on('solicituds')->onDelete('cascade'); // solicitud
            $table->decimal('valor', 9, 2)->default(0.00);// valor aprobado
            $table->text('descripcion')->nullable();// descripcion es un campo para observaciones del estudi de credito
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
        Schema::dropIfExists('estudio_creditos');
    }
}
