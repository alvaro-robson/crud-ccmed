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
//echo "Quantidade atual: " . $editar['qtde_estoque'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/estilo2.css">

</head>
<body>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<h3>Insira a quantidade a ser armazenada de <?php echo $mostrar['nome_material'] . " " . $mostrar['desc_material'] . "<br>
		Quantidade atual: " . $mostrar['qtde_estoque'] . "
		<img src = upload/" . $mostrar['imagem'].">" ;?></h3>
		<input type="number" name="qtde">
		<input type="submit" name="btnArmazenar" value="Armazenar">
	</form>
</body>
</html>