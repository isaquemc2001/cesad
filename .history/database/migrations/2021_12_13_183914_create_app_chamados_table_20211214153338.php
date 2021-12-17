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
            $table->unsignedBigInteger('solicitante_id');
            $table->string('titulo', 100);
            $table->integer('tipo_erro');
            $table->string('anexo', 100);
            $table->text('descricao');
            $table->date('data_abertura');
            $table->date('data_alteracao');
            $table->integer('status');
            $table->integer('prioridade');
            $table->timestamps();

            //foreign key
            $table->foreign('solicitante_id')->references('id')->on('usuario');
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
