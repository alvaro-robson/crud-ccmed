<?php

namespace App\Model;

require_once "vendor/autoload.php";
$material = new \App\Model\Material();
$materialDao = new \App\Model\MaterialDao();
$FornecedorDao = new \App\Model\FornecedorDao;
$usuarioDao = new \App\Model\UsuarioDao;
foreach ($materialDao->editar_material() as $editar);

session_start();
if (!isset($_SESSION['id_usuario'])) {
    session_destroy();
    header("location:login.php");
} else {
    echo
        $usuarioDao->mostrarSessao();
}

if (isset($_POST['btnEditar'])) {
    $material->setid_material($editar['id_material']);
    $material->setnome_material($_POST['nome_material_edit']);
    $material->setdesc_material($_POST['desc_material_edit']);
    $material->setqtde_estoque($_POST['qtde_estoque_edit']);
    $material->setid_prat_fk($_POST['id_prat_fk_edit']);
    $material->setid_forn_fk($_POST['id_forn_fk_edit']);
    //$material->setimagem($_POST['nome_imagem_edit']);
    $materialDao->update($material);
    header("location:index.php");
}
if (isset($_POST['btnCancelar'])) {
    header("location:index.php");
}
if(isset($_POST['btnSair'])){
    session_destroy();
}
?>
<!DOCTYPE html>
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

<body>
    <div class="container">
        <div class="row">
            <div class="container" style="display: flex; align-items: center; justify-content: center">
                <h1 class="">Alterar material</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form class="mb-" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome">Material</label>
                        <input type="text" class="form-control" id="nome" name="nome_material_edit" placeholder="Digite o nome do material" value="<?= $editar['nome_material']; ?>">

                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" name="desc_material_edit" placeholder="descricao" value="<?= $editar['desc_material']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="descricao">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="qtde_estoque_edit" placeholder="Quantidade" value="<?= $editar['qtde_estoque']; ?>" pattern="[0-9]+$" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Prateleira</label>
                        <input type="number" class="form-control" id="local" name="id_prat_fk_edit" placeholder="id prateleira" value="<?= $editar['id_prat_fk']; ?>" min="1" max="16" required>
                    </div>
                    <div class="form-group">
                        <?php
                        //tratamento de erros para o campo de fornecedor permitir até o número limite de ids que tem no banco
                        $array = $FornecedorDao->contar();
                        $max = implode(end($array));
                        ?>
                        <label for="descricao">Fornecedor</label>
                        <input type="number" class="form-control" id="local" name="id_forn_fk_edit" placeholder="id fornecedor" value="<?= $editar['id_forn_fk']; ?>" min="1" max="<?php echo $max; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="imagem">Imagem</label>
                        <input type="file" class="form-control-file" name="nome_imagem_edit">
                    </div>
                    <button type="submit" class="btn btn-success btn-block btn-lg mt-2" name="btnEditar">Salvar</button>
                   
                    
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-2 mb-2"><!--  div container 3' -->
		<div class="row">
			<div class="col-sm-6 col-6">
            <a href="index.php">
				<button  class="btn btn-warning btn-block btn-lg">Voltar</button>
            </a>
            </div>
            <div class="col-sm-6 col-6">
            <form method = "POST">
				<a href="login.php">
					<button class="btn btn-danger btn-block btn-lg " name="btnSair">Sair</button>
                </a>
            </form>
                </div>
			</div>
		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>