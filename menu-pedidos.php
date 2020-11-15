<?php
	namespace App\Model; 
    require_once "vendor/autoload.php";
    $material = new \App\Model\Material;
	$materialDao = new \App\Model\MaterialDao;
    $pedido = new \App\Model\Pedido;
    $pedidoDao = new \App\Model\PedidoDao;
    $usuarioDao = new \App\Model\UsuarioDao;
    $usuario = new \App\Model\Usuario;
    ?>
    
    <!doctype html>
    <html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Menu Pedidos</title>
  </head>
  <body>
      
    <script src = scripts/document.js></script>
    <!--script>boasVindas();</script-->   
    <div class="container">
    </div>

    <?php
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
<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-sm-12">
            <form method="post">
                <div class="form-group">
                <button type="submit" class="btn btn-lg btn-block btn-info"  name="btnIniciarPedido">Iniciar pedido</button>
                <button type="submit" class="btn btn-lg btn-block btn-info "  name="btnMeusPedidos">Meus pedidos</button>
                <input type="submit" class="btn btn-lg btn-block btn-danger mt-5"  name="btnSair" value="Sair">

                
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
  </body>
</html> 
