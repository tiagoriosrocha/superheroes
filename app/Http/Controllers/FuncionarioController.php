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

    function buscarPorNomeAsync($nome = null){
        $collection = $this->importarDados();
        if($nome != ""){
          $result = $collection->where('nome', $nome);  
          return json_encode($result);
        }
        return $collection;
    }

}
