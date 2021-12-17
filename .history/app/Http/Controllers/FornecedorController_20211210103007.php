<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $forncedores = ['Forncedor 1'];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
