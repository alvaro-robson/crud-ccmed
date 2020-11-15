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
  
  session_start();
    if(!isset($_SESSION['id_usuario'])){
        session_destroy();
        header("location:login.php");
    }else{
        $usuarioDao->mostrarSessao();
    }
?>
 

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link href="custom.css" rel="stylesheet">

    <title>Cadastros </title>
  </head>
  <body>
        <div class="container" style="display: flex; align-items: center; justify-content: center"><!--  div container 1 -->
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>Cadastros</h1>
                </div>
            </div>
        </div><!-- fim div container 1 -->

        <div class="container "><!--  div container 2' -->
            <div class="row">
                <div class="col-sm-12">
                    <a href="form-cadastrar.php">
                        <button type="submit" class="btn btn-info btn-block btn-lg">Cadastro de materiais
                        </button>    
                    </a>
                    <a href="form-cadastrar-usuario.php">
                        <button type="submit" class="btn btn-info btn-block btn-lg mt-2">Cadastros de usuários
                        </button>
                    </a>
                    <a href="form-cadastrar-forn.php">
                        <button type="submit" class="btn btn-info btn-block btn-lg mt-2">Cadastros de fornecedores
                        </button>    
                    </a>
                </div>
            </div>
        </div><!-- fim div container 2 -->
        <div class="container mt-2"><!--  div container 3' -->
		<div class="row">
			<div class="col-sm-12">
				<a href="menu.php">
					<button class="btn btn-warning btn-block btn-lg">Voltar</button>
				</a>
				<a href="login.php">
					<button class="btn btn-danger btn-block btn-lg mt-2">Sair</button>
				</a>
			</div>
		</div>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>