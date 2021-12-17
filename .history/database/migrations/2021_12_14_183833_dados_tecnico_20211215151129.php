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
            $table->integer('id_tecnico')->primary('id_tecnico')->autoIncrement('id_tecnico');
            $table->integer('tecnico_id');
            $table->morphs('nome_tecnico');
            $table->morphs('email_tecnico');
            $table->integer('departamento_id');

            //foreign key
            /*$table->foreign('tecnico_id')->references('idusuario')->on('usuario');
            $table->foreign('nome_tecnico')->references('nome')->on('usuario');
            $table->foreign('email_tecnico')->references('email')->on('usuario');
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
        Schema::dropIfExists('tecnico');
    }
}
