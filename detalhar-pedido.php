<?php 
  namespace App\Model; 
  require_once "vendor/autoload.php";
?>
<script src = scripts/document.js></script>
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
foreach($pedidoDao->detalharPedidos($usuario) as $detalhar){
    echo
    "Material : " . $detalhar['nome_material'] . "<br>
    Quantidade: " . $detalhar['quantidade'] . "<br>
    Status: " . $detalhar['status_pedido'] . "<br>
    Abertura: " . $detalhar['data_abertura'] . "<br>
    Vencimento: " . $detalhar['vencimento'] . "<br>
    ___________________________<br>";
}

?>