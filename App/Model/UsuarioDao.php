<?php 
namespace App\Model;
class UsuarioDao{

	public function create(Usuario $usu){
		$sql = 'INSERT INTO USUARIO (login, senha, nome, sobrenome, matricula, id_acesso_fk, imagem) VALUES(?, ?, ?, ?, ?, ?, ?)';
		//$extensao = strtolower(substr($_FILES['nome_imagem']['name'], -4)); //pega a extensao do arquivo
	    $imagem = $_FILES['nome_imagem']['name']; //define o nome do arquivo
	    $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
		move_uploaded_file($_FILES['nome_imagem']['tmp_name'], $diretorio.$imagem); //efetua o upload
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $usu->getlogin());
		$stmt->bindValue(2, $usu->getsenha());
		$stmt->bindValue(3, $usu->getnome());
		$stmt->bindValue(4, $usu->getsobrenome());
		$stmt->bindValue(5, $usu->getmatricula());
		$stmt->bindValue(6, $usu->getid_acesso_fk());
		$stmt->bindValue(7, $imagem);
		$stmt->execute();
	}

	public function read(){
		$sql = "SELECT id_usuario, login, senha as 'senha', nome, sobrenome, matricula, id_acesso_fk, imagem FROM USUARIO";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}

	public function relatorioUsuarios(){
		$sql = 'SELECT U.id_usuario, U.login, U.nome, U.sobrenome, U.matricula, A.id_acesso, A.nome_acesso, U.imagem
		FROM USUARIO U INNER JOIN ACESSO A
		ON U.id_acesso_fk = A.id_acesso';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			foreach($resultado as $res){
				echo
					"
					<div class='row mt-2'>
					<div class='col-4 col-sm-4'>
					<img src = upload/" . $res['imagem'] . " class = 'fotoSession' width='100%'>
					</div>
						<div class='col-8 col-sm-8'>
						Login: <b>" . $res['login'] . "</b><br>
						Nome: <b>" . $res['nome'] . " " . $res['sobrenome'] . "</b><br>
						Matrícula: <b>" . $res['matricula'] . "</b><br>
						Nível de acesso: <b>" . $res['id_acesso'] . " (" . $res['nome_acesso'] . ")</b><br>
					</div>
					
					<div class='col-6 col-sm-6 mt-2'>
					<a href = editar-usuario.php?id_usuario=" . $res['id_usuario'] . ">
					<button class='btn btn-info btn-block'>Editar</button>
					</a>
					</div>
					<div class='col-6 col-sm-6 mt-2'>
					<a href = excluir-usuario.php?id_usuario=".$res['id_usuario'].">
					<button class='btn btn-danger btn-block'>Excluir</button>
					</a>
					</div>
					
					</div>
					";
			}
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}

	public function update(Usuario $usu){
		$id_usuario = $_GET['id_usuario'];
		$sql = 'UPDATE USUARIO SET login = ?, nome = ?, sobrenome = ?, matricula = ?, id_acesso_fk = ? WHERE id_usuario = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $usu->getlogin());
		//$stmt->bindValue(2, $usu->getsenha());
		$stmt->bindValue(2, $usu->getnome());
		$stmt->bindValue(3, $usu->getsobrenome());
		$stmt->bindValue(4, $usu->getmatricula());
		$stmt->bindValue(5, $usu->getid_acesso_fk());
		$stmt->bindValue(6, $id_usuario);
		$stmt->execute();
		?>
			<script>
				alert("Cadastro atualizado com sucesso");
				window.location.href = "listagem-usuarios.php";
			</script>
		<?php
	}

	public function delete(){
		$id_usuario = $_GET['id_usuario'];
		$sql = 'DELETE FROM USUARIO WHERE id_usuario = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_usuario);
		$stmt->execute();
	}

	public function logar(Usuario $usu){
		$sql = 'SELECT * FROM USUARIO WHERE login = ? and senha = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $usu->getlogin());
		$stmt->bindValue(2, $usu->getsenha());
		$stmt->execute();
		if($stmt->rowCount() == 1){
			session_start();
			$resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
			$_SESSION['logado'] = 'sim';
			$_SESSION['id_usuario'] = $resultado['id_usuario'];
			$_SESSION['login'] = $resultado['login'];
			$_SESSION['senha'] = $resultado['senha'];
			$_SESSION['nome'] = $resultado['nome'];
			$_SESSION['sobrenome'] = $resultado['sobrenome'];
			$_SESSION['matricula'] = $resultado['matricula'];
			$_SESSION['id_acesso_fk'] = $resultado['id_acesso_fk'];
			$_SESSION['imagem'] = $resultado['imagem'];
			
			//DECIDINDO EM QUAL PÁGINA O USUÁRIO ENTRARÁ DE ACORDO COM SEU ACESSO:
			switch ($_SESSION['id_acesso_fk']) {
				case 1:
					header('location:menu-pedidos.php');
					break;
				case 2:
					echo $_SESSION['id_acesso_fk'];
					header('location:menu.php');
					break;
				case 3:
					echo "admin";
					header('location:form-cadastrar.php');
					break;
				default:
					echo "nenhum";
					header('location:login.php');
					
			}
		}else{
			//header("location:login.php");
			//echo "Nenhum registro";
			?>
				<script>alert("Dados inválidos");</script>
			<?php
		}
	}

	public function mostrarSessao(){
		//MOSTRA OS DADOS DO USUÁRIO DA SESSÃO ATUAL
		echo 

		"
		<div class ='container'>
			<div class='row  alert-primary pb-2'>
				<div class='col-sm-8 col-8'>
					
						<div class = dadosUsuarioSession>
						Olá <b>" . $_SESSION['nome'] . "</b> Seja bem-vindo <br>Código de Matrícula: <b> " . $_SESSION['matricula'] . "</b><br>	
						
					</div>
			</div>

			
			";
		?>
			
				<div class="col-sm-4 col-4">
			<div class="divFotoSession d-flex justify-content-center">
				<img src="upload/<?php echo $_SESSION['imagem'];?>" width = "100px" height="1%" class="fotoSession">
			
			</div>
			</div>
			</div>
		</div><!--FIM DA DIV SESSION-->
		<?php
	}

	public function coletar_id_usuario(Usuario $usu){
		$id_usuario = $_GET['id_usuario'];
		$sql = 'SELECT * FROM USUARIO WHERE id_usuario = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_usuario);
		$stmt->execute();
		$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $resultado;
	}

	//VERIFICA SE JÁ EXISTE ALGUÉM COM A MESMA MATRÍCULA NA HORA DO CADASTRO
	public function verificarMatricula(Usuario $usu){
		$sql = "SELECT id_usuario from USUARIO WHERE matricula = ? or login = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $usu->getmatricula());
		$stmt->bindValue(2, $usu->getlogin());
		$stmt->execute();
		if($stmt->rowCount() > 0){
			?>
				<script>alert("Matrícula ou login já cadastrados");</script>
			<?php
		}else{
			$this->create($usu);
			?>
				<script>alert("Usuário cadastrado com sucesso!");</script>
			<?php
		}
	}
	/*
	public function verificarLogin(Usuario $usu){
		$sql = "SELECT id_usuario from USUARIO WHERE login = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1,  $usu->getlogin());
		$stmt->execute();
		if($stmt->rowCount() > 0){
			?>
				<script>alert("Já existe um funcionário cadastrado com este login");</script>
			<?php
		}else{
			$this->create($usu);
			?>
				<script>alert("Usuário cadastrado com sucesso!");</script>
			<?php
		}
	}
	*/
	public function sair(){
		if(isset($_POST['btnSair'])){
			session_destroy();
			header("location:login.php");
		}
	}
}

 ?>
