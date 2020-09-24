
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/estilo2.css">
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

$materialDao = new \App\Model\MaterialDao();
//CREATE
if(isset($_POST['btnCadastrar'])){

    

    
    $material->setid_material(1);
	$material->setnome_material($_POST['nome_material']);
	$material->setdesc_material($_POST['desc_material']);
	$material->setqtde_estoque($_POST['qtde_estoque']);
	$material->setid_prat_fk($_POST['id_prat_fk']);
	$material->setid_forn_fk($_POST['id_forn_fk']);
	//$material->setimagem($imagem);
	$materialDao->create($material);//NÃO FUNCIONOU DE PRIMEIRA. Tive que dar o comando "composer dumpautoload -o"
    
  






	/*
	$material->setid_material(1);
	$material->setnome_material($_POST['nome_material']);
	$material->setdesc_material($_POST['desc_material']);
	$material->setqtde_estoque($_POST['qtde_estoque']);
	$material->setid_prat_fk($_POST['id_prat_fk']);
	$material->setid_forn_fk($_POST['id_forn_fk']);
	$material->setnome_imagem($_FILES['nome_imagem']['name']);
	$materialDao->create($material);//NÃO FUNCIONOU DE PRIMEIRA. Tive que dar o comando "composer dumpautoload -o"
	*/
}

//$materialDao->update($material);
//$materialDao->delete(14);
$materialDao->read();

echo "<h3><strong><u>Listagem dos materiais</u></strong></h3><br>";
foreach ($materialDao->read() as $materiais) {
	echo
	"<img src = upload/" . $materiais['imagem'] . " class = 'imagem-material'> " . "<br>" . 
	"ID = " . $materiais['id_material'] . "<br>" .  
	"Nome = " . $materiais['nome_material'] . "<br>" . 
	"Descrição = " . $materiais['desc_material'] . "<br>" .
	"Qtde. estoque = " . $materiais['qtde_estoque'] . "<br>" .
	"ID prateleira = " . $materiais['id_prat_fk'] . "<br>" .
	"ID fornecedor = " . $materiais['id_forn_fk'] . "<br>" .
	"<a href = ''>
			<img src = 'icones/edit-64.png' class = 'icones'>
		</a>
		<a href = ''>
			<img src = 'icones/x-mark-4-64.png' class = 'icones'>
		</a> " .
		"<br>-----------------------------<br>";
}

//var_dump($material->setnome_imagem());

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

//--READ--FORN_LOGRA_POSSUI--------------------------------------------
/*
$flpDao = new App\Model\Forn_logra_possuiDao;
$flpDao->read();
echo "<h3><u>Listagem dos registros associativos entre FORNECEDOR e LOGRADOURO</u></h3><br>";
foreach($flpDao->read() as $registros){
	echo
		"ID Fornecedor = " . $registros['id_forn_fk'] . "<br>" .
		"CEP = " . $registros['cep_fk'] .
		"<br>-----------------------------<br>";
}
*/


//--CRUD--LOGRADOURO----------------------------------------------------

//$logra = new App\Model\Logradouro;
/*
$logra->setcep('777777777');
$logra->setnome_logra('aa');
$logra->settipo_logra('Avenida');
$logra->setid_cidade_fk(2);
*/
//$lograDao = new App\Model\LogradouroDao;
//$lograDao->create($logra);
/*
$lograDao->read();
echo "<u><h3>Logradouros</h3></u>";
foreach($lograDao->read() as $logradouros){
	echo
		"CEP = " . $logradouros['cep'] . "<br>" . 
		"Logradouro = " . $logradouros['nome_logra'] . "<br>" . 
		"Tipo = " . $logradouros['tipo_logra'] . "<br>" . 
		"ID cidade = " . $logradouros['id_cidade_fk'] . "<br>" . 
		"<a href = ''>
			<img src = 'icones/edit-64.png' class = 'icones'>
		</a>
		<a href = ''>
			<img src = 'icones/x-mark-4-64.png' class = 'icones'>
		</a> " .
		"<br>-----------------------------<br>";
}
*/
//$lograDao->update($logra);
//$lograDao->delete('777777777');

//$pedido = new App\Model\Pedido;

