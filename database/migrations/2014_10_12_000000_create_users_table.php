<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->nullable()->constrained('stores'); // el campo no es necesario para los clientes
            $table->foreignId('socio_de_negocio_id')->nullable()->constrained('socio_de_negocios'); // este campo se utilizara para vincular el usuario a movimientos
            $table->string('name',100);//nombre del usuario
            $table->string('lastname',100);//apellido del usuario
            $table->string('email',125)->unique();//email del usuario el cual se enviara la informacion
            $table->string('telefono', 10);//nuemro que se utilizara para notificar al cliente la informacion
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
        });

        Schema::table('zones', function (Blueprint $table) {// se utiliza para crear el campo user_id de la tabla zones que seria conectado con el id de la tabla users(llave foranea)
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');// se establece usuario asesor para esa zonas
        });
       

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('zones', function (Blueprint $table) {
             $table->dropForeign(['user_id']);
         });
        Schema::drop('users');
        
    }
}
