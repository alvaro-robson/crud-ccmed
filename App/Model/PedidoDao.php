<?php 
namespace App\Model;
?>
	<script src = "../scripts/document.js"></script>
<?php

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
			foreach($resultado as $res){
                echo
				"
				<div class='container'>
					<div class='row'>
						<div class='col-12 col-sm-12'>
						<p>
						Nº pedido: <b>" . $res['id_pedido'] . "</b><br>
						Abertura: <b>" . $res['data_abertura'] . "</b><br>
						Vencimento: <b>" . $res['vencimento'] . "</b><br>
						Fechamento: <b>" . $res['data_fechamento'] . "</b><br>
						Status: <b>" . $res['status_pedido'] . "</b><br>
						Usuário: <b>" . $res['id_usuario_fk'] . "</b><br>

						</p>
						<a href = detalhar-pedidoGeral.php?id_pedido=" . $res['id_pedido'].">
						<button class='btn btn-block btn-info'>Detalhar</button></a>
				
				
				
				</div>
				</div>
				</div>
				";
            }
			return $resultado;
		}else{
			echo "
			<div class='container'>
					<div class='row'>
						<div class='col-12 col-sm-12'>
						<p>Nenhum Registro</p>
						</div>
					</div>
			</div>
			";
		}
	}

	public function readFiltro(Pedido $ped){
		$sql = "SELECT id_pedido, data_abertura, date_add(vencimento, interval 7 day) as 'vencimento', data_fechamento, status_pedido, id_usuario_fk FROM PEDIDO where status_pedido = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $ped->getstatus_pedido());
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			foreach($resultado as $res){
                echo
				"
				<div class='container'>
					<div class='row'>
						<div class='col-12 col-sm-12 mb-3'>
						
				Nº pedido: <b>" . $res['id_pedido'] . "</b><br>
                Abertura: <b>" . $res['data_abertura'] . "</b><br>
                Vencimento: <b>" . $res['vencimento'] . "</b><br>
                Fechamento: <b>" . $res['data_fechamento'] . "</b><br>
                Status: <b>" . $res['status_pedido'] . "</b><br>
				Usuário: <b>" . $res['id_usuario_fk'] . "</b><br>
				
				<a href = detalhar-pedidoGeral.php?id_pedido=" . $res['id_pedido'].">
				<button class='btn btn-block btn-info ' >Detalhar</button>
				</a>
				
				</div>
				</div>
				</div>
				";
            }
			return $resultado;
		}else{
			echo "
			<div class='container'>
				<div class='row'>
					<div class='col-12 col-sm-12'>
						<p>Nenhum Registro</p>
				</div>
			</div>
	</div>";
		}
	}

	public function readCancelados(){
		$sql = "SELECT id_pedido_original, id_pedido_cancelado, data_abertura, date_add(vencimento, interval 7 day) as 'vencimento', data_fechamento, status_pedido, id_usuario_fk FROM PEDIDO_CANCELADO";//FOI PRECISO CRIAR UM ALIAS PARA O VENCIMENTO COM DATE_ADD, POIS SEU ÍNDICE NO FOREACH NÃO ESTAVA SENDO RECONHECIDO SEM O ALIAS
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			foreach($resultado as $res){
                echo
				"
				<div class='container'>
					<div class='row'>
						<div class='col-12 col-sm-12 mb-3'>
							<p>
							Nº pedido: <b>" . $res['id_pedido_original'] . "</b><br>
							Abertura: <b>" . $res['data_abertura'] . "</b><br>
							Vencimento: <b>" . $res['vencimento'] . "</b><br>
							Fechamento: <b>" . $res['data_fechamento'] . "</b><br>
							Status: <b>" . $res['status_pedido'] . "</b><br>
							Usuário: <b>" . $res['id_usuario_fk'] . "</b><br>
							</p>
							<a href = detalhar-pedidoGeral.php?id_pedido=" . $res['id_pedido_original'].">
							<button class='btn btn-block btn-info'>Detalhar</button>
							</a>

							
				</div>
				</div>
				</div>
				";
            }
			return $resultado;
		}else{
			echo "
			<div class='container'>
					<div class='row'>
						<div class='col-12 col-sm-12 mb-3'>
						<p>Nenhum Registro cancelado</p>
						</div>
					</div>
				</div>
			";
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
	/*
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
		from PEDIDO WHERE id_pedido = ?; 
		UPDATE PEDIDO_CANCELADO SET status_pedido = 'Cancelado'";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $ped->getid_pedido());
		$stmt->execute();
	}
	*/
	public function cancelarPedido(Pedido $ped){
		$sql = "UPDATE PEDIDO SET status_pedido = 'Cancelado' WHERE id_pedido = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $ped->getid_pedido());
		$stmt->execute();
	}

	public function confirmarPedido(){
		$id = $_GET['id'];
		$sql = 'SELECT * FROM MATERIAL WHERE id_material = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $resultado;
	}

	public function mostrarPedidosUsuario(Usuario $usu){
		$sql = "SELECT id_pedido, data_abertura, DATE_ADD(vencimento, interval 7 DAY) AS 'vencimento', data_fechamento, status_pedido FROM PEDIDO WHERE id_usuario_fk = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $usu->getid_usuario());
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
			foreach($resultado as $res){
			echo
			"
			<div class='container'>
			<div class='row'>
			<div class='col-12 col-sm-12'>
			<p>Número do Pedido: <b>" . $res['id_pedido'] . "<br></b>
			Data de Abertura:<b> " . $res['data_abertura'] . "</b><br>
			Vencimento:<b> " . $res['vencimento'] . "</b> <br>
			Fechamento: <b>" . $res['data_fechamento'] . "</b><br>
			Status: <b>" . $res['status_pedido'] . "</b><br>
			<a href = detalhar-pedido.php?id_pedido=" . $res['id_pedido'].">
			<button class='btn btn-info btn-lg btn-block'> Detalhar
			</button> 
			</a>
			<br>
			</p>
			</div>
			</div>
			</div>
			";
			}
			return $resultado;
		}else{
			echo "Você não tem nenhum pedido";
		}
	}

	public function mostrarPedidosGeral(){
		$sql = "SELECT id_pedido, data_abertura, DATE_ADD(vencimento, interval 7 DAY) AS 'vencimento', data_fechamento, status_pedido, id_usuario_fk FROM PEDIDO";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			?>
			<script>
				redirecionar();
			</script>
			<?php
		}
	}

	public function detalharPedidosUsuario(Usuario $usu){
		$id_pedido = $_GET['id_pedido'];
		$sql = "SELECT P.id_pedido, M.nome_material, D.quantidade, P.id_usuario_fk, U.nome, P.status_pedido, P.data_abertura, P.id_pedido, DATE_ADD(vencimento, INTERVAL 7 DAY) AS 'vencimento'
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
			/*
			?>
			<script>
				redirecionar();
			</script>
			<?php
			*/
		}
	}

	public function detalharPedidosGeral(){
		$id_pedido = $_GET['id_pedido'];
		$sql = "SELECT P.id_pedido, M.nome_material, D.quantidade, P.id_usuario_fk, U.nome, P.status_pedido, P.data_abertura, P.id_pedido, DATE_ADD(vencimento, INTERVAL 7 DAY) AS 'vencimento'
		FROM PEDIDO P INNER JOIN DETALHE_PEDIDO AS D
		ON P.id_pedido = D.id_pedido_fk INNER JOIN MATERIAL AS M
		ON D.id_material_fk = M.id_material INNER JOIN USUARIO AS U
		ON P.id_usuario_fk = U.id_usuario WHERE P.id_pedido = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_pedido);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			foreach($resultado as $res){
				echo
				"
				<div class='container'>
				<div class='row'>
					<div class='col-12 col-sm-12'>
					<p>
					<br>Material : <b>" . $res['nome_material'] . "</b><br>
					Quantidade: <b>" . $res['quantidade'] . "</b><br>
					Status: <b>" . $res['status_pedido'] . "</b><br>
					Abertura: <b>" . $res['data_abertura'] . "</b><br>
					Vencimento: <b>" . $res['vencimento'] . "</b><br>
					</p>
				</div>
				</div>
				</div>
				";
			}
			return $resultado;
		}else{
			//header("location:meus-pedidos.php");
			
		}
	}

	public function liberarPedido(Pedido $ped){
		$sql = "UPDATE PEDIDO SET status_pedido = 'Liberado' where id_pedido = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $ped->getid_pedido());
		$stmt->execute();
	}

	public function mostrarItens(Detalhe_pedido $det){
		$sql = "SELECT M.nome_material, D.quantidade, D.id_material_fk, D.id_detalhe
		FROM MATERIAL M INNER JOIN DETALHE_PEDIDO AS D
		ON D.id_material_fk = M.id_material WHERE D.id_pedido_fk = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $det->getid_pedido_fk());
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}
}


 ?>