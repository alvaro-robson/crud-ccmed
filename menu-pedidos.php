<?php
	namespace App\Model; 
    require_once "vendor/autoload.php";
    //require "verificar.php";
    $material = new \App\Model\Material;
	$materialDao = new \App\Model\MaterialDao;
    $pedido = new \App\Model\Pedido;
    $pedidoDao = new \App\Model\PedidoDao;
    $usuarioDao = new \App\Model\UsuarioDao;
    $usuario = new \App\Model\Usuario;

    session_start();
    if(!isset($_SESSION['id_usuario'])){
        session_destroy();
        header("location:login.php");
    }else{
        $usuarioDao->mostrarSessao();
    }
    
    if(isset($_POST['btnIniciarPedido'])){
        $pedido->setdata_fechamento(null);//O banco só aceita formato datetime. Com o pedido recém criado, não existe data de fechamento, então uma forma do banco aceitar foi com a palavra "null"
        $pedido->setstatus_pedido('Aberto');
        $pedido->setid_usuario_fk($_SESSION['id_usuario']);
        $pedidoDao->create($pedido);
        header("location:fazer-pedido.php");
    }

    if(isset($_POST['btnMeusPedidos'])){
        header("location:meus-pedidos.php");
    }

    if(isset($_POST['btnSair'])){
        session_destroy();
        header("location:login.php");
    }

?>
<html>
    <head>
        <link href="css/estilo2.css" rel="stylesheet">
    </head>
    <body>
        
        <form method="post">
            <input type="submit" value="Iniciar pedido" name="btnIniciarPedido">
            <input type="submit" value="Meus pedidos" name="btnMeusPedidos">
            <input type="submit" value="Sair" name="btnSair">
        </form>
    </body>
</html>
