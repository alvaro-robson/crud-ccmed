<?php 
namespace App\Model;

class PedidoDao{
	public function create(Pedido $ped){
		$sql = 'INSERT INTO PEDIDO(data_fechamento, status_pedido, id_usuario_fk)VALUES(?, ?, ?)';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $ped->getdata_fechamento());
		$stmt->bindValue(2, $ped->getstatus_pedido());
		$stmt->bindValue(3, $ped->getid_usuario_fk());
		$stmt->execute();
	}

	public function read(){
		$sql = "SELECT id_pedido, data_abertura, date_add(vencimento, interval 7 day) as 'vencimento', data_fechamento, status_pedido, id_usuario_fk FROM PEDIDO";//FOI PRECISO CRIAR UM ALIAS PARA O VENCIMENTO COM DATE_ADD, POIS SEU ÍNDICE NO FOREACH NÃO ESTAVA SENDO RECONHECIDO SEM O ALIAS
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			echo "Nenhum Registro";
		}
	}

	public function update(Pedido $ped){
		$sql = 'UPDATE PEDIDO SET data_fechamento = ?, status_pedido = ?, id_usuario_fk = ? WHERE id_pedido = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $ped->getdata_fechamento());
		$stmt->bindValue(2, $ped->getstatus_pedido());
		$stmt->bindValue(3, $ped->getid_usuario_fk());
		$stmt->bindValue(4, $ped->getid_pedido());
		$stmt->execute();
	}

	public function delete($id_pedido){
		$sql = 'DELETE FROM PEDIDO WHERE id_pedido = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_pedido);
		$stmt->execute();
	}
}


 ?>