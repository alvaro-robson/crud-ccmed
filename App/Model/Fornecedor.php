<?php 
namespace App\Model;

class Fornecedor{
	private $id_forn, $nome_forn, $num_endereco, $complemento_end;

	//------------
	public function getid_forn(){
		return $this->id_forn;
	}
	public function setid_forn($id_forn){
		$this->id_forn = $id_forn;
	}
	//------------
	public function getnome_forn(){
		return $this->nome_forn;
	}
	public function setnome_forn($nome_forn){
		$this->nome_forn = $nome_forn;
	}
	//------------
	public function getnum_endereco(){
		return $this->num_endereco;
	}
	public function setnum_endereco($num_endereco){
		$this->num_endereco = $num_endereco;
	}
	//------------
	public function getcomplemento_end(){
		return $this->complemento_end;
	}
	public function setcomplemento_end($complemento_end){
		$this->complemento_end = $complemento_end;
	}
}

 ?>