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

        $event = new Request();

        $event->titulo = $request->titulo;
        $event->tipoErro = $request->tipoErro;
        $event->descricao = $request->descricao;

        $event->save();

        return redirect('app.solicitante.index');
    }
}
