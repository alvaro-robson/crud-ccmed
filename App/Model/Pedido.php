<?php 
namespace App\Model;

class Pedido{

	public function getid_pedido(){
		return $this->id_pedido;
	}
	public function setid_pedido($id_pedido){
		$this->id_pedido = $id_pedido;
	}

	public function getdata_abertura(){
		return $this->data_abertura;
	}
	public function setdata_abertura($data_abertura){
		$this->data_abertura = $data_abertura;
	}

	public function getvencimento(){
		return $this->vencimento;
	}
	public function setvencimento($vencimento){
		$this->vencimento = $vencimento;
	}

	public function getdata_fechamento(){
		return $this->data_fechamento;
	}
	public function setdata_fechamento($data_fechamento){
		$this->data_fechamento = $data_fechamento;
	}

	public function getstatus_pedido(){
		return $this->status_pedido;
	}
	public function setstatus_pedido($status_pedido){
		$this->status_pedido = $status_pedido;
	}

	public function getid_usuario_fk(){
		return $this->id_usuario_fk;
	}
	public function setid_usuario_fk($id_usuario_fk){
		$this->id_usuario_fk = $id_usuario_fk;
	}
}


 ?>