<?php 
namespace App\Model;
require_once "vendor/autoload.php";
$material = new \App\Model\Material;
$materialDao = new \App\Model\MaterialDao;
$usuarioDao = new \App\Model\UsuarioDao;
foreach($materialDao->editar_material() as $editar);

session_start();
if(!isset($_SESSION['id_usuario'])){
    session_destroy();
    header("location:login.php");
}else{
	$usuarioDao->mostrarSessao();
}

?>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <!-- Bootstrap CSS -->
    <link href="custom.css" rel="stylesheet">

    <title>Exclusão de material</title>
  </head>
  <body class="color">
  	 <div class="container mt-5">
        <div class="col-sm-12">
        	<?php 
        	if(isset($_POST['btnExcluir'])){
          	$materialDao->delete();
          	header("location:index.php");
          }
          if(isset($_POST['btnCancelar'])){
          	header("location:index.php");
          }


          echo "<img width = '100%' src = upload/" . $editar['imagem'] . " class = 'imagem-material'> " .  "Deseja excluir " . $editar['nome_material'] . " " .  $editar['desc_material'] . "?";
        	
        	 ?>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="mb-">
		<input type="submit" name="btnExcluir" value="SIM" class="btn btn-secondary btn-block btn-lg mt-5">
		<input type="submit" name="btnCancelar" value="NÃO" class="btn btn-secondary btn-block btn-lg mt-5">
	</form>
</div>
</div>
</body>
</html>