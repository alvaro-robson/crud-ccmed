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

	public function ultimo_pedido(){//mostra o último pedido
		$sql = 'SELECT MAX(id_pedido) FROM PEDIDO';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() == 1){
			$resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}

	
	
	public function cancelarPedido(Pedido $ped){
		$sql = "DELETE FROM PEDIDO where id_pedido = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $ped->getid_pedido());
		$stmt->execute();		
	}
	//MANDA O PEDIDO PRA TABELA PEDIDO_CANCELADO ANTES DE EXCLUÍ-LO DA TABELA PEDIDO
	public function transferirPedidoCancelado(Pedido $ped){
		$sql = "INSERT INTO PEDIDO_CANCELADO
		(id_pedido_original, data_abertura, vencimento, data_fechamento, status_pedido, id_usuario_fk)
		select id_pedido, data_abertura, vencimento, data_fechamento, status_pedido, id_usuario_fk
		from PEDIDO WHERE id_pedido = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $ped->getid_pedido());
		$stmt->execute();
	}

	/*
	//Altera para "Cancelado" o status do último pedido da tabela, ou seja, o pedido atual, caso o usuario clique em Cancelar
	public function cancelarPedido(Pedido $ped){
		$sql = "UPDATE PEDIDO SET status_pedido = 'Cancelado' where id_pedido = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $ped->getid_pedido());
		$stmt->execute();		
	}
	*/
	

	public function confirmarPedido(){
		$id = $_GET['id'];
		$sql = 'SELECT * FROM MATERIAL WHERE id_material = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $resultado;
	}

	public function mostrarPedidos(Usuario $usu){
		$sql = "SELECT id_pedido, data_abertura, DATE_ADD(vencimento, interval 7 DAY) AS 'vencimento', data_fechamento, status_pedido FROM PEDIDO WHERE id_usuario_fk = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $usu->getid_usuario());
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}
	}

	public function detalharPedidos(Usuario $usu){
		$id_pedido = $_GET['id_pedido'];
		$sql = "SELECT P.id_pedido, M.nome_material, D.quantidade, P.id_usuario_fk, U.nome, P.status_pedido, P.data_abertura, DATE_ADD(vencimento, INTERVAL 7 DAY) AS 'vencimento'
		FROM PEDIDO P INNER JOIN DETALHE_PEDIDO AS D
		ON P.id_pedido = D.id_pedido_fk INNER JOIN MATERIAL AS M
		ON D.id_material_fk = M.id_material INNER JOIN USUARIO AS U
		ON P.id_usuario_fk = U.id_usuario WHERE id_usuario = ? and P.id_pedido = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $usu->getid_usuario());
		$stmt->bindValue(2, $id_pedido);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			//header("location:meus-pedidos.php");
			?>
				<script>
					redirecionar();
				</script>
			<?php
		}
	}

	
}


 ?>