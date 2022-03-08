<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class FuncionarioController extends Controller
{
    function importarDados(){
        $collection = (new FastExcel)->import('usuario.csv',function($item){
            $func = new \App\Funcionario();
            $func->id = $item['id'];
            $func->nome = $item['nome'];
            $func->idade = $item['idade'];
            $func->email = $item['email'];

            return $func;
        });

        return $collection;
    }

    function listar(){
        $collection = $this->importarDados();
        return view('carrega-csv',['funcionarios' => $collection]);
    }

    function listarAsync(){
        $collection = $this->importarDados();
        return json_encode($collection);
    }

    function buscarPorNome($nome){
        $collection = $this->importarDados();
        $result = $collection->where('nome',$nome);
        return view('carrega-csv',['funcionarios' => $result]);
    }

    function buscarPorEmail($email){
        $collection = $this->importarDados();
        $result = $collection->where('email',$email);
        return view('carrega-csv',['funcionarios' => $result]);
    }

    function carregaFormularioBusca(){
        return view('form-busca');
    }

    function buscarPorNomeAsync($nome = null){
        $collection = $this->importarDados();
        if($nome != ""){
          $result = $collection->where('nome', $nome);  
          return json_encode($result);
        }
        return $collection;
    }
}
