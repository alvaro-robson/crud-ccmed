<?php 
namespace App\Model;

class PrateleiraDao{

	public function create(Prateleira $prat){
		$sql = 'INSERT INTO PRATELEIRA(nome_prat, id_coluna_fk) VALUES(?, ?)';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $prat->getnome_prat());
		$stmt->bindValue(2, $prat->getid_coluna_fk());
		$stmt->execute();
	}

	public function read(){
		$sql = 'SELECT * FROM PRATELEIRA';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}

	public function update(Prateleira $prat){
		$sql = 'UPDATE PRATELEIRA SET nome_prat = ?, id_coluna_fk = ? WHERE id_prat = ?';
			$stmt = Conexao::getConn()->prepare($sql);
			$stmt->bindValue(1, $prat->getnome_prat());
			$stmt->bindValue(2, $prat->getid_coluna_fk());
			$stmt->bindValue(3, $prat->getid_prat());
			$stmt->execute();
	}

	public function delete($id_prat){
		$sql = 'DELETE FROM PRATELEIRA WHERE id_prat = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_prat);
		$stmt->execute();
	}
}

 ?>