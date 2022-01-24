<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        return view('app.login.index', ['titulo' => 'Login', 'css' => 'login.css']);
    }

    public function autenticar(Request $request){

        $regras = [
            'cpf' => 'min:11|max:11',
            'senha' => 'required'
        ];

        $feedback = [
            'cpf.min' => 'O campo CPF não possui valores suficientes',
            'cpf.max' => 'O campo CPF não possui valores suficientes',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);
        $tabela = DB::table('usuario');

        $cpf = $request->get('cpf');
        $senha = $request->get('senha');

        $md5 = md5($senha.'RFzv-RJj]%Ub-6K~Wxna@Jc}Y<3ru2o%');


        $usuario = $tabela->where('cpf', $cpf)->where('senha', $md5)->get()->first();

    }
}
