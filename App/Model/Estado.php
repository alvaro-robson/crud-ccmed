<?php 
namespace App\Model;

class Estado{
	private $id_estado, $nome_estado;

	//------------
	public function getid_estado(){
		return $this->id_estado;
	}
	public function setid_estado($id_estado){
		$this->id_estado = $id_estado;
	}
	//------------
	public function getnome_estado(){
		return $this->nome_estado;
	}
	public function setnome_estado($nome_estado){
		$this->nome_estado = $nome_estado;
	}
}

 ?>