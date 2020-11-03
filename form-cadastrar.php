<?php 
namespace App\Model;
require_once "vendor/autoload.php";
$FornecedorDao = new \App\Model\FornecedorDao;
$material = new \App\Model\Material();
$materialDao = new \App\Model\MaterialDao();
//CREATE

session_start();
    if(!isset($_SESSION['id_usuario'])){
        session_destroy();
        header("location:login.php");
    }else{
        echo 
        '<div class = "session">
        Olá, ' . $_SESSION['nome'] . '! <br>Seja bem-vindo.<br>
        ID: ' . $_SESSION['id_usuario'] . ',<br>
        matrícula: ' . $_SESSION['matricula'] . '<br>
        acesso: ' . $_SESSION['id_acesso_fk'];
    }

if(isset($_POST['btnCadastrar'])){
    //$material->setid_material(1);
    $material->setnome_material($_POST['nome_material']);
    $material->setdesc_material($_POST['desc_material']);
    $material->setqtde_estoque($_POST['qtde_estoque']);
    $material->setid_prat_fk($_POST['id_prat_fk']);
    $material->setid_forn_fk($_POST['id_forn_fk']);
    //$material->setimagem($imagem);
    $materialDao->create($material);//NÃO FUNCIONOU DE PRIMEIRA. Tive que dar o comando "composer dumpautoload -o"
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

    <title>Cadastro de materiais</title>
  </head>
  <body class="color">
  <br><a href="login.php">Sair</a>
  <div class="row">
          <div class="container mt-5" style="display: flex; align-items: center; justify-content: center">
              <h1 class="" align="center">Cadastro de materiais</h1>
          </div>
      </div>
    <div class="container mt-5">
        <div class="col-sm-12">
            <form class="mb-" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="nome">Material</label>
                  <input type="text" class="form-control" id="nome" name="nome_material" placeholder="Digite o nome do material" required>
                  
                </div>
                <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <input type="text" class="form-control" name="desc_material" placeholder="Descricao" required>
                </div>
                
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="qtde_estoque" placeholder="Quantidade" pattern="[0-9]+$" min="0" required>
                  </div>
                  <div class="form-group">
                    <label for="prateleira">Prateleira</label>
                    <input type="number" class="form-control" id="local" name="id_prat_fk" placeholder="id prateleira" min="1" max="16" required>
                  </div>
                  <div class="form-group">
                    <?php
                    //tratamento de erros para o campo de fornecedor permitir até o número limite de ids que tem no banco
                    $array = $FornecedorDao->contar();
                    $max = implode(end($array));
                    ?>
                    <label for="fornecedor">Fornecedor</label>
                    <input type="number" class="form-control" id="local" name="id_forn_fk" placeholder="id fornecedor" min="1"  max="<?php echo $max; ?>" required>
                   
                  </div>
                  <div class="form-group">
                <label for="imagem">Imagem</label>
                <input type="file" name="nome_imagem">
                </div>
                <input type="submit" class="btn btn-secondary btn-block btn-lg mt-5" name="btnCadastrar" value="Armazenar">
              </form>
              <a href="menu.php" class="btn btn-secondary btn-block btn-lg mt-5">Voltar</a>
              <?php 
              
              
              ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
