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

    <link href="css/estilo2.css" rel="stylesheet">
    <title>Fazer Pedidos</title>
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
            ?>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php
                foreach($pedidoDao->ultimo_pedido() as $ultimo){
                    echo 
                    "
                    <div class='container'>
                        <div class='row'>
                            <div class='col-sm-12'>
                            <h1 class='tamanho_pedido'>Selecione os itens desejados</h1>
                            </div>
                            
                            <div class='col-sm-12'>
                                <p>Número do pedido atual: <b>" .$ultimo . "</b></p>
                            
                            </div>
                        </div>
                    </div>
                    
                    ";
                }
                

                $detalhe->setid_pedido_fk($ultimo);

                //FUNÇÃO PARA A LISTAGEM DE ITENS SOLICITADOS EM TEMPO REAL:
                if($detalheDao->read() > 0){
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
            ?>
    </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
<!--BOTÕES DE SALVAR E CANCELAR PEDIDO:-->
            <form action="<?php $_SERVER['PHP_SELF']?>" method = "POST">
            <div class="container">
            <div class="form-group">
                <div class="row">    
                    <div class="col-sm-12">
                    <a href="fazer-pedido.php?id_material=<?php echo $itens['id_material_fk'];?>">                
					<input type="submit" name="btnDevolver" class="btn btn-danger btn-block mb-2" value = "Cancelar">
                </a>
                </div>
                </div>
                <input type="submit" name="finalizarPedido" class="btn btn-success btn-block" value = "Salvar">
                </div>
                </div>
            </form>
            
            <?php
            }
		
		if(isset($_POST['finalizarPedido'])){
			header("location:menu-pedidos.php");
		}

    }
                

            
		

		//Mostrando os materiais a serem solicitados
		foreach($materialDao->read() as $materiais){
			echo
                "
                <div class='container'>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <img src = upload/" . $materiais['imagem'] . " class = 'imagem-material'>
                        </div>
                    </div>
                        <div class='container alert-secondary'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                <p>Nome: <b>" . $materiais['nome_material'] . "</b><br>
                                Descrição = <b>" . $materiais['desc_material'] . " </b><br>
                                Qtde. estoque = <b>" . $materiais['qtde_estoque'] . "</b><br>
                                Cód. prateleira = <b>" . $materiais['id_prat_fk'] . "</b><br>
                                Fornecedor = <b>" . $materiais['id_forn_fk'] . "</b><br>

                                </p>
                                <a href = confirmar-pedido.php?id=" . $materiais['id_material'] . ">
                                <button class='btn btn-lg btn-primary btn-block mb-3'>
                                Solicitar
                                </button>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                
                
                </div>
                ";
        };
        ?>