<?php 
//namespace para o autoload(carregamento automático de classes pelo PSR-4)
namespace App\Model;

class Corredor{
    //---
    private $id_corr, $nome_corredor;
    //---
    public function getid_corr(){
      return $this->id_corr;
    }
    public function setid_corr($id_corr){
      $this->id_corr = $id_corr;
    }
    //---
    public function getnome_corredor(){
        return $this->nome_corredor;
    }
    public function setnome_corredor($nome_corredor){
      $this->nome_corredor = $nome_corredor;
    }
    //---
  }
?>