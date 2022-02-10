<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppChamado extends Model
{
    protected $table = 'app_chamados';

    protected $fillable = ['solicitante_id', 'tecnico_id', 'titulo', 'tipo_erro', 'anexo', 'descricao',
    'data_abertura', 'data_alteracao', 'status', 'prioridade', 'tecnico_atribuido', 'resposta'];

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'solicitante_id', 'idusuario');
    }
}
