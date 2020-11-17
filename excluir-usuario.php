<?php 
namespace App\Model;
require_once "vendor/autoload.php";
$usuario = new \App\Model\Usuario;
$usuarioDao = new \App\Model\UsuarioDao;
foreach($usuarioDao->coletar_id_usuario($usuario) as $coletar);

session_start();
if(!isset($_SESSION['id_usuario'])){
    session_destroy();
    header("location:login.php");
}else{
	$usuarioDao->mostrarSessao();
}
$usuarioDao->sair();//se o usuário clicar em sair, esta função é executada;

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

    <title>Exclusão de usuário</title>
  </head>
  <body>
  	 <div class="container">
      <div class="row">
        <div class="col-sm-12 mt-3">
          <h3 style="text-align-last: center">Exclusão de Usuário</h3>
        	<?php 
        	if(isset($_POST['btnExcluirUsuario'])){
          	$usuarioDao->delete();
          	header("location:listagem-usuarios.php");
          }
          if(isset($_POST['btnCancelar'])){
          	header("location:listagem-usuarios.php");
          }


          echo "
          <div class='container'>
            <div class='row'>
              <div class='col-12 col-sm-12'>
          <img width = '100%' src = upload/" . $coletar['imagem'] . " class = 'imagem-material'> " .  "
          <p class='mt-3'>Deseja excluir <b>
          " . $coletar['nome'] . " " .  $coletar['sobrenome'] . " ?</b></p>
          </div>
          </div>
          </div>
          "
          ;
        	
        	 ?>
	      <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="mb-">
          <div class="form-group">  
            <input type="submit" name="btnExcluirUsuario" value="SIM" class="btn btn-danger btn-block btn-lg">
            <input type="submit" name="btnCancelar" value="NÃO" class="btn btn-warning btn-block btn-lg">
            </div>
          </form>
</div>
</div>
</div>

</body>
</html>