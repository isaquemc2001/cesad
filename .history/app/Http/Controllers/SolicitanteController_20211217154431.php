<?php

namespace App\Http\Controllers;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use App\AppChamado;
use App\TipoErro;

class SolicitanteController extends Controller
{
    public function solicitante()
    {
        $tipo_erro = TipoErro::all();

        return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro]);
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
            'Titulo' => 'required|min:5|max:100',
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
            echo "<script> alert('O Chamado Cadastrado Com Sucesso')</script>";
        } else {
            echo "<script> alert('O Chamado Não Cadastrado')</script>";
        }

        return view('app.solicitante.index', ['titulo' => 'Principal Solicitante']);
    }
}
