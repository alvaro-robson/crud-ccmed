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
<div class="container">
<?php
foreach($pedidoDao->confirmarPedido() as $confirmar){
    echo
    "Selecione quantas unidades deseja de:<br>".
    $confirmar['nome_material'] . " " . 
    $confirmar['desc_material'] . "<br>
    <img src = upload/" . $confirmar['imagem'] . " class = 'imagem-material'> <br>"  ;
}

if(isset($_POST['btnConfirmar'])){
    $detalhe->setquantidade($_POST['quantidade']);
    $detalhe->setid_material_fk($confirmar['id_material']);
    $detalhe->setid_pedido_fk($ultimo);
    $detalheDao->create($detalhe);
    header("location:fazer-pedido.php");
}

foreach($materialDao->read() as $materiais);
?>

<form method="post">
<input type="number" name="quantidade" placeholder="Qtde. desejada" min="0" max="<?php echo $materiais['qtde_estoque']; ?>">
    <input type="submit" value = "Confirmar" name = "btnConfirmar">
</form>
