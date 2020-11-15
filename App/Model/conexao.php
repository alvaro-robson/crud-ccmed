<?php 
//namespace para o autoload(carregamento automático de classes pelo PSR-4)Após isso, no terminal foi feito o comando "composer ump-autoload" na pasta raiz
namespace App\Model;

class Conexao{
	private static $instance; //instncia da conexao

	//este metodo verifica se há uma instância da conexao
	public static function getConn(){
		//se não existir a instância de conexão
		if(!isset(self::$instance)):
			//vai criar a conexão
			self::$instance = new \PDO('mysql:host=localhost; dbname=db_ccmed; charset=utf8', 'root', '');
		endif;
		return self::$instance;
	}
}






 ?>