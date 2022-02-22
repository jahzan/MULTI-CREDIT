<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagares', function (Blueprint $table) {
            $table->string('nombreCliente', 150);
            $table->string('cedulaCliente', 20);
            $table->string('addressCliente', 150);
            $table->decimal('valorCredito', 9, 2);
            $table->string('valorCreditoLetras', 100);
            $table->uuid('id')->primary();
            $table->foreignId('ciudad')->constrained('ciudads')->onDelete('cascade');
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
        Schema::dropIfExists('pagares');
    }
}
