<?php

use Brick\Math\BigInteger;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

//Route Login
Route::get('/chamado', 'LoginController@login')->name('chamado.login');
Route::post('/chamado', 'LoginController@autenticar')->name('chamado.logon');

Route::get('/chamado/primeiroacesso', 'PrimeiroAcesso@cadastro')->name('chamado.primeiroacesso');

Route::middleware('autenticacao:padrao')->prefix('/chamado')->group(function () {

    //Route Técnico
    Route::get('/tecnico', 'TecnicoController@tecnico')->name('chamado.tecnico');
    Route::put('/tecnico/update/{idchamado}', 'TecnicoController@atribuir')->name('chamado.tecnico.atribuir');
    Route::put('/tecnico/status/{idchamado}', 'TecnicoController@status')->name('chamado.tecnico.status');

    //Route Meus Chamados
    Route::get('/meuschamados', 'MeusChamadosController@meuschamados')->name('chamado.meuschamados');

    //Route Solicitante
    Route::get('/solicitante', 'SolicitanteController@solicitante')->name('chamado.solicitante');
    Route::post('/solicitante', 'SolicitanteController@cadastrar_chamado')->name('chamado.solicitante');
    Route::put('/solicitante/update/{idchamado}', 'SolicitanteController@update')->name('chamado.solicitante.update');
    Route::delete('/solicitante/destroy/{idchamado}', 'SolicitanteController@destroy')->name('chamado.solicitante.destroy');
});


//exemplo da aula
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');


Route::fallback(function(){
    echo 'Rota acessada inexistente. <a href="'.route('chamado.login').'">clique aqui</a>
    para ir para a rota inicial';
});

//teste session
Route::get('home', function (Request $request) {
    session_start();
    if ($request->session()->has($_SESSION)) {
        echo 'existe';
        print_r($_SESSION);
    }
});
