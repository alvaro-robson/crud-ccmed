<?php
namespace App\Model; 
require_once "vendor/autoload.php";
$usuario = new \App\Model\Usuario;
$usuarioDao = new \App\Model\UsuarioDao;
$fornDao = new \App\Model\FornecedorDao;
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
     <!-- Bootstrap CSS -->
    <link href="custom.css" rel="stylesheet">
    <title>Listagem de fornecedores</title>
  </head>
<body>
<script src = "scripts/document.js"></script>

		

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
?>
<div class="container">
	<div class="row mt-3">
			<div class="col-sm-12">
				<a href="listagens.php">
					<button class="btn btn-warning btn-block btn-lg">Voltar</button>
				</a>
				
			</div>
		</div>
<?php

$fornDao->relatorioForn();

?>
</div>
<div class="container mt-4 mb-2"><!--  div container 3' -->
		<div class="row">
			<div class="col-sm-12">
				<a href="listagens.php">
					<button class="btn btn-warning btn-block btn-lg">Voltar</button>
				</a>
				<a href="login.php">
					<button class="btn btn-danger btn-block btn-lg mt-2">Sair</button>
				</a>
			</div>
		</div>
	</div>
</body>
</html>