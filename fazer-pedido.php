<?php 
	namespace App\Model; 
	require_once "vendor/autoload.php";
	$material = new \App\Model\Material;
	$materialDao = new \App\Model\MaterialDao;
	$pedido = new \App\Model\Pedido;
	$pedidoDao = new \App\Model\PedidoDao;
	$detalhe = new \App\Model\Detalhe_pedido;
	$detalheDao = new \App\Model\Detalhe_pedidoDao;
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
<div class="container">
	<script src = "scripts/document.js"></script>
	<!--script>pedidoIniciado();</script-->
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
		echo 
		"Selecione os itens desejados<br>
		==================<br>
		<i>Pedido atual: " . $ultimo . "</i><br>
		==================<br>";
	}

	$detalhe->setid_pedido_fk($ultimo);
	
	//FUNÇÃO PARA A LISTAGEM DE ITENS SOLICITADOS EM TEMPO REAL:
	foreach($detalheDao->read() as $detalhes);//o foreach sem chaves pega último valor do array automaticamente
	//se o ultimo valor do id_pedido_fk for igual o ultimo valor da tabela PEDIDO($ultimo - declarado acima):
	if ($detalhes['id_pedido_fk'] == $ultimo){
		echo "<br>Itens solicitados:<br>";
		foreach($pedidoDao->mostrarItens($detalhe) as $itens){
			echo $itens['nome_material'] . " - " . $itens['quantidade'] . "un<br>
				-----------------------------<br>";
			if(isset($_POST['btnDevolver'])){
					$material->setqtde_estoque($itens['quantidade']);
					$material->setid_material($itens['id_material_fk']);
					$materialDao->devolver($material);
					$detalhe->setid_detalhe($itens['id_detalhe']);
					$detalheDao->deletar_item($detalhe);
					header("location:menu-pedidos.php");
				}
			}
			?>
			<!--BOTÕES DE SALVAR E CANCELAR PEDIDO:-->
			<form action="<?php $_SERVER['PHP_SELF']?>" method = "POST">
				<a href="fazer-pedido.php?id_material=<?php echo $itens['id_material_fk'];?>">
					<input type="submit" name="btnDevolver" value = "Cancelar">
				</a>
				<input type="submit" name="finalizarPedido" value = "Salvar">
			</form>
			<?php
		}
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
				<a href = confirmar-pedido.php?id=" . $materiais['id_material'] . "><u>SOLICITAR</u></a>";
		}