<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DadosSolicitante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dado_solicitante', function (Blueprint $table){
            $table->bigInteger('id_solicitante')->primary('id_solicitante');
            $table->integer('usuario_id');
            $table->string('nome_solicitante');
            $table->string('email_solicitante');
            $table->integer('departamento_id');

            //foreign key
            $table->foreign('usuario_id')->references('idusuario')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitante');
    }
}
