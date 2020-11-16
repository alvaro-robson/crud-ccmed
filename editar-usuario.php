<?php 
namespace App\Model;
require_once "vendor/autoload.php";
$usuario = new \App\Model\Usuario;
$usuarioDao = new \App\Model\UsuarioDao;
$acesso = new \App\Model\Acesso;
$acessoDao = new \App\Model\AcessoDao;

foreach($usuarioDao->coletar_id_usuario($usuario) as $coletar);

session_start();
    if(!isset($_SESSION['id_usuario'])){
        session_destroy();
        header("location:login.php");
    }else{
        $usuarioDao->mostrarSessao();
    }

if(isset($_POST['btnEditarUsuario'])){
    $usuario->setlogin($_POST['login_edit']);
    $usuario->setnome($_POST['nome_edit']);
    $usuario->setsobrenome($_POST['sobrenome_edit']);
    $usuario->setmatricula($_POST['matricula_edit']);
    $usuario->setid_acesso_fk($_POST['id_acesso_fk_edit']);
    $usuarioDao->update($usuario);
}
$usuarioDao->sair();//se o usuário clicar em sair, esta função é executada;
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
    <title>Alterar Usuário</title>
  </head>
  <body>
  <script src = "scripts/document.js"></script>
<div class="container">
    <div class="row">
          <div class="col-12 col-sm-12" style="display: flex; align-items: center; justify-content: center">
              <h1 align="center">Alterar Usuário</h1>
          </div>
    </div>
</div><!--fim 1 div container-->

<div class="container"><!--div container 2-->
    <div class="row">
        <div class="col-sm-12">
        <!--INICIO FORM---------------------------------------------->
            <form class="mb-" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="login">Login</label>
                  <input type="text" class="form-control" id="login" name="login_edit" placeholder="Digite o login" value = "<?= $coletar['login'];?>" required>
                </div>

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="senha" name="nome_edit" placeholder="Nome" value = "<?= $coletar['nome'];?>" required>
                </div>
                
                <div class="form-group">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome_edit" placeholder="Sobrenome" value = "<?= $coletar['sobrenome'];?>" required>
                </div>
                
                <div class="form-group">
                    <label for="matricula">Matrícula</label>
                    <input type="number" class="form-control" id="matricula" name="matricula_edit" placeholder="Matrícula" value = "<?= $coletar['matricula'];?>" required>
                </div>
                
                <div class="form-group">
                <?php
                    //tratamento de erros para o campo de fornecedor permitir até o número limite de ids que tem no banco
                    $array = $acessoDao->contar();
                    $max = implode(end($array));
                ?>
                <label for="id_acesso_fk">Tipo de acesso</label>
                <input type="number" class="form-control" name="id_acesso_fk_edit" id="id_acesso_fk" min = "1" max = "<?php echo $max; ?>" value = "<?= $coletar['id_acesso_fk'];?>" required>
                </div>

                <div class="form-group">
                    <label for="imagem">Imagem</label>
                    <input type="file" name="nome_imagem">
                </div>
                <button type="submit" name="btnEditarUsuario" class="btn btn-block btn-success">Salvar</button>
            
              </form>
            
        </div>
    </div>
</div><!--fim da div container 2 -->
<div class="container mt-2"><!--  div container 3' -->
		<div class="row">
			<div class="col-sm-6 col-6">
				<a href="listagem-usuarios.php">
					<button class="btn btn-warning btn-block btn-lg">Voltar</button>
				</a>
				
			</div>
			<div class="col-6 col-sm-6">
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                    <input type="submit" name="btnSair" class="btn btn-danger btn-block btn-lg mb-2" value="Sair">
                </form>
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