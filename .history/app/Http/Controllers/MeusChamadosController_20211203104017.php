<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeusChamadosController extends Controller
{
    public function contato()
    {
        return view('site.meuschamados');
    }
}
