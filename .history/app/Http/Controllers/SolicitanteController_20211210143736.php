<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitanteController extends Controller
{
    public function solicitante(){
        return view('app.solicitante');
    }
}
