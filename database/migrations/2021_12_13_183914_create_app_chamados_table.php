<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppChamadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_chamados', function (Blueprint $table) {
            $table->id();
            $table->integer('solicitante_id');
            $table->integer('tecnico_id')->nullable();
            $table->string('titulo', 100);
            $table->integer('tipo_erro');
            $table->string('anexo', 100)->nullable();
            $table->text('descricao');
            $table->text('resposta')->nullable();
            $table->date('data_abertura');
            $table->date('data_alteracao');
            $table->integer('status');
            $table->integer('prioridade');
            $table->timestamps();

            $table->foreign('tecnico_id')->references('idusuario')->on('usuario');
            $table->foreign('solicitante_id')->references('idusuario')->on('usuario');
            //foreign key
            //$table->foreign('solicitante_id')->references('id_solicitante')->on('dado_solicitante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_chamados');
    }
}
