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
		/* AINDA NÃO FUNCIONA O UPDATE DA IMAGEM
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
		$sql = 'UPDATE MATERIAL SET qtde_estoque = qtde_estoque + ? WHERE id_material = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $m->getqtde_estoque());
		$stmt->bindValue(2, $id);
		$stmt->execute();
	}

	public function devolver(Material $m){
		$sql = 'UPDATE MATERIAL SET qtde_estoque = qtde_estoque + ? WHERE id_material = ?';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $m->getqtde_estoque());
		$stmt->bindValue(2, $m->getid_material());
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

	public function relatorioMateriais(){
		$sql = 'SELECT
		M.id_material, M.nome_material, M.desc_material, M.qtde_estoque, M.imagem, M.id_prat_fk,
		F.nome_forn,
		P.nome_prat,
		C.nome_coluna, 
        CO.nome_corredor
        FROM CORREDOR CO INNER JOIN COLUNA C
		ON CO.id_corr = C.id_corr_fk INNER JOIN PRATELEIRA P
		ON C.id_coluna = P.id_coluna_fk INNER JOIN MATERIAL M
		ON P.id_prat = M.id_prat_fk INNER JOIN FORNECEDOR F
		ON M.id_forn_fk = F.id_forn order by id_material';
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			foreach($resultado as $res){
				echo
					"
					<div class='row'>
						<div class='col-sm-12'>
							<img src = upload/" . $res['imagem'] . " class = 'imagem-material'>
						</div>
					</div>
					<div class='container'>
						<div class='row alert-secondary'>
							<div class='col-12 col-sm-12 '>
								<p>
								Código do produto: <b>" . $res['id_material'] . "</b><br>
								Descrição: <b>" . $res['nome_material'] . " - " . $res['desc_material'] . "</b><br>
								Qtde em estoque: <b>" .	$res['qtde_estoque'] . "</b><br>
								Fornecedor: <b>" .	$res['nome_forn'] . "</b><br>
								Prateleira: <b>" . $res['nome_prat'] . "<br></b>
								Coluna do estoque: <b>".$res['nome_coluna'] . "</b><br>
								Nome do corredor: <b>" .$res['nome_corredor'] . "</b><br>
								</p>
							</div><!--fim da col 12 -->
						
							<div class='col-4 col-sm-4 mb-2'>
								<a href = editar.php?id=".$res['id_material'] . ">
									<button class='btn btn-block btn-info'>Editar</button>				
								</a>
							</div>
							<div class='col-4 col-sm-4'>	
								<a href = excluir.php?id=".$res['id_material'].">
									<button class='btn btn-block btn-danger'>Excluir</button>
								</a>
							</div>
							<div class='col-4 col-sm-4'>
								<a href = form-armazenar.php?id=".$res['id_material'].">
								<button class='btn btn-block btn-success'>Adicionar</button>	
								</a>
							</div>
						</div>
						</div>
					
					
					";
			}
			return $resultado;
		}else{
			echo "Nenhum registro";
		}
	}
}




 ?>