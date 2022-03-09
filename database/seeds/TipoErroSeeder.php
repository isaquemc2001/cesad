<?php

use Illuminate\Database\Seeder;
use App\TipoErro;

class TipoErroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoErro::create(['tipo_erro' => 'AVA']);
        TipoErro::create(['tipo_erro' => 'AVA/GD']);
        TipoErro::create(['tipo_erro' => 'AVA/NFC']);
        TipoErro::create(['tipo_erro' => 'Cadastro']);
        TipoErro::create(['tipo_erro' => 'Configurações']);
        TipoErro::create(['tipo_erro' => 'Dificuldade de acesso']);
        TipoErro::create(['tipo_erro' => 'Dificuldade de Usuário']);
        TipoErro::create(['tipo_erro' => 'Erro de sistema']);
        TipoErro::create(['tipo_erro' => 'ORBI']);
    }
}
