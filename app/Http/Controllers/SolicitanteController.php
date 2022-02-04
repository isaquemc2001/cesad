<?php

namespace App\Http\Controllers;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AppChamado;
use App\Solicitante;
use App\TipoErro;
use League\CommonMark\Extension\Table\Table;

class SolicitanteController extends Controller
{
    public function solicitante()
    {
        //tipo erro
        $tipo_erro = TipoErro::all();

        //filtragem dos chamados de quem está acessando
        $usuario = 	$_SESSION['idusuario'];

        $dados_chamado = AppChamado::all()->where('solicitante_id', $usuario);

        //mostrando nome do solicitante
        $dados_usuario = '';

        $solicitante = DB::table('app_chamados')->select('solicitante_id')->where('solicitante_id', $usuario)->get()->first();

        if(isset($solicitante)){
            $dados_usuario = DB::table('usuario')->select('nome')->where('idusuario', $solicitante->solicitante_id)->get()->first();
        }
        $cadastrado = '';
        $editado = '';
        $excluido = '';

        return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'cadastrado' => $cadastrado, 'editado' => $editado, 'excluido' => $excluido]);
    }

    public function em_aberto(){
        //tipo erro
        $tipo_erro = TipoErro::all();

        //filtragem dos chamados em aberto
        $usuario = 	$_SESSION['idusuario'];
        $dados_chamado = AppChamado::all()->where('status', 1)->where('solicitante_id', $usuario);

        //pegando valor para quem foi o solicitante
        $solicitante = DB::table('app_chamados')->select('solicitante_id')->where('solicitante_id', $usuario)->get()->first();

        $dados_usuario = '';

        if(isset($solicitante)){
            $dados_usuario = DB::table('usuario')->select('nome')->where('idusuario', $solicitante->solicitante_id)->get()->first();
        }

        return view('app.solicitante.em_aberto', ['titulo' => 'Chamados em Aberto', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario]);
    }

    public function concluido(){
       //tipo erro
       $tipo_erro = TipoErro::all();

       //filtragem dos chamados em aberto
       $usuario = 	$_SESSION['idusuario'];
       $dados_chamado = AppChamado::all()->where('status', 2)->where('solicitante_id', $usuario);

       //pegando valor para quem foi o solicitante
       $solicitante = DB::table('app_chamados')->select('solicitante_id')->where('solicitante_id', $usuario)->get()->first();

       $dados_usuario = '';

       if(isset($solicitante)){
           $dados_usuario = DB::table('usuario')->select('nome')->where('idusuario', $solicitante->solicitante_id)->get()->first();
       }

        return view('app.solicitante.concluido', ['titulo' => 'Chamados Concluidos', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario]);
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
        $chamado->solicitante_id = $request->input('Idusuario');

        //print_r($chamado->getAttributes());

        $chamado->save();

        //filtragem dos chamados de quem está acessando
        $usuario = 	$_SESSION['idusuario'];

        $dados_chamado = AppChamado::all()->where('solicitante_id', $usuario);

        //mostrando nome do solicitante
        $dados_usuario = '';

        $solicitante = DB::table('app_chamados')->select('solicitante_id')->where('solicitante_id', $usuario)->get()->first();

        if(isset($solicitante)){
            $dados_usuario = DB::table('usuario')->select('nome')->where('idusuario', $solicitante->solicitante_id)->get()->first();
        }

        $cadastrado = '';
        $editado = '';
        $excluido = '';

        if ($chamado) {
            $cadastrado = '1';
            return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'cadastrado' => $cadastrado, 'cadastrado' => $cadastrado, 'editado' => $editado, 'excluido' => $excluido]);
        } else {
            $cadastrado = '2';
            return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'cadastrado' => $cadastrado, 'cadastrado' => $cadastrado, 'editado' => $editado, 'excluido' => $excluido]);
        }

    }

    public function update(Request $request, AppChamado $idchamado)
    {

        $tipo_erro = TipoErro::all();

        $dados_chamado = AppChamado::all();

        $idchamado->update($request->all());

        $cadastrado = '';
        $editado = '';
        $excluido = '';

        //filtragem dos chamados de quem está acessando
        $usuario = 	$_SESSION['idusuario'];

        $dados_chamado = AppChamado::all()->where('solicitante_id', $usuario);

        //mostrando nome do solicitante
        $dados_usuario = '';

        $solicitante = DB::table('app_chamados')->select('solicitante_id')->where('solicitante_id', $usuario)->get()->first();

        if(isset($solicitante)){
            $dados_usuario = DB::table('usuario')->select('nome')->where('idusuario', $solicitante->solicitante_id)->get()->first();
        }

        if ($idchamado) {
            $editado = '1';
            return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'editado' => $editado, 'cadastrado' => $cadastrado, 'excluido' => $excluido]);
        } else {
            $editado = '2';
            return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'editado' => $editado, 'cadastrado' => $cadastrado, 'excluido' => $excluido]);
        }
    }

    public function destroy(AppChamado $idchamado){

        $tipo_erro = TipoErro::all();

        $dados_chamado = AppChamado::all();

        unlink(public_path('images/anexos/'.$idchamado->anexo));

        $idchamado->delete();

        $cadastrado = '';
        $editado = '';
        $excluido = '';

        //filtragem dos chamados de quem está acessando
        $usuario = 	$_SESSION['idusuario'];

        $dados_chamado = AppChamado::all()->where('solicitante_id', $usuario);

        //mostrando nome do solicitante
        $dados_usuario = '';

        $solicitante = DB::table('app_chamados')->select('solicitante_id')->where('solicitante_id', $usuario)->get()->first();

        if(isset($solicitante)){
            $dados_usuario = DB::table('usuario')->select('nome')->where('idusuario', $solicitante->solicitante_id)->get()->first();
        }

        if ($idchamado) {
            $excluido = '1';
            return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'editado' => $editado, 'cadastrado' => $cadastrado, 'excluido' => $excluido]);
        } else {
            $excluido = '2';
            return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'editado' => $editado, 'cadastrado' => $cadastrado, 'excluido' => $excluido]);
        }
    }
}
