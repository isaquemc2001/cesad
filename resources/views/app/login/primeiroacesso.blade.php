@extends('app.layouts.basico_login')

@section('titulo', $titulo)

@section('conteudo')


    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="cpf" class="form-control" value="{{ old('cpf') }}" id="cpf" name="cpf" aria-describedby="emailHelp" placeholder="Informe o seu CPF">
                        {{ $errors->has('cpf') ? $errors->first('cpf') : '' }}
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="Informe o seu email">
                        {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
