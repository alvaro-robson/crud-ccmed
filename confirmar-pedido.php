<?php
namespace App\Model; 
require_once "vendor/autoload.php";
$material = new \App\Model\Material;
$materialDao = new \App\Model\MaterialDao;
foreach($materialDao->read() as $materiais);
$pedido = new \App\Model\Pedido;
$pedidoDao = new \App\Model\PedidoDao;
$detalhe = new \App\Model\Detalhe_pedido;
$detalheDao = new \App\Model\Detalhe_pedidoDao;

session_start();
if(!isset($_SESSION['id_usuario'])){
    session_destroy();
    header("location:login.php");
}else{
	echo "
    <!doctype html>
    <html lang='pt-br'>
      <head>
        <!-- Required meta tags -->
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    
        <!-- Bootstrap CSS -->
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
    
        <link href='css/estilo2.css' rel='stylesheet'>
        <title>Fazer Pedidos</title>
      </head>
      <body>
        <div class='container'>
            <div class='row  alert alert-primary'>
                <div class='col-sm-12 col-12'>        
                <div class = dadosUsuarioSession>
                Olá <b>" . $_SESSION['nome'] . "</b> Seja bem-vindo <br>Código de Matrícula: <b> " . $_SESSION['matricula'] . "</b><br>	
                
            </div>
            </div>
    </div>";
}
	//MOSTRANDO O PEDIDO ATUAL:
	foreach($pedidoDao->ultimo_pedido() as $ultimo){
        echo "
            <div class='container'>
                <div class='row'>
                   <div class='col-12 col-sm-12'>
                   <p>Número do ultimo pedido:<b> $ultimo </b></p>
                   </div>
                </div>
            </div>
          
        ";
        
    }
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

            <?php
            foreach($pedidoDao->confirmarPedido() as $confirmar){
                echo
                "
                
                    <div class='row'>
                    <div class='col-12 col-sm-12'>
                            <p>Selecione quantas unidades deseja de:<br></p>
                        </div>
                    </div>
                         
                <b>
                
                ".
                $confirmar['nome_material'] . " " . 
                $confirmar['desc_material'] . "?</b><br>
                Quantidade em estoque: <b>" . $confirmar['qtde_estoque'] . "</b>
                <img src = upload/" . $confirmar['imagem'] . " class = 'imagem-material'> <br>"  ;
}

if(isset($_POST['btnConfirmar'])){
    $detalhe->setquantidade($_POST['quantidade']);
    $detalhe->setid_material_fk($confirmar['id_material']);
    $detalhe->setid_pedido_fk($ultimo);
    $detalheDao->create($detalhe);
    $material->setqtde_estoque($confirmar['qtde_estoque'] - $_POST['quantidade']);
    $material->setid_material($confirmar['id_material']);
    $materialDao->subtrairMaterial($material);
    header("location:fazer-pedido.php");
}
if(isset($_POST['btnCancelar'])){
    header("location:fazer-pedido.php");
}

?>
<div class="row">
                    <div class="col-12 col-sm-12">
                    <form method="post">
                    <div class="form-group">
                    <input type="number" class="form-control" name="quantidade" placeholder="Qtde. desejada" min="1" max="<?php echo $confirmar['qtde_estoque']; ?>">
                    </div>
                    <div class="form-group">
                    <button class="btn btn-lg btn-block btn-success form-control" type="submit" name = "btnConfirmar"> Confirmar</button>                    
                    </div>
                    <div class="form-group">
                    <button class="btn btn-lg btn-block btn-danger form-control" type="submit" name = "btnCancelar"> Cancelar</button> 
                    </div>

                       
                        </form>
                        </div>
                        </div>
                    </div>

