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
            $table->unsignedBigInteger('tecnico_id');
            $table->unsignedBigInteger('tecnico_id');
            $table->unsignedBigInteger('tecnico_id');
            $table->unsignedBigInteger('tecnico_id');

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
        Schema::dropIfExists('tecnico');
    }
}
