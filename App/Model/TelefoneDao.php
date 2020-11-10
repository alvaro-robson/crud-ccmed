<?php 

namespace App\Model;

class TelefoneDao{

	public function create(Telefone $tel){
		$sql = 'INSERT INTO TELEFONE (numero_tel, id_forn_fk) VALUES(?, ?)';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $tel->getnumero_tel());
		$stmt->bindValue(2, $tel->getid_forn_fk());
		$stmt->execute();
	}

	public function read(){
		$sql = 'SELECT * FROM TELEFONE';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}

	public function update(Telefone $tel){
		$sql = 'UPDATE TELEFONE SET numero_tel = ?,  WHERE id_forn_fk = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $tel->getnumero_tel());
		$stmt->bindValue(2, $tel->getid_forn_fk());
		//$stmt->bindValue(3, $tel->getid_telefone());
		$stmt->execute();
	}

	public function delete(Telefone $tel){
		$sql = 'DELETE FROM TELEFONE WHERE id_forn_fk = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $tel->getid_forn_fk());
		$stmt->execute();
	}

}

 ?>