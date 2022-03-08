<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class FuncionarioController extends Controller
{
    function listar(){

        $collection = (new FastExcel)->import('usuario.csv',function($item){
            $func = new \App\Funcionario();
            $func->nome = $item['nome'];
            $func->idade = $item['idade'];
            $func->email = $item['email'];

            return $func;
        });
        
        return view('carrega-csv',['funcionarios' => $collection]);
    }

    function buscarPorNome($nome){
        $collection = (new FastExcel)->import('usuario.csv',function($item){
            $func = new \App\Funcionario();
            $func->nome = $item['nome'];
            $func->idade = $item['idade'];
            $func->email = $item['email'];

            return $func;
        });

        $result = $collection->where('nome',$nome);
        return view('carrega-csv',['funcionarios' => $result]);
    }

    function buscarPorEmail($email){
        $collection = (new FastExcel)->import('usuario.csv',function($item){
            $func = new \App\Funcionario();
            $func->nome = $item['nome'];
            $func->idade = $item['idade'];
            $func->email = $item['email'];

            return $func;
        });

        $result = $collection->where('email',$email);
        return view('carrega-csv',['funcionarios' => $result]);
    }

    function carregaFormularioBusca(){
        return view('form-busca');
    }

    function buscarPorNomeAsync($nome){
        $collection = (new FastExcel)->import('usuario.csv',function($item){
            $func = new \App\Funcionario();
            $func->nome = $item['nome'];
            $func->idade = $item['idade'];
            $func->email = $item['email'];

            return $func;
        });

        $result = $collection->where('nome',$nome);
        return json_encode($result);   
    }
}
