<?php 
namespace App\Model;

class AcessoDao{
	
	public function create(Acesso $a){
		$sql = 'INSERT INTO ACESSO(nome_acesso, desc_acesso)VALUES(?, ?, ?)';
		$stmt = Conexao::getConn()->prepare->$sql;
		$stmt->bindValue(1, $a->getnome_acesso());
		$stmt->bindValue(2, $a->getdesc_acesso());
		$stmt->execute();
	}

	public function read(){
		$sql = 'SELECT * FROM ACESSO';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();

		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}

	public function update(Acesso $a){
		$sql = 'UPDATE ACESSO SET nome_acesso = ?, desc_acesso = ? WHERE id_acesso = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $a->getnome_acesso());
		$stmt->bindValue(2, $a->getdesc_acesso());
		$stmt->bindValue(3, $a->getid_acesso());
		$stmt->execute();
	}

	public function delete($id_acesso){
		$sql = 'DELETE FROM ACESSO WHERE id_acesso = ?';
		$sql->bindValue(1, $a->getid_acesso());
		$stmt->execute();
	}
}

 ?>