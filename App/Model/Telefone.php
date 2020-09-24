<?php 

namespace App\Model;

class Telefone{

	public function getid_telefone(){
		return $this->id_telefone;
	}
	public function setid_telefone($id_telefone){
		$this->id_telefone = $id_telefone;
	}

	public function getnumero_tel(){
		return $this->numero_tel;
	}
	public function setnumero_tel($numero_tel){
		$this->numero_tel = $numero_tel;
	}

	public function getid_forn_fk(){
		return $this->id_forn_fk;
	}
	public function setid_forn_fk($id_forn_fk){
		$this->id_forn_fk = $id_forn_fk;
	}



}

 ?>