<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppChamado;
use App\TipoErro;
use App\Usuario;

class TecnicoController extends Controller
{
    public function tecnico(){
        if($_SESSION['idusuariotipo'] != 4){
            return redirect()->route('chamado.solicitante');
        }
        $atribuicao = '';
        $status_alterado = '';

        //tipo erro
        $tipo_erro = TipoErro::all();

        //select tecnico
        $tecnico = Usuario::all();

        $dados_chamado = AppChamado::all()->where('tecnico_id', NULL);

        $usuario = AppChamado::with('usuario')->get();

        return view('app.tecnico.index', ['titulo' => 'Principal Resposável', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'tipo_erro' => $tipo_erro]);
    }

    public function meuschamados(){
        if($_SESSION['idusuariotipo'] != 4){
            return redirect()->route('chamado.solicitante');
        }

        //tipo erro
        $tipo_erro = TipoErro::all();

        //select tecnico
        $tecnico = Usuario::all();

        $usuario = $_SESSION['idusuario'];

        $dados_chamado = AppChamado::all()->where('tecnico_id', $usuario);

        $tec = Usuario::all();

        $status_alterado = '';
        //mostra tecnico atribuido
        $cpfacesso = $_SESSION['cpf'];

        foreach($tec as $key => $tec){
            if($cpfacesso == $tec->cpf){
                $idusuario = $tec->idusuario;
            }
        }

        $dados_chamado = AppChamado::all()->where('tecnico_id', $idusuario);

        $usuario = AppChamado::with('usuario')->get();

        return view('app.tecnico.meuschamados', ['titulo' => 'Meus chamados', 'dados_chamado' => $dados_chamado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'status_alterado' => $status_alterado, 'tipo_erro' => $tipo_erro]);
    }

    public function atribuir(Request $request, AppChamado $idchamado){
        //tipo erro
        $tipo_erro = TipoErro::all();

        //select tecnico
        $tecnico = Usuario::all();

        $dados_chamado = AppChamado::all()->where('tecnico_id', NULL);

        $idchamado->update($request->all());

        $atribuicao = '';
        $status_alterado = '';

        $usuario = AppChamado::with('usuario')->get();

        if ($idchamado) {
            $atribuicao = '1';
            return view('app.tecnico.index', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'tipo_erro' => $tipo_erro]);
        } else {
            $atribuicao = '2';
            return view('app.tecnico.index', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'tipo_erro' => $tipo_erro]);
        }

    }

    public function status(Request $request, AppChamado $idchamado){
        //tipo erro
        $tipo_erro = TipoErro::all();
        
        //select tecnico
        $tecnico = Usuario::all();

        $usuario = $_SESSION['idusuario'];

        $dados_chamado = AppChamado::all()->where('tecnico_id', $usuario);

        $idchamado->update($request->all());

        $atribuicao = '';
        $status_alterado = '';

        $usuario = AppChamado::with('usuario')->get();

        if ($idchamado) {
            $status_alterado = '1';
            return view('app.tecnico.meuschamados', ['titulo' => 'Meus chamados', 'dados_chamado' => $dados_chamado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'status_alterado' => $status_alterado, 'tipo_erro' => $tipo_erro]);
        } else {
            $status_alterado = '2';
            return view('app.tecnico.meuschamados', ['titulo' => 'Meus chamados', 'dados_chamado' => $dados_chamado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'status_alterado' => $status_alterado, 'tipo_erro' => $tipo_erro]);
        }
    }

    public function tipoerro(Request $request){
        //tipo erro
        $tipo_erro = TipoErro::all();

        //select tecnico
        $tecnico = Usuario::all();

        $atribuicao = '';
        $status_alterado = '';

        $dados_chamado = AppChamado::all();

        $tipoerro = new TipoErro();

        $tipoerro->tipo_erro = $request->input('tipo_erro');

        $tipoerro->save();

        $usuario = AppChamado::with('usuario')->get();

        return redirect()->route('chamado.tecnico', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado, 'usuario' => $usuario, 'tecnico' => $tecnico, 'tipo_erro' => $tipo_erro]);
    }

}
