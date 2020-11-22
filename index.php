<?php
namespace App\Model; 
require_once "vendor/autoload.php";
$usuario = new \App\Model\Usuario;
$usuarioDao = new \App\Model\UsuarioDao;
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
	<link href="css/estilo2.css" rel="stylesheet">
    <title>Listagem de Materiais</title>
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

//--CRUD-MATERIAL-------------------------------------------------------
$material = new \App\Model\Material;
$materialDao = new \App\Model\MaterialDao;
//CREATE
if(isset($_POST['btnCadastrar'])){
		//$material->setid_material(1);

		$material->setnome_material($_POST['nome_material']);
		$material->setdesc_material($_POST['desc_material']);
		$material->setqtde_estoque($_POST['qtde_estoque']);
		$material->setid_prat_fk($_POST['id_prat_fk']);
		$material->setid_forn_fk($_POST['id_forn_fk']);
		//$material->setimagem($imagem);
		$materialDao->create($material);//NÃO FUNCIONOU DE PRIMEIRA. Tive que dar o comando "composer dumpautoload -o"
}

?>

<div class="container mt-2"><!--  div container 3 -->
		<div class="row">
			<div class="col-sm-12 col-12">
				<a href="listagens.php">
					<button class="btn btn-warning btn-block btn-lg">Voltar</button>
				</a>
				
			</div>
			
		</div>
	</div>
<div class="container">
	<h1>Listagem dos materiais</h1>
<?php
$materialDao->read();


$materialDao->relatorioMateriais();
?>
</div>
<div class="container mt-2 mb-3"><!--  div container 3 -->
	<div class="row">
		<div class="col-sm-12 col-12">
			<a href="listagens.php">
				<button class="btn btn-warning btn-block btn-lg">Voltar</button>
			</a>
				
		</div>
			
	</div>
</div>
<?php




//--CRUD--FORNECEDOR---------------------------------------------
$forn = new \App\Model\Fornecedor;

$fornDao = new \App\Model\FornecedorDao;



//--CRUD--PRATELEIRA------------------------------------------------
$prat = new \App\Model\Prateleira;


$pratDao = new \App\Model\PrateleiraDao;


//--CRUD--TELEFONE-------------------------------------------------
$tel = new \App\Model\Telefone;

$telDao = new \App\Model\TelefoneDao;

//--CRUD--USUARIO-------------------------------------------------
$usu = new \App\Model\Usuario;


$usuDao = new \App\Model\UsuarioDao;


 ?>
	</div><!--Fim container-->
</body>
</html>