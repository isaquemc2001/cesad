<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){

        $erro = '';

        if($request->get('erro') == 1){
            $erro = "Usuário ou senha inválido";
        }

        return view('app.login.index', ['titulo' => 'Login', 'css' => 'login.css', 'erro' => $erro]);
    }

    public function autenticar(Request $request){

        $regras = [
            'cpf' => 'min:11|max:11',
            'senha' => 'required'
        ];

        $feedback = [
            'cpf.min' => 'O campo CPF não possui valores suficientes',
            'cpf.max' => 'O campo CPF possui mais valores que o suficiente',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);
        $tabela = DB::table('usuario');

        $cpf = $request->get('cpf');
        $senha = $request->get('senha');

        $senhamd5 = md5($senha.'RFzv-RJj]%Ub-6K~Wxna@Jc}Y<3ru2o%');

        $usuario = $tabela->where('cpf', $cpf)->where('senha', $senha)->get()->first();

        if(isset($usuario->nome)){
            //dd($usuario);
            session_start();
            $_SESSION['idusuario'] = $usuario->idusuario;
            $_SESSION['iddepartamento'] = $usuario->iddepartamento;
            $_SESSION['idperfil'] = $usuario->idperfil;
            $_SESSION['idusuariotipo'] = $usuario->idusuariotipo;
            $_SESSION['senha'] = $usuario->senha;
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['cpf'] = $usuario->cpf;
            $_SESSION['ativo'] = $usuario->ativo;
            $_SESSION['municipio'] = $usuario->municipio;
            $_SESSION['telefone'] = $usuario->telefone;
            $_SESSION['cep'] = $usuario->cep;
            $_SESSION['endereco'] = $usuario->enderecao;
            $_SESSION['alt'] = $usuario->alt;
            $_SESSION['onoff'] = $usuario->onoff;
            $_SESSION['idauth'] = $usuario->idauth;

            if($_SESSION['idusuariotipo'] == 4){
                return redirect()->route('chamado.tecnico');
            }else{
                return redirect()->route('chamado.solicitante');
            }
        }else{
            return redirect()->route('chamado.login', ['erro' => 1]);
        }

    }

    public function logout(){
        session_destroy();
        return redirect()->route('chamado.login');
    }
}
