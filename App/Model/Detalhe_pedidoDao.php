<?php 
namespace App\Model;

class Detalhe_pedidoDao{
	
	public function create(Detalhe_pedido $det){
		$sql = 'INSERT INTO DETALHE_PEDIDO(quantidade, id_material_fk, id_pedido_fk)VALUES(?, ?, ?)';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $det->getquantidade());
		$stmt->bindValue(2, $det->getid_material_fk());
		$stmt->bindValue(3, $det->getid_pedido_fk());
		$stmt->execute();
	}

	public function read(){
		$sql = 'SELECT * FROM DETALHE_PEDIDO';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			echo "";
		}
	}

	public function update(Detalhe_pedido $det){
		$sql = 'UPDATE DETALHE_PEDIDO SET quantidade = ?, id_material_fk = ?, id_pedido_fk = ? WHERE id_detalhe = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $det->getquantidade());
		$stmt->bindValue(2, $det->getid_material_fk());
		$stmt->bindValue(3, $det->getid_pedido_fk());
		$stmt->bindValue(4, $det->getid_detalhe());
		$stmt->execute();
	}

	public function delete(Detalhe_pedido $det){
		$sql = 'DELETE FROM DETALHE_PEDIDO WHERE id_detalhe = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $det->getid_detalhe());
		$stmt->execute();
	}

	public function deletar_item(Detalhe_pedido $det){
		$sql = 'DELETE FROM DETALHE_PEDIDO WHERE id_detalhe = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $det->getid_detalhe());
		$stmt->execute();
	}
}

 ?>