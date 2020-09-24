<?php 
namespace App\Model;

class Prateleira{

	public function getid_prat(){
		return $this->id_prat;
	}
	public function setid_prat($id_prat){
		$this->id_prat = $id_prat;
	}

	public function getnome_prat(){
		return $this->nome_prat;
	}
	public function setnome_prat($nome_prat){
		$this->nome_prat = $nome_prat;
	}

	public function getid_coluna_fk(){
		return $this->id_coluna_fk;
	}
	public function setid_coluna_fk($id_coluna_fk){
		$this->id_coluna_fk = $id_coluna_fk;
	}

}
 ?>
