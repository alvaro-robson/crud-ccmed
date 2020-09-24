<?php 
namespace App\Model;

//CLASSE REFERENTE A UMA TABELA ASSOCIATIVA NA QUAL ALGUMAS FUNÇÕES NÃO SÃO NECESSÁRIAS, ASSIM COMO A CLASSE COM GETTERS E SETTERS TAMBÉM NÃO É, POIS NO READ NÃO SE USA PARÂMETROS

class Forn_logra_possuiDao{
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
}

 ?>