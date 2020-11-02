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
foreach ($usuarioDao->read() as $usuarios) {
	echo
	"<img src = upload/" . $usuarios['imagem'] . " class = 'imagem-material'><br> 
	ID = " . $usuarios['id_usuario'] . "<br>  
	Login = " . $usuarios['login'] . "<br> 
	Nome = " . $usuarios['nome'] . " " . $usuarios['sobrenome'] . "<br>
	Matrícula = " . $usuarios['matricula'] . "<br>
	Nível de acesso = " . $usuarios['id_acesso_fk'] . "<br>
	<a href = editar-usuario.php?id_usuario=" . $usuarios['id_usuario'] . ">
	<img src = 'icones/edit-64.png' class = 'icones'>
	</a>
	<a href = excluir-usuario.php?id_usuario=".$usuarios['id_usuario'].">
		<img src = 'icones/x-mark-4-64.png' class = 'icones'>
	</a> 
	<br>____________________________<br>";
}