<?php

namespace App\Http\Controllers;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use App\AppChamado;

class SolicitanteController extends Controller
{
    public function solicitante(){
        return view('app.solicitante.index', ['titulo' => 'Principal Solicitante']);
    }

    public function cadastrar_chamado(Request $request){

    }
}
