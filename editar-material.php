<?php 
namespace App\Model;
require_once "vendor/autoload.php";
$material = new \App\Model\Material();
$materialDao = new \App\Model\MaterialDao();
foreach($materialDao->editar_material() as $editar);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" href="css/estilo2.css">
 </head>
 <body>
 	<div class="form-container">
	 	<form action="index.php" method="POST" enctype="multipart/form-data">
	 		<input type="text" name="nome_material" placeholder="Nome do material" value="<?php echo $editar['nome_material'];?>">
	 		<input type="text" name="desc_material" placeholder="Descrição" value="<?php echo $editar['desc_material'];?>">
	 		<input type="number" name="qtde_estoque" placeholder="Quantidade" value="<?php echo $editar['qtde_estoque'];?>">
	 		<input type="number" name="id_prat_fk" placeholder="ID prateleira" value="<?php echo $editar['id_prat_fk'];?>">
	 		<input type="number" name="id_forn_fk" placeholder="ID fornecedor" value="<?php echo $editar['id_forn_fk'];?>">
	 		<input type="file" name="nome_imagem" value="<?php echo $editar['nome_imagem'];?>">
	 		<input type="submit" name="btnEditar" value="SALVAR">
	 	</form>
 	</div>
 </body>
 </html>