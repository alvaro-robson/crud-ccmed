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
	matrícula: ' . $_SESSION['matricula'] . ',<br>
	acesso: ' . $_SESSION['id_acesso_fk'];
	
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
	<?php
/*
		if(isset($_POST['btnSolicitar'])){
			//FALTA DEFINIR VARIAVEIS
			$pedidoDao->create($pedido);
			$detalheDao->create($detalhe);
		}
		*/
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
		<form method="post">
			<input type="number" name="" placeholder="Qtde. desejada" min="0" max="<?php echo $materiais['qtde_estoque']; ?>">
			<input type="submit" name="btnSolicitar" value="Solicitar">
		</form>
		<?php 
		}
 	?>