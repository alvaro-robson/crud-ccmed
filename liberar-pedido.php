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

foreach($pedidoDao->detalharPedidosGeral() as $pedidos);
if(isset($_POST['sim'])){
    $pedido->setid_pedido($pedidos['id_pedido']);
    $pedidoDao->liberarPedido($pedido);
    ?>
    <script>pedidoLiberado();</script>
    <?php
}else if(isset($_POST['nao'])){
    header("location:todos-pedidos.php");
}


?>
<form method = "post">
    Deseja liberar o pedido nº<?php echo $pedidos['id_pedido'];?>?<br>
    <input type="submit" value = "SIM" name = "sim">
    <input type="submit" value = "NÃO" name = "nao">
</form>