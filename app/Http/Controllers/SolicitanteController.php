<?php

namespace App\Http\Controllers;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use App\AppChamado;
use App\Solicitante;
use App\TipoErro;


class SolicitanteController extends Controller
{
    public function solicitante()
    {
        $tipo_erro = TipoErro::all();

        $dados_chamado = AppChamado::all();

        return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado]);
    }

    public function cadastrar_chamado(Request $request)
    {
        $tipo_erro = TipoErro::all();

        $dados_chamado = AppChamado::all();

        $chamado = new AppChamado();

        //anexo image
        if ($request->hasFile('Anexo') && $request->file('Anexo')->isValid()) {
            $requestImage = $request->file('Anexo');

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('images/anexos'), $imageName);

            $chamado->anexo = $imageName;
        }

        $chamado->titulo = $request->input('Titulo');
        $chamado->tipo_erro = $request->input('tipo_erro');
        $chamado->descricao = $request->input('Descricao');
        $chamado->data_abertura = $request->input('dataAbertura');
        $chamado->data_alteracao = $request->input('dataAlteracao');
        $chamado->status = $request->input('Status');
        $chamado->prioridade = $request->input('Prioridade');

        //print_r($chamado->getAttributes());

        $chamado->save();

        if ($chamado) {
            echo "<script> alert('O Chamado Cadastrado Com Sucesso')</script>";
            return redirect()->route('chamado.solicitante', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado]);
        } else {
            echo "<script> alert('O Chamado Não Cadastrado')</script>";
            return redirect()->route('chamado.solicitante', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado]);
        }

    }

    public function update(Request $request, AppChamado $idchamado)
    {

        $tipo_erro = TipoErro::all();

        $dados_chamado = AppChamado::all();

        $idchamado->update($request->all());

        if ($idchamado) {
            echo "<script> alert('Alteração realizada com sucesso')</script>";
        } else {
            echo "<script> alert('Alteração não realizada')</script>";
        }

        return redirect()->route('chamado.solicitante', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado]);

    }

    public function destroy(AppChamado $idchamado){

        $tipo_erro = TipoErro::all();

        $dados_chamado = AppChamado::all();

        $idchamado->delete();

        if ($idchamado) {
            echo "<script> alert('Exclusão realizada com sucesso')</script>";
            return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado]);
        } else {
            echo "<script> alert('Exclusão não realizada')</script>";
            return redirect()->route('chamado.solicitante', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado]);
        }
    }
}
