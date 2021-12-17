<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return "Olá, seja bem vindo! Hello world!";
});

Route::get('/sobrenos', function () {
    return "Sobre nós";
});

Route::get('/contato', function () {
    return "Contato";
});
*/

//Route Principal
//Será o login ou tela principal
Route::get('/', 'PrincipalController@principal');

//Route Técnico
Route::get('/tecnico', 'TecnicoController@tecnico');

//Route Meus Chamados
Route::get('/meuschamados', 'MeusChamadosController@meuschamados');

//Route Solicitante
Route::get('/solicitante', 'SolicitanteController@solicitante');

Route::get('/login', function(){ return 'Login';});

Route::prefix('/tecnico')
Route::get('/clientes', function(){ return 'Clientes';});
Route::get('/fornecedores', function(){ return 'Fornecedores';});
Route::get('/produtos', function(){ return 'Produtos';});
