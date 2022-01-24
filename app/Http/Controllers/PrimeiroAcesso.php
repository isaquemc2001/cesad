<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimeiroAcesso extends Controller
{
    public function cadastro(){
        return view('app.login.primeiroacesso', ['titulo' => 'Primeiro Acesso']);
    }
}
