<?php

namespace App\Model;

require_once "vendor/autoload.php";
$usuario = new \App\Model\Usuario;
$usuarioDao = new \App\Model\UsuarioDao;
$forn = new \App\Model\Fornecedor;
$fornDao = new \App\Model\FornecedorDao;
$tel = new \App\Model\Telefone;
$telDao = new \App\Model\TelefoneDao;
$email = new \App\Model\Email;
$emailDao = new \App\Model\EmailDao;
$estado = new \App\Model\Estado;
$estadoDao = new \App\Model\EstadoDao;
$cidade = new \App\Model\Cidade;
$cidadeDao = new \App\Model\CidadeDao;
$logra = new \App\Model\Logradouro;
$lograDao = new \App\Model\LogradouroDao;
$flp = new \App\Model\Forn_logra_possui;
$flpDao = new \App\Model\Forn_logra_possuiDao;

foreach ($fornDao->editar_forn() as $editar);

session_start();
if (!isset($_SESSION['id_usuario'])) {
	session_destroy();
	header("location:login.php");
} else {
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

	<title>Exclusão de fornecedor</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
			<?php
			if (isset($_POST['btnExcluirForn'])) {
				$fornDao->delete($forn);
				//
				$tel->setid_forn_fk($editar['id_forn']);
				$telDao->delete($tel);
				//
				$email->setid_forn_fk($editar['id_forn']);
				$emailDao->delete($email);
				//
				$flp->setid_forn_fk($editar['id_forn']);
				$flpDao->delete($flp);

				header("location:listagem-fornecedores.php");
			}
			if (isset($_POST['btnCancelarForn'])) {
				header("location:listagem-fornecedores.php");
			}


			echo "<p>Deseja excluir o fornecedor:<br><b> " . $editar['nome_forn'] . " ?</b></p>";

			?>
		
		<div class="row">
			<div class="col-12 col-sm-12">
				<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="mb-">
					<div class="form-group">
						<button type="submit" name="btnExcluirForn"  class="btn btn-danger btn-block btn-lg">Sim, excluir!</button>
					</div>
					<div class="form-group">
						<button type="submit" name="btnCancelarForn"  class="btn btn-warning btn-block btn-lg">Não, Cancelar.</button>	
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
</div>
</body>

</html>