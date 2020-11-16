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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Menu Pedidos</title>
  </head>
  <body>
      
    <script src = scripts/document.js></script>
    <!--script>boasVindas();</script-->   
    
<?php

session_start();
if(!isset($_SESSION['id_usuario'])){
    session_destroy();
    header("location:login.php");
}else{
    $usuarioDao->mostrarSessao();
}

?>
<div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
            <h1>Localizar Pedidos</h1>
            </div>
        </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <form method = "post">
                    <div class="form-group">
                        <label>Filtrar por status</label>
                        <select class = "filtro form-control" name = "filtro">
                            <option name="todos">Todos</option>
                            <option name="aberto">Aberto</option>
                            <option name="liberado">Liberado</option>
                            <option name = "cancelado">Cancelados</option>
                        </select>
                    </div>
                    <button class="btn btn-success btn-block btn-lg" type="submit" name="btnFiltrar">Filtrar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 mb-3">
                <a href="listagens.php">
                <button class="btn btn-warning btn-block btn-lg" type="submit">Voltar</button>
                </a>
              
            </div>
        </div>
    </div>
<?php
if(isset($_POST['btnFiltrar'])){
    switch($_POST['filtro']){
        case "Todos":
            $pedidoDao->read();
        break;
        case "Aberto":
            $pedido->setstatus_pedido("Aberto");
            $pedidoDao->readFiltro($pedido);
        break;
        case "Liberado":
            $pedido->setstatus_pedido("Liberado");
            $pedidoDao->readFiltro($pedido);
        break;
        case "Cancelados":
            $pedido->setstatus_pedido("Cancelado");
            $pedidoDao->readFiltro($pedido);
        break;
    }
}
