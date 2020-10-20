<?php 
  
  namespace App\Model;
  require_once "vendor/autoload.php";
  $usuarioDao = new \App\Model\UsuarioDao();
  $usuario = new \App\Model\Usuario();
  
  if(isset($_POST['btnEntrar'])){
    $usuario->setlogin($_POST['login']);
    $usuario->setsenha($_POST['senha']);
    $usuarioDao->logar($usuario);
    header("location:index.php");    
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
    
    <title>Login</title>
  </head>
  <body class="color">
  <div class="row">
            <div class="container">
            <img src="logo.png" width="100%" margin-bottom="20px" class="img-fluid">
            </div>
          
      </div>
    <div class="container mt-5">
        <div class="col-sm-12">
            <form class="mb-" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                
                <div class="form-group">
                  <label for="nome">Usuário</label>
                  <input type="text" class="form-control" id="nome" name="login" placeholder="Usuário">
                 </div>

                <div class="form-group">
                  <label for="descricao">Senha</label>
                  <input type="password" class="form-control" id="descricao" name="senha" placeholder="******">
                </div>
                
                <input type="submit" class="btn btn-secondary btn-block btn-lg mt-5" name="btnEntrar" value="Entrar">
              </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>