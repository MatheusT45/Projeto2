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
    return view('auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dados_cadastrais', 'UsuarioController@dados')->name('dados_cadastrais');
Route::post('atualiza_dados', 'UsuarioController@atualizaDados')->name('atualiza_dados');
Auth::routes();

/* fazer middleware de admin */
Route::get('lista_usuarios','UsuarioController@listaUsuarios')->name('lista_usuarios');

Route::get('/home', 'HomeController@index')->name('home');
