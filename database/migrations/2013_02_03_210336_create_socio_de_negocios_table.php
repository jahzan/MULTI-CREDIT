<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSocioDeNegociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_de_negocios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',200);
            $table->string('numDoc',20)->unique();
            $table->softDeletes();
            $table->string('telefono', 10);
            $table->string('email',125);
            $table->foreignId('tipo_socio_id')->constrained('tipo_socios');
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
        Schema::drop('socio_de_negocios');
    }
}
