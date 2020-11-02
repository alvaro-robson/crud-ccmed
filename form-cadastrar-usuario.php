<?php 
namespace App\Model;
require_once "vendor/autoload.php";
$usuario = new \App\Model\Usuario;
$usuarioDao = new \App\Model\UsuarioDao;
$acesso = new \App\Model\Acesso;
$acessoDao = new \App\Model\AcessoDao;

session_start();
    if(!isset($_SESSION['id_usuario'])){
        session_destroy();
        header("location:login.php");
    }else{
        $usuarioDao->mostrarSessao();
    }

if(isset($_POST['btnCadastrarUsuario'])){
    $usuario->setlogin($_POST['login']);
    $usuario->setsenha($_POST['senha']);
    $usuario->setnome($_POST['nome']);
    $usuario->setsobrenome($_POST['sobrenome']);
    $usuario->setmatricula($_POST['matricula']);
    $usuario->setid_acesso_fk($_POST['id_acesso_fk']);
    $usuarioDao->verificarMatricula($usuario);//NÃO FUNCIONOU DE PRIMEIRA. Tive que dar o comando "composer dumpautoload -o"
}

 ?>
 <!--DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" href="css/estilo2.css">
 </head>
 <body>
 	<div class="form-container">
	 	<form action="index.php" method="POST" enctype="multipart/form-data">
	 		<input type="text" name="nome_material" placeholder="Nome do material">
	 		<input type="text" name="desc_material" placeholder="Descrição">
	 		<input type="number" name="qtde_estoque" placeholder="Quantidade">
	 		<input type="number" name="id_prat_fk" placeholder="ID prateleira">
	 		<input type="number" name="id_forn_fk" placeholder="ID fornecedor">
	 		<input type="file" name="nome_imagem">
	 		<input type="submit" name="btnCadastrar" value="CADASTRAR">
	 	</form>
 	</div>
 </body>
 </html-->
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
    <title>Cadastro de usuários</title>
  </head>
  <body class="color">
  <script src = "scripts/document.js"></script>
  <br><a href="login.php">Sair</a>
  <div class="row">
          <div class="container mt-5" style="display: flex; align-items: center; justify-content: center">
              <h1 class="" align="center">Cadastro de usuários</h1>
          </div>
      </div>
    <div class="container mt-5">
        <div class="col-sm-12">
        <!--INICIO FORM---------------------------------------------->
            <form class="mb-" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="login">Login</label>
                  <input type="text" class="form-control" id="login" name="login" placeholder="Digite o login" required>
                </div>

                <div class="form-group">
                  <label for="senha">Senha</label>
                  <input type="password" class="form-control" name="senha" placeholder="senha" required>
                </div>
                
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="senha" name="nome" placeholder="Nome" required>
                </div>
                
                <div class="form-group">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" required>
                </div>
                
                <div class="form-group">
                    <label for="matricula">Matrícula</label>
                    <input type="number" class="form-control" id="matricula" name="matricula" placeholder="Matrícula" min = "0" required>
                </div>
                
                <div class="form-group">
                <?php
                    //tratamento de erros para o campo de fornecedor permitir até o número limite de ids que tem no banco
                    $array = $acessoDao->contar();
                    $max = implode(end($array));
                ?>
                <label for="id_acesso_fk">Tipo de acesso</label>
                <input type="number" class="form-control" name="id_acesso_fk" id="id_acesso_fk" min = "1" max = "<?php echo $max; ?>" required>
                </div>
                <div class="form-group">
                    <label for="imagem">Imagem</label>
                    <input type="file" name="nome_imagem">
                </div>
                <input type="submit" class="btn btn-secondary btn-block btn-lg mt-5" name="btnCadastrarUsuario" value="Cadastrar" >
              </form>
              <a href="menu.php" class="btn btn-secondary btn-block btn-lg mt-5">Cancelar</a>
            </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>