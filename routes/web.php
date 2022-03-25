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

Route::middleware('autenticacao: padrao')->prefix('/chamado')->group(function () {

    //Route Técnico
    Route::get('/tecnico', 'TecnicoController@tecnico')->name('chamado.tecnico');
    Route::put('/tecnico/atribuir/{idchamado}', 'TecnicoController@atribuir')->name('chamado.tecnico.atribuir');
    Route::put('/tecnico/status/{idchamado}', 'TecnicoController@status')->name('chamado.tecnico.status');
    Route::get('/meuschamados', 'TecnicoController@meuschamados')->name('chamado.meuschamados');
    Route::get('/concluido_reponsavel', 'TecnicoController@concluido_responsavel')->name('chamado.concluido_responsavel');
    Route::post('/tipoerro', 'TecnicoController@tipoerro')->name('chamado.tipoerro');
    Route::get('/exportar', 'TecnicoController@exportar')->name('chamado.exportar');
    Route::get('/exportarg', 'TecnicoController@exportarg')->name('chamado.exportarg');
    Route::get('/exportarc', 'TecnicoController@exportarc')->name('chamado.exportarc');
    Route::get('/exportara', 'TecnicoController@exportara')->name('chamado.exportara');
    //Route::get('/exportacao/{extensao}', 'TecnicoController@exportacao')->name('chamado.exportacao');

    //SAIR
    Route::get('/sair' , 'LoginController@logout')->name('chamado.sair');

    //Route Solicitante
    Route::get('/solicitante', 'SolicitanteController@solicitante')->name('chamado.solicitante');
    Route::post('/solicitante', 'SolicitanteController@cadastrar_chamado')->name('chamado.solicitante');
    Route::put('/{idchamado}', 'SolicitanteController@update')->name('chamado.solicitante.update');
    Route::delete('/{idchamado}', 'SolicitanteController@destroy')->name('chamado.solicitante.destroy');
    Route::get('/form_excluir', 'SolicitanteController@form_excluir')->name('chamado.solicitante.form_excluir');

    Route::get('/aberto', 'SolicitanteController@em_aberto')->name('chamado.solicitante.em_aberto');
    Route::get('/concluido', 'SolicitanteController@concluido')->name('chamado.solicitante.concluido');
});

Route::get('/novochamado', function(){
    return view('app.solicitante.mail.novo_chamado');
});

Route::fallback(function(){
    echo 'Rota acessada inexistente. <a href="'.route('chamado.login').'">clique aqui</a>
    para ir para a rota inicial';
});
