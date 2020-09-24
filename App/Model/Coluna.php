<?php 
namespace App\Model;

class Coluna{
	private $id_coluna, $nome_coluna, $id_corr_fk;

	//------------
	public function getid_coluna(){
		return $this->id_coluna;
	}
	public function setid_coluna($id_coluna){
		$this->id_coluna = $id_coluna;
	}
	//------------
	public function getnome_coluna(){
		return $this->nome_coluna;
	}
	public function setnome_coluna($nome_coluna){
		$this->nome_coluna = $nome_coluna;
	}
	//------------
	public function getid_corr_fk(){
		return $this->id_corr_fk;
	}
	public function setid_corr_fk($id_corr_fk){
		$this->id_corr_fk = $id_corr_fk;
	}
}

 ?>