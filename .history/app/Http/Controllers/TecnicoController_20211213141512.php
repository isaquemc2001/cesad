<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function tecnico(){
        return view('app.tecnico.index', ['titulo' => 'Principal Técnico']);
    }
}
