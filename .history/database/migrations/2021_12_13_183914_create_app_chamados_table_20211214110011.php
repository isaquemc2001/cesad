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
        });

        Schema::table('app_chamados', function (Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->string('titulo', 100)->default('Sem titulo definido');
            $table->integer('tipo_erro');
            //$table->string('anexo', 100);
            $table->text('descricao');
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
