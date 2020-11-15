<?php

namespace App\Model;

require_once "vendor/autoload.php";
$material = new \App\Model\Material();
$materialDao = new \App\Model\MaterialDao();
$usuarioDao = new \App\Model\UsuarioDao;
foreach ($materialDao->editar_material() as $mostrar)

    session_start();
if (!isset($_SESSION['id_usuario'])) {
    session_destroy();
    header("location:login.php");
} else {
    $usuarioDao->mostrarSessao();
}

if (isset($_POST['btnArmazenar'])) {
    $material->setqtde_estoque($_POST['qtde']);
    $material->setid_material($id);
    $materialDao->armazenar($material);
    header("location:index.php");
}
if (isset($_POST['btnCancelar'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Alterar o estoque</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <!-- Bootstrap CSS -->
    <link href="custom.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <p>Insira a quantidade a ser armazenada do material:</p>
                    <p><b><?php echo $mostrar['nome_material'] . " " . $mostrar['desc_material'] . "</b><br>
                        Quantidade atual: <b>" . $mostrar['qtde_estoque'] . "</b></p>
                        <img width = '100%' src = upload/" . $mostrar['imagem'] . ">"; ?>
                            <div class="form-group">
                            <input type="number" name="qtde" pattern="[0-9]+$" min="1" class="form-control" placeholder="Quantidade">
                            </div>
                            <button type="submit" name="btnArmazenar" class="btn btn-success btn-block btn-lg">Salvar</button>
                            
                            <input type="submit" name="btnCancelar" value="Cancelar" class="btn btn-warning btn-block btn-lg ">
                </form>
            </div>
        </div>
    </div>
</body>

</html>