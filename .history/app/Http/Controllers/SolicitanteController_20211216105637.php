<?php

namespace App\Http\Controllers;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use App\AppChamado;

class SolicitanteController extends Controller
{
    public function solicitante()
    {
        return view('app.solicitante.index', ['titulo' => 'Principal Solicitante']);
    }

    public function cadastrar_chamado(Request $request)
    {

        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('Titulo');
*/

        $request->validate([
            'Titulo' => 'required',
            'tipoErro' => 'required',
            'Descricao' => 'required'
        ]);

        $chamado = new AppChamado();

        $chamado->titulo = $request->input('Titulo');
        $chamado->tipo_erro = $request->input('tipoErro');
        $chamado->anexo = $request->input('Anexo');
        $chamado->descricao = $request->input('Descricao');
        $chamado->data_abertura = $request->input('dataAbertura');
        $chamado->data_alteracao = $request->input('dataAlteracao');
        $chamado->status = $request->input('Status');
        $chamado->prioridade = $request->input('Prioridade');

        //print_r($chamado->getAttributes());

        $chamado->save();

        if ($chamado) {
            echo "<script> alert('Chamado Cadastrado com Sucesso')</script>";
        } else if ($request->input('Errors')) {
            echo "<script> alert('O Chamado Não Foi Cadastrado')</script>";
        }

        return view('app.solicitante.index', ['titulo' => 'Principal Solicitante']);
    }
}
