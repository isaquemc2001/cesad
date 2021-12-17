<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitanteController extends Controller
{
    public function solicitante(){

        var_dump($_POST);

        return view('app.solicitante.index', ['titulo' => 'Principal Solicitante']);
    }
}
