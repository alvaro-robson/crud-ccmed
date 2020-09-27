<?php 
namespace App\Model;
require_once "vendor/autoload.php";
$material = new \App\Model\Material();
$materialDao = new \App\Model\MaterialDao();
foreach($materialDao->editar_material() as $editar);

if(isset($_POST['btnExcluir'])){
	$materialDao->delete();
	header("location:index.php");
}
if(isset($_POST['btnCancelar'])){
	header("location:index.php");
}


echo "<img src = upload/" . $editar['imagem'] . " class = 'imagem-material'> " .  "Deseja excluir " . $editar['nome_material'] . " " .  $editar['desc_material'] . "?";
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/estilo2.css">
</head>
<body>
	<form method="POST" action= <?php $_SERVER['PHP_SELF']; ?>>
		<input type="submit" name="btnExcluir" value="EXCLUIR">
		<input type="submit" name="btnCancelar" value="CANCELAR">
	</form>
</body>
</html>