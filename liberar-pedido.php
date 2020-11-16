<?php 
  namespace App\Model; 
  require_once "vendor/autoload.php";
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Detalhar pedido</title>
  </head>
  <body>

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
?>
<div class='container mb-4 mt-2'>
    <div class='row'>
        <div class='col-12 col-sm-12'>
        <h3>Confirma liberar pedido</h3>
</div>
</div>
</div>
<?php
foreach($pedidoDao->detalharPedidosGeral() as $pedidos);
if(isset($_POST['sim'])){
    $pedido->setid_pedido($pedidos['id_pedido']);
    $pedidoDao->liberarPedido($pedido);
    //header("location:todos-pedidos.php");
    ?>
    <script>
        alert("Pedido liberado com sucesso!");
        window.location.href = "todos-pedidos.php";
    </script>
    <?php
}else if(isset($_POST['nao'])){
    header("location:todos-pedidos.php");
}


?>
<div class='container mb-4 mt-2'>
    <div class='row'>
        <div class='col-12 col-sm-12'>
        <form method = "post">
            <div class='form-group'>
            <p>Deseja liberar o pedido Nº: <b><?php echo $pedidos['id_pedido'];?></b>?</p>
            </div>
            </div>
            <div class='col-6 col-sm-6'>
            <input class='btn btn-success btn-block' type="submit" value = "SIM" name = "sim">
            </button>
            </div>
            <div class='col-6 col-sm-6'>
            <input class='btn btn-block btn-danger' type="submit" value = "NÃO" name = "nao">
            </button>
            </div>
           
                    
</form>

</div>
</div>
<div class='container mt-4'>
    <div class='row'>
        <div class='col-12 col-sm-12'>
        <a href ="todos-pedidos.php">
            <button class='btn btn-warning btn-block'>Voltar</button>
           </a>
</div>
</div>
</div>