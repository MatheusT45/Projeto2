<?php

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

Route::get('/', function () {
    return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dados_cadastrais', 'UsuarioController@dados')->name('dados_cadastrais');
Route::post('atualiza_dados', 'UsuarioController@atualizaDados')->name('atualiza_dados');
Auth::routes();

/* fazer middleware de admin */
Route::group(['middleware' => ['admin']], function () {
    Route::get('lista_usuarios','UsuarioController@listaUsuarios')->name('lista_usuarios');
    Route::get('incluir_usuario','UsuarioController@incluirUsuarios')->name('incluir_usuario');
    Route::post('grava_usuario','UsuarioController@gravarUsuarios')->name('grava_usuario');
    Route::get('editar_usuario/{id}','UsuarioController@editarUsuarios')->name('editar_usuario');
    Route::post('atualizar_usuario','UsuarioController@atualizarUsuarios')->name('atualizar_usuario');
    Route::get('excluir_usuario/{id}','UsuarioController@excluirUsuarios')->name('excluir_usuario');
    Route::get('retornar_usuario/{id}','UsuarioController@retornarUsuarios')->name('retornar_usuario');
    
    
});


Route::get('/home', 'HomeController@index')->name('home');
