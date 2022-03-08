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

Route::get('/', function () {
    return view('layout.app');
});


Route::get("listar", 'FuncionarioController@listar');
Route::get("buscar-async", 'FuncionarioController@listarAsync');

Route::get("buscar-nome/{nome}", 'FuncionarioController@buscarPorNome');
Route::get("buscar-email/{email}", 'FuncionarioController@buscarPorEmail');

Route::get("buscar-nome-form", 'FuncionarioController@carregaFormularioBusca');
Route::get("buscar-nome-async/{palavra?}", 'FuncionarioController@buscarPorNomeAsync');
