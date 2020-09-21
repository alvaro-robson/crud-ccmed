
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="container">

<?php 
//Para fazer o autoload, sem precisar dar include em todas as classes:
require_once "vendor/autoload.php";

//--CRUD-MATERIAL-------------------------------------------------------
$material = new \App\Model\Material();
/*
$material->setid_material(12);
$material->setnome_material("Alicate de corte");
$material->setdesc_material("15 polegadas");
$material->setqtde_estoque(10);
$material->setid_prat_fk(3);
$material->setid_forn_fk(1);
*/
/*
$materialDao = new \App\Model\MaterialDao();
//CREATE
if(isset($_POST['btnCadastrar'])){
	//$material->setid_material(1);
	$material->setnome_material($_POST['nome_material']);
	$material->setdesc_material($_POST['desc_material']);
	$material->setqtde_estoque($_POST['qtde_estoque']);
	$material->setid_prat_fk($_POST['id_prat_fk']);
	$material->setid_forn_fk($_POST['id_forn_fk']);
	$materialDao->create($material);//NÃO FUNCIONOU DE PRIMEIRA. Tive que dar o comando "composer dumpautoload -o"
}
*/
//$materialDao->update($material);
//$materialDao->delete(14);
//$materialDao->read();
/*
echo "<h3><strong><u>Listagem dos materiais</u></strong></h3><br>";
foreach ($materialDao->read() as $materiais) {
	echo
	"ID = " . $materiais['id_material'] . "<br>" .  
	"Nome = " . $materiais['nome_material'] . "<br>" . 
	"Descrição = " . $materiais['desc_material'] . "<br>" .
	"Qtde. estoque = " . $materiais['qtde_estoque'] . "<br>" .
	"ID prateleira = " . $materiais['id_prat_fk'] . "<br>" .
	"ID fornecedor = " . $materiais['id_forn_fk'] . 
	"<br>-----------------------------<br>";
}
*/

//--CRUD-CIDADE-------------------------------------------------------
/*
$cidade = new App\Model\Cidade();
$cidade->setid_cidade(1);
$cidade->setnome_cidade('São Paulo');
$cidade->setid_estado_fk(1);
*/
//$cidadeDao = new App\Model\CidadeDao();
//-----------
//$cidadeDao->create($cidade);
//-----------
/*
$cidadeDao->read();
echo "<h3><strong><u>Listagem das cidades</u></strong></h3><br>";
foreach($cidadeDao->read() as $cidades){
	echo
	"ID = " . $cidades['id_cidade'] . "<br>" .
	"Cidade = " . $cidades['nome_cidade'] . "<br>" . 
	"ID estado = " . $cidades['id_estado_fk'] . 
	"<br>-----------------------------<br>";
}
*/
//-----------
//$cidadeDao->update($cidade);
//-----------
//$cidadeDao->delete(28);

//--CRUD--ACESSO---------------------------------------------------
/*
$acesso = new App\Model\Acesso;
$acesso->setid_acesso(3);
$acesso->setnome_acesso('Administrador');
$acesso->setdesc_acesso('Acesso a todas as informações do sistema, como consultas, cadastro de materiais, fornecedores e novos usuários');
*/
//$acessoDao = new App\Model\AcessoDao;
//$acessoDao->create($acesso);
//$acessoDao->read();
/*
echo "<h3><strong><u>Listagem dos acessos</u></strong></h3><br>";
foreach($acessoDao->read() as $acessos){
	echo
		"ID = " . $acessos['id_acesso'] . "<br>" .
		"Acesso = " . $acessos['nome_acesso'] . "<br>" .
		"Descrição = " . $acessos['desc_acesso'] .
		"<br>-----------------------------<br>";
}
*/
//$acessoDao->update($acesso);
//$acessoDao->delete(0);


//--CRUD--COLUNA---------------------------------------------------
//$coluna = new App\Model\Coluna;
/*
$coluna->setid_coluna(0);
$coluna->setnome_coluna('coluna 11');
$coluna->setid_corr_fk(2); //É PRECISO SE ATENTAR NAS MODIFICAÇÕES POIS SÓ HÁ 2 CORREDORES
*/

//$colunaDao = new App\Model\ColunaDao;
//$colunaDao->create($coluna);
/*
$colunaDao->read();
echo "<h3><strong><u>Listagem das Colunas</u></strong></h3><br>";
foreach($colunaDao->read() as $colunas){
	echo 
		"ID = " . $colunas['id_coluna'] . "<br>" .
		"Coluna = " . $colunas['nome_coluna'] . "<br>" .
		"ID corredor = " . $colunas['id_corr_fk'] . "<br>" .
		"<a href = ''>
			<img src = 'icones/edit-64.png' class = 'icones'>
		</a>
		<a href = ''>
			<img src = 'icones/x-mark-4-64.png' class = 'icones'>
		</a> " .
		"<br>-----------------------------<br>";
}
*/
//$colunaDao->update($coluna);
//$colunaDao->delete(34);


//--CRUD--CORREDOR
/*
$corredor = new App\Model\Corredor;
$corredor->setid_corr(3);
$corredor->setnome_corredor('pppppppppppo');
*/
//$corredorDao = new App\Model\CorredorDao;
//$corredorDao->create($corredor);
/*
$corredorDao->read();
foreach($corredorDao->read() as $corredores){
	echo
		"ID Corredor = " . $corredores['id_corr'] . "<br>" . 
		"Corredor = " . $corredores['nome_corredor'] . "<br>" . 
		"<a href = ''>
			<img src = 'icones/edit-64.png' class = 'icones'>
		</a>
		<a href = ''>
			<img src = 'icones/x-mark-4-64.png' class = 'icones'>
		</a> " .
		"<br>-----------------------------<br>";
}
*/
//$corredorDao->update($corredor);
//$corredorDao->delete();


