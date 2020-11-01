<?php 
//namespace para o autoload(carregamento automático de classes pelo PSR-4)
namespace App\Model;

class MaterialDao{
	public function create(Material $m){ //recebe a classe Material como parâmetro instanciada como $p
		$sql = 'INSERT INTO MATERIAL(nome_material, desc_material, qtde_estoque, id_prat_fk, id_forn_fk, imagem) VALUES(?, ?, ?, ?, ?, ?)';
		//as interrogações são equivalentes aos valores
		$extensao = strtolower(substr($_FILES['nome_imagem']['name'], -4)); //pega a extensao do arquivo
	    $imagem = md5($_FILES['nome_imagem']['name']) . $extensao; //define o nome do arquivo
	    $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
		move_uploaded_file($_FILES['nome_imagem']['tmp_name'], $diretorio.$imagem); //efetua o upload
		//Preparando o sql usando o PDO, começando com o método getConn(que é uma instância do PDO) da classe Conexao:
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $m->getnome_material());
		$stmt->bindValue(2, $m->getdesc_material());
		$stmt->bindValue(3, $m->getqtde_estoque());
		$stmt->bindValue(4, $m->getid_prat_fk());
		$stmt->bindValue(5, $m->getid_forn_fk());
		$stmt->bindValue(6, $imagem);
		//$stmt->bindValue(6, $m->getnome_imagem());
		$stmt->execute();
		//header("location:form-cadastrar.php");
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
		$sql = 'UPDATE MATERIAL SET nome_material = ?, desc_material = ?, qtde_estoque = ?, id_prat_fk = ?, id_forn_fk = ? /*imagem = ?*/ WHERE id_material = ?';
		/*
		$extensao = strtolower(substr($_FILES['nome_imagem_edit']['name'], -4)); //pega a extensao do arquivo
	    $imagem = $_FILES['nome_imagem_edit']['name'] . $extensao; //define o nome do arquivo
	    $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
		    move_uploaded_file($_FILES['nome_imagem_edit']['tmp_name'], $diretorio.$imagem); //efetua o upload
		*/
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $m->getnome_material());
		$stmt->bindValue(2, $m->getdesc_material());
		$stmt->bindValue(3, $m->getqtde_estoque());
		$stmt->bindValue(4, $m->getid_prat_fk());
		$stmt->bindValue(5, $m->getid_forn_fk());
		$stmt->bindValue(6, $m->getid_material());
		//$stmt->bindValue(7, $imagem);
		$stmt->execute();
	}

	public function delete(){
		$id = $_GET['id'];
		$sql = 'DELETE FROM MATERIAL WHERE id_material = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
	}
	
	/*
	public function read_editar(){
		$id_edit = $_GET['id'];
		$sql = 'SELECT * FROM MATERIAL WHERE id_material = $id_edit';
		$stmt = Conexao::getConn()->prepare($sql);
		//$stmt->bindValue(1, $m->getid_edit());
		$stmt->execute();
		$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	*/
	public function editar_material(){
		$id = $_GET['id'];
		$sql = 'SELECT * FROM MATERIAL WHERE id_material = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $resultado;
	}

	public function armazenar(Material $m){
		$id = $_GET['id'];
		//$qtde = $_POST['qtde'];
		$sql = 'UPDATE MATERIAL SET qtde_estoque = qtde_estoque + ? WHERE id_material = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $m->getqtde_estoque());
		$stmt->bindValue(2, $id);
		$stmt->execute();
	}

	//SUBTRAINDO QUANTIDADES DE MATERIAIS AO FAZER O PEDIDO:
	public function subtrairMaterial(Material $m){
		$sql = 'UPDATE MATERIAL SET qtde_estoque = ? WHERE id_material = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $m->getqtde_estoque());
		$stmt->bindValue(2, $m->getid_material());
		$stmt->execute();
	}
	/*
	//DEVOLVENDO OS MATERIAIS AO ESTOQUE APÓS CANCELAR O PEDIDO:
	public function devolverMateriais(Material $m){
		$sql = "UPDATE MATERIAL SET qtde_estoque = qtde_estoque + ? WHERE id_material = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $m->getqtde_estoque());
		$stmt->bindValue(2, $m->getid_material());
		$stmt->execute();
	}
	*/
}




 ?>