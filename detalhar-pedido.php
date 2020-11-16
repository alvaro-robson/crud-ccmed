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

    <title>Detalhar Pedido</title>
  </head>
  <body>
        <script src = scripts/document.js></script>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                <a href="menu-pedidos.php"><button class="btn btn-sm btn-secondary btn-block mb-2 mt-2">Voltar</button></a>
                </div>
            </div>    
        
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
$usuario->setid_usuario($_SESSION['id_usuario']);
foreach($pedidoDao->detalharPedidosUsuario($usuario) as $detalhar);
echo
"
<div class='container'>
<div class='row border '>
<div class='col-sm-12 mt-3 border-top border border-dark pt-2'>
<P>Pedido Nº <b>" . $detalhar['id_pedido'] . "</b> | Status: <b>" . $detalhar['status_pedido'] . "</b></P>
</div>
";
foreach($pedidoDao->detalharPedidosUsuario($usuario) as $detalhar){
    echo
    "
    <div class='col-sm-12'>
    <p>Material : <b>" . $detalhar['nome_material'] . "</b><br>
    Quantidade: <b>" . $detalhar['quantidade'] . "</b><br>
    Abertura: <b>" . $detalhar['data_abertura'] ."</b>
    Vencimento: <b>" . $detalhar['vencimento'] . "</b><br>
   <br>
   </div>
   </p>
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

?>
