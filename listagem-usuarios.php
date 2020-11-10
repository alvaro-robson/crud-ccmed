<?php 
  namespace App\Model; 
  require_once "vendor/autoload.php";
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
  $usuario = new \App\Model\Usuario;
  $usuarioDao = new \App\Model\UsuarioDao;
  
  session_start();
    if(!isset($_SESSION['id_usuario'])){
        session_destroy();
        header("location:login.php");
    }else{
        $usuarioDao->mostrarSessao();
    }

echo "<h3><strong><u>Listagem dos usuários</u></strong></h3><br>";
$usuarioDao->relatorioUsuarios();