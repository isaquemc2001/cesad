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
            $table->integer('id_solicitante')->primary('id_solicitante');
            $table->integer('solicitante_id');
            $table->morphs('nome_solicitante');
            $table->morphs('email_solicitante');
            $table->integer('departamento_id');

            //foreign key
            /*$table->foreign('solicitante_id')->references('idusuario')->on('usuario');
            $table->foreign('nome_solicitante')->references('nome')->on('usuario');
            $table->foreign('email_solicitante')->references('email')->on('usuario');
            $table->foreign('departamento_id')->references('iddepartamento')->on('usuario');*/
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
