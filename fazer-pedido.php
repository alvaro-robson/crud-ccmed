<?php 
	namespace App\Model; 
	require_once "vendor/autoload.php";
	$material = new \App\Model\Material;
	$materialDao = new \App\Model\MaterialDao;
	$pedido = new \App\Model\Pedido;
	$pedidoDao = new \App\Model\PedidoDao;
	$usuario = new \App\Model\Usuario;
	$usuarioDao = new \App\Model\UsuarioDao;
	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/estilo2.css">
</head>
<body>
	<script src = "scripts/document.js"></script>
	<script>pedidoIniciado();</script>
	<?php
	session_start();
if(!isset($_SESSION['id_usuario'])){
    session_destroy();
    header("location:login.php");
}else{
	$usuarioDao->mostrarSessao();
}

	//MOSTRANDO O PEDIDO ATUAL:
	foreach($pedidoDao->ultimo_pedido() as $ultimo){
		echo "<br>Pedido atual: " . $ultimo . "<br>";
	}

	$pedidoDao->mostrarItens();

	?>
	<div class="container">
	   <form method="post">
		   <!--input type="submit" name="cancelarPedido" value="Cancelar pedido"-->
		   <input type="submit" name="finalizarPedido" value = "Finalizar pedido">
	   </form>
	   <?php
		/*
		//Cancelando o pedido(Excluindo-o do banco)
		if(isset($_POST['cancelarPedido'])){
			$pedido->setid_pedido($ultimo);
			$pedidoDao->transferirPedidoCancelado($pedido);
			$pedidoDao->cancelarPedido($pedido);
			header("location:menu-pedidos.php");
		}
		*/
		if(isset($_POST['finalizarPedido'])){
			header("location:menu-pedidos.php");
		}

		

		//Mostrando os materiais a serem solicitados
		foreach($materialDao->read() as $materiais){
			echo
				"<img src = upload/" . $materiais['imagem'] . " class = 'imagem-material'><br>
				ID = " . $materiais['id_material'] . "<br>
				Nome = " . $materiais['nome_material'] . "<br>
				Descrição = " . $materiais['desc_material'] . "<br>
				Qtde. estoque = " . $materiais['qtde_estoque'] . "<br>
				ID prateleira = " . $materiais['id_prat_fk'] . "<br>
				ID fornecedor = " . $materiais['id_forn_fk'] . "<br>
				<a href = confirmar-pedido.php?id=" . $materiais['id_material'] . ">SOLICITAR</a>";
		}