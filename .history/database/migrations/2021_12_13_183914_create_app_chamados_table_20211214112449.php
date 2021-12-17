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
            $table->timestamps();
            $table->string('titulo', 100)->default('Sem titulo definido');
            $table->integer('tipo_erro');
            //$table->string('anexo', 100);
            $table->text('descricao');

            //passando foreign key
            $table->foreign('nome da chave que ira receber o id estrangeiro')
            ->references('o id da tabela que esta sendo puxada')->on('nome da tabela do id de referencia');
            $table->unique('nome da chave que ira receber o id estrangeiro');
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
