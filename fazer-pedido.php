<?php 
	namespace App\Model; 
	require_once "vendor/autoload.php";
	$material = new \App\Model\Material;
	$materialDao = new \App\Model\MaterialDao;
	$pedido = new \App\Model\Pedido;
	$pedidoDao = new \App\Model\PedidoDao;
	$detalhe = new \App\Model\Detalhe_pedido;
	$detalheDao = new \App\Model\Detalhe_pedidoDao;
	
	session_start();
	echo 
	'Olá, ' . $_SESSION['nome'] . '! <br>Seja bem-vindo.<br>
	ID: ' . $_SESSION['id_usuario'] . ',<br>
	matrícula: ' . $_SESSION['matricula'] . '<br>
	acesso: ' . $_SESSION['id_acesso_fk'];
	//MOSTRANDO O PEDIDO ATUAL:
	foreach($pedidoDao->ultimo_pedido() as $ultimo){
		echo "<br>Pedido atual: " . $ultimo;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/estilo2.css">
</head>
<body>
	<div class="container">
		<a href="menu.php">MENU</a>
		<a href="login.php">SAIR</a>
		<form method="post">
			<input type="submit" name="cancelarPedido" value="Cancelar pedido">
		</form>
		<a href="menu-pedidos.php" name="cancelarPedido">CANCELAR</a>
	<?php
		//Criando o pedido:
		if(isset($_POST['btnSolicitar'])){
			$detalhe->setquantidade($_POST['quantidade']);
			$detalhe->setid_material_fk($materiais['id_material']);
			$detalhe->setid_pedido_fk($pedidos['id_pedido']);
			$detalheDao->create($detalhe);
		}

		//Cancelando o pedido(Excluindo-o do banco)
		if(isset($_POST['cancelarPedido'])){
			header("location:menu-pedidos.php");
			$pedidoDao->cancelarPedido($pedido);
		}

		//Mostrando os materiais a serem solicitados
		foreach($materialDao->read() as $materiais){
			echo
		"<img src = upload/" . $materiais['imagem'] . " class = 'imagem-material'> " . "<br>" . 
		"ID = " . $materiais['id_material'] . "<br>" .  
		"Nome = " . $materiais['nome_material'] . "<br>" . 
		"Descrição = " . $materiais['desc_material'] . "<br>" .
		"Qtde. estoque = " . $materiais['qtde_estoque'] . "<br>" .
		"ID prateleira = " . $materiais['id_prat_fk'] . "<br>" .
		"ID fornecedor = " . $materiais['id_forn_fk'] . "<br>";
	?>
		<form method="post"><!--Campo numérico e botão de solicitar-->
			<input type="number" name="quantidade" placeholder="Qtde. desejada" min="0" max="<?php echo $materiais['qtde_estoque']; ?>">
			<input type="submit" name="btnSolicitar" value="Solicitar">
		</form>
		<?php 
		}
		
		

		
		
		
 	?>