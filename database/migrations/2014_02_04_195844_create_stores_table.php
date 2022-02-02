<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('nit', 11)->unique();
            $table->foreignId('socio_de_negocio_id')->unique()->constrained('socio_de_negocios'); // este campo se utilizara para vincular el usuario a movimientos
            $table->foreignId('zone_id')->nullable()->constrained('zones'); // este campo se utilizara para vincular el usuario a asesor de credito
            $table->string('email')->unique();
            $table->string('telefono', 10);
            $table->softDeletes();
            $table->string('representante', 200);
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
        Schema::drop('stores');
    }
}
