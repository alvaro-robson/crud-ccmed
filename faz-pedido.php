<?php 
	namespace App\Model; 
	require_once "vendor/autoload.php";
	$material = new \App\Model\Material;
	$materialDao = new \App\Model\MaterialDao;
	$pedido = new \App\Model\Pedido;
	$pedidoDao = new \App\Model\PedidoDao;
	$detalhe = new \App\Model\Detalhe_pedido;
	$detalheDao = new \App\Model\Detalhe_pedidoDao;
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

    <title>Tela de Pedidos</title>
  </head>
  <body>
    <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php
            session_start();
            if(!isset($_SESSION['id_usuario'])){
            session_destroy();
            header("location:login.php");
            }else{
            $usuarioDao->mostrarSessao();
}
//MOSTRANDO O PEDIDO ATUAL:
foreach($pedidoDao->ultimo_pedido() as $ultimo){
    echo 
    "
    <div class='container'>
        <div class='row'>
            <div class='col-sm-12'>
            Selecione os itens desejados
            </div>
            
            <div class='col-sm-12'>
                <b>Pedido Atual: " .$ultimo . "</b>
            
            </div>
        </div>
    </div>
    
    ";
}

$detalhe->setid_pedido_fk($ultimo);

    //FUNÇÃO PARA A LISTAGEM DE ITENS SOLICITADOS EM TEMPO REAL:
    foreach($detalheDao->read() as $detalhes);
    if ($detalhes['id_pedido_fk'] == $ultimo){
        echo "<br>Itens solicitados:<br>";

        foreach($pedidoDao->mostrarItens($detalhe) as $itens){
			echo $itens['nome_material'] . " - " . $itens['quantidade'] . "un<br>
				-----------------------------<br>";
			if(isset($_POST['btnDevolver'])){
					$material->setqtde_estoque($itens['quantidade']);
					$material->setid_material($itens['id_material_fk']);
					$materialDao->devolver($material);
					$detalhe->setid_detalhe($itens['id_detalhe']);
					$detalheDao->deletar_item($detalhe);
					header("location:menu-pedidos.php");
				}
			}
    }
       
    
?>

    </div><!-- fim col -->
    </div><!-- fim da row -->
    </div><!-- fim div container-->
    </body>
    </html>

    <?php

   

    foreach($materialDao->read() as $materiais){
			echo
                "
                <div class='container'>
                <div class='row'>
                    <div class='col-sm-12'>
                    <img src = upload/" . $materiais['imagem'] . " class = ''><br>
                    </div>
            
				ID = " . $materiais['id_material'] . "<br>
				Nome = " . $materiais['nome_material'] . "<br>
				Descrição = " . $materiais['desc_material'] . "<br>
				Qtde. estoque = " . $materiais['qtde_estoque'] . "<br>
				ID prateleira = " . $materiais['id_prat_fk'] . "<br>
				ID fornecedor = " . $materiais['id_forn_fk'] . "<br>
                <a href = confirmar-pedido.php?id=" . $materiais['id_material'] . "><u>SOLICITAR</u></a>
                </div>
                </div>
                ";
                
                
        };
        
        
        ?>