//$pedido->setid_pedido(13);
//$pedido->setdata_fechamento('');//PARA TESTES, FOI PRECISO DEIXAR ESSE MÉTODO COMENTADO PARA QUE ACEITASSE COMO NULO. nÃO BASTOU DEIXAR ASPAS VAZIAS.
//$pedido->setstatus_pedido('');
//$pedido->setid_usuario_fk(2);
/*
$pedidoDao = new App\Model\PedidoDao;
//$pedidoDao->create($pedido);
$pedidoDao->read();
foreach($pedidoDao->read() as $pedidos){
	echo 
		"<u>ID</u> = " . $pedidos['id_pedido'] . "<br>" . 
		"<u>Data de abertura</u> = " . $pedidos['data_abertura'] . "<br>" . 
		"<u>Vencimento</u> = " . $pedidos['vencimento'] . "<br>" . 
		"<u>Data de fechamento</u> = " . $pedidos['data_fechamento'] . "<br>" . 
		"<u>Status do pedido</u> = " . $pedidos['status_pedido'] . "<br>" . 
		"<u>ID do usuário</u> = " . $pedidos['id_usuario_fk'] . "<br>" . 
		"<a href = ''>
			<img src = 'icones/edit-64.png' class = 'icones'>
		</a>
		<a href = ''>
			<img src = 'icones/x-mark-4-64.png' class = 'icones'>
		</a> " .
		"<br>-----------------------------<br>";
}
*/
//$pedidoDao->update($pedido);
//$pedidoDao->delete(14);



//--CRUD--PRATELEIRA------------------------------------------------
$prat = new App\Model\Prateleira;
/*
$prat->setid_prat(17);
$prat->setnome_prat('ewwww');
$prat->setid_coluna_fk(2);
*/

$pratDao = new App\Model\PrateleiraDao;
//$pratDao->create($prat);
/*
$pratDao->read();
foreach($pratDao->read() as $prateleiras){
	echo 
	"ID = " . $prateleiras['id_prat'] . "<br>" .
	"Prateleira = " . $prateleiras['nome_prat'] . "<br>" .
	"ID Coluna = " . $prateleiras['id_coluna_fk'] . "<br>" .
	"<a href = ''>
			<img src = 'icones/edit-64.png' class = 'icones'>
		</a>
		<a href = ''>
			<img src = 'icones/x-mark-4-64.png' class = 'icones'>
		</a> " .
		"<br>-----------------------------<br>";
}
*/
//$pratDao->update($prat);
//$pratDao->delete();



//--CRUD--TELEFONE-------------------------------------------------
$tel = new App\Model\Telefone;
/*
$tel->setid_telefone();
$tel->setnumero_tel();
$tel->setid_forn_fk();
*/
$telDao = new App\Model\TelefoneDao;
//$telDao->create($tel);
//$telDao->read();
/*
foreach($telDao->read() as $telefones){
	echo
		"ID = " . $telefones['id_telefone'] . "<br>" .
		"Telefone = " . $telefones['numero_tel'] . "<br>" .
		"ID Fornecedor = " . $telefones['id_forn_fk'] . "<br>" .
		"<a href = ''>
			<img src = 'icones/edit-64.png' class = 'icones'>
		</a>
		<a href = ''>
			<img src = 'icones/x-mark-4-64.png' class = 'icones'>
		</a> " .
		"<br>-----------------------------<br>";
}
*/
//$telDao->update($tel);
//$telDao->delete();




//--CRUD--USUARIO-------------------------------------------------
$usu = new App\Model\Usuario;
/*
$usu->setid_usuario(8);
$usu->setlogin('z');
$usu->setsenha('z');
$usu->setnome('z');
$usu->setsobrenome('z');
$usu->setmatricula(9992);
$usu->setid_acesso_fk(1);
*/

$usuDao = new App\Model\UsuarioDao;
//$usuDao->create($usu);
/*
$usuDao->read();
foreach($usuDao->read() as $usuarios){
	echo
		"ID = " . $usuarios['id_usuario'] . "<br>" .
		"Login = " . $usuarios['login'] . "<br>" .
		"Senha = " . $usuarios['senha'] . "<br>" .
		"Nome = " . $usuarios['nome'] . "<br>" .
		"Sobrenome = " . $usuarios['sobrenome'] . "<br>" .
		"Matrícula = " . $usuarios['matricula'] . "<br>" .
		"ID acesso = " . $usuarios['id_acesso_fk'] . "<br>" .
		"<a href = ''>
			<img src = 'icones/edit-64.png' class = 'icones'>
		</a>
		<a href = ''>
			<img src = 'icones/x-mark-4-64.png' class = 'icones'>
		</a> " .
		"<br>-----------------------------<br>";
}
*/
//$usuDao->update($usu);
//$usuDao->delete(8);



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