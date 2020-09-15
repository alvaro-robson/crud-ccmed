<?php 
//namespace para o autoload(carregamento automático de classes pelo PSR-4)
namespace App\Model;

class MaterialDao{
	
	public function create(Material $m){ //recebe a classe Material como parâmetro instanciada como $p
		$sql = 'INSERT INTO MATERIAL(nome_material, desc_material, qtde_estoque, id_prat_fk, id_forn_fk) VALUES(?, ?, ?, ?, ?)';
		//as interrogações são equivalentes aos valores

		//Preparando o sql usando o PDO, começando com o método getConn(que é uma instância do PDO) da classe Conexao:
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $m->getnome_material());
		$stmt->bindValue(2, $m->getdesc_material());
		$stmt->bindValue(3, $m->getqtde_estoque());
		$stmt->bindValue(4, $m->getid_prat_fk());
		$stmt->bindValue(5, $m->getid_forn_fk());
		$stmt->execute();
	}

	public function read(){
		$sql = 'SELECT * FROM MATERIAL';
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

	public function update(Material $m){//recebe a classe Material como parâmetro instanciada como $p
		$sql = 'UPDATE MATERIAL SET nome_material = ?, desc_material = ?, qtde_estoque = ?, id_prat_fk = ?, id_forn_fk = ? WHERE id_material = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $m->getnome_material());
		$stmt->bindValue(2, $m->getdesc_material());
		$stmt->bindValue(3, $m->getqtde_estoque());
		$stmt->bindValue(4, $m->getid_prat_fk());
		$stmt->bindValue(5, $m->getid_forn_fk());
		$stmt->bindValue(6, $m->getid_material());
		$stmt->execute();
	}

	public function delete($id_material){
		$sql = 'DELETE FROM MATERIAL WHERE id_material = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_material);
		$stmt->execute();
	}
}

 ?>