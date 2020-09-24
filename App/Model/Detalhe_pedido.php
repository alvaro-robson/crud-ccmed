<?php 
namespace App\Model;

class Detalhe_pedido{
	
	private $id_detalhe, $quantidade, $id_material_fk, $id_pedido_fk;

	public function getid_detalhe(){
		return $this->id_detalhe;
	}
	public function setid_detalhe($id_detalhe){
		$this->id_detalhe = $id_detalhe;
	}

	public function getquantidade(){
		return $this->quantidade;
	}
	public function setquantidade($quantidade){
		$this->quantidade = $quantidade;
	}

	public function getid_material_fk(){
		return $this->id_material_fk;
	}
	public function setid_material_fk($id_material_fk){
		$this->id_material_fk = $id_material_fk;
	}

	public function getid_pedido_fk(){
		return $this->id_pedido_fk;
	}
	public function setid_pedido_fk($id_pedido_fk){
		$this->id_pedido_fk = $id_pedido_fk;
	}
}

 ?>