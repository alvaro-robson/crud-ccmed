<?php 
namespace App\Model;

class Usuario{

	public function getid_usuario(){
		return $this->id_usuario;
	}
	public function setid_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function getlogin(){
		return $this->login;
	}
	public function setlogin($login){
		$this->login = $login;
	}

	public function getsenha(){
		return $this->senha;
	}
	public function setsenha($senha){
		$this->senha = $senha;
	}

	public function getnome(){
		return $this->nome;
	}
	public function setnome($nome){
		$this->nome = $nome;
	}

	public function getsobrenome(){
		return $this->sobrenome;
	}
	public function setsobrenome($sobrenome){
		$this->sobrenome = $sobrenome;
	}

	public function getmatricula(){
		return $this->matricula;
	}
	public function setmatricula($matricula){
		$this->matricula = $matricula;
	}

	public function getid_acesso_fk(){
		return $this->id_acesso_fk;
	}
	public function setid_acesso_fk($id_acesso_fk){
		$this->id_acesso_fk = $id_acesso_fk;
	}


}


 ?>