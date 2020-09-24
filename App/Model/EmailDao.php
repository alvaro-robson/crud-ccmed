<?php 
//namespace para o autoload(carregamento automático de classes pelo PSR-4)
namespace App\Model;

class EmailDao{
	
	public function create(Email $email){ 
		$sql = 'INSERT INTO EMAIL(email_forn, id_forn_fk) VALUES(?, ?)';
		//Preparando o sql usando o PDO, começando com o método getConn(que é uma instância do PDO) da classe Conexao:
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $email->getemail_forn());
		$stmt->bindValue(2, $email->getid_forn_fk());
		$stmt->execute();
		//header("location:index.php");
	}

	public function read(){
		$sql = 'SELECT * FROM EMAIL';
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

	public function update(Email $email){
		$sql = 'UPDATE EMAIL SET email_forn = ? WHERE id_email_forn = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $email->getemail_forn());
		$stmt->bindValue(2, $email->getid_email_forn());
		$stmt->execute();
	}

	public function delete($id_email_forn){
		$sql = 'DELETE FROM EMAIL WHERE id_email_forn = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_email_forn);
		$stmt->execute();
	}
}

 ?>