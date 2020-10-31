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
        echo 
        '<div class = "session">
        Olá, ' . $_SESSION['nome'] . '! <br>Seja bem-vindo.<br>
        ID: ' . $_SESSION['id_usuario'] . ',<br>
        matrícula: ' . $_SESSION['matricula'] . '<br>
        acesso: ' . $_SESSION['id_acesso_fk'];
    }
    
    if(isset($_POST['btnPedido'])){
        $pedido->setdata_fechamento(null);//O banco só aceita formato datetime. Com o pedido recém criado, não existe data de fechamento, então uma forma do banco aceitar foi com a palavra "null"
        $pedido->setstatus_pedido('Aberto');
        $pedido->setid_usuario_fk($_SESSION['id_usuario']);
        $pedidoDao->create($pedido);
        header("location:fazer-pedido.php");
    }

?>
<html>
    <head>
        <link href="css/estilo2.css" rel="stylesheet">
    </head>
    <body>
    </div>
        <form method="post">
            <input type="submit" value="Iniciar pedido" name="btnPedido">
        </form>
    </body>
</html>
