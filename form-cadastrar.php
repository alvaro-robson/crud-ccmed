<?php 
namespace App\Model;
require_once "vendor/autoload.php";
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

    <title>Armazenamento</title>
  </head>
  <body class="color">
  <div class="row">
          <div class="container mt-5" style="display: flex; align-items: center; justify-content: center">
              <h1 class="">Armazenagem</h1>
          </div>
      </div>
    <div class="container mt-5">
        <div class="col-sm-12">
            <form class="mb-" action="index.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="nome">Material</label>
                  <input type="text" class="form-control" id="nome" name="nome_material" placeholder="Digite o nome do material">
                  
                </div>
                <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <textarea class="form-control" name="desc_material" placeholder="descricao">

                  </textarea>
                </div>
                
                <div class="form-group">
                    <label for="descricao">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="qtde_estoque" placeholder="Quantidade">
                  </div>
                  <div class="form-group">
                    <label for="descricao">Prateleira</label>
                    <input type="text" class="form-control" id="local" name="id_prat_fk" placeholder="id prateleira">
                  </div>
                  <div class="form-group">
                    <label for="descricao">Fornecedor</label>
                    <input type="text" class="form-control" id="local" name="id_forn_fk" placeholder="id fornecedor">
                  </div>
                  <div class="form-group">
                <label for="imagem">Imagem</label>
                <input type="file" name="nome_imagem">
                </div>
                <input type="submit" class="btn btn-secondary btn-block btn-lg mt-5" name="btnCadastrar" value="Armazenar">
              </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
