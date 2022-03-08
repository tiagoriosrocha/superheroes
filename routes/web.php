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

//carrega a página principal com o componente vue.js dentro
Route::get('/', function () {
    return view('layout.app');
});

//primeiras três rotas para testar a aplicação, sem layout ou vue.js
Route::get("listar", 'FuncionarioController@listar');
Route::get("buscar-nome/{nome}", 'FuncionarioController@buscarPorNome');
Route::get("buscar-email/{email}", 'FuncionarioController@buscarPorEmail');

//método que carrega o formulário e outro para fazer a busca
Route::get("buscar-nome-async/{palavra?}", 'FuncionarioController@buscarPorNomeAsync');
