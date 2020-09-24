<?php 
namespace App\Model;

class Cidade{
	private $id_cidade, $nome_cidade, $id_estado_fk;

	//------------
	public function getid_cidade(){
		return $this->id_cidade;
	}
	public function setid_cidade($id_cidade){
		$this->id_cidade = $id_cidade;
	}
	//------------
	public function getnome_cidade(){
		return $this->nome_cidade;
	}
	public function setnome_cidade($nome_cidade){
		$this->nome_cidade = $nome_cidade;
	}
	//------------
	public function getid_estado_fk(){
		return $this->id_estado_fk;
	}
	public function setid_estado_fk($id_estado_fk){
		$this->id_estado_fk = $id_estado_fk;
	}
}

 ?>