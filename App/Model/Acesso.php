<?php 
	namespace App\Model;
	class Acesso{
		public function getid_acesso(){
			return $this->id_acesso;
		}
		public function setid_acesso($id_acesso){
			$this->id_acesso = $id_acesso;
		}

		public function getnome_acesso(){
			return $this->nome_acesso;
		}
		public function setnome_acesso($nome_acesso){
			$this->nome_acesso = $nome_acesso;
		}

		public function getdesc_acesso(){
			return $this->desc_acesso;
		}
		public function setdesc_acesso($desc_acesso){
			$this->desc_acesso = $desc_acesso;
		}

	}
 ?>