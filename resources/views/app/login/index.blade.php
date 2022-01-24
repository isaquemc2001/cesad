@extends('app.layouts.basico_login')

@section('titulo', $titulo)

@section('conteudo')

    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('chamado.logon') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="cpf" class="form-control" value="{{ old('cpf') }}" id="cpf" name="cpf" aria-describedby="emailHelp" placeholder="Informe o CPF">
                        {{ $errors->has('cpf') ? $errors->first('cpf') : '' }}
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="senha" class="form-control" value="{{ old('senha') }}" name="senha" id="senha" placeholder="Informe a senha">
                        {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="chamado/primeiroacesso">Primeiro acesso?</a>
                </form>
            </div>
        </div>
    </div>
