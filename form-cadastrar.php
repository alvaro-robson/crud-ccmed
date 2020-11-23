<?php 
namespace App\Model;
require_once "vendor/autoload.php";
$fornecedor = new \App\Model\Fornecedor;
$FornecedorDao = new \App\Model\FornecedorDao;
$material = new \App\Model\Material;
$materialDao = new \App\Model\MaterialDao;
$prat = new \App\Model\Prateleira;
$pratDao = new \App\Model\PrateleiraDao;
$col = new \App\Model\Coluna;
$colDao = new \App\Model\ColunaDao;
$corr = new \App\Model\Corredor;
$corrDao = new \App\Model\CorredorDao;
$usuarioDao = new \App\Model\UsuarioDao;
//CREATE

session_start();
    if(!isset($_SESSION['id_usuario'])){
        session_destroy();
        header("location:login.php");
    }else{
      $usuarioDao->mostrarSessao();
    }
    $usuarioDao->sair();//se o usuário clicar em sair, esta função é executada;

if(isset($_POST['btnCadastrar'])){
    //$material->setid_material(1);
    $material->setnome_material($_POST['nome_material']);
    $material->setdesc_material($_POST['desc_material']);
    $material->setqtde_estoque($_POST['qtde_estoque']);
    $material->setid_prat_fk($_POST['select_prat']);
    $forn = explode("-", $_POST['select_forn']); //Variável $forn vai ser o array separado pelo hífen
    $forn_id = $forn[0]; //$forn_id é a posição 0 do array, ou seja, o número do id do fornecedor na caixa de seleção
    $forn_nome = $forn[1]; //$forn_nome é a posição 1, ou seja, o nome
    $material->setid_forn_fk($forn_id);
    //$material->setid_forn_fk($_POST['id_forn_fk']);
    //$material->setimagem($imagem);
    $materialDao->create($material);//NÃO FUNCIONOU DE PRIMEIRA. Tive que dar o comando "composer dumpautoload -o"
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

    <title>Cadastro de materiais</title>
  </head>
  <body>
  <div class="container"><!--1 div container-->
	  <div class="row">
          <div class="col-sm-12 " style="display: flex; align-items: center; justify-content: center">
              <h1 class="" align="center">Cadastro de materiais</h1>
          </div>
      </div>
</div><!--fim 1 div container-->
	  
    <div class="container">
		<div class="row">
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
                    <!--input type="number" class="form-control" id="local" name="id_prat_fk" placeholder="codigo prateleira" min="1" max="64" required-->
                    <select name="select_prat" id="" class = "filtro form-control" required>
                      <?php //MENU DE SELEÇÃO COM OS FORNECEDORES PUXADOS DO BANCO
                        foreach($pratDao->read() as $prats){
                          ?>
                          <option>
                            <?php echo $prats['id_prat'];?>
                          </option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>
                <?php
                    //tratamento de erros para o campo de fornecedor permitir até o número limite de ids que tem no banco
                    $array = $FornecedorDao->contar();
                    $max = implode(end($array));
				?>
					<div class="form-group">
                    <label for="fornecedor">Fornecedor</label>
                    <!--input type="number" class="form-control" id="local" name="id_forn_fk" placeholder="codigo fornecedor" min="1"  max="<?php echo $max; ?>" required-->
                    <select name="select_forn" id="" class = "filtro form-control" required>
                      <?php //MENU DE SELEÇÃO COM OS FORNECEDORES PUXADOS DO BANCO
                        foreach($FornecedorDao->read() as $forns){
                          ?>
                          <option>
                            <?php echo $forns['id_forn'] . "-" . $forns['nome_forn'];?>
                          </option>
                          <?php
                        }
                      ?>
                    </select>
                    <?php
                    //echo $_POST['select_forn'];
                    /*
                      if(isset($_POST['id_forn_fk'])){
                        $fornecedor->setid_forn('id_forn_fk');
                        $FornecedorDao->readEspecifico($fornecedor);
                      }
                      */
                    ?>
					</div>
					<div class="form-group">
                	<label for="imagem">Imagem</label>
                	<input type="file" name="nome_imagem">
					</div>
					<button type="submit" class="btn btn-success btn-block btn-lg"  name="btnCadastrar">Cadastrar</button>
              		</form>
            </div>
		</div>
	</div><!--  fim div container 2' -->

	<div class="container mt-2"><!--  div container 3' -->
		<div class="row">
			<div class="col-sm-6 col-6">
				<a href="cadastros.php">
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