
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

$material = new \App\Model\Material();
$material->setid_material(12);
$material->setnome_material("Alicate de corte");
$material->setdesc_material("15 polegadas");
$material->setqtde_estoque(10);
$material->setid_prat_fk(3);
$material->setid_forn_fk(1);

$materialDao = new \App\Model\MaterialDao();

//$materialDao->create($material);//NÃO FUNCIONOU DE PRIMEIRA. Tive que dar o comando "composer dumpautoload -o"

$materialDao->update($material);

//$materialDao->delete(14);

$materialDao->read();
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

/*
echo "<pre>";
	var_dump($material);
echo "</pre>";
*/
//Se der um erro de classe não encontrada, é preciso ir na pasta raiz pelo terminal e dar o comando "composer dumpautoload -o"

 ?>
	</div><!--Fim container-->
</body>
</html>