<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChamadoHistorico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamado_historico', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('chamado_id');
            $table->unsignedBigInteger('solicitante_id');
            $table->unsignedBigInteger('tecnico_id');

            //foreign key
            $table->foreign('chamado_id')->references('id')->on('app_chamados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chamado_historico');
    }
}
