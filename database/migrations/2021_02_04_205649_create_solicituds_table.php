<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);//nombre del solicitante de credito
            $table->string('apellido',100);//apellido del solicitante de credito
            $table->enum('tipoDocument', ['CC','CE','PA','TI','RC','CD']);
            $table->string('numeroDeDocumento',20);// numero de documento del solicitante del credito
            $table->date('fechaExpedicion');// fecha de expedicion del documento del solicitande del credito
            $table->date('fechaNacimiento');//fecha de nacimiento del solicitante de credito
            $table->string('telefono', 10);// telefono de contacto del solicitande de credito
            $table->string('email',125);// email de contacto del solicitante de credito
            $table->decimal('monto', 9, 2);// monto solicitado
            $table->text('description')->nullable();// descripcion la cual es un campo patra observaciones(Respuestas)
            $table->string('path_solicitud');
            $table->foreignId('solicitud_estado_id')->nullable()->constrained('solicitud_estados');// estado de la solicitud
            $table->foreignId('user_id')->constrained('users');// identificador del usuario que realizo la solicitud
            $table->timestamps();
            $table->string('otp_id');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
}