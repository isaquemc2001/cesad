<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppChamado;
use Illuminate\Support\Facades\DB;
use App\Usuaria;

class TecnicoController extends Controller
{
    public function tecnico(){

        $dados_chamado = AppChamado::all()->where('tecnico_atribuido', NULL);

        return view('app.tecnico.index', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado]);
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

        if ($idchamado) {
            echo "<script> alert('Alteração realizada com sucesso')</script>";
            //return redirect()->route('chamado.tecnico', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado]);
        } else {
            echo "<script> alert('Alteração não realizada')</script>";
        }
        return redirect('chamado/tecnico');
        return view('app.tecnico.index', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado]);
    }

    public function status(Request $request, AppChamado $idchamado){

        $dados_chamado = AppChamado::all();

        $idchamado->update($request->all());

        if ($idchamado) {
            echo "<script> alert('Alteração realizada com sucesso')</script>";
            //return redirect()->route('chamado.tecnico', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado]);
        } else {
            echo "<script> alert('Alteração não realizada')</script>";
        }

        return view('app.tecnico.index', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado]);
    }

}
