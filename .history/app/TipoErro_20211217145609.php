<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TipoErro;

class TipoErro extends Model
{
    TipoErro::create(['tipo_erro' => 'Dificuldade de acesso']);
    TipoErro::create(['tipo_erro' => 'Cadastro de dados']);
}
