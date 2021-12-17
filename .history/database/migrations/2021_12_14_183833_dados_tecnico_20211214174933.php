<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DadosTecnico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dado_tecnico', function (Blueprint $table){
            $table->integer('id_tecnico')->primary('id_tecnico');
            $table->integer('tecnico_id');
            $table->unsignedBigInteger('nome_tecnico');
            $table->unsignedBigInteger('email_tecnico');
            $table->unsignedBigInteger('departamento_id');

            //foreign key
            $table->foreign('tecnico_id')->references('idusuario')->on('usuario');
            $table->foreign('nome_tecnico')->references('idusuario')->on('usuario');
            $table->foreign('email_tecnico')->references('idusuario')->on('usuario');
            $table->foreign('departamento_id')->references('idusuario')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecnico');
    }
}
