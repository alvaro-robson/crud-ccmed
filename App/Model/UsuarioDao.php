<?php 

namespace App\Model;

class UsuarioDao{

	public function create(Usuario $usu){
		$sql = 'INSERT INTO USUARIO (login, senha, nome, sobrenome, matricula, id_acesso_fk) VALUES(?, ?, ?, ?, ?, ?)';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $usu->getlogin());
		$stmt->bindValue(2, $usu->getsenha());
		$stmt->bindValue(3, $usu->getnome());
		$stmt->bindValue(4, $usu->getsobrenome());
		$stmt->bindValue(5, $usu->getmatricula());
		$stmt->bindValue(6, $usu->getid_acesso_fk());
		$stmt->execute();
	}

	public function read(){
		$sql = "SELECT id_usuario, login, senha as 'senha', nome, sobrenome, matricula, id_acesso_fk FROM USUARIO";
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
		$sql = 'UPDATE USUARIO SET login = ?, senha = ?, nome = ?, sobrenome = ?, matricula = ?, id_acesso_fk = ? WHERE id_usuario = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $usu->getlogin());
		$stmt->bindValue(2, $usu->getsenha());
		$stmt->bindValue(3, $usu->getnome());
		$stmt->bindValue(4, $usu->getsobrenome());
		$stmt->bindValue(5, $usu->getmatricula());
		$stmt->bindValue(6, $usu->getid_acesso_fk());
		$stmt->bindValue(7, $usu->getid_usuario());
		$stmt->execute();
	}

	public function delete($id_usuario){
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
			//session_destroy();
			//$_SESSION['nome_session'] = $resultado['id_usuario'];
			
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

	public function sessoes(){

	}
}

 ?>
