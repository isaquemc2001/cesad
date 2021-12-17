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
            $table->integer('id_historico')->autoIncrement('id_historico');
            $table->integer('chamado_id');
            $table->integer('solicitante_id');
            $table->integer('tecnico_id');
            $table->timestamps();

            //foreign key
            /*$table->foreign('chamado_id')->references('id_chamado')->on('app_chamados');
            $table->foreign('solicitante_id')->references('id_solicitante')->on('dado_solicitante');
            $table->foreign('tecnico_id')->references('id_tecnico')->on('dado_tecnico');*/
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
