<?php 
//namespace para o autoload(carregamento automático de classes pelo PSR-4)
namespace App\Model;

class EstadoDao{
	
	public function create(Estado $est){ 
		$sql = 'INSERT INTO ESTADO(nome_estado) VALUES(?)';
		//Preparando o sql usando o PDO, começando com o método getConn(que é uma instância do PDO) da classe Conexao:
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $est->getnome_estado());
		$stmt->execute();
		//header("location:index.php");
	}

	public function read(){
		$sql = 'SELECT * FROM ESTADO';
		//Preparando o sql usando o PDO, começando com o método getConn(que é uma instância do PDO) da classe Conexao:
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		//verificando de a consulta retorna algum resultado:
		if($stmt->rowCount() > 0): //se a contagem de linhas for maior 0:
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC); //retornará um array com todos os registros, que vai ser atribuído à variável $resultado
			return $resultado;
		else:
			echo "Nenhum registro";
		endif;
	}

	public function update(Estado $est){
		$sql = 'UPDATE ESTADO SET nome_estado = ? WHERE id_estado = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $est->getnome_estado());
		$stmt->bindValue(2, $est->getid_estado());
		$stmt->execute();
	}

	public function delete($id_estado){
		$sql = 'DELETE FROM ESTADO WHERE id_estado = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_estado);
		$stmt->execute();
	}
}

 ?>