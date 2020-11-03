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
    <a href="menu.php">Voltar</a>
<?php

session_start();
if(!isset($_SESSION['id_usuario'])){
    session_destroy();
    header("location:login.php");
}else{
    $usuarioDao->mostrarSessao();
}

?>
    <form method = "post">
        <label>Filtrar por status</label>
        <select class = "filtro" name = "filtro">
            <option name="todos">Todos</option>
            <option name="aberto">Aberto</option>
            <option name="liberado">Liberado</option>
        </select>
        <input type="submit" value="filtrar" name="btnFiltrar">
    </form>
<?php
if(isset($_POST['btnFiltrar'])){
    switch($_POST['filtro']){
        case "Todos":
            foreach($pedidoDao->read() as $pedidos){
                echo
                "Nº pedido: " . $pedidos['id_pedido'] . "<br>
                Abertura: " . $pedidos['data_abertura'] . "<br>
                Vencimento: " . $pedidos['vencimento'] . "<br>
                Fechamento: " . $pedidos['data_fechamento'] . "<br>
                Status: " . $pedidos['status_pedido'] . "<br>
                Usuário: " . $pedidos['id_usuario_fk'] . "<br>
                <a href = detalhar-pedidoGeral.php?id_pedido=" . $pedidos['id_pedido'].">DETALHAR</a>
                ________________________________<br>";
            }
        case "Aberto":
            $pedido->setstatus_pedido("Aberto");
            foreach($pedidoDao->readFiltro($pedido) as $pedidos){
                echo
                "Nº pedido: " . $pedidos['id_pedido'] . "<br>
                Abertura: " . $pedidos['data_abertura'] . "<br>
                Vencimento: " . $pedidos['vencimento'] . "<br>
                Fechamento: " . $pedidos['data_fechamento'] . "<br>
                Status: " . $pedidos['status_pedido'] . "<br>
                Usuário: " . $pedidos['id_usuario_fk'] . "<br>
                <a href = detalhar-pedidoGeral.php?id_pedido=" . $pedidos['id_pedido'].">DETALHAR</a>
                ________________________________<br>";
            }
        break;
        case "Liberado":
            $pedido->setstatus_pedido("Liberado");
            foreach($pedidoDao->readFiltro($pedido) as $pedidos){
                echo
                "Nº pedido: " . $pedidos['id_pedido'] . "<br>
                Abertura: " . $pedidos['data_abertura'] . "<br>
                Vencimento: " . $pedidos['vencimento'] . "<br>
                Fechamento: " . $pedidos['data_fechamento'] . "<br>
                Status: " . $pedidos['status_pedido'] . "<br>
                Usuário: " . $pedidos['id_usuario_fk'] . "<br>
                <a href = detalhar-pedidoGeral.php?id_pedido=" . $pedidos['id_pedido'].">DETALHAR</a>
                ________________________________<br>";
            }
        break;
    }
}


/*
foreach($pedidoDao->mostrarPedidosGeral() as $mostrar){
    echo
    "ID: " . $mostrar['id_pedido'] . "<br>
    Abertura: " . $mostrar['data_abertura'] . "<br>
    Vencimento: " . $mostrar['vencimento'] . "<br>
    Fechamento: " . $mostrar['data_fechamento'] . "<br>
    Status: " . $mostrar['status_pedido'] . "<br>
    Usuário: " . $mostrar['id_usuario_fk'] . "<br>
    <a href = detalhar-pedido.php?id_pedido=" . $mostrar['id_pedido'].">DETALHAR</a>
    ________________________________<br>";
  }
  */