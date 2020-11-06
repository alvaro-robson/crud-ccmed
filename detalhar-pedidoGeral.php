<?php 
  namespace App\Model; 
  require_once "vendor/autoload.php";
?>
<html>
    <head>
        <link href="css/estilo2.css" rel="stylesheet">
    </head>
    <body>
        <script src = scripts/document.js></script>
        <div class="container">
            <a href="todos-pedidos.php">Voltar</a>
<?php
$material = new \App\Model\Material;
$materialDao = new \App\Model\MaterialDao;
$pedido = new \App\Model\Pedido;
$pedidoDao = new \App\Model\PedidoDao;
$usuario = new \App\Model\Usuario;
$usuarioDao = new \App\Model\UsuarioDao;

session_start();
if(!isset($_SESSION['id_usuario'])){
    session_destroy();
    header("location:login.php");
}else{
    $usuarioDao->mostrarSessao();
}
//RELATÓRIO DO PEDIDO SELECIONADO NA PÁG. meus-pedidos.php
foreach($pedidoDao->detalharPedidosGeral($usuario) as $detalhar);
echo
"<br>==========================<br>
Pedido nº " . $detalhar['id_pedido'] . " | Usuário: " . $detalhar['id_usuario_fk'] . "<br>
==========================<br>";
foreach($pedidoDao->detalharPedidosGeral() as $detalhar){
    echo
    "<br>Material : " . $detalhar['nome_material'] . "<br>
    Quantidade: " . $detalhar['quantidade'] . "<br>
    Status: " . $detalhar['status_pedido'] . "<br>
    Abertura: " . $detalhar['data_abertura'] . "<br>
    Vencimento: " . $detalhar['vencimento'] . "<br>
    ___________________________<br>";
}
echo "<a href = liberar-pedido.php?id_pedido=" . $detalhar['id_pedido'].">LIBERAR PEDIDO</a>"

?>
