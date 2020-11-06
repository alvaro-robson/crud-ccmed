<?php 
namespace App\Model;
class UsuarioDao{

	public function create(Usuario $usu){
		$sql = 'INSERT INTO USUARIO (login, senha, nome, sobrenome, matricula, id_acesso_fk, imagem) VALUES(?, ?, ?, ?, ?, ?, ?)';
		$extensao = strtolower(substr($_FILES['nome_imagem']['name'], -4)); //pega a extensao do arquivo
	    $imagem = md5($_FILES['nome_imagem']['name']) . $extensao; //define o nome do arquivo
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
			echo "Nenhum registro";
		}
	}

	public function mostrarSessao(){
		//MOSTRA OS DADOS DO USUÁRIO DA SESSÃO ATUAL
		echo 
		"<div class = 'session'><!--INICIO DA DIV SESSION-->
			<div class = dadosUsuarioSession>
				Olá, " . $_SESSION['nome'] . "! <br>Seja bem-vindo.<br>
				ID: " . $_SESSION['id_usuario'] . ",<br>
				matrícula: " . $_SESSION['matricula'] . "<br>
				acesso: " . $_SESSION['id_acesso_fk'] . "<br>
			</div>";
		?>
			<div class="divFotoSession">
				<img src="upload/<?php echo $_SESSION['imagem'];?>" width = "100px" class="fotoSession">
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
		$sql = "SELECT id_usuario from USUARIO WHERE matricula = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1,  $usu->getmatricula());
		$stmt->execute();
		if($stmt->rowCount() > 0){
			?>
				<script>alert("Já existe um funcionário cadastrado com esta matrícula");</script>
			<?php
		}else{
			$this->create($usu);
			?>
				<script>alert("Usuário cadastrado com sucesso!");</script>
			<?php
		}
	}
}

 ?>
