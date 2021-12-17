<?php

use Illuminate\Database\Seeder;

class TipoErroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoErro::create(['tipo_erro' => 'Dificuldade de acesso']);
        TipoErro::create(['tipo_erro' => 'Cadastro de dados']);
    }
}
