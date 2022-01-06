@extends('app.layouts.basico_login')

@section('titulo', $titulo)

@section('conteudo')


    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('chamado.login') }}">
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="Cpf" aria-describedby="emailHelp" placeholder="Informe o CPF">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="Senha" id="exampleInputPassword1" placeholder="Informe a senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
