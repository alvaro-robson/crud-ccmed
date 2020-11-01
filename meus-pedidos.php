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
<html>
    <head>
        <link href="css/estilo2.css" rel="stylesheet">
    </head>
    <body>
    <a href="menu-pedidos.php">Voltar</a>
<?php

session_start();
if(!isset($_SESSION['id_usuario'])){
    session_destroy();
    header("location:login.php");
}else{
    $usuarioDao->mostrarSessao();
}

//MOSTRAR OS PEDIDOS DO USUÁRIO LOGADO:
$usuario->setid_usuario($_SESSION['id_usuario']);
foreach($pedidoDao->mostrarPedidos($usuario) as $mostrar){
  echo
  "ID: " . $mostrar['id_pedido'] . "<br>
  Abertura: " . $mostrar['data_abertura'] . "<br>
  Vencimento: " . $mostrar['vencimento'] . "<br>
  Fechamento: " . $mostrar['data_fechamento'] . "<br>
  <a href = detalhar-pedido.php?id_pedido=" . $mostrar['id_pedido'].">DETALHAR</a>
  ________________________________<br>";
}
/*
//RELATÓRIO DE PEDIDOS DO USUÁRIO LOGADO:
$usuario->setid_usuario($_SESSION['id_usuario']);
foreach($pedidoDao->detalharPedidos($usuario) as $meus){
  echo
  "Pedido nº: " . $meus['id_pedido'] . "(Status: " . $meus['status_pedido'] . ")<br>
  Material: " . $meus['nome_material'] . "<br>
  Quantidade: " . $meus['quantidade'] . "<br>
  Solicitante: " . $meus['nome'] . "<br>
  Abertura: " . $meus['data_abertura'] . "<br>
  Vencimento: " . $meus['Vencimento'] . "<br>
  -------------------------<br>";
}
*/
?>
