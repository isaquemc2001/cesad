<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoErro extends Model
{
    TipoErro::create(['tipo_erro' => 'Dificuldade de acesso']);
    TipoErro::create(['tipo_erro' => 'Cadastro de dados']);
}
