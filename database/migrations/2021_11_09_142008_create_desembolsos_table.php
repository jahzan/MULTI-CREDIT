<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesembolsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desembolsos', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 9, 2);
            $table->foreignId('solicitud_id')->constrained('solicituds'); // se le indica el desembolso realizado.
            $table->tinyInteger('cuotas');
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
        Schema::dropIfExists('desembolsos');
    }
}
