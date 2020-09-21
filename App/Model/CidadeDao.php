<?php 
namespace App\Model;

class CidadeDao{
	public function create(Cidade $c){
		$sql = 'INSERT INTO CIDADE(nome_cidade, id_estado_fk)VALUES(?, ?)';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $c->getnome_cidade());
		$stmt->bindValue(2, $c->getid_estado_fk());
		$stmt->execute();
	}

	public function read(){
		$sql = 'SELECT * FROM CIDADE';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();

		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}

	public function update(Cidade $c){
		$sql = 'UPDATE CIDADE SET nome_cidade = ?, id_estado_fk = ? WHERE id_cidade = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $c->getnome_cidade());
		$stmt->bindValue(2, $c->getid_estado_fk());
		$stmt->bindValue(3, $c->getid_cidade());
		$stmt->execute();
	}

	public function delete($id_cidade){
		$sql = 'DELETE FROM CIDADE WHERE id_cidade = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_cidade);
		$stmt->execute();
	}
}

 ?>