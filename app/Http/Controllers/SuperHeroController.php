<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class SuperHeroController extends Controller
{
    function importarDados(){
        $collection = (new FastExcel)->import('heroes_information.csv',function($item){
            $sh = new \App\SuperHero();
            $sh->id = $item['Id'];
            $sh->nome = $item['Name'];
            $sh->raca = $item['Race'];
            $sh->editora = $item['Publisher'];
            $sh->alinhamento = $item['Alignment'];

            return $sh;
        });

        return $collection;
    }

    function buscarPorNomeAsync($nome = null){
        $collection = $this->importarDados();
        if($nome != ""){
          $result = $collection->where('Name', $nome);  
          return json_encode($result);
        }
        return $collection;
    }
}
