<?php 
	namespace App\Model; 
    require_once "vendor/autoload.php";
    $usuario = new \App\Model\Usuario;
    $usuarioDao = new \App\Model\UsuarioDao;
    $forn = new \App\Model\Fornecedor;
    $fornDao = new \App\Model\FornecedorDao;
    $tel = new \App\Model\Telefone;
    $telDao = new \App\Model\TelefoneDao;
    $email = new \App\Model\Email;
    $emailDao = new \App\Model\EmailDao;
    $estado = new \App\Model\Estado;
    $estadoDao = new \App\Model\EstadoDao;
    $cidade = new \App\Model\Cidade;
    $cidadeDao = new \App\Model\CidadeDao;
    $logra = new \App\Model\Logradouro;
    $lograDao = new \App\Model\LogradouroDao;
    $flp = new \App\Model\Forn_logra_possui;
    $flpDao = new \App\Model\Forn_logra_possuiDao;
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
    <title>Cadastro de usuários</title>
  </head>
  <body class="color">
  <script src = "scripts/document.js"></script>
	<script src = "scripts/document.js"></script>
	<?php
	session_start();
if(!isset($_SESSION['id_usuario'])){
    session_destroy();
    header("location:login.php");
}else{
	$usuarioDao->mostrarSessao();
}
$usuarioDao->sair();//se o usuário clicar em sair, esta função é executada;

if(isset($_POST['btnCadastrarForn'])){
    foreach($fornDao->read() as $ultimoForn);
    $forn->setnome_forn($_POST['nome_forn']);
    $forn->setnum_endereco($_POST['num_endereco']);
    $forn->setcomplemento_end($_POST['complemento_end']);
    $fornDao->create($forn);
    //
    $tel->setnumero_tel($_POST['numero_tel']);
    $tel->setid_forn_fk($ultimoForn['id_forn']);
    $telDao->create($tel);
    //
    $email->setemail_forn($_POST['email_forn']);
    $email->setid_forn_fk($ultimoForn['id_forn']);
    $emailDao->create($email);
    //
    $cidade->setnome_cidade($_POST['nome_cidade']);
    $cidade->setid_estado_fk(1); //Só haverá 1 estado no sistema(SP)
    $cidadeDao->create($cidade);
    //
    $logra->setcep($_POST['cep']);
    $logra->setnome_logra($_POST['nome_logra']);
    $logra->settipo_logra($_POST['tipo_logra']);
    foreach($cidadeDao->read() as $cid);
    $logra->setid_cidade_fk($cid['id_cidade']);
    $lograDao->create($logra);
    //
    foreach($fornDao->read() as $idforns);
    $flp->setid_forn_fk($idforns['id_forn']);
    foreach($lograDao->read() as $cep)
    $flp->setcep_fk($cep['CEP']);
    $flpDao->create($flp);
}
?>
<div class="container"><!-- 1 div container -->
    <div class="row">
        <div class="col-12 col-sm-12" style="display: flex; align-items: center; justify-content: center">
              <h1  align="center">Cadastro de fornecedores</h1>
        </div>
    </div>
</div><!-- fim div container -->

<div class="container mt-2">
    <div class="row">
        <div class="col-sm-12">
            <form class="mb-" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="login">Nome</label>
                    <input type="text" class="form-control" id="login" name="nome_forn" placeholder="Digite o nome do fornecedor" required>
                </div>

                <div class="form-group">
                  <label for="senha">Telefone</label>
                  <input type="number" class="form-control" name="numero_tel" placeholder="Telefone" required>
                </div>
                
                <div class="form-group">
                    <label for="nome">Email</label>
                    <input type="email" class="form-control" id="senha" name="email_forn" placeholder="Endereço de email" required>
                </div>

                <div class="form-group">
                    <label for="matricula">Tipo de logradouro</label>
                    <select name="tipo_logra" class="form-control">
                        <option>Rua</option>
                        <option>Avenida</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="sobrenome">Cep</label>
                    <input type="number" class="form-control" id="sobrenome" name="cep" placeholder="CEP" min = "0  " required>
                </div>

                <div class="form-group">
                    <label for="sobrenome">Logradouro</label>
                    <input type="text" class="form-control" id="sobrenome" name="nome_logra" placeholder="Nome da rua/avenida/etc" required>
                </div>

                
                <div class="form-group">
                    <label for="matricula">Número</label>
                    <input type="number" class="form-control" id="matricula" name="num_endereco" placeholder="nº" min = "0" required>
                </div>
                
                <div class="form-group">
                    <label for="matricula">Complemento</label>
                    <input type="text" class="form-control" id="matricula" name="complemento_end" placeholder="Complemento" required>
                </div>

                <div class="form-group">
                    <label for="matricula">Cidade</label>
                    <input type="text" class="form-control" id="matricula" name="nome_cidade" placeholder="Cidade" required>
                </div>

                <div class="form-group">
                    <label for="matricula">Estado</label>
                    <select name="estado" class="form-control">
                        <option>SP</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-block btn-lg " name="btnCadastrarForn">Cadastrar</button>

                
            </form>
              
        </div>
    </div>
</div><!-- fim div container 2 -->

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
