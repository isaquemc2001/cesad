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

        $contato = new AppChamado();

        $contato->titulo = $request->input('Titulo');
        $contato->tipoErro = $request->input('tipoErro');
        $contato->anexo = $request->input('Anexo');
        $contato->descricao = $request->input('Descricao');
        $contato->dataAbertura = $request->input('dataAbertura');
        $contato->dataAlteracao = $request->input('dataAlteracao');
        $contato->status = $request->input('Status');
        $contato->prioridade = $request->input('Prioridade');

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
