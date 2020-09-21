<?php 
namespace App\Model;

class ColunaDao{
	public function create(Coluna $col){
		$sql = 'INSERT INTO COLUNA(nome_coluna, id_corr_fk)VALUES(?, ?)';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $col->getnome_coluna());
		$stmt->bindValue(2, $col->getid_corr_fk());
		$stmt->execute();
	}

	public function read(){
		$sql = 'SELECT * FROM COLUNA';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();

		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}

	public function update(Coluna $col){
		$sql = 'UPDATE COLUNA SET nome_coluna = ?, id_corr_fk = ? WHERE id_coluna = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $col->getnome_coluna());
		$stmt->bindValue(2, $col->getid_corr_fk());
		$stmt->bindValue(3, $col->getid_coluna());
		$stmt->execute();
	}

	public function delete($id_coluna){
		$sql = 'DELETE FROM COLUNA WHERE id_coluna = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_coluna);
		$stmt->execute();
	}
}

 ?>