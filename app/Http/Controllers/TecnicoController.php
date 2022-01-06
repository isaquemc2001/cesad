<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppChamado;

class TecnicoController extends Controller
{
    public function tecnico(){

        $dados_chamado = AppChamado::all();

        return view('app.tecnico.index', ['titulo' => 'Principal Técnico', 'dados_chamado' => $dados_chamado]);
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
