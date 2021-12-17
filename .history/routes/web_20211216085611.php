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

Route::get('/login', function () {
    return 'Login';
})->name('site.index');

Route::prefix('/app')->group(function () {
    //Route Técnico
    Route::get('/tecnico', 'TecnicoController@tecnico')->name('app.tecnico');

    //Route Meus Chamados
    Route::get('/meuschamados', 'MeusChamadosController@meuschamados')->name('app.meuschamados');

    //Route Solicitante
    Route::get('/solicitante', 'SolicitanteController@solicitante')->name('app.solicitante');
    Route::post('/solicitante', 'SolicitanteController@cadastrar_chamado')->name('app.solicitante');
    Route::get('/solicitante/cadastro', 'SolicitanteController@confirmacao')->name('app.cadastro.confirmacao');

    //exemplo da aula
    Route::get('/fornecedores', 'FornecedorController@index');
});


//exemplo da aula
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');


Route::fallback(function(){
    echo 'Rota acessada inexistente. <a href="'.route('app.tecnico').'">clique aqui</a>
    para ir para a rota inicial';
});
