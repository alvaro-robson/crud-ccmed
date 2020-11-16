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

?>
<div class='container mb-4 mt-2'>
    <div class='row'>
        <div class='col-12 col-sm-12'>
        <a href ="todos-pedidos.php">
            <button class='btn btn-warning btn-block'>Voltar</button>
           </a>
</div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12">
        <h2>Detalhe do pedido</h2>
        </div>
    </div>
</div>

<?php
//RELATÓRIO DO PEDIDO SELECIONADO NA PÁG. meus-pedidos.php
foreach($pedidoDao->detalharPedidosGeral($usuario) as $detalhar);
echo
"
<div class='container'>
    <div class='row'>
        <div class='col-12 col-sm-12'>
            <p>Pedido Nº <b>" . $detalhar['id_pedido'] . "</b> | Usuário: <b>" . $detalhar['id_usuario_fk'] . "</b></p>
        </div>
    </div>
</div>
";
foreach($pedidoDao->detalharPedidosGeral() as $detalhar){
    echo
    "
    <div class='container'>
    <div class='row'>
        <div class='col-12 col-sm-12'>
        <p>
        <br>Material : <b>" . $detalhar['nome_material'] . "</b><br>
        Quantidade: <b>" . $detalhar['quantidade'] . "</b><br>
        Status: <b>" . $detalhar['status_pedido'] . "</b><br>
        Abertura: <b>" . $detalhar['data_abertura'] . "</b><br>
        Vencimento: <b>" . $detalhar['vencimento'] . "</b><br>
        
        </p>
    
    </div>
    </div>
    </div>
    ";
}
    if(!isset($detalhar)){//Se não houver itens, o usuário será redirecionado à página anterior
        ?>
            <script>
                alert("Não há itens para detalhar");
                window.open(document.referrer,'_self');
            </script>
        <?php
    }
echo "
<div class='container'>
    <div class='row'>
        <div class='col-12 col-sm-12'>
            <a href = liberar-pedido.php?id_pedido=" . $detalhar['id_pedido'].">
            <button class='btn btn-success btn-block'>Liberar pedido</button>
           </a>
           </div>
           </div>
           </div>
           "

?>
<div class='container mt-4'>
    <div class='row'>
        <div class='col-12 col-sm-12'>
        <a href ="todos-pedidos.php">
            <button class='btn btn-warning btn-block'>Voltar</button>
           </a>
</div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


  </body>
</html>

