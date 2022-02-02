<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocioEconimicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_econimicos', function (Blueprint $table) {
            $table->id();
            $table->enum('estadoCivil', ['Soltero', 'Casado','Divorciado','Vido']);
            $table->smallInteger('personasAcargo');
            $table->enum('sexo', ['Masculino', 'Femenino']);
            $table->enum('tipoVivienda', ['Propietario', 'Arrendatario','Familiar','Hipoteca','Leasing Habitacional']);
            $table->foreignId('ciudad')->constrained('ciudads')->onDelete('cascade');
            $table->string('direccion',60);
            $table->enum('nivelAcademico', ['Primaria', 'Secundaria','Tecnico o Tecnologo','Pregrado','Maestria','Doctorado']);
            $table->boolean('estadoLaboral')->default(false);
            $table->boolean('estadoPensional')->default(false);
            $table->string('empresaLabora',100)->nullable();
            $table->string('telefonoEmpresa',10)->nullable();
            $table->string('direccionEmpresa',100)->nullable();
            $table->decimal('ingresosFijos', 9, 2);
            $table->decimal('otrosIngresos', 9, 2);
            $table->decimal('gastos', 9, 2);
            $table->foreignId('solicitud_id')->constrained('solicituds')->onDelete('cascade');
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
        Schema::dropIfExists('socio_econimicos');
    }
}
