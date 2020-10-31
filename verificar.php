<?php
namespace App\Model; 
require_once "vendor/autoload.php";

session_start();

// Verifica se existe os dados da sessão de login
if($_SESSION['logado'] != 'sim')
{
// Usuário não logado! Redireciona para a página de login
header("Location: login.php");
exit;
}
?>