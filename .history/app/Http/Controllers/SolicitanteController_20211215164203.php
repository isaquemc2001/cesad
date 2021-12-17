<?php

namespace App\Http\Controllers;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use App\AppChamado;

class SolicitanteController extends Controller
{
    public function solicitante(Request $request){

        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('Titulo');
        */

        $chamado = new AppChamado();

        $chamado->titulo = $request->input('Titulo');
        $chamado->tipoErro = $request->input('tipoErro');
        $chamado->anexo = $request->input('Anexo');
        $chamado->descricao = $request->input('Descricao');
        $chamado->dataAbertura = $request->input('dataAbertura');
        $chamado->dataAlteracao = $request->input('dataAlteracao');
        $chamado->status = $request->input('Status');
        $chamado->prioridade = $request->input('Prioridade');

        print_r($chamado->getAttributes());

        return view('app.solicitante.index', ['titulo' => 'Principal Solicitante']);
    }

    /*
    public function cadastrar_chamado(Request $request){

        $event = new Event;

        $event->titulo = $request->titulo;
        $event->tipoErro = $request->tipoErro;
        $event->descricao = $request->descricao;

        $event->save();

        return redirect('app.solicitante');
    }
    */
}