//--CRUD--DETALHE_PEDIDO------------------------------------------------
//$detalhe_pedido = new App\Model\Detalhe_pedido;
/*
$detalhe_pedido->setid_detalhe(19);
$detalhe_pedido->setquantidade(990);
$detalhe_pedido->setid_material_fk(1);
$detalhe_pedido->setid_pedido_fk(2);
*/
//$detalhe_pedidoDao = new App\Model\Detalhe_pedidoDao;

//$detalhe_pedidoDao->create($detalhe_pedido);
/*
$detalhe_pedidoDao->read();
foreach($detalhe_pedidoDao->read() as $detalhes){
	echo
		"ID = " . $detalhes['id_detalhe'] . "<br>" . 
		"Quantidade = " . $detalhes['quantidade'] . "<br>" . 
		"ID Material = " . $detalhes['id_material_fk'] . "<br>" .
		"ID Pedido = " . $detalhes['id_pedido_fk'] . "<br>" .
		"<a href = ''>
			<img src = 'icones/edit-64.png' class = 'icones'>
		</a>
		<a href = ''>
			<img src = 'icones/x-mark-4-64.png' class = 'icones'>
		</a> " .
		"<br>-----------------------------<br>";
}
*/
//$detalhe_pedidoDao->update($detalhe_pedido);
//$detalhe_pedidoDao->delete(19);



//--CRUD--EMAIL------------------------------------------------
//$email = new App\Model\Email;
/*
$email->setid_email_forn(7);
$email->setemail_forn('alvaro@OOO.com');
$email->setid_forn_fk(2);
*/
//$emailDao = new App\Model\EmailDao;
//$emailDao->create($email);
/*
$emailDao->read();
foreach($emailDao->read() as $emails){
	echo
		"ID = " . $emails['id_email_forn'] . "<br>" .
		"Email = " . $emails['email_forn'] . "<br>" .
		"ID Fornecedor = " . $emails['id_forn_fk'] . "<br>" .
		"<a href = ''>
			<img src = 'icones/edit-64.png' class = 'icones'>
		</a>
		<a href = ''>
			<img src = 'icones/x-mark-4-64.png' class = 'icones'>
		</a> " .
		"<br>-----------------------------<br>";
}
*/
//$emailDao->update($email);
//$emailDao->delete(7);


//--CRUD--ESTADO--------------------------------------------------
//$estado = new App\Model\Estado;
/*
$estado->setid_estado(2);
$estado->setnome_estado('Rio de Janeiro');
*/
//$estadoDao = new App\Model\EstadoDao;
//$estadoDao->create($estado);
/*
$estadoDao->read();
foreach($estadoDao->read() as $estados){
	echo
		"ID = " . $estados['id_estado'] . "<br>" .
		"Estado = " . $estados['nome_estado'] . "<br>" .
		"<a href = ''>
			<img src = 'icones/edit-64.png' class = 'icones'>
		</a>
		<a href = ''>
			<img src = 'icones/x-mark-4-64.png' class = 'icones'>
		</a> " .
		"<br>-----------------------------<br>";
		 
}
*/
//$estadoDao->update($estado);
//$estadoDao->delete(2);



//--CRUD--FORNECEDOR---------------------------------------------
$forn = new App\Model\Fornecedor;
/*
$forn->setid_forn(7);
$forn->setnome_forn('nlaab');
$forn->setnum_endereco(12);
$forn->setcomplemento_end('dhud');
*/
$fornDao = new App\Model\FornecedorDao;
//$fornDao->create($forn);
/*
$fornDao->read();
foreach($fornDao->read() as $fornecedores){
	echo
		"ID = " . $fornecedores['id_forn'] . "<br>" . 
		"Fornecedor = " . $fornecedores['nome_forn'] . "<br>" . 
		"Núm. Endereço = " . $fornecedores['num_endereco'] . "<br>" . 
		"Complemento = " . $fornecedores['complemento_end'] . "<br>" . 
		"<a href = ''>
			<img src = 'icones/edit-64.png' class = 'icones'>
		</a>
		<a href = ''>
			<img src = 'icones/x-mark-4-64.png' class = 'icones'>
		</a> " .
		"<br>-----------------------------<br>";
}
*/
//$fornDao->update($forn);
//$fornDao->delete(7);

//--READ--FORN_LOGRA_POSSUI---------------------------------
$flpDao = new App\Model\Forn_logra_possuiDao;
$flpDao->read();
echo "<h3><u>Listagem dos registros associativos entre FORNECEDOR e LOGRADOURO</u></h3><br>";
foreach($flpDao->read() as $registros){
	echo
		"ID Fornecedor = " . $registros['id_forn_fk'] . "<br>" .
		"CEP = " . $registros['cep_fk'] .
		"<br>-----------------------------<br>";
}

/*
echo "<pre>";
	var_dump($cidade);
echo "</pre>";
*/
//Se der um erro de classe não encontrada, é preciso ir na pasta raiz pelo terminal e dar o comando "composer dumpautoload -o"

 ?>
	</div><!--Fim container-->
</body>
</html>