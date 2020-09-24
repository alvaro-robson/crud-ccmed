<?php 
namespace App\Model;

class LogradouroDao{
	
	public function create(Logradouro $logra){
		$sql = 'INSERT INTO LOGRADOURO(cep, nome_logra, tipo_logra, id_cidade_fk)VALUES(?, ?, ?, ?)';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $logra->getcep());
		$stmt->bindValue(2, $logra->getnome_logra());
		$stmt->bindValue(3, $logra->gettipo_logra());		
		$stmt->bindValue(4, $logra->getid_cidade_fk());
		$stmt->execute();
	}

	public function read(){
		$sql = 'SELECT * FROM LOGRADOURO';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}

	public function update(Logradouro $logra){
		$sql = 'UPDATE LOGRADOURO SET cep = ?, nome_logra = ?, tipo_logra = ?, id_cidade_fk = ? WHERE cep = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $logra->getcep());
		$stmt->bindValue(2, $logra->getnome_logra());
		$stmt->bindValue(3, $logra->gettipo_logra());		
		$stmt->bindValue(4, $logra->getid_cidade_fk());
		$stmt->bindValue(5, $logra->getcep());//cep declarado novamente para que as variáveis tenham a mesma quantidade que os valores do sql
		$stmt->execute();
	}

	public function delete($cep){
		$sql = 'DELETE FROM LOGRADOURO WHERE cep = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $cep);
		$stmt->execute();
	}
}

 ?>