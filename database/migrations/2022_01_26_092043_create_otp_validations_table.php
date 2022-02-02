<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtpValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otp_validations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('socio_de_negocio_id')->constrained('socio_de_negocios');
            $table->string('otp');
            $table->enum('channel', ['email', 'sms']);
            $table->timestamp('validated_at');
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
        Schema::dropIfExists('otp_validations');
    }
}
