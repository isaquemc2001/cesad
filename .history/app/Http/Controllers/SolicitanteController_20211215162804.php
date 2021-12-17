<?php

namespace App\Http\Controllers;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class SolicitanteController extends Controller
{
    public function solicitante(Request $request){

        echo '<pre>';
        print_r($request->all());

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
