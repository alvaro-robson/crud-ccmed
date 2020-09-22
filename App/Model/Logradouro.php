<?php 
namespace App\Model;

class Logradouro{
	
	private $cep, $nome_logra, $tipo_logra, $id_cidade_fk;

	public function getcep(){
		return $this->cep;
	}
	public function setcep($cep){
		$this->cep = $cep;
	}

	public function getnome_logra(){
		return $this->nome_logra;
	}
	public function setnome_logra($nome_logra){
		$this->nome_logra = $nome_logra;
	}

	public function gettipo_logra(){
		return $this->tipo_logra;
	}
	public function settipo_logra($tipo_logra){
		$this->tipo_logra = $tipo_logra;
	}

	public function getid_cidade_fk(){
		return $this->id_cidade_fk;
	}
	public function setid_cidade_fk($id_cidade_fk){
		$this->id_cidade_fk = $id_cidade_fk;
	}
}

 ?>