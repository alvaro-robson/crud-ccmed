<?php 
  namespace App\Model; 
  require_once "vendor/autoload.php";

$material = new \App\Model\Material;
$materialDao = new \App\Model\MaterialDao;
$pedido = new \App\Model\Pedido;
$pedidoDao = new \App\Model\PedidoDao;
$usuario = new \App\Model\Usuario;
$usuarioDao = new \App\Model\UsuarioDao;

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link href="custom.css" rel="stylesheet">

    <title>Meus Pedidos </title>
  </head>
  <body>
    
<?php

session_start();
if(!isset($_SESSION['id_usuario'])){
    session_destroy();
    header("location:login.php");
}else{
    $usuarioDao->mostrarSessao();
}

?>
<!--link voltar-->
<div class="container">
	<div class="row mt-2 mb-2">
		<div class="col-12 col-sm-12">
		<a href="menu-pedidos.php">
		<button class="btn btn-warning btn-block">Voltar
		</button>
		</a>
		</div>
	</div>
</div>


<?php

//MOSTRAR OS PEDIDOS DO USUÁRIO LOGADO:

$usuario->setid_usuario($_SESSION['id_usuario']);
/*
foreach($pedidoDao->mostrarPedidosUsuario($usuario) as $mostrar){
  echo
  "
  <div class='container'>
  <div class='row'>
  <div class='col-12 col-sm-12'>
  <p>Número do Pedido: <b>" . $mostrar['id_pedido'] . "<br></b>
  Data de Abertura:<b> " . $mostrar['data_abertura'] . "</b><br>
  Vencimento:<b> " . $mostrar['vencimento'] . "</b> <br>
  Fechamento: <b>" . $mostrar['data_fechamento'] . "</b><br>
  Status: <b>" . $mostrar['status_pedido'] . "</b><br>
  <a href = detalhar-pedido.php?id_pedido=" . $mostrar['id_pedido'].">
 <button class='btn btn-info btn-lg btn-block'> Detalhar
 </button> 
</a>
<br>
  </p>
</div>
</div>
</div>
  ";
}
if(!isset($mostrar)){
  
}
*/
$pedidoDao->mostrarPedidosUsuario($usuario);

?>
</body>
</html>