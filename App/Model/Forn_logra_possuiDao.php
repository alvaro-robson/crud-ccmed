<?php 
namespace App\Model;

//CLASSE REFERENTE A UMA TABELA ASSOCIATIVA NA QUAL ALGUMAS FUNÇÕES NÃO SÃO NECESSÁRIAS, ASSIM COMO A CLASSE COM GETTERS E SETTERS TAMBÉM NÃO É, POIS NO READ NÃO SE USA PARÂMETROS

class Forn_logra_possuiDao{
	public function create(Forn_logra_possui $flp){
		$sql = 'INSERT INTO FORN_LOGRA_POSSUI(id_forn_fk, cep_fk)VALUES(?, ?)';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $flp->getid_forn_fk());
		$stmt->bindValue(2, $flp->getcep_fk());
		$stmt->execute();
	}

	public function read(){
		$sql = 'SELECT * FROM FORN_LOGRA_POSSUI';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}

	public function update($flp){
		$sql = 'UPDATE FORN_LOGRA_POSSUI SET cep_fk = ? WHERE id_forn_fk = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $flp->getcep_fk());
		$stmt->bindValue(2, $flp->getid_forn_fk());
		$stmt->execute();
	}

	public function delete($flp){
		$sql = 'DELETE FROM FORN_LOGRA_POSSUI WHERE id_forn_fk = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $flp->getid_forn_fk());
		$stmt->execute;
	}
}

 ?>