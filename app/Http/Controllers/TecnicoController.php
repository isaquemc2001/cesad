<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppChamado;
use App\TipoErro;
use Illuminate\Support\Facades\DB;
use App\Usuaria;

class TecnicoController extends Controller
{
    public function tecnico(){
        $atribuicao = '';
        $status_alterado = '';

        $dados_chamado = AppChamado::all()->where('tecnico_atribuido', NULL);

        return view('app.tecnico.index', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado]);
    }

    public function meuschamados(){

        //mostra tecnico atribuido
        $cpfacesso = $_SESSION['cpf'];

        $cpfbanco = DB::table('usuario')->select('cpf')->where('cpf', $cpfacesso)->get()->first();

        if($cpfbanco->cpf == "08041299598"){
            $dados_chamado = AppChamado::all()->where('tecnico_atribuido', "1");
        }else if($cpfbanco->cpf == "01326881582"){
            $dados_chamado = AppChamado::all()->where('tecnico_atribuido', "2");
        }else if($cpfbanco->cpf == "00773520503"){
            $dados_chamado = AppChamado::all()->where('tecnico_atribuido', "3");
        }else{
            $dados_chamado = AppChamado::all()->where('tecnico_atribuido', "0");
        }

        return view('app.tecnico.meuschamados', ['titulo' => 'Meus chamados', 'dados_chamado' => $dados_chamado]);
    }

    public function atribuir(Request $request, AppChamado $idchamado){

        $dados_chamado = AppChamado::all();

        $idchamado->update($request->all());

        $atribuicao = '';
        $status_alterado = '';

        if ($idchamado) {
            $atribuicao = '1';
            return redirect()->route('chamado.tecnico', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado]);
        } else {
            $atribuicao = '2';
            return redirect()->route('chamado.tecnico', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado]);
        }

    }

    public function status(Request $request, AppChamado $idchamado){

        $dados_chamado = AppChamado::all();

        $idchamado->update($request->all());

        $atribuicao = '';
        $status_alterado = '';

        if ($idchamado) {
            $status_alterado = '1';
            return redirect()->route('chamado.meuschamados', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado]);
        } else {
            $status_alterado = '2';
            return redirect()->route('chamado.meuschamados', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado]);
        }
    }

    public function tipoerro(Request $request){

        $atribuicao = '';
        $status_alterado = '';

        $dados_chamado = AppChamado::all();

        $tipoerro = new TipoErro();

        $tipoerro->tipo_erro = $request->input('tipo_erro');

        $tipoerro->save();

        return redirect()->route('chamado.tecnico', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado, 'atribuicao' => $atribuicao, 'status_alterado' => $status_alterado]);
    }

}
