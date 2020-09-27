<?php 
namespace App\Model;
require_once "vendor/autoload.php";
$material = new \App\Model\Material();
$materialDao = new \App\Model\MaterialDao();
foreach($materialDao->editar_material() as $editar);

if(isset($_POST['btnEditar'])){
	$material->setid_material($editar['id_material']);
	$material->setnome_material($_POST['nome_material_edit']);
	$material->setdesc_material($_POST['desc_material_edit']);
	$material->setqtde_estoque($_POST['qtde_estoque_edit']);
	$material->setid_prat_fk($_POST['id_prat_fk_edit']);
	$material->setid_forn_fk($_POST['id_forn_fk_edit']);
	$materialDao->update($material);
	header("location:index.php");
}
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" href="css/estilo2.css">
 </head>
 <body>
 	<div class="form-container">
	 	<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
	 		<input type="text" name="nome_material_edit" placeholder="Nome do material" value="<?= $editar['nome_material'];?>">
	 		<input type="text" name="desc_material_edit" placeholder="Descrição" value="<?php echo $editar['desc_material'];?>">
	 		<input type="number" name="qtde_estoque_edit" placeholder="Quantidade" value="<?php echo $editar['qtde_estoque'];?>">
	 		<input type="number" name="id_prat_fk_edit" placeholder="ID prateleira" value="<?php echo $editar['id_prat_fk'];?>">
	 		<input type="number" name="id_forn_fk_edit" placeholder="ID fornecedor" value="<?php echo $editar['id_forn_fk'];?>">
	 		<input type="file" name="nome_imagem_edit" value="<?php echo $editar['nome_imagem'];?>">
	 		<input type="submit" name="btnEditar" value="SALVAR">
	 	</form>
 	</div>
 </body>
 </html>