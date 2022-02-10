<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';

    protected $fillable = ['idusuario', 'iddepartamento', 'idperfil', 'idusuariotipo', 'senha', 'nome',
    'email', 'cpf', 'ativo', 'municipio', 'telefone', 'cep', 'enderecao'];

    public function appchamados(){
        return $this->hasMany(AppChamado::class, 'solicitante_id', 'idusuario');
    }
}
