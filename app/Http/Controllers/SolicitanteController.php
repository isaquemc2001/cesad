<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AppChamado;
use App\TipoErro;
use App\Usuario;

class SolicitanteController extends Controller
{
    public function solicitante()
    {
        //select tecnico
        $tecnico = Usuario::all();

        //tipo erro
        $tipo_erro = TipoErro::all();

        //filtragem dos chamados de quem está acessando
        $usuario = $_SESSION['idusuario'];

        $dados_chamado = AppChamado::all()->where('tecnico_id', 1);

        //mostrando nome do solicitante
        $dados_usuario = '';

        $solicitante = DB::table('app_chamados')->select('solicitante_id')->where('solicitante_id', $usuario)->get()->first();

        if (isset($solicitante)) {
            $dados_usuario = DB::table('usuario')->select('nome')->where('idusuario', $solicitante->solicitante_id)->get()->first();
        }
        $cadastrado = '';
        $editado = '';
        $excluido = '';

        $usuario = AppChamado::with('usuario')->get();

        return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'cadastrado' => $cadastrado, 'editado' => $editado, 'excluido' => $excluido, 'usuario' => $usuario, 'tecnico' => $tecnico]);
    }

    public function em_aberto()
    {
        //select tecnico
        $tecnico = Usuario::all();

        //tipo erro
        $tipo_erro = TipoErro::all();

        //filtragem dos chamados em aberto
        $usuario = $_SESSION['idusuario'];
        $dados_chamado = AppChamado::all()->where('status', 1)->where('solicitante_id', $usuario);

        //pegando valor para quem foi o solicitante
        $solicitante = DB::table('app_chamados')->select('solicitante_id')->where('solicitante_id', $usuario)->get()->first();

        $dados_usuario = '';

        $usuario = AppChamado::with('usuario')->get();

        if (isset($solicitante)) {
            $dados_usuario = DB::table('usuario')->select('nome')->where('idusuario', $solicitante->solicitante_id)->get()->first();
        }

        return view('app.solicitante.em_aberto', ['titulo' => 'Chamados em Aberto', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'usuario' => $usuario, 'tecnico' => $tecnico]);
    }

    public function concluido()
    {
        //select tecnico
        $tecnico = Usuario::all();

        //tipo erro
        $tipo_erro = TipoErro::all();

        //filtragem dos chamados em aberto
        $usuario =     $_SESSION['idusuario'];
        $dados_chamado = AppChamado::all()->where('status', 2)->where('solicitante_id', $usuario);

        //pegando valor para quem foi o solicitante
        $solicitante = DB::table('app_chamados')->select('solicitante_id')->where('solicitante_id', $usuario)->get()->first();

        $dados_usuario = '';

        $usuario = AppChamado::with('usuario')->get();

        if (isset($solicitante)) {
            $dados_usuario = DB::table('usuario')->select('nome')->where('idusuario', $solicitante->solicitante_id)->get()->first();
        }

        return view('app.solicitante.concluido', ['titulo' => 'Chamados Concluidos', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'usuario' => $usuario, 'tecnico' => $tecnico]);
    }

    public function cadastrar_chamado(Request $request)
    {
        //select tecnico
        $tecnico = Usuario::all();

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
        $chamado->tecnico_id = $request->input('tecnico_id');

        //print_r($chamado->getAttributes());

        $chamado->save();

        //filtragem dos chamados de quem está acessando
        $usuario = $_SESSION['idusuario'];

        $dados_chamado = AppChamado::all()->where('solicitante_id', $usuario);

        //mostrando nome do solicitante
        $dados_usuario = '';

        $solicitante = DB::table('app_chamados')->select('solicitante_id')->where('solicitante_id', $usuario)->get()->first();

        if (isset($solicitante)) {
            $dados_usuario = DB::table('usuario')->select('nome')->where('idusuario', $solicitante->solicitante_id)->get()->first();
        }

        $cadastrado = '';
        $editado = '';
        $excluido = '';

        $usuario = AppChamado::with('usuario')->get();

        if ($chamado) {
            $cadastrado = '1';
            /*
            Mail::send('app.solicitante.mail.novo_chamado', ['nomeusuario' => $_SESSION['nome']], function ($message) {
                $message->from('jennifercater09@gmail.com', 'CESAD')->subject('Chamado - Atualização (não responda)');
                $message->to($_SESSION['email']);
            });*/
            return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'cadastrado' => $cadastrado, 'editado' => $editado, 'excluido' => $excluido, 'usuario' => $usuario, 'tecnico' => $tecnico]);
        } else {
            $cadastrado = '2';
            return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'cadastrado' => $cadastrado, 'editado' => $editado, 'excluido' => $excluido, 'usuario' => $usuario, 'tecnico' => $tecnico]);
        }
    }

    public function update(Request $request, AppChamado $idchamado)
    {
        //select tecnico
        $tecnico = Usuario::all();

        $tipo_erro = TipoErro::all();

        $dados_chamado = AppChamado::all();

        $data = $request->all();

        if ($request->hasFile('anexo') && $request->file('anexo')->isValid()) {

            if($idchamado->anexo){
                unlink(public_path('images/anexos/'.$idchamado->anexo));
            }

            $requestImage = $request->file('anexo');

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('images/anexos'), $imageName);

            $data['anexo'] = $imageName;
        }

        $idchamado->update($data);

        $cadastrado = '';
        $editado = '';
        $excluido = '';

        //filtragem dos chamados de quem está acessando
        $usuario = $_SESSION['idusuario'];

        $dados_chamado = AppChamado::all()->where('solicitante_id', $usuario);

        //mostrando nome do solicitante
        $dados_usuario = '';

        $solicitante = DB::table('app_chamados')->select('solicitante_id')->where('solicitante_id', $usuario)->get()->first();

        if (isset($solicitante)) {
            $dados_usuario = DB::table('usuario')->select('nome')->where('idusuario', $solicitante->solicitante_id)->get()->first();
        }

        $usuario = AppChamado::with('usuario')->get();

        if ($idchamado) {
            $editado = '1';
            //enviando email
            /*
            Mail::send('app.solicitante.mail.nova_edicao', ['nomeusuario' => $_SESSION['nome']], function ($message) {
                $message->from('jennifercater09@gmail.com', 'CESAD')->subject('Chamado - Atualização (não responda)');
                $message->to($_SESSION['email']);
            });*/
            return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'editado' => $editado, 'cadastrado' => $cadastrado, 'excluido' => $excluido, 'usuario' => $usuario, 'tecnico' => $tecnico]);
        } else {
            $editado = '2';
            return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'editado' => $editado, 'cadastrado' => $cadastrado, 'excluido' => $excluido, 'usuario' => $usuario, 'tecnico' => $tecnico]);
        }
    }

    public function destroy(AppChamado $idchamado)
    {

        //select tecnico
        $tecnico = Usuario::all();

        $tipo_erro = TipoErro::all();

        $dados_chamado = AppChamado::all();

        if($idchamado->anexo){
            unlink(public_path('images/anexos/'.$idchamado->anexo));
        }

        $idchamado->delete();

        $cadastrado = '';
        $editado = '';
        $excluido = '';

        //filtragem dos chamados de quem está acessando
        $usuario = $_SESSION['idusuario'];

        $dados_chamado = AppChamado::all()->where('solicitante_id', $usuario);

        //mostrando nome do solicitante
        $dados_usuario = '';

        $solicitante = DB::table('app_chamados')->select('solicitante_id')->where('solicitante_id', $usuario)->get()->first();

        if (isset($solicitante)) {
            $dados_usuario = DB::table('usuario')->select('nome')->where('idusuario', $solicitante->solicitante_id)->get()->first();
        }

        $usuario = AppChamado::with('usuario')->get();

        if ($idchamado) {
            $excluido = '1';
            //enviando email
            /*
            Mail::send('app.solicitante.mail.exclusao', ['nomeusuario' => $_SESSION['nome']], function ($message) {
                $message->from('jennifercater09@gmail.com', 'CESAD')->subject('Chamado - Atualização (não responda)');
                $message->to($_SESSION['email']);
            });*/
            return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'editado' => $editado, 'cadastrado' => $cadastrado, 'excluido' => $excluido, 'usuario' => $usuario, 'tecnico' => $tecnico]);
        } else {
            $excluido = '2';
            return view('app.solicitante.index', ['titulo' => 'Principal Solicitante', 'tipo_erro' => $tipo_erro, 'dados_chamado' => $dados_chamado, 'dados_usuario' => $dados_usuario, 'editado' => $editado, 'cadastrado' => $cadastrado, 'excluido' => $excluido, 'usuario' => $usuario, 'tecnico' => $tecnico]);
        }
    }

}
