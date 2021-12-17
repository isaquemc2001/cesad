<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitanteController extends Controller
{
    public function solicitante(){

        var_dump($_GET);

        return view('app.solicitante.index', ['titulo' => 'Principal Solicitante']);
    }

    public function cadastrar_chamado(Request $request){
        $nome = $_GET['Titulo'];

        if(isset($_GET['tipoErro'])){
            $tipo_erro = $_GET['tipoErro'];
        }

        $descricao = $_GET['Descricao'];
    }
}
