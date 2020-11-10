<?php
namespace App\Model; 
require_once "vendor/autoload.php";
$usuario = new \App\Model\Usuario;
$usuarioDao = new \App\Model\UsuarioDao;
$fornDao = new \App\Model\FornecedorDao;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/estilo2.css">
</head>
<body>
	<script src = "scripts/document.js"></script>
	<div class="container">
		<a href="menu.php">MENU</a>

<?php 
session_start();
if(!isset($_SESSION['id_usuario'])){
	//Se a sessão não existir com id_usuario:
	session_destroy();
	header("location:login.php");
}else if($_SESSION['id_acesso_fk'] != 2){
	//Se o id_acesso do usuário na sessão não for 2(acesso do estoque):
	?>
	<script>acessoRestrito();</script> 
	<?php
}else{
	$usuarioDao->mostrarSessao();
}

$fornDao->relatorioForn();