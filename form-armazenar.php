<?php 
namespace App\Model;
require_once "vendor/autoload.php";
$material = new \App\Model\Material();
$materialDao = new \App\Model\MaterialDao();
foreach ($materialDao->editar_material() as $mostrar)

if(isset($_POST['btnArmazenar'])){
	$material->setqtde_estoque($_POST['qtde']);
	$material->setid_material($id);
	$materialDao->armazenar($material);
	header("location:index.php");
}
if(isset($_POST['btnCancelar'])){
          	header("location:index.php");
          }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <!-- Bootstrap CSS -->
    <link href="custom.css" rel="stylesheet">

</head>
<body class="color">
	<div class="container mt-5">
        <div class="col-sm-12">
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<h3>Insira a quantidade a ser armazenada de <?php echo $mostrar['nome_material'] . " " . $mostrar['desc_material'] . "<br>
		Quantidade atual: " . $mostrar['qtde_estoque'] . "
		<img width = '100%' src = upload/" . $mostrar['imagem'].">" ;?></h3>
		<input type="number" name="qtde" pattern="[0-9]+$" min="1">
		<input type="submit" name="btnArmazenar" value="Armazenar" class="btn btn-secondary btn-block btn-lg mt-5">
		<input type="submit" name="btnCancelar" value="Cancelar" class="btn btn-secondary btn-block btn-lg mt-5">
	</form>
</body>
</html>