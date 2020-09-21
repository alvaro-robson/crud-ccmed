<?php 
namespace App\Model;
require_once "vendor/autoload.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" href="css/estilo.css">
 </head>
 <body>
 	<div class="form-container">
	 	<form action="index.php" method="POST">
	 		<input type="text" name="nome_material" placeholder="Nome do material">
	 		<input type="text" name="desc_material" placeholder="Descrição">
	 		<input type="number" name="qtde_estoque" placeholder="Quantidade">
	 		<input type="number" name="id_prat_fk" placeholder="ID prateleira">
	 		<input type="number" name="id_forn_fk" placeholder="ID fornecedor">
	 		<input type="submit" name="btnCadastrar" value="CADASTRAR">
	 	</form>
 	</div>
 </body>
 </html>