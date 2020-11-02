function redirecionar(){
    alert("Dados insuficientes");
    window.location.href = "menu.php";
}

function boasVindas(){
    alert("Bem-vindo ao sistema!");
}

function acessoRestrito(){
    alert("Acesso restrito ao estoque");
    window.location.href = "menu-pedidos.php";
}

function pedidoIniciado(){
    alert("Escolha a quantidade de cada item que deseja adicionar ao pedido, clicando em SOLICITAR");
}

function pedidoLiberado(){
    alert("Pedido liberado com sucesso");
    window.location.href = "todos-pedidos.php";
}

function verificarMatricula(){
    alert("Funcionário já cadastrado");
    window.location.href = "../form-cadastrar-usuario.php";
}