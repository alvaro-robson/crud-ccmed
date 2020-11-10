<?php 
//namespace para o autoload(carregamento automático de classes pelo PSR-4)
namespace App\Model;

class CorredorDao{
	
	public function create(Corredor $corr){ 
		$sql = 'INSERT INTO CORREDOR(nome_corredor) VALUES(?)';
		//Preparando o sql usando o PDO, começando com o método getConn(que é uma instância do PDO) da classe Conexao:
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $corr->getnome_corredor());
		$stmt->execute();
	}

	public function read(){
		$sql = 'SELECT * FROM CORREDOR';
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

	public function update(Corredor $corr){
		$sql = 'UPDATE CORREDOR SET nome_corredor = ? WHERE id_corr = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $corr->getnome_corredor());		
		$stmt->bindValue(2, $corr->getid_corr());
		$stmt->execute();
	}

	public function delete($id_corr){
		$sql = 'DELETE FROM CORREDOR WHERE id_corr = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_corr);
		$stmt->execute();
	}
}

 ?>