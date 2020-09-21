<?php 
//namespace para o autoload(carregamento automático de classes pelo PSR-4)
namespace App\Model;

class FornecedorDao{
	
	public function create(Fornecedor $forn){ 
		$sql = 'INSERT INTO FORNECEDOR(nome_forn, num_endereco, complemento_end) VALUES(?, ?, ?)';
		//Preparando o sql usando o PDO, começando com o método getConn(que é uma instância do PDO) da classe Conexao:
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $forn->getnome_forn());
		$stmt->bindValue(2, $forn->getnum_endereco());
		$stmt->bindValue(3, $forn->getcomplemento_end());
		$stmt->execute();
		//header("location:index.php");
	}

	public function read(){
		$sql = 'SELECT * FROM FORNECEDOR';
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

	public function update(Fornecedor $forn){
		$sql = 'UPDATE FORNECEDOR SET nome_forn = ?, num_endereco = ?, complemento_end = ? WHERE id_forn = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $forn->getnome_forn());
		$stmt->bindValue(2, $forn->getnum_endereco());
		$stmt->bindValue(3, $forn->getcomplemento_end());
		$stmt->bindValue(4, $forn->getid_forn());
		$stmt->execute();
	}

	public function delete($id_forn){
		$sql = 'DELETE FROM FORNECEDOR WHERE id_forn = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_forn);
		$stmt->execute();
	}
}

 ?>