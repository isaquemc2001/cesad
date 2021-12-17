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
Route::post('/', function () {
    return "Olá, seja bem vindo! Hello world!";
});

Route::post('/sobrenos', function () {
    return "Sobre nós";
});

Route::post('/contato', function () {
    return "Contato";
});
*/

//Route Principal

Route::post('/login', function () {
    return 'Login';
})->name('site.index');

Route::prefix('/app')->group(function () {
    //Route Técnico
    Route::post('/tecnico', 'TecnicoController@tecnico')->name('app.tecnico');

    //Route Meus Chamados
    Route::post('/meuschamados', 'MeusChamadosController@meuschamados')->name('app.meuschamados');

    //Route Solicitante
    Route::post('/solicitante', 'SolicitanteController@solicitante')->name('app.solicitante');

    //exemplo da aula
    Route::post('/fornecedores', 'FornecedorController@index');
});


//exemplo da aula
Route::post('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');


Route::fallback(function(){
    echo 'Rota acessada inexistente. <a href="'.route('app.tecnico').'">clique aqui</a>
    para ir para a rota inicial';
});
