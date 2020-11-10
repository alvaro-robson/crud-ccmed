<?php 
namespace App\Model;

class Forn_logra_possui{
	private $id_forn_fk, $cep_fk;

	//------------
	public function getid_forn_fk(){
		return $this->id_forn_fk;
	}
	public function setid_forn_fk($id_forn_fk){
		$this->id_forn_fk = $id_forn_fk;
	}
	//------------
	public function getcep_fk(){
		return $this->cep_fk;
	}
	public function setcep_fk($cep_fk){
		$this->cep_fk = $cep_fk;
	}
}

 ?>