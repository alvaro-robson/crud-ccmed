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

	public function delete(){
		$id_forn = $_GET['id_forn'];
		$sql = 'DELETE FROM FORNECEDOR WHERE id_forn = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_forn);
		$stmt->execute();
	}

	public function contar(){
		$sql = "SELECT COUNT(id_forn) as total FROM FORNECEDOR";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}

	public function cadastroForn(Fornecedor $forn, Telefone $tel, Email $mail, Estado $est, Cidade $cid, Logradouro $logra){
		$sql = 
		'INSERT INTO FORNECEDOR(nome_forn, num_endereco, complemento_end)VALUES(?, ?, ?);
		 INSERT INTO TELEFONE(numero_tel, id_forn_fk)VALUES(?, ?);
		 INSERT INTO EMAIL(email_forn, id_forn_fk)VALUES(?, ?);
		 INSERT INTO ESTADO(nome_estado)VALUES(?);
		 INSERT INTO CIDADE(nome_cidade, id_estado_fk)VALUES(?, ?);
		 INSERT INTO LOGRADOURO(cep, nome_logra, tipo_logra, id_cidade_fk)VALUES(?, ?, ?, ?);
		 INSERT INTO FORN_LOGRA_POSSUI(id_forn_fk, cep_fk)';
		 $stmt = Conexao::getConn()->prepare($sql);
		 $stmt->bindValue(1, $forn->getnome_forn());
		 $stmt->bindValue(2, $forn->getnum_endereco());
		 $stmt->bindValue(3, $forn->getcomplemento_end());
		 $stmt->bindValue(4, $tel->getnumero_tel());
		 $stmt->bindValue(5, $tel->getid_forn_fk());
		 $stmt->bindValue(6, $tel->getemail_forn());
		 $stmt->bindValue(7, $tel->getid_forn_fk());
		 $stmt->bindValue(8, $est->getnome_estado());
		 $stmt->bindValue(9, $cid->getnome_cidade());
		 $stmt->bindValue(10, $cid->getid_estado_fk());
		 $stmt->bindValue(11, $logra->getcep());
		 $stmt->bindValue(12, $logra->getnome_logra());
		 $stmt->bindValue(13, $logra->gettipo_logra());
		 $stmt->bindValue(14, $logra->getid_cidade_fk());
		 $stmt->bindValue(15, $forn->getid_forn());
		 $stmt->bindValue(16, $logra->getcep());
		 $stmt->execute();
	}

	public function relatorioForn(){
		$sql = 'SELECT F.id_forn, F.nome_forn, L.tipo_logra, L.nome_logra, F.num_endereco, F.complemento_end, 
		C.nome_cidade, FLP.cep_fk, E.nome_estado, T.numero_tel, EM.email_forn
		FROM FORNECEDOR F INNER JOIN FORN_LOGRA_POSSUI FLP
		ON F.id_forn = FLP.id_forn_fk INNER JOIN LOGRADOURO L
		ON FLP.cep_fk = L.CEP INNER JOIN CIDADE C
		ON L.id_cidade_fk = C.id_cidade INNER JOIN ESTADO E
		ON C.id_estado_fk = E.id_estado INNER JOIN TELEFONE T
		ON F.id_forn = T.id_forn_fk INNER JOIN EMAIL EM
		ON F.id_forn = EM.id_forn_fk;';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			foreach($resultado as $res){
				echo "<u>" . 
					$res['nome_forn'] . "</u><br>" . 
					$res['tipo_logra'] . " " . $res['nome_logra'] . ", " . $res['num_endereco'] . "<br>
					CEP: " . $res['cep_fk'] . "<br>
					Cidade: " . $res['nome_cidade'] . " - " . $res['nome_estado'] . "<br>
					Telefone: " . $res['numero_tel'] . "<br>
					Email: " . $res['email_forn'] . "<br>
					<a href = editar-forn.php?id_forn=" . $res['id_forn'] . ">
					<img src = 'icones/edit-64.png' class = 'icones'>
						</a>
					<a href = excluir-forn.php?id_forn=" . $res['id_forn'] .">
						<img src = 'icones/x-mark-4-64.png' class = 'icones'>
					</a>
					-----------------------------<br>";
			}
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}

	public function editar_forn(){
		$id_forn = $_GET['id_forn'];
		$sql = 'SELECT F.id_forn, F.nome_forn, L.tipo_logra, L.nome_logra, F.num_endereco, F.complemento_end, 
		C.nome_cidade, FLP.cep_fk, E.nome_estado, T.numero_tel, EM.email_forn, F.complemento_end
		FROM FORNECEDOR F INNER JOIN FORN_LOGRA_POSSUI FLP
		ON F.id_forn = FLP.id_forn_fk INNER JOIN LOGRADOURO L
		ON FLP.cep_fk = L.CEP INNER JOIN CIDADE C
		ON L.id_cidade_fk = C.id_cidade INNER JOIN ESTADO E
		ON C.id_estado_fk = E.id_estado INNER JOIN TELEFONE T
		ON F.id_forn = T.id_forn_fk INNER JOIN EMAIL EM
		ON F.id_forn = EM.id_forn_fk WHERE id_forn = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id_forn);
		$stmt->execute();
		$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $resultado;
	}
}

 ?>