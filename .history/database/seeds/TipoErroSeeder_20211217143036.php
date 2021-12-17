<?php

use Illuminate\Database\Seeder;
use App\Solicitante;

class TipoErroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Solicitante::create(['Dificuldade de acesso']);
        Solicitante::create(['Cadastro de dados']);
    }
}